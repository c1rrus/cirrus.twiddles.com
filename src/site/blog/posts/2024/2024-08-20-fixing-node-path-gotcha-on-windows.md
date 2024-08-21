---
title: Fixing a Node.js path gotcha on Windows
slug: fixing-node-js-paths-on-windows
date: 2024-08-20T23:23Z
summary: How to implement robust, Windows-proof relative file path handling in Node.js ES modules
keywords:
  - node
  - javascript
  - ecmascript
  - js
  - es
  - windows
  - file
  - path
  - coding
  - tip
---
I recently ran across a gotcha when working with file paths in Node.js scripts across macOS, Linux and Windows, so sharing details and the solution here in case it helps someone else.

## TL;DR

**Problem**: When converting file `URL` objects to absolute path strings, the [`pathname`](https://nodejs.org/api/url.html#urlpathname) part works fine on POSIX systems like macOS & Linux, but causes problems on Windows.

**Solution:** Use [`fileURLToPath()`](https://nodejs.org/api/url.html#urlfileurltopathurl-options) from `node:url`, to convert from URL to a path instead.


## Details

Imagine you have the following directory layout:

```txt
├── scripts/
│   └── convert.js
├── assets/
│   └── file.abc
└── output/
```

...and you want `scripts/convert.js` to read `assets/file.abc`, do some kind of conversion of its contents and write the output to a new file under `output/`. Your `convert.js` is therefore reading from and writing to known locations relative to itself. You might therefore use relative file paths when calling the relevant file system APIs:

```js
const { readFile, writeFile } = require('fs/promises');

const content = await readFile('../assets/file.abc');

// do some stuff to content

await writeFile('../output/file.xyz', content);
```

However, Node's file system API [resolves relative file paths relative to the current working directory](https://nodejs.org/docs/v20.16.0/api/fs.html#string-paths). So, depending on _where_ you execute your script from, you'll get different results

```sh
# fails, because it cannot find the file "../assets/file.abc"
# relative to the root directory you're currently in
node scripts/convert.js

# works as expected, because "../assets/file.abc" relative to
# the scripts/ directory points to the right place
cd scripts
node convert.js
```

Using absolute file paths instead ensures that our script works as intended no matter where it is executed from. However, if the script is going to be used on different machines (for example if it's a build script in a git repo that multiple developers work on) you can't predict exactly where it will be located on each machine. Therefore you can't hardcode the absolute file paths. You need to construct the paths dynamically instead.

In the past, I used [`__dirname`](https://nodejs.org/docs/latest/api/modules.html#__dirname) (which provides the current module's directory path) and [`path.join()`](https://nodejs.org/api/path.html#pathjoinpaths) to do that. For example:

```js
const { readFile, writeFile } = require('fs/promises');
const { join } = require('path');

const inputFilePath = join(__dirname, '..', 'assets', 'file.abc');

const content = await readFile(inputFilePath);

// ...
```

Problem solved!

Now, if my colleague Alice runs this on her Mac, it works. `inputFilePath` will be set to something like `/Users/alice/assets/file.abc`, and the `readFile()` call successfully finds the file there.

When my other colleague Bob runs this on his Linux box, it also works. In his case, `inputFilePath` ends up being set to `/home/bob/assets/file.abc`.

So far so good.

However, it's now 2024 and CommonJS modules are on their way out. Node.js has supported ES Modules for a while now (as long as you include `"type": "module"` in your `package.json`, or use the `.mjs` file extension), so let's migrate our script to that format.

Unfortunately, `__dirname` is not available within ES Modules. Instead, we can use [`import.meta.url`](https://nodejs.org/api/esm.html#importmetaurl), which gives us the absolute path of the current module as a `file://` URL. We just need to convert that URL to a directory path.

```js
import { readFile, writeFile } from 'node:fs/promises';
import { join } from 'node:path';

// import.meta.url is a string containing a file:// URL to this module.
// E.g. "file:///home/bob/scripts/convert.js"
// To extract the directory path (/home/bob/scripts/), we can construct
// a URL object pointing the current directory ('.') relative to import.meta.url
// and then pluck out the .pathname part
const ownDirUrl = new URL('.', import.meta.url); // URL object for file:///home/bob/scripts/
const ownDirPath = ownDirUrl.pathname; // "home/bob/scripts/"

const inputFilePath = join(ownDirPath, '..', 'assets', 'file.abc');

const content = await readFile(inputFilePath);

// ...
```

Excellent. We're living in the future!

<div class="aside">

### Note about using file URLs

Many of Node's file system APIs can accept URL objects as well as string paths. Depending on your use-case you may therefore be able to side-step the whole URL-to-path conversion shenanigans outlined in this blog post.

However, beyond Node's built-in libraries, you may well encounter other APIs that only support paths. For those I hope the rest of this post will still be relevant.

</div>

But now Carol joins the team. She has a Windows machine. When she runs the script it errors with something like:

```
Error: ENOENT: no such file or directory, open 'C:\C:\Users\carol\assets\file.abc'
```

Oh dear.

No wonder it can't find the file, the path has somehow ended up with a double drive letter (`"C:\C:\"`).

Why?

On Windows, our `import.meta.url` would have been something like: `file:///C:/Users/carol/scripts/convert.js`. Note how the first path segment with the drive letter is prefixed by a forward slash: `/C:/`. So when you parse that URL and get the `.pathname`, you end up with `/C:/Users/carol/...`. The `path.join()` function will normalise path segments passed into it, so on Windows the forward slashes change to backslashes: `\C:Users\carol\...`. But the leading path separator (`\`) is preserved.

It turns out, _that_ is the issue. On Windows, absolute file paths need begin with the drive letter (e.g. `C:/...`) _without_ the leading forward or backward slash. On Windows, a path like `/C:/Users/` or `\C:\Users\` is treated as relative to the current drive. So when the file system APIs resolve the path, they prepend the current drive letter and we end up with `C:\C:\...`.

You can see this for yourself using `path.resolve()`:

```js
import { resolve } from 'node:path';

console.log(resolve('/C:/foo/bar'));
// On macOS & Linux: /C:/foo/bar    <-- No change!
// On Windows:       \C:\C:\foo\bar <-- Uh oh!
```

Now that we have established that we cannot safely use the `pathname` part of a file URL, the question is what can we use? Luckily, Node.js provides a little utility function in the `node:url` package which can do the conversion for us _safely_: [`fileURLToPath()`](https://nodejs.org/api/url.html#urlfileurltopathurl-options). It can accept both strings containing `file://` URLs or actual `URL` objects. Here it is in action:

```js
import { fileURLToPath } from 'node:url';

console.log(import.meta.url);
// Alice's macOS:    file:///Users/alice/scripts/convert.js
// Bob's Linux:      file:///home/bob/scripts/convert.js
// Carols's Windows: file:///C:/Users/carol/scripts/convert.js

console.log(fileURLToPath(import.meta.url));
// Alice's macOS:    /Users/alice/scripts/convert.js
// Bob's Linux:      /home/bob/scripts/convert.js
// Carols's Windows: C:\Users\carol\scripts\convert.js <-- No more leading slash!
```

Putting it all together, we can update our `convert.js` script as follows:

```js
import { readFile, writeFile } from 'node:fs/promises';
import { join } from 'node:path';
import { fileURLToPath } from 'node:url';

const ownDirUrl = new URL('.', import.meta.url);
const ownDirPath = fileURLToPath(ownDirUrl); // <-- Safe to use on all OSes

const inputFilePath = join(ownDirPath, '..', 'assets', 'file.abc');

const content = await readFile(inputFilePath);

// ...
```

...and finally, it works reliably everywhere!

## Recap

In summary, if you're writing scripts to read/write files in locations relative to the script then:

1. Convert to absolute paths so that your script works regardless of where it was run from
2. Use `fileURLToPath()` to safely convert `file://` URLs to the corresponding absolute path
