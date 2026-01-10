---
title: "What's next for Universal Design Tokens"
date: 2021-11-30T22:00Z
summary: Mu
keywords:
  - design tokens
  - udt
  - dtcg
  - standard
  - design systems
---

Something that's been on my mind lately:

HTML/XML -- parse --> DOM -- serialise --> HTML/XML

Should there be an equivalent for the #DesignTokens file format @DesignTokens is working on? I.e.:

Design token file -- parse --> TOM (Token Object Model) -- serialise --> DT file

In the HTML/XML world we have software libraries that take care of that low-level parsing/serialising to and from the DOM. That way software that wants to do interesting things with HTML/XML like web browsers, spiders, scrapers, etc. can save time by using one of those libs and working with its higher-level DOM API.

Imagine we had TOM libraries that did the same thing with design token files. I think that could be a big help to folks building tools that want to import / export / manipulate design token files.

-----

Back in [January 2018](https://github.com/universal-design-tokens/udt/commit/c603870643875826e5d3eecdbae4b75354189266) I started a side-project called [Universal Design Tokens](https://udt.design/), or UDT for short. Some previous design system projects had opened my eyes to the potential for various tools to be connected to each other so that [design tokens](https://www.designtokens.org/glossary/) could flow between them in a fully automated way.


Having previously worked on a few design system projects where set things up so that [design tokens](https://www.designtokens.org/glossary/) flowed from design tools like Sketch into documentation & distribution tools like InVision DSM and then get pulled directly into software builds.


The benefits of integrating various tools like that really intrigued me. However, what frustrated me was that there was always some bespoke glue code that needed to be created to make things work with each other.

My goal was to specify a file format for design token data and some supporting software libraries and tools. Having worked
