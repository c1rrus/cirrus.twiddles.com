---
title: Design System Architecture (TL;DR version)
slug: design-system-architecture-tl-dr
date: 2017-04-28T12:01Z
summary: Summarised version of another post that identifies common categories of tools and integrations in design systems
keywords:
  - design systems
  - design tokens
  - tools
  - ui
  - summary
ogp:
  image: /media/medium/ds-architecture.webp
---

_If my [full-fat post about Design System Architecture](/blog/2017/04/28/design-system-architecture/) is too long for your taste (Medium estimates it’s a 12 minute read), then you might prefer this summarised version…_

At [Buildit](https://web.archive.org/web/20190927222503/https://buildit.wiprodigital.com/) we’ve done a fair amount of work on design systems. We’ve noticed certain types of tools and integrations between them recur and figured it would be useful to call them out.

This is the overall architecture for a design system’s infrastructure that we’ve observed and used. Not every design system will contain all of these parts. However, the ones they do have will likely be connected in the same way.

<figure>
<img src="/media/medium/ds-architecture.webp" alt="Diagram showing different categories of design system tools and how they connect to each other." width="1533" height="682">
<figcaption>Generic architecture of a design system’s infrastructure</figcaption>
</figure>

## UI Library

The **UI library** should be the “single source of truth” since it contains the actual implementations of the UI components. Note that in complex design systems you may have several of these (e.g. one for native iOS, one for native Android and one for Web). Likewise, you may (also) have hierarchies of them (e.g. a common CSS library for _all_ web things, and then more specialised ones that extend it with components for a particular framework or CMS).

## Style Guide Generator

Tools like [Pattern Lab](https://patternlab.io/), [Fractal](https://fractal.build/) and [StoryBook](https://storybook.js.org/) that generate a living style guide from the code in your UI library.

## Package Managers & Repos

Tools like [npm](https://www.npmjs.com/), [yarn](https://yarnpkg.com/) and [Nexus](https://www.sonatype.com/products/sonatype-nexus-repository) that take care of packaging and distributing your UI library.

## Design Token Repository

Tools to store, manage and export design tokens. Token data in JSON files being exported via [SalesForce Theo](https://github.com/salesforce-ux/theo) is an example. Some larger tools like [Brand.ai](https://web.archive.org/web/20170515041136/https://brand.ai/) and [Frontify](https://www.frontify.com/) incorporate design token repositories within them.

## Visual Design Repository

Tools like [Craft](<(https://web.archive.org/web/20170511091957/https://www.invisionapp.com/craft)>), [Folio](https://web.archive.org/web/20170426173152/http://folioformac.com/), [ZeroHeight](https://zeroheight.com/) etc., through which designers can sync and share their assets (e.g. Sketch symbols).

## Visual Design Generator

Tools like [React Sketch.app](https://airbnb.io/react-sketchapp/) that generate visual design files (e.g. Sketch UI kits) from the code in your UI library.

## Visual Design Tools

Tools like [Sketch](https://www.sketch.com/) or [PhotoShop](https://www.adobe.com/products/photoshop.html) that are used to produce visual designs of UI components.

## Conclusion

We’ve found identifying these categories of tools and the connections between them useful when discussing or comparing them. Hopefully you will too.

We’d love to hear your thoughts!

_If this has whet your appetite, please check out the [full-fat version of this post](/blog/2017/04/28/design-system-architecture/) when you’ve got some more time. It contains a lot more detail._
