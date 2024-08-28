---
title: Some Principles Apart
date: 2017-01-17T12:00Z
summary: Distilling key web design principles and from the An Event Apart 2016 Orlando conference
keywords:
  - web development
  - design
  - conference
  - aeaorl
  - web design
---
<img src="/media/medium/event-apart-badge.webp" alt="An Event Apart Orlanda attendee badge, showing my name (James Nash), company (Wipro Digital) and the dates of the conference (October 3-5, 2016)" width="1000" height="886">

Back in October I had the good fortune of being able to attend the excellent [An Event Apart 2016 Orlando](https://web.archive.org/web/20160906113315/http://aneventapart.com/event/orlando-special-edition-2016), a three day web design conference. The speakers were all well known and highly respected figures in the web design community. The kind of people who have literally written the book on everything from [web standards](https://en.wikipedia.org/wiki/Designing_with_Web_Standards) over [Responsive Web Design](https://abookapart.com/products/responsive-web-design) through to the latest [CSS animation](https://valhead.com/books/) and [layout techniques](https://abookapart.com/products/get-ready-for-css-grid-layout).

While all the talks were interesting in their own right, I couldn’t help but notice how a handful of underlying principles and themes emerged again and again. These are all things that I have come to value and apply to my own web work over the years, so I was chuffed to see such esteemed speakers share the same ideals.

<figure>
<img src="/media/medium/jeffrey-zeldman.webp" alt="Me posing with web design legend Jeffrey Zeldman. I've got a big, stupid grin on my face and am making a thumbs up gesture. He's pointing at me. I'm also a head taller than him." width="1400" height="711">
<figcaption>Web Standards legend and An Event Apart co-founder, [Jeffrey Zeldman](https://zeldman.com/). Is it just me, or are celebrities always shorter than you expect in real life? ;-)</figcaption>
</figure>

Web design and development is characterised by rapid and constant churn. Languages and browsers evolve, frameworks and libraries come and go, aesthetic styles go in and out of fashion and companies rise and fall. Amongst all that it can be difficult to spot and extract the valuable principles that will stand the test of time. The kinds of things that were good ideas years ago, are good ideas today and will most likely still be good ideas many years from now.

From several of the conference’s talks, here are a few such principles that stood out for me…

## Style guides are now standard

Whenever any of the speakers touched on the process of actually designing and building a web experience, style guides got a mention. However, they weren’t called out as a newfangled, fancy way of doing things — rather, they were always mentioned matter-of-factly, as if to say: _Of course_ we employ style guides, that’s just how we do things.

As someone who’s never been comfortable with static Photoshop comps and who’s actively been [advocating the use of style guides at work](/blog/2016/03/17/atomic-design-at-wd/) for some time now, I couldn’t agree more. Nonetheless, it is incredibly reassuring to see that style guides really have established themselves as an integral part of our web design and development craft.

As this approach begins to scale beyond individual projects, organisation-wide [Design Systems](https://medium.com/buildit/design-systems-wtf-42956f673250) are emerging as the next big thing we need to focus on. Your UI style guide is now one component in a wider eco-system. Mr “Atomic Design” himself, [Brad Frost](http://bradfrost.com/), did a great talk on the ingredients and approaches needed to establish a successful Design System.

<figure>
<img src="/media/medium/brad-frost.webp" alt="Me posing with Brad Frost. I'm wearing the same big, stupid grin on my face and doing the same thumbs up gesture I did when posting with Jeffrey Zeldman. Brad's making an exaggerated, surprised face. I'm almost a head taller than him." width="1400" height="806">
<figcaption>Author of Atomic Design, Brad Frost. Seriously, what is it with celebs being shorter than me? Am I really that tall?</figcaption>
</figure>

## Progressive Enhancement is as important as ever

In a similar vein to style guides, Progressive Enhancement was repeatedly mentioned or shown as the de facto way we should be crafting web experiences. When discussing code, speakers invariably began with the careful choice of the most appropriate, semantic mark-up that would represent the information or functionality in the simplest possible form. Only then would CSS be added, including thoughtful styling fallbacks for cutting-edge CSS features. Finally they pointed out how the experience could be further enhanced using JavaScript.

As [Jeremy Keith](https://adactio.com/) reminded us in his talk, Progressive Enhancement is very much about robustness. HTML is — by design — the most forgiving and also the most resilient of the languages we use. It is also the first thing the browser downloads, so, if for any reason that ends up being all that your users receive, it makes sense to ensure that it can at least provide the core experience. With that solid foundation in place, you can then enhance it as far as you like (or your budget allows).

By the way, Jeremy Keith has since published an excellent — and free — web book on this subject: [Resilient Web Design](https://resilientwebdesign.com/).

## There’s more to UX than what you see

We live in a golden age of developer tools and frameworks. However, as much as they make our own lives easier, they by themselves will not aid the end user’s experience. We still need to be mindful of how our design and development choices can affect the user experience.

I often find that UX discussions focus primarily on the _visual_ user interface and neglect many of the non-visual aspects of the experience such as: Performance, accessibility, reliability and coping with edge-cases. It was therefore refreshing to see so many talks highlight these topics.

[Lara Hogan](https://larahogan.me/) gave a great talk on performance and various techniques we can employ to improve our page load times. One noteworthy tidbit from that talk was the fact that 40% of users will abandon your site if it takes longer than 3 seconds to load. If that’s not proof that performance is an integral part of the user experience, I don’t know what is!

[Derek Featherstone](https://feather.ca/) encouraged us to practise “extreme design” — i.e. design for the edge cases amongst our spectrum of users. As he pointed out, if we solve a design problem for an extreme case we don’t just make the experience accessible to those specific users, we frequently produce an experience that is better for everyone.

## Device Agnosticism… duh!

When [Tim Berners-Lee](https://www.w3.org/People/Berners-Lee/) laid the foundations for what would become the Web, he was driven by a desire to allow scientists at CERN working on different kinds of computers, with different operating systems to share information with each other. These days we have a much greater diversity of devices accessing the Web, but the underlying principle that being agnostic to the user’s choice of browser, OS and device enables the broadest possible audience is as old as the Web itself and still every bit as important. Those that heed that principle and work _with_ it rather than _against_ it will reap its benefits.

People who used to build fluid layouts had a much easier time migrating to responsive layouts than those that were producing fixed-width, absolutely positioned, 960px layouts.

People who assumed their users would or wouldn’t do certain things on mobiles were [proven wrong](https://bigmedium.com/jhc/prez/mobile-myths.pdf) (and yet many made the same mistake again when tablets became mainstream). Meanwhile, those that didn’t artificially limit what users could and couldn’t do on their sites based on device were rewarded with more views, conversions and customer satisfaction.

<figure>
<img src="/media/medium/ethan-marcotte.webp" alt="Me posing with Ethan Marcotte. I'm grinning again, as is he. We're both wearing T-shirts with designs printed on them. Mine's got a cat's head in space shooting lasers from its eyes. His has some kind of silhouette filled with a foresty, mountainous landscape. We're the same height." width="1400" height="842">
<figcaption>Monsieur Responsive Web Design — [Ethan Marcotte](https://ethanmarcotte.com/). Finally found a tall one! And he clearly shares my refined taste in T-shirts!</figcaption>
</figure>

A couple of talks looked at how to the Web is now evolving to incorporate even more devices. In “the Physical Interface”, [Josh Clark](https://bigmedium.com/about/josh-clark.html) showed many examples of how internet-connected gadgets and sensors are enabling us to expose and interact with Web resources in exciting, new ways. He also highlighted some of the ethical challenges we will need to grapple with when working with these things.

[Cameron Moll](http://cameronmoll.com/)’s “Unified Design” explored how to provide our users with a consistent experience across all our web experiences as well as any other touch points we provide them with. Just working _on_ any device is no longer enough. Users increasingly expect to be able to perform tasks _across_ devices. He called out [Progressive Web Apps](https://web.dev/explore/progressive-web-apps) as an area to watch, as they are one way that you might provide such services.

For me, these talks also reinforced the value of being device-agnostic: If your thinking, planning, designing and building has been device-agnostic, then you already knew that these developments were inevitable. None of this will come as a surprise and you’ll be ideally positioned to embrace the next wave of devices joining the Web (whatever they may be) and create amazing services across them that will excite your users.

## Conclusions

Of course many interesting topics were covered beyond the few I’ve picked out above. For instance, thanks to [Rachel Andrew](https://rachelandrew.co.uk/) and [Jen Simmons](https://jensimmons.com/), I’m now super excited about CSS Grid support landing in mainstream browsers this year. As they explained and demonstrated, it can be applied _today_ as a _progressive enhancement_ to your current designs. Heh. There I go again pointing out those underlying, timeless principles!

While most presentations from this conference are not publicly available, a ton of supplementary materials are. Plenty of [videos of talks](https://www.youtube.com/playlist?list=PLIRh1sqARYcrF54znMtWynApkCl2wDZWG) from various An Event Apart conferences are also available.

<figure>
<img src="/media/medium/event-apart-lunchbox.webp" alt="Photo of a yellow, metal lunchbox ." width="1000" height="834">
<figcaption>The conference swag included this Blues Brothers inspired lunch box</figcaption>
</figure>

Overall, I was very impressed by the conference. The speakers and talks were excellent. The venue was lovely (hell, we were next door to the [Magic Kingdom](https://www.disneyworld.co.uk/destinations/magic-kingdom/)!). The food was tasty and the swag was cool. It was educational, inspirational and fun.

The speakers are also very approachable. Being able to say hello to some of the people who have influenced so much of how I think about and work with the Web was a real treat for me!

If I ever get a chance to attend An Event Apart again, I’d do so in a heartbeat!
