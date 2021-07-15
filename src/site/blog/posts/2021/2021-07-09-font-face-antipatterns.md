---
title: "A @font-face anti-pattern"
date: 2020-09-07T14:45Z
summary: How to make working with different weights and styles of the same font in CSS easy, by avoiding a common @font-face anti-pattern.
keywords:
  - css
  - fonts
  - typography
  - code
---
Have you ever worked on a web project using web fonts where you had to set different `font-family` names in order to display different weights (normal, bold, etc.) or styles (normal & italic) of a font? Or have you had browser apply an unwanted faux bold effect to an already bold font? An anti-pattern to setting up `@font-face` rules that I've encountered a number of times over the years is likely to be the root cause of such problems and more. In this post I'll explain what's going wrong and how to fix it.

Web fonts are often available in multiple weights and styles. When using web fonts, each permutation of weight and style tends to be a separate file (unless you're lucky enough to be using a variable font). Consequently, many web fonts will provide a set of files a bit like this:

```
SuperFancyFont-light.woff2
SuperFancyFont-light-italic.woff2
SuperFancyFont-regular.woff2
SuperFancyFont-regular-italic.woff2
SuperFancyFont-bold.woff2
...and so on
```

(Often, each file may also be available in a few different formats like `.eot`, `.woff` or `.svg`. I'll omit those in my examples for clarity)

The mistake I've seen a number of times, is to define different `font-family` names for each file in the `@font-face` rules. For example:

```css
@font-face {
  font-family: SuperFancyFont-light;
  src: url('SuperFancyFont-light.woff2') format('woff2');
}

@font-face {
  font-family: SuperFancyFont-regular;
  src: url('SuperFancyFont-regular.woff2') format('woff2');
}

@font-face {
  font-family: SuperFancyFont-bold;
  src: url('SuperFancyFont-bold.woff2') format('woff2');
}

/* ...and so on for each variant */
```

Later on, when styling things, you then need to use the font family name that corresponds to the weight and style you want:

```css
.card {
  font-family: SuperFancyFont-regular;
  /* other styles */
}

.card__title {
  font-family: SuperFancyFont-bold;
  /* other styles */
}
```

That might not seem too bad at first glance. But, there are inconveniences and bugs lurking in there! Before we get into that though, it's important to understand what _exactly_ this CSS means.

In a browser's default styles, most elements will inherit their font weight and style. This why you can do something like:

```css
body {
  font-style: italic;
}
```
...and have pretty much all text on a page turn italic.

Furthermore, the initial value for `font-weight` is `normal` and `font-style` is `normal`. So, unless you specify otherwise, most elements will render with the normal weight and style. The obivous exceptions are elements like `<h1>` to `<h6>` or `<strong>`, which will have `font-weight: bold;` applied by default. Similarly, a few elements like `<em>` have `font-style: italic;` applied by default.

For system fonts, the browser already knows how to select and display their different weights and styles. However, when you use your own web fonts, it becomes your responsibility to tell the browser which file corresponds to which weight and/or style. With that in mind, let's revisit the `@font-face` rules from before:

```css
@font-face {
  font-family: SuperFancyFont-bold;
  src: url('SuperFancyFont-bold.woff2') format('woff2');
}
```

We're telling the browser that there is a font, whose family name is `SuperFancyFont-bold` and the corresponding file, in the WOFF2 format, is `SuperFancyFont-bold.woff2`. But we've not said anything about its weight or style. In the absence of that information, the browser will assume both are `normal`. The fact that the _family_ name and _filenames_ both have "bold" in them (which probably means this file is actually the bold weight variant of that font) means nothing to the browser. Therefore, if we're using different family names for each variant of our font, the browser actually treats them as separate font families where each one is only available in a normal weight and style! To the browser, `SuperFancyFont-bold` and `SuperFancyFont-regular` could be as different to each other as `Helvetica` is to `Times New Roman`!

Now let's revisit where we use our font:

```css
.card__title {
  font-family: SuperFancyFont-bold;
  /* other styles */
}
```

Since we haven't specified an explicit `font-weight` or `font-style` they will both be inherited. The kind of element we apply that class to might therefore yield different visual results:

```html
<div class="card__title">I will appear in SuperFancyFont in bold</div>

<h2 class="card__title">I will appear in SuperFancyFont, but what weight?</h2>
```

The `<div>` just inherit inherits the inital `normal` weight. Since our `.card__title` class sets the font family to `SuperFancyFont-bold`, the browser will go looking for the file that corresponds to the normal weight and style of that font family. That's precisely what our `@font-face` rule declared, so the browser will use the `SuperFancyFont-bold.woff2` file. Depsite the browser thinking this is the `normal` weight, it just so happens that this file is actually the bold version of the font and the text in our `<div>` renders in bold. So far, so good.

But what happens for the `<h2>`? The browser will give this a weight of `bold` by default. So, now it's going to look for a `bold` version of `SuperFancyFont-bold`. We haven't declared one though, so it doesn't find any. In this situation, [the browser attempts to find the closest available fallback weight](https://developer.mozilla.org/en-US/docs/Web/CSS/font-weight#fallback_weights). In our case that's the `normal` one and so the same `SuperFancyFont-bold.woff2` file ends up being used. _But_, there's a twist: The browser knows you wanted a bold weight, so it will take what it considers the normal weight and try to make it bold itself - this is known as "faux bold". The result rarely looks as good as the proper bold version of a font that will have been carefully designed. In our case we're also likely to end up with a bolder version of our bold font which is almost certainly not what we wanted! (By the way, browsers will also compensate for missing italic variants of a font by applying a "faux italic" effect.)

![screenshot of 2 lines of text. The first is rendered in the correct weight, the second has a faux bold effect applied to it](/media/2021/font-face-antipattern/faux-bold.png)

One way of avoiding this would be explicitly set the `font-weight` and `font-style` in our class, which will override any inherited values.

```css
.card__title {
  font-family: SuperFancyFont-bold;
  font-weight: normal;
  font-style: normal;
  /* other styles */
}
```

This looks odd and other developers seeing this code may well wonder why the "bold" font has its weight set to "normal". It's also adding bloat to the CSS - especially if we have to do this in lots of places. It can quickly become tedious because we feel like we have to "fight" against the browser's default styles. Perhaps most importantly though, it's not addressing the root cause of our problem: Our `@font-face` rules aren't telling the browser which font file corresponds to which weight and style.

Fortunately, doing just that doesn't require much work. [`@font-face` rules can contain more descriptors than just `font-family` and `src`](https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face#descriptors) including `font-weight` and `font-style`. Within an `@font-face` block, these will declare which weight and/or style the file(s) listed under `src` are. Armed with that knowledge we can now fix our `@font-face` rules by:

* Giving them all the same `font-family`.
* Adding the respective `font-weight` and/or `font-style` descriptors as needed.

```css
@font-face {
  font-family: SuperFancyFont;
  src: url('SuperFancyFont-light.woff2') format('woff2');
  font-weight: 300;
}

@font-face {
  font-family: SuperFancyFont;
  src: url('SuperFancyFont-regular.woff2') format('woff2');
  font-weight: normal;

}

@font-face {
  font-family: SuperFancyFont;
  src: url('SuperFancyFont-bold.woff2') format('woff2');
  font-weight: bold;
}
```

(Btw, MDN has [a handy table mapping common font weight names to the corresponding CSS `font-weight` values](https://developer.mozilla.org/en-US/docs/Web/CSS/font-weight#common_weight_name_mapping).)

With that done, we can use our super fancy font just as we would any system font! We could update our card classes as follows:

```css
.card {
  font-family: SuperFancyFont;

  /* other styles */
}

.card__title {
  /*
    If we're following BEM conventions, elements with
    this class will be children of ones with the .card
    class and this inherit the `font-family`.
    It's therefore redundant to set that again here and
    we can just set the weight.
  */
  font-weight: bold;

  /* other styles */
}
```

Our code is now easier to understand (bold means bold!) and we won't run into faux bold issues or inconsistencies anymore. Our card titles will always have an explicit bold weight which, thanks to our updated `@font-face` rule, will load the correct web font file.

Furthermore, using elements like `<strong>` or `<em>` will just work as usual (assuming you have the appropriate bold and italic weights of your chosen font available) without needing any additional CSS code.
