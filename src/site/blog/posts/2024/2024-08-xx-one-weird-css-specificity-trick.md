---
title: Double your specificity with this one weird trick
date: 2024-08-21T23:42Z
summary: The shocking secret CSS developers don't want you to know. Learn the truth now!
keywords:
  - css
  - web
  - development
  - coding
  - specificity
ogp:
  image: /media/2024/one-weird-css-trick.jpg
---
<img src="/media/2024/one-weird-css-trick.jpg" alt="Medium shot of a surprised woman standing in front of endless CSS code." width="2000" height="776">

In an ideal world, our CSS code is beautifully organised and easy to maintain. Reality is often quite different though. Of course, _your_ CSS code is perfect. But, other people's pesky CSS is often also present and might be conflicting with yours or is applying styles you don't want.

Furthermore, the chances are that you can't edit that _other_ CSS. Maybe it comes from a UI library you're using. Maybe it's some 3rd party widget or embed. Maybe it's just stuff owned by another team or department.

To make matters worse, you probably don't control (all of) the markup either. Adding some extra `class` or `id` attributes to help you target the DOM elements whose styling you need to override isn't an option.

Before you know it, you're drawn into a CSS specificity battle. Your selectors need to take precedence over theirs. Lesser developers might be tempted to reach for `!important`, but you're better than that. Yes, your styles need to beat theirs. But they should do so with elegance and panache.

Read on to discover one weird trick that can help you in those situations without getting (too) hacky...

## Example scenario

Imagine you're working on a site that has a newsletter sign-up form. It contains a checkbox, but the positioning of it is a bit off. You need to fix that, but the sign-up form is a 3rd party widget that's been embedded on the page and you're unable to directly alter the CSS it pulls in.

You inspect the checkbox and determine that its `top` position needs to be changed. The current position is being set vis the selector `.newsletter .newsletter__checkbox .checkbox__icon`, which has a specificity of (0,3,0).

<img src="/media/2024/style-inspector.jpg" alt="Screenshot of Firefox developer tools inspecting the styles of a <span> element. The rules panel is showing that the selector '.newsletter .newsletter__checkbox .checkbox__icon' is applying a top position of 2px to the element." width="1350" height="360">

You might begin by using the same selector to apply the desired `top` value:

```css
/* Override top position of newsletter checkbox */
.newsletter .newsletter__checkbox .checkbox__icon {
  top: 5px;
}
```

In situations where the source order of CSS is predictable and you can guarantee that your CSS rules come after theirs, this will suffice. If multiple CSS selectors targeting the same DOM element have the same specificity, then the ones last in the source order will "win".

However, let's assume you can't guarantee the source order. Then you'll need to increase the specificity of your selector. You could look around in the DOM to find some additional class names from parent elements to tack on:

```css
/* MOAR CLASSES! Specificity is now (0,4,0) */
.parent-thing .newsletter .newsletter__checkbox .checkbox__icon {
  top: 5px;
}
```

Or you could exploit the fact that the element happens to be a `<span>` and add an element selector into the mix:

```css
/* Span, glorious span! Specificity is now (0,3,1) */
.newsletter .newsletter__checkbox span.checkbox__icon {
  top: 5px;
}
```

These approaches might make your code brittle though. What happens if the `.parent-thing` doesn't exist on all pages? Or if `.checkbox__icon` is applied to a different element? All of a sudden your high-powered selector is selecting diddly squat!

## One weird trick

When browsers calculate the specificity of a CSS selector, they're essentially counting how many ID, class, element or equivalent selectors you've combined. It turns out they do _not_ de-duplicate the selectors when doing so. Therefore, you can simply duplicate (or triplicate, or quadruple, etc.) the _same_ selector:

```css
/* Double .checkbox__icon counts double! Specificity is now (0,4,0) */
.newsletter .newsletter__checkbox .checkbox__icon.checkbox__icon {
  top: 5px;
}
```

(Note how there's _no_ space in `.checkbox__icon.checkbox__icon`! It needs to be a [compound selector](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_selectors/Selector_structure#compound_selector) because you're targeting a _single_ element that has that class.)

So, there you have it. Now you can just double up the relevant selector(s) to boost your specificity!

<div class="aside">

### Doubling up in HTML

Note that this trick only works in CSS! Repeating the same class name in HTML makes no difference to the specificity of any CSS selectors that target that element.

```html
<div class="badger badger badger">
  Mushroom!
</div>
<style>
  /* Still has specificity (0,1,0) */
  .badger {
    /* ... */
  }
</style>
```

</div>

Is this CSS technique a bit of a hack? Perhaps. However, I'd argue that it lets you:

* avoid resorting to `!important`, which is nice
* stay close to the original selector you were trying to override, so the intent of the code is clearer to readers
* find the overrides of other people's CSS in your code fairly easily, which can be helpful if they're no longer needed at a later date and can be removed

As long as you don't overuse it, I think this is a perfectly legitimate trick to use next time you find yourself in a sticky specificity situation.








