---
title: My DTCG journey
date: 2025-10-31T02:50Z
summary: A look back at how I got involved with the DTCG and played a small part shaping the format specification
keywords:
  - dtcg
  - design tokens
  - design systems
  - standards
  - format
  - retrospective
  - journey
ogp:
  image: /media/2025/dtcg-first-call.avif
---

<figure>
<img src="/media/2025/dtcg-first-call.avif" alt="Screenshot of a Zoom call. Most participants are looking relaxed and smiling. Yours truly is visible in the top left tile with a big, excited grin on his face, doing a double thumbs-up at the camera." width="1793" height="1098">
<figcaption>The first DTCG Editors call, June 2020</figcaption>
</figure>

This Tuesday, the Design Tokens Community Group (DTCG) published [the first _stable_ version of their spec: **2025.10**](https://www.designtokens.org/tr/2025.10/) (they've adopted calendar versioning as of this release). The three previous versions were Editor's _Drafts_, so that announcement is a significant milestone. Well done team!

While several tools and design systems have already been using the draft DTCG format for some time now, there have been various breaking changes between those Editor's Drafts (they're called "drafts" for a reason), so interoperability between DTCG files and tools is a bit fragmented at the moment. Having a stable spec is a signal to the community that this is expected to be a reliable foundation to align to. I'm optimistic and excited about tools and design systems embracing this latest spec version and finally bringing the DTCG's vision of interoperable design tokens to fruition!

I encourage you to check out [the DTCG's announcement blog post](https://www.w3.org/community/design-tokens/2025/10/28/design-tokens-specification-reaches-first-stable-version/), which highlights some of the more recent additions to the spec.

In case you didn't know, I'm one of the authors of the DTCG format specification. If you'll allow me to induldge in a bit of navel gazing, I figured this milestone would be a nice opportunity to reflect on my own journey of working with the DTCG...

## The years B.C. (Before Community group)

Back in 2019, when the DTCG was founded, [I had been working in and around design systems for a few years](/blog/2016/12/23/our-atomic-journey-so-far/). I had written a handful of blog posts and given a couple of talks. An area that had always interested me was the tooling and automation that helps build and maintain a design system. [One of my most read blog posts](/blog/2017/04/28/design-system-architecture/) outlined what, at the time, I counsidered the key categories of design system tools and how they linked together.

While [I remain extremely skeptical of tools to promise to turn purely visual designs into working UI code](/blog/2017/04/18/wysiwyg-must-die/), I was quickly convinced by the concept of extracting basic, visual values like colors and sizes from visual design tools and then converting them into code. Unlike UI components that have a ton of essential, but non-visual attributes like behaviours, states, interactions, semantics, etc., a color is a color is a color. So, picking one visually in one tool and then coverting into whatever syntax a particular platform requires is perfectly viable. And enabling that is what design tokens were originally conceived for.

This led me down the path of trying to connect design tools to code. [The first such setup I recall working on](https://panosvoudouris.medium.com/first-attempt-at-desops-8a9660c37634), was taking document colours in a Sketch file, using Brand.ai (the precursor to InVision's DSM product - remember that?) to extract them, document them and export them in a bespoke JSON format. With a little dollop of JavaScript we could then fetch that JSON from Brand.ai, covert it into Sass variables and use them to style some React components that were being previewed in Storybook.

From there I discovered Theo and Style Dictionary, which could take design tokens expressed as YAML or JSON files and generate code representations in various langauges. But, Theo's YAML format was different from Style Dictionary's JSON, and that was different again to the JSON you'd get out of Brand.ai.

That's when I began to realise it might be nice if there was a standard format that they all supported. So, in 2018, I started my own little project - [Universal Design Tokens (UDT)](https://udt.design/original-plan/) - to define such a format and build a canonical JavaScript library for parsing such files. However, I kept it mostly under the radar as I wanted to have something functional to show before sharing it with the wider community. As it was just a little side project, progress was slow and I never got very far. It turns out trying to make a standard in an ivory tower all by yourself doesn't work too well! 😜

## Joining the DTCG

Of course, I wasn't the only person to realise that a standard design token file format could be useful. In 2019, [Kaelig](https://www.kaelig.fr/) [kicked off a discussion to propose exactly that](https://github.com/design-tokens/community-group/issues/1). I think the first I heard of it was via a thread on Twitter (back when Twitter was still Twitter and not a full-on Nazi bar). If I recall correctly, it was [Stu Robson](https://www.alwaystwisted.com/) who @-mentioned me in that thread as he'd seen my UDT project. Thanks Stu!

I quickly realised that Kaelig's community-driven approach would be far more likely to succeed and I was already on baord with the overall concept, so I parked UDT and went all in on the community group. Some of the ideas I had explored for UDT felt useful, so many of my early comments and suggestions were based on that. Not long after, Kaelig teamed up with [Jina](https://www.jina.me/) to formally create the Design Tokens Community Group as a W3C community group and they put out a call for editors. Well, I just had to be part of that! So, of course I applied and, to my great surprise was invited to be one of the format editors. Thanks Kaelig & Jina!

I had never really had imposter syndrome until then. It felt like Kaelig and Jina were assembling the Avengers. He had worked on Theo - the granddaddy of design token translation tools. She had, well, _invented_ design tokens (not to mention started the whole design systems Slack community). Then there were folks like [Val - _I literally wrote the book on web animations_ - Head](https://valhead.com/), [Danny - _creator of Style Dictionary_ - Banks](https://dbanks.design), [Nathan Curtis](https://www.directededges.com/nathan-curtis) - as in _the_ Nathan Curtis - and many other luminaries. And me. A relative nobody in the realm of design systems. If they were Hulk, Black Widow, Thor, Iron Man, etc. then I was... what? One of the crappy Avengers who doesn't have their own film. Hawkeye, at best.

Nevertheless, there I was. So, I got stuck in as much as I could. In the very early days there was much debate about foundational stuff like whether to base the format on something like JSON or YAML (spoiler alert: We landed on JSON), whether or not to have a type system, whether or not composite tokens and groups were different things, etc. The outcomes of those discussions eventually led to the publication of the [1st Editor's Draft](https://www.designtokens.org/tr/first-editors-draft/format/). With invaluable feedback and ideas from the community that has since evolved substantially into the stable spec that has now been published.

It's been a real joy and priviledge to work on the DTCG format spec. Besides getting to (virtually) rub shoulders with so many clever and lovely people, it's opened many doors. It's given me industry connections, helped me get jobs and gotten me invited to give talks. For example, that time I got to <del>rickroll</del> - no sorry, I mean - _introduce the DTCG format to_ a live audience of about 400 (and many more later [on YouTube](https://www.youtube.com/watch?v=ssOdzxZdg58)) together with fellow editor [Louis Chenais](https://www.lucho.cool/).

<figure>
<img src="/media/2025/schema-2022.avif" alt="Photo of the stage at Figma's Schema conference. Louis is perched on a chair towards the left. I'm standing on the right, saying something while staring down towards the comfort monitor instead of looking at the audience" width="1700" height="937">
<figcaption>Louis and myself on stage at Figma's Schema 2022 conference. Go on, scan my QR code. I dare you!</figcaption>
</figure>

## And now?

My personal and professional life has changed significantly since I became a format editor. I've become a father. I've moved home. I've been through a few jobs (and a couple of redundancies). So, despite being very active in the early days, the amount of time I've been able to devote to the DTCG has dwindled in recent years. I still have the same passion for what the group is doing, and I _do_ still chip in here and there, but I'm not able to contribute nearly as much as I used to.

I'm definitely not done though. There's always work to do on the spec, and I have ideas for new features I'd like to propose. It might just take me a while...
