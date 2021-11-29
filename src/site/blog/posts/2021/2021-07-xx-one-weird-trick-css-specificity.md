---
title: "You won't believe this one weird trick for increasing your CSS specificity!"
date: 2021-07-21T22:07Z
summary:
keywords:
  - css
  - specificity
  - code
  - selectors
---
It's not uncommon to find yourself in situations where you need to override someone else's CSS rules. Especially when trying to work around some legacy CSS code or customise 3rd party UI components. Typically this involves finding which of _their_ selectors is applying the declaration(s) you need to override and then trumping it with your own selector that has a higher specificity.

For example, let's say you're using [Bootstrap](https://getbootstrap.com/) and you want to change the background color of a primary button when hovered. The first step is to determine where the current style is coming from. Inspecting the element with our browser's dev tools reveals that there is a `.btn-primary:hover` selector that is applying the blue background colour we want to change.

![Screenshot of Firefox's web developer tools inspecting a button](/media/2021/one-weird-trick/inspecting-button.png)

We might begin by replicating that selector somewhere in our own CSS and then changing the background color there:

```css
.btn-primary:hover {
  background-color: red;
}
```

While this _might_ work in some cases, it will fail in others as it depends on the source order. Both selectors have the same specificity, so whichever one appears later in the code wins. Depending on your project, you might not always be able to control that order.

Your next move is then to increase specificity. `.btn-primary:hover` has a specificity of (0,2,0), so that's what we need to beat. Looking back at the element we inspected we can see that it also has a `.btn` class, so we could add that:

```css
/* Specificy is now (0,3,0) */
.btn.btn-primary:hover {
  background-color: red;
}
```

This works and our button is now red instead of blue. But, what if the `.btn-primary` class is applied to another element? Perhaps someone will do `<input type="buton" class="btn-primary" value="Click me!" />`. Then our selector would no longer match.

If we had added the `.btn` class to our selector instead, we might run into similar issues. Are we use that `.btn` and `.btn-primary` are always used together? (To be fair, on a Bootstrap project they probably are. But when working with other components or libraries these kinds of relationships are not always clear or guaranteed.)

The trap we're falling into here is that we're trying to find some _other_ characteristics of the component we're targeting that we can add into our selector. As it turns out, there's no need to do so. We can simply repeat the _same_ class selector!

```css
/* This is fine! */
.btn-primary.btn-primary:hover {
  background-color: red;
}
```

This allows us to select the element


---

A few months ago my former colleague [Jim Maclean](http://jamesmaclean.co.uk/) introduced me to an elegant trick for boosting specificity without sacrificing legibility or future-proofing. It was actually just
<!-- Video of talk: https://www.youtube.com/watch?v=uaa6xLWYfjc -->
