---
title: Design System Architecture (full-fat version)
slug: design-system-architecture
date: 2017-04-28T12:00Z
summary: Identifying common categories of tools and integrations between them in design systems
keywords:
  - design systems
  - design tokens
  - tools
  - ui
ogp:
  image: /media/medium/ds-architecture.webp
---

_This ended up being a lengthy post. If you’re in a hurry you can check out the [TL;DR version](/blog/2017/04/28/design-system-architecture-tl-dr/) to get the gist of it and come back to this one later._

I recently attended [WEBdeLDN](https://web.archive.org/web/20180428070356/www.webdeldn.rocks/)’s “[The Evolution of Design Systems](https://www.eventbrite.co.uk/e/webdeldn-6-the-evolution-of-design-systems-tickets-32662314863)” meet-up (great event, btw!), where I was fascinated by [Alla Kholmatova](https://www.craftui.com/)’s talk. Having worked on and researched numerous design systems, she’s identified three dimensions, against which design systems can be analysed and compared: Strictness, modularity and centralisation.

I won’t delve into that particular topic today (but, if you’re curious, she’s working on a book about design systems, so keep your eyes peeled for that one). However, what stuck with me was how _observing design systems from a particular angle_ allowed her to glean useful insights that might have otherwise gone unnoticed.

It reminded me that it is often useful to identify underlying patterns or characteristics of things. Especially, with complex, technical systems where the individual parts often change over time. For instance, front-end JavaScript frameworks are notorious for frequently going in and out of fashion (last season is was jQuery, now it’s React and who knows what will strut down the catwalk next). However, the _concept_ of a front-end framework persists. It is a pattern that has emerged and stood the test of time.

## Tooling patterns

In our recent design system work at [Buildit](https://web.archive.org/web/20190927222503/https://buildit.wiprodigital.com/), we’ve been focussing a lot on the tools and automation pipelines that can underpin a design system. My colleague [Panos Voudouris](https://panosvoudouris.medium.com/) already wrote about [our first forays into DesOps](https://medium.com/buildit/first-attempt-at-desops-8a9660c37634). As we’ve continued to explore and tinker in this area, we noticed recurring **categories of tools** and **integrations** between them emerge.

It turns out, there’s value in calling them out:

- The categories provide us with a **shared vocabulary**, enabling us to discuss, evaluate and compare the various tools more easily.
- The integrations give us an **architectural map** that helps identify where we might have gaps and/or improvement opportunities in our system.

Similar to Alla, observing design systems through a particular lens — a DesOps-tinted one in our case — has enabled us to learn something useful. The culmination of what we’ve learned so far is this:

<figure>
<img src="/media/medium/ds-architecture.webp" alt="Diagram showing different categories of design system tools and how they connect to each other." width="1533" height="682">
<figcaption>Generic architecture of a design system’s infrastructure</figcaption>
</figure>

Before I go on to explain the various blocks of this diagram, I’d like to stress the following:

- **This only depicts the architecture of the infrastructure** — i.e. what kinds of tools and repositories can exist in a design system and how they are connected. Just having these tools will not give you a complete design system!
- **It’s probably incomplete.** More likely than not, other categories of tools exist or will appear which can be plugged in. Perhaps I’ll revisit this topic in a few months and produce an updated diagram. 😉
- **You don’t always need all the parts.** This setup is somewhat idealised. Depending on your needs and your budget, you might not have one of everything. However, we believe this map can help you identify what things you don’t currently have so that you can consider whether or not you’d want to add them.

With that out of the way, let me explain the blocks which each represent a category of tool…

## UI Library

I’m starting here because we’ve come to consider the UI library, by which we mean **the software implementation of your UI components**, as one of the core pieces of a design system. As far as the look, behaviour and semantics of your UI components are concerned, the software should be the source of truth.

Think about it. A _design_ of a component in PhotoShop or Sketch is just that: A design. A picture of the thing to be built. Likewise, annotations, red-lines, etc. are additional information _about_ the component. Only the software implementation is the component itself — the functional, interactive, responsive… _real_ component that embodies the design and documentation that went before.

What form your UI library takes, will depend heavily on your needs. It might be native iOS Swift code and PNG assets wrapped up as a CocoaPod library. Alternatively, it might be CSS code, web font files and SVG assets in an [NPM package](https://www.npmjs.com/). In some organisations, you may have both of those and more — if you support multiple platforms you may have multiple UI libraries. In that case, each one is the “source of truth” for its respective platform.

Similarly, you may have a hierarchy of UI libraries. This can make sense in the world of web development. For instance, you might have a common CSS library used across all web products, but then complement that with more specialised libraries that add implementations of the interactive components for a specific client-side framework (e.g. React) or perhaps server-side CMS (e.g. [AEM components](https://web.archive.org/web/20150908000148/https://docs.adobe.com/docs/en/aem/6-0/develop/components.html)). [Brad Frost](https://bradfrost.com/) recently outlined this approach in [Managing Technology-Agnostic Design Systems](https://bradfrost.com/blog/post/managing-technology-agnostic-design-systems/).

<figure>
<img src="/media/medium/ui-lib-architecture.webp" alt="Diagram showing hierarchy of UI libraries for various platforms" width="1505" height="541">
<figcaption>A deliberately complex example showing both multi-platform and hierarchical UI libraries</figcaption>
</figure>

It is worth noting that, just as you would with any other software library, a UI library can also contain automated test code, build scripts, API documentation and more. Consequently, you’d typically have some kind of [CI/CD](https://en.wikipedia.org/wiki/Continuous_integration) setup that takes care of automatically building, testing and deploying the library. It is after all _software_, so software engineering best practices should be applied.

## Package managers & repositories

A UI library is ultimately just a software library like any other. Downstream projects should be able to add it as a dependency in order to use the UI components. Likewise, the UI library itself may have dependencies on other software libraries.

That implies you need tools to manage versioning and dependencies of your library’s code, to make releases and to publish them somewhere for others to find and consume.

Examples of established tools that do these jobs are:

- [**NPM**](https://docs.npmjs.com/about-npm) along with the [npmjs.com repository](https://www.npmjs.com/) is the de-facto choice of JavaScript and web-related libraries. If your organisation requires an internally hosted repository, things like [Nexus](https://www.sonatype.com/products/sonatype-nexus-repository) can be a valid alternative to NPM’s public repo.
- [**CocoaPods**](https://cocoapods.org/) is an equivalent package manager + repo for native iOS libraries.
- Android, Linux, Windows and other platforms will each have their own equivalents as well.

## Living Style Guide

In the context of a design system, we of course want to be able see and interact with the UI components that exist in the UI library. This is the job of the living style guide. It presents a browsable catalogue of every component, often accompanied by relevant documentation such as:

- A description of its purpose (to tell designers and developers when to use that component and when _not_ to)
- Code snippets or API documentation for developers,
- Meta data such as the component’s status (in review, signed-off, deprecated, etc.), links to other components it embeds or is embedded by, etc.

## Style guide generator

What makes a style guide _living_ is that it is always kept in sync with the corresponding UI library. Trying to do so manually is almost guaranteed to fail, so this is achieved by _automatically generating_ the style guide _from_ the code in the UI library.

A number of tools that do this exist and they all work in a similar way. For each UI component in the UI library, developers need to provide:

- A code snippet or template that defines the necessary HTML (or DOM structure) for the component
- Additional meta-data like a description or status

This code can sit directly alongside the corresponding component code inside the UI library, or in a separate code repository. That’s up to you.

The style guide generator tool then grabs all those bits and outputs a complete style guide website. That website can then be hosted somewhere so that stakeholders can view it in a web browser just by visiting a URL.

The style guide generation can also be automated, so that whenever a new version of the UI library is released the corresponding style guide is automatically re-generated and published.

Examples of tools that do this for web UI libraries include:

- [**Pattern Lab**](https://patternlab.io/)
- [**Fractal**](https://fractal.build/)
- [**StoryBook**](https://storybook.js.org/) (note this one is specifically for React.js libraries and apps)
- [**Astrum**](https://astrum.nodividestudio.com/)

We have yet to find equivalent tools for native iOS and Android (if you know of one, please let me know!). In principle, the same idea should be possible though. The key difference would be that the output would need to be a native app. People would need to install or update that app on their phone/tablet in order to view the style guide (it’s the only way to view native components in their natural environment!), so distribution won’t be as easy as it is for web-based ones.

For iOS specifically, Apple provides [UIKit Catalog](https://developer.apple.com/documentation/uikit/views_and_controls/uikit_catalog_creating_and_customizing_views_and_controls) which is sample code for an app that contains examples of each UI component. This can be used as a basis for building a bespoke style guide app. (Thanks to my colleague [Juliana Cipa](https://github.com/julianacipa) for discovering that one!)

## Design Token Repository

In larger design systems, especially ones where there are multiple UI libraries, it often makes sense to separate out the [design tokens](https://medium.com/eightshapes-llc/tokens-in-design-systems-25dd82d58421) that are shared across all UI libraries. Typically these will be things like your brand’s colour palette, typography styles and logo images. [Pre-defined spacing values](https://medium.com/eightshapes-llc/space-in-design-systems-188bcbae0d62) and icon graphics might also be included.

Those tokens then need a home and a means to be fed into the various UI libraries. This is what a design token repository does. It therefore becomes the “single source of truth” for this specific data.

A simple example of a design token repository might be a git repo where JSON files (containing the token data) and source SVG graphics for logos and icons are stored. Tools like [**SalesForce Theo**](https://github.com/salesforce-ux/theo) can convert and export the tokens from JSON into various formats suited to inclusion in web, Android, iOS and other UI libraries. Automated builds can be setup to update each of the UI libraries with freshly exported token data whenever the design token repository is updated. This ensures that they never drift out of sync.

Note that extracting token data can have other benefits. In the same way that it can be exported to code, it can also be exported as other things:

- ACO colour swatch files that designers can load in PhotoShop and Illustrator
- Text styles and document colours for Sketch
- Microsoft Office themes for PowerPoint, Word, etc.

<figure>
<img src="/media/medium/ui-lib-architecture-with-design-tokens.webp" alt="An extended version of the previous UI library hierarchy diagram, showing a &quot;Design Token Repository&quot; at the top, which feeds into the various UI libraries and also design tools like Sketch and Photoshop" width="1505" height="541">
<figcaption>A complex example of how a design token repository can feed data into a variety of places</figcaption>
</figure>

More user-friendly alternatives to purely code-based token repositories exist:

- [**Brand.ai**](https://web.archive.org/web/20170515041136/https://brand.ai/) allows you to visually input and manage your tokens via a web interface and can then export them in a variety of formats.
- [**Frontify**](https://www.frontify.com/) let’s you do more or less the same thing, although it’s export facilities are less comprehensive than Brand.ai’s.

As we shall see though, both Brand.ai and Frontify are actually hybrid tools as they _also_ act as visual design repositories…

## Visual Design Repository

Most design systems need to provide a means for UI designers to get hold of the most up-to-date UI component designs and templates. This is so that, when they produce UI designs and mock-ups for projects, they resemble the actual UI components in the UI library as accurately as possible. This central pot of UI designs is the visual design repository.

Likewise, in situations where a new UI component is being developed or an existing one is being evolved, the UI designers will need a way to push their designs back into the visual design repository so that others can then see and/or use them. Therefore a two-way synchronisation between designer’s tools and the visual design repository is desirable.

Another desirable feature is for the contents of the visual design repository to be browsable via a web interface. Developers and other stakeholders may not have the necessary design tools installed, so a web interface provides a universal way for people to browse available UI component designs.

In terms of presentation, such a web interface is essentially a form of _style guide_. It may even be _living_ in the sense that it always contains the most up-to-date designs. There are however some important differences compared to a living style guide that is generated from a UI library:

- It contains _static pictures_ of the components, not the components themselves.
- Depending on your workflows, the corresponding real components in the UI library may end up looking slightly different to the original designs. For example, this could happen if, in the course of development, changes had to be made for performance or accessibility reasons. Or, it might be as simple as different browsers rendering the component in subtly different ways (so there is in fact no single “correct” appearance of the component).

As explained above, it makes sense to consider the UI library (if/when you have one, of course) the definitive “source of truth”. Arguably, as long as all the relevant parties are happy with whatever changes arise in the real UI components, having visual discrepancies between them and what’s in the visual design repository shouldn’t be a problem. In fact, I [recently argued](/blog/2017/04/18/wysiwyg-must-die/) that the need for projects to produce high-fidelity visual screen designs at all could fade away entirely once you have an established design system.

However, if you do have a strong need to keep your visual design repository in sync with your UI library, then consider using a visual design generator (described in the next section).

Examples of visual design repositories are:

- A simple, shared folder (e.g. on Dropbox) containing shared templates, UI kits, etc.
- [**InVision Craft**](https://web.archive.org/web/20170511091957/https://www.invisionapp.com/craft) — a plug-in for Sketch and PhotoShop and cloud service that let designers share designs. The web interface also provides commenting features, so other stakeholders can give feedback.
- [**ZeroHeight**](https://zeroheight.com/) — a Sketch plug-in and cloud service that lets designers share Sketch files amongst themselves.
- [**Folio**](https://web.archive.org/web/20170426173152/http://folioformac.com/) — a tool (backed by a git repo) for versioning and sharing visual design files. If you’re interested, [Lee Giles](https://leegil.es/) has written up a workflow for [maintaining shared UI component designs via Folio](https://medium.com/making-lost-my-name/maintaining-our-pattern-library-1d5b2e56372e).
- [**Abstract App**](https://www.abstract.com/) — a new tool that’s still in private alpha. It sounds similar to Folio. One to watch perhaps.

Additionally, the following tools incorporate visual design repositories alongside design token repositories:

- [**Brand.ai**](https://web.archive.org/web/20170515041136/https://brand.ai/) — provides plug-ins for Sketch and Illustrator allowing designers to upload and download component designs. It also synchronises design token data. For example, colour tokens appear as document colours inside Sketch.
- [**Frontify**](https://www.frontify.com/) — while it doesn’t provide plug-ins for automatic synchronisation of designs, you can upload images of your component designs into it and organise them into a style guide.

## Visual Design Generator

[Airbnb’s announcement](https://web.archive.org/web/20170425225026/http://airbnb.design/painting-with-code/) of their [**React Sketch.app**](https://airbnb.io/react-sketchapp/) tool earlier this week made big waves in the design system community. It can take components written in React.js and _automatically_ convert them into symbols in a Sketch file. It’s analogous to what a style guide generator does, except that the output is a visual design file instead of a living style guide.

Just like a style guide generator, this process can be automated so that it runs every time the UI library is updated. It therefore makes sense to store the output of such a tool in your visual design repository, so that it is easily accessible to all designers. That would ensure that your latest UI designs remain in sync with the contents of the UI library.

What is perhaps more exciting than the React Sketch.app tool itself, is the (perhaps new?) _category_ of tools it represents: _Visual design generators_. Given the excitement it’s generated, I suspect it’s only a matter of time before more, similar tools emerge. Perhaps to support UI libraries other than React ones, or visual design tools other than Sketch.

Definitely an area to keep an eye on!

## Visual Design Tools

Last but not least we have the visual design tools that are used to create the visual designs. Examples are:

- [**Sketch**](https://www.sketch.com/)
- [**PhotoShop**](https://www.adobe.com/products/photoshop.html)
- [**Illustrator**](https://www.adobe.com/products/illustrator.html)

I don’t think I need to explain any of those further. 🙂

Arguably, visual prototyping tools like [Axure](https://www.axure.com/), [Balsamiq](https://balsamiq.com/) and [Framer](https://www.framer.com/) could also be lumped into this category as they also help designers express the intended look and feel of a UI (component).

In the architecture diagram above, these tools are shown on the boundary of the design system. On the one hand, you could make the case they are an integral part because they are connected to other parts like a visual design repository. On the other hand, perhaps they stand apart and are just the tools of the trade for designers. After all, you probably wouldn’t consider an IDE or text editor used by a developer being an integral part of the design system’s infrastructure.

## Conclusion

I’m reasonably confident that the categories of tools we’ve identified so far are sensible ones. Most tools we’ve come across seem to fit into them naturally without feeling forced. Granted, some tools span multiple categories (e.g. Brand.ai), but they at least help clearly describe those tools’ functionalities.

Like I said at the start, this is probably an incomplete picture. I encourage you to debate it, challenge it and expand it. Perhaps other categories should be included? Perhaps there are further integrations between them?

Furthermore, I’d love to see the architectures of your design systems. Have you followed a similar pattern to the one in our diagram? A subset or superset of it? Or does yours look completely different.

I’m excited to see what you all come back with! 🤘
