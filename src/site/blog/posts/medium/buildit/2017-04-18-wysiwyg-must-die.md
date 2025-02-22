---
title: WYSIWYG Must Die
date: 2017-04-18T12:00Z
summary: Many WYSIWYG tools promise to automatically generate complete apps or websites directly from designs. Shame that the basic premise is fundamentally flawed…
keywords:
  - web development
  - design
  - ux
  - ui
  - opinion
ogp:
  image: /media/medium/kill-it-with-fire.webp
---

Now that my clickbaity headline got your attention, I should qualify my inflammatory statement a little: “WYSIWYG (What You See Is What You Get) _in the context of producing interactive user interfaces_ Must Die”.

## Pixel Perfect Dreams

The idea that you could visually design your app or website in a tool and then, at the click of a button, have it export a fully functional, interactive user interface (UI) is a seductive one. Why wouldn’t you want that? Non-technical people could create simple apps by themselves without ever needing to write a line of code. Even if the app needed more complex logic behind the scenes, you could at least unburden developers from having to code the UI portion of it.

Not only that. You’d eliminate any misunderstandings and discrepancies that might creep in when developers translate your pristine, pixel-perfect UI design into code!

<img src="/media/medium/wysiwyg-o-matic.webp" alt="Drawing of a man painting a picture of a user interface on a canvas on an easel. A large &quot;WYSIWYG-o-matic&quot; machine with dials, lights and a steam vent is grabbing that picture using a mechanical hand. On the opposite side of the machine there are two tubes, one connecting to a phone and the other to a PC. There are visible buldges in the tubes, travelling from the machine to the devices. A UI matching the painting is visible on the device screens." width="1400" height="840">

This are precisely the kind of promise that many WYSIWYG tools make. Back in the day [Microsoft FrontPage](https://en.wikipedia.org/wiki/Microsoft_FrontPage) would let anyone build a website with a few clicks. Then it was [DreamWeaver](https://www.adobe.com/products/dreamweaver.html). Now it’s [WIX](https://www.wix.com/), or [SquareSpace](https://www.squarespace.com/), or one of countless others.

They vary in complexity and the creative freedom they afford the designers, but the basic premise is always the same: You just focus on how you want things to _look_, and they will take care of that code stuff automatically.

Sounds lovely. What’s the problem?

## Warning! Iceberg metaphor ahoy!

<img src="/media/medium/iceberg.webp" alt="Drawing of a man on a sailing boat travelling towards the tip of an iceberg saying &quot;It's so pretty&quot;. Below the surface of the water we can that the iceberg is a lot larger than what's visible above, and there is a sharp protusion that the boat is heading towards." width="2480" height="1848">

In a nutshell, how a (piece of a) UI _looks_ is only the tip of the iceberg. There are a number of non-visual hygiene factors any UI (component) should meet:

- **It needs to be device agnostic.** Whether your making websites or apps, you can’t escape the reality of different screen sizes, different pixel densities and different input mechanisms. In terms of UI design, that translates to fluid and responsive layouts — i.e. designs that will intelligently stretch, squash or adapt to the dimensions of _any_ screen size. Likewise, user input might be via touch (which means there is no hover state!), mouse (meaning multi-touch gestures are not available), keyboard (do your interactive UI elements visual focus when you tab through them?) or combinations of those (Windows “convertible” laptops, anyone?) and your UI must work with _all_ of them.
- **It needs to be performant.** We’ve long known that [the speed at which a UI reacts to user input is critical](https://www.nngroup.com/articles/response-times-3-important-limits/). In the context of a web experience, that includes the perceived page load speed. Studies have shown that [79% of web users will abandon a site if it hasn’t loaded within 3 seconds](https://web.archive.org/web/20180214224712/https://blog.kissmetrics.com/speed-is-a-killer/). While the choice of visual styling is most definitely a factor in this, a lot of what influences performance is down to how things have been coded.
- **It needs to be accessible.** Whether it’s to [avoid getting sued](https://www.pinsentmasons.com/out-law/guides/disabled-access-to-websites-under-uk-law), wanting to [address the largest possible market](https://web.archive.org/web/20180329021804/http://www.interactiveaccessibility.com/accessibility-statistics), or — hopefully —just because you don’t want to be an arsehole, making your UI as inclusive as possible is a critical factor. Some aspects like the sizing and colouring of text and UI elements will affect how accessible your UI is to people with various visual impairments. However, how accessible it is to someone with no eyesight at all or one of countless other impairments (hearing, motor, neurological, etc.) depends heavily on how it has been coded. Does your UI code hook into relevant accessibility APIs? Does it use them appropriately?
- **It needs to be robust.** It’s relatively rare that your UI will only ever contain content that never changes and is therefore known when you design it. Far more commonly, much of its content will be dynamic. Displaying a user’s name and photo, embedding user-generated content, rendering a chart based on some downloaded data and more. These are all examples of the kind of things your UI will need to cope with and all of them will have edge cases that need to be catered for. What happens when your user has a very long name? What if the user generated content is written in a right-to-left language? What if an uploaded image is not in the aspect ratio you need? What if the downloaded data requires more bars in your chart than you have screen space for? Besides dynamic content, you also have user settings to contend with. Will your UI hold up if the user has configured their system to have a larger default font size?
- **It needs to integrate well into its target environment.** A web experience should be mindful of its URLs (to enable bookmarking, sharing, and more), be SEO-friendly and aware of other considerations that are unique to the web.

  An iOS app should heed [Apple’s Human Interface Guidelines](https://developer.apple.com/design/human-interface-guidelines/) not only for the visuals, but also how users navigate in the app — it’s not enough to look right, it needs to feel right too. It should probably consider and, where appropriate make use of, iOS-specific features like [App Extensions](https://developer.apple.com/app-extensions/), [Apple Watch integration](https://developer.apple.com/documentation/watchOS-Apps) and more.

  Similarly, an Android app should aim to follow [Google’s Material Design](https://m1.material.io/) while being mindful of [Android-specific UI conventions](https://developer.android.com/design/ui) which [sometimes differ from those of the web or iOS](https://m1.material.io/platforms/platform-adaptation.html). Taking advantage of [how an Android app can expose different tasks](https://developer.android.com/guide/components/activities/tasks-and-back-stack.html) (which can potentially be invoked by other apps) can provide a more seamless and useful experience. Likewise, integration with [Android Wear](https://developer.android.com/design/ui/wear) and/or [Android Auto](https://developers.google.com/cars/design) is also worth considering.

What all of these factors have in common is:

- They have an very tangible effect on the user experience (UX)
- Achieving them demands close collaboration between design and development disciplines
- **A visual picture of a UI (component) does not provide enough information** to answer all the questions that will arise.

It’s the last point that is crucial in the context of this article.

If I’m using a WYSIWYG tool to design a UI and I style some text to be bold and have a larger size, how can the tool know _why_ I did that? Was it because that text is a heading (and if so, a heading of what exactly — where exactly does its section begin and end?). Or, was it perhaps simply a phrase I was trying to draw attention to?

If that tool were to then generate code, it could probably apply the correct styling. The font would be bold and the size would be just so. It would _look_ right. However, if the output was HTML, it wouldn’t necessarily know that it should be marked up as `<h1>`, `<h2>` or maybe something entirely different like a `<blockquote>` perhaps — to play it safe it might just make it a `<div>`. That would be a pity because the choice of markup _will_ have an affect on the accessibility (e.g. a screen reader might read out an outline of all the headings on the page to aid navigation) and SEO-friendliness (a search engine might ascribe more relevance to text inside an `<h1>` than to text in a `<div>`) of the resulting code.

How about something more complex like an interactive pie chart. If I draw a circle divided into segments in my WYSIWYG tool, how does it know that my intent was for that to be a pie chart as opposed to a picture of a fancy bicycle wheel or a stylised pizza? Even if it did know, how would it know where the data was coming from or what colours to use if a different dataset required more segments? How about accessibility — what should the text alternative to this pie chart be for an audio browser or braille display? Most WYSIWYG tools will throw their hands up in despair at this point and simply output your pie chart as a static PNG image.

> WYSIWYGBWYGIG: What You See Is What You Get But What You Get Is Garbage

Clearly, there’s a lot more information that the designer would need to provide to a WYSIWYG tool in order for it to generate UI code that satisfies all the hygiene factors listed above.

Of course, most WYSIWYG tools acknowledge this to some degree. They’ll often let you assemble your design from a set of common UI widgets (buttons, inputs, checkboxes and so on) which, behind the scenes, apply some of necessary semantics. For instance, by dragging and dropping a button widget into your design, the tool knows that it is indeed a button (which, in turn, is a thing that can be clicked and has various states) as opposed to a generic rectangle with some text inside it. It can then output more appropriate code.

Taking that to its logical conclusion though, if there was a hypothetical WYSIWYG tool that allowed you to specify all the nuances of your UI component (it’s responsive layout behaviour, it’s interactive behaviours, it’s accessibility attributes, what coding conventions the output should follow, etc.), it would inevitably be quite complex and have a very steep learning curve. **In effect the designer would be programming the UI design** because they would need to tackle the same questions that a developer would.

It seems to me that this would pretty much defeat WYSIWYG’s whole _raison d’être_ which is to avoid needing to do the programming. The thing is though, the actual _tools_ themselves are making a valiant effort. From a technical perspective, they are often ingenious bits of software and it’s amazing just how much they _can_ do. The problem is the unobtainable _dream_ they are chasing after. **WYSIWYG code generation was never a sensible expectation to have, it still isn’t and I highly doubt it ever will be.**

## What to do?

Great. The promise of WYSIWYG tools generating decent, production quality code is fundamentally flawed. What now?

Let’s take a step back and think of what we’re actually trying to achieve. **We want to craft great, interactive user experiences.** Interactive prototypes can be an invaluable tool towards that end — they enable more life-like usability testing and they can convey the UI’s intended behaviour to developers and other stakeholders more accurately than other means.

I’d therefore say that using a WYSIWYG tool to knock up such prototypes can be useful, as long as everyone acknowledges that they are throw-away prototypes. The implications of that are:

- **Each prototype only needs to be good _enough_ for its intended purpose.** E.g. if the intent is to convey or test navigation through an app, there’s rarely any need to have the visual aesthetics fully branded and fleshed out.
- **There can be many little prototypes.** It’s OK to _not_ have a single, all-encompassing master prototype. Instead, you can have many simple prototypes that each only demonstrate one area of interest.
- **Not every prototype needs to be created in the same tool.** Even if you use a WYSIWYG tool to generate some of your prototypes, it might not be the right tool for the job every time. Sometimes a few code snippets in [CodePen](https://codepen.io/) will do the job. Other times a [paper prototype](https://usabilitygeek.com/paper-prototyping-as-a-usability-testing-technique/) will suffice. Do whatever’s fastest and cheapest.
- **Once a prototype has served its purpose, it gets retired.** It will have been set up to test or demonstrate something. Once the outcome is known the real product can be built or updated accordingly. There’s no need to maintain the prototype afterwards. Over time that might mean what is in the real code differs in some way from the prototypes that went before (perhaps the visuals change, or things are altered due to technical reasons), but that’s absolutely fine! If you need a “single source of truth”, make it the final software itself not one of your design artefacts.

With respect to the last point, it is perhaps worth noting that many organisations are obsessed with having some “high fidelity” visual design that shows exactly how the finished software should appear on screen. Often, presumably as a misguided attempt at combining detailed visual design _and_ documenting interactive behaviour in the same artefact, WYSIWYG tools are used to create them. Other times, visual design tools like PhotoShop or Sketch will be used to create non-interactive visual mock-ups. In either case, what then tends to happen is that this visual prototype or mock-up becomes the thing that clients and other stakeholders review. **It becomes the yardstick by which everything else that follows is measured.**

This attitude leads designers down an unproductive path of trying to refine and polish the visual mock-ups to perfection _before_ they feed into development. It essentially forces a waterfall process onto the project and does not lend itself to a leaner, more agile way of working. Furthermore, as highlighted in the list of hygiene factors above, the output of WYSIWYG tools or, worse, static pictures fail to capture and communicate many important aspects of the UI.

Conversely, adopting leaner, more granular prototypes and visual artefacts not only improves efficiency, it also suggests that all those involved in the project better understand the nature of what they are trying to create.

So, in summary: WYSIWYG Must Die. 😜

<img src="/media/medium/kill-it-with-fire.webp" alt="Drawing of a mob wielding pitch forks, flaming torches and signs saying &quot;Kill it with fire&quot; descending on the &quot;WYSIWYG-o-matic&quot; machine" width="1400" height="640">
