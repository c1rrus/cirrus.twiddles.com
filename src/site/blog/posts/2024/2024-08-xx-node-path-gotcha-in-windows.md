---
title: Node.js path gotcha on Windows
date: 2024-08-19T23:20Z
summary: Comparing my latest smartphone to the very first one I ever owned. How things have changed over 20 years.
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

**Problem**: When coverting file `URL` objects to absolute path strings, extracting the URL's [`pathname`](https://nodejs.org/api/url.html#urlpathname) works fine on POSIX systems like macOS & Linux, but can cause problems on Windows.

**Solution:** Use [`fileURLToPath()`](https://nodejs.org/api/url.html#urlfileurltopathurl-options) from `node:url` instead.


## Details

Imagine you have the following directory layout:

```
├── scripts/
│   └── convert.js
├── assets/
│   └── file.abc
└── output/
```

...and you want `scripts/convert.mjs` to read `assets/file.abc`, do some kind of conversion of its contents and write the output to a new file under `output/`. Your `convert.mjs` is therefore reading from and writing to known locations relative to itself. You might therefore use relative filepaths when calling the relevant file system APIs:

```js
const { readFile, writeFile } = require('fs/promises');

const content = await readFile('../assets/file.abc');

// do some stuff to content

await writeFile('../output/file.xyz', content);
```

However, Node's file system API [resolves relative file paths relative to the current working directory](https://nodejs.org/docs/v20.16.0/api/fs.html#string-paths). So, depending on where you execute your script from, you'll get different results

```sh
# fails, because it cannot find file "../assets/file.abc"
# relative to the root directory you're currently in
node scripts/convert.js

# works as expected, because "../assets/file.abc" relative to
# the scripts/ directory points to the right place
cd scripts
node convert.js
```

Using absolute file paths instead ensures that our script works as intended no matter where it is executed from. However, if this script is going to be used on different machines (for example if it's a build script in a git repo that multiple developers work on) and we can't predict exactly where it will be located on each machine, then we can't hardcode our absolute file paths. We therefore need to construct the paths dynamically.

In the past, I used to use [`__dirname`](https://nodejs.org/docs/latest/api/modules.html#__dirname) (which provides the current module's directory path) and [`path.join()`](https://nodejs.org/api/path.html#pathjoinpaths) for this. For example:

```js
const { readFile, writeFile } = require('fs/promises');
const { join } = require('path');

const inputFilepath = join(__dirname, '..', 'assets', 'file.abc');

const content = await readFile(inputFilepath);

// ...
```

Problem solved!

If my colleague Alice runs this on her Mac, it works. `inputFilepath` was set to something like `/Users/alice/assets/file.abc`, and the `readFile()` call successfully found the file there.

When my other colleague Bob runs this on his Linux box, it also works. In his case, `inputFilepath` ended up being set to `/home/bob/assets/file.abc`.

So far so good.

However, it's now 2024 and CommonJS modules are on their way out. Node.js has supported ES Modules for a while now (as long as you include `"type": "module"` in your `package.json`, or use the `.mjs` file extension), so let's migrate our script to that format.

Unfortunately, `__dirname` is not available within ES Modules, but we can use [`import.meta.url`](https://nodejs.org/api/esm.html#importmetaurl), which gives us the absolute URL of the current module, instead.

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

const inputFilepath = join(ownDirPath, '..', 'assets', 'file.abc');

const content = await readFile(inputFilepath);

// ...
```

Excellent. We're living in the future!

But now Carol joins the team. She has a Windows machine. When she runs the script it errors with something like:

```
Error: ENOENT: no such file or directory, open 'C:\C:\Users\carol\assets\file.abc'
```

Oh dear.

No wonder it can't find the file, the path has somehow ended up with a double drive letter (`"C:\C:\"`). Why?

On Windows, our `import.meta.url` would have been something like: `file:///C:/Users/carol/scripts/convert.js`. Note how the first path segment with the drive letter is prefixed by a forward slash: `/C:/`. So when you parse that URL and get the `.pathname` you end up with `/C:/Users/carol/...`. The `path.join()` function will normalise path segments passed into it, so on Windows the forward slashes change to backslashes: `\C:Users\carol\...`. But the leading path separator (`\`) is still there.

It turns out, _that_ is the issue. On Windows, absolute file paths need begin with the drive letter (e.g. `C:/...`) _without_ the leading forward or backward slash. On Windows, a path like `/C:/Users/` or `\C:\Users\` is treated as relative to the current drive. So when the file system APIs resolve the path, they prepend the current drive letter and we end up with `C:\C:\...`.

You can see this for yourself using `path.resolve()` too:

```js
import { resolve } from 'node:path';

console.log(resolve('/C:/foo/bar'));
// On macOS & Linux: /C:/foo/bar
// On Windows:     \C:\C:\foo\bar
```

We've established that we cannot safely use the `pathname` part of a file URL, so what can we use? Luckily, Node.js provides a little utility function in the `node:url` package which can safely convert for us: [`fileURLToPath()`](https://nodejs.org/api/url.html#urlfileurltopathurl-options). It can accept both strings containing `file://` URLs or actual `URL` objects. Here it is in action:

```js
import { fileURLToPath } from 'node:url';

console.log(import.meta.url);
// Alice's macOS: file:///Users/alice/scripts/convert.js
// Bob's Linux: file:///home/bob/scripts/convert.js
// Carols's Windows: file:///C:/Users/carol/scripts/convert.js

console.log(fileURLToPath(import.meta.url));
// Alice's macOS: /Users/alice/scripts/convert.js
// Bob's Linux: /home/bob/scripts/convert.js
// Carols's Windows: C:\Users\carol\scripts\convert.js <-- No more leading slash!
```

Putting it all together, we can update our `convert.js` script as follows:

```js
import { readFile, writeFile } from 'node:fs/promises';
import { join } from 'node:path';
import { fileURLToPath } from 'node:url';

const ownDirUrl = new URL('.', import.meta.url);
const ownDirPath = fileURLToPath(ownDirUrl); // <-- Safe to use on all OSes

const inputFilepath = join(ownDirPath, '..', 'assets', 'file.abc');

const content = await readFile(inputFilepath);

// ...
```

...and finally it works reliably everywhere!


## Recap

In summary, if you're writing scripts to read/write files in locations relative to the script then:

1. Convert to absolute paths so that your script works regardless of where it was run from
2. Use `fileURLToPath()` to safely convert `file://` URLs to the corresponding absolute path
