---
title: Weaving a Better Web (Part 2 of 2)
slug: weaving-a-better-web-2
date: 2015-07-14T12:00Z
summary: A different perspective can help design truly inclusive and device-agnostic web experiences without getting stressed.
keywords:
  - web dev
  - web design
  - responsive web design
  - accessibility
---
<!-- original URL: http://wiprodigital.com/series-weaving-a-better-web-part-2-of-2/ -->

This is the 2nd part of “Weaving a Better Web”. If you missed it, [check out part 1](/blog/2015/07/07/weaving-a-better-web-1/).

## What if…

Imagine an alternate reality, where web designers stayed true to the intent of the Web from the beginning. What if rigidly sized designs were frowned on, because we refused to rely on particular screen sizes? What if ActiveX and Flash never caught on, because we rejected proprietary technologies that didn’t work on every browser and operating system? What if the notion of a newspaper-like “fold” on a web page never took hold because we [dismissed it as misguided](https://www.lukew.com/ff/entry.asp?1946) right away?

In this alternate reality, the sudden, mass adoption of smartphones wouldn’t have caused much grief. While our fluid designs might not have been not be optimal for small screens, they’d have worked better than fixed-width ones. A few tweaks to CSS could quickly iron out the kinks. There’d be no need to build entirely new websites with complex user-agent detection and redirection mechanisms.

If we had used Web technologies as intended, we’d have saved a great deal of time and money. It stands to reason, then, if we do so now, we’ll be better prepared for whatever the future throws at us. Sadly, this message hasn’t reached everyone.

## History repeats

Hands up if you’ve encountered a website project like this:

1. The client grudgingly concedes that mobiles and tablets need to be supported.
2. Individual page layouts for desktop, mobile and tablet (in that order) are designed in Photoshop and signed off.
3. The responsive breakpoints are aligned with screen widths of fashionable devices. 320px and up for the mobile layout, 768px and up for the tablet and 1280px for desktop.
    - Someone in the room asks if the 320px “mobile” layout will work when stretched to 767 Everyone else ignores the question.
4. Developers “convert” the Photoshop designs into HTML, CSS and JavaScript.
5. Testing is performed.
    - A bug is raised because the design looks “weird” at 767px width. The developers apply some workarounds.
6. After many cycles of testing, bug-raising and workarounds, someone points out that the page takes 20 seconds to load.
    - A “performance enhancement initiative” is kicked-off, and more workarounds applied.
7. After more testing, someone notices that the site’s accessibility is poor.
    - “Improving accessibility” is added to the backlog for the 2nd post-launch maintenance release.
8. The site is launched… 2 months later than planned.

It turns out many of us haven’t changed at all. We aren’t thinking about how to publish content universally, just focusing on how it will look on a handful of devices. In effect, we’re following the steps we always have… but now in triplicate!

We lap up new technologies and techniques, thinking they’ll make our problems go away. Responsive this, jQuery that, [HTML9 Responsive Boilerstrap JS](https://html9responsiveboilerstrapjs.com/), so many things! But these are just tools. In the wrong hands they can’t solve problems.

We are still monkeys, we just got better typewriters.

## The path to enlightenment

Locking down the experiences we craft will not make them better for users. Instead, we should be thinking about how to enable them to adapt to our users’ needs, devices and contexts.

The solution is simple: Change our ways. To do that, we need to change our perceptions and expectations of the Web. We need to let go of our fixation on pages and screens, and embrace the [Dao of Web Design](https://alistapart.com/article/dao).

<!-- Original image: https://www.shutterstock.com/image-photo/man-walking-tunnel-towards-light-206008762 -->

<figure>
<a href="https://www.pexels.com/photo/grayscale-photo-of-man-walking-in-hole-172738/"><img src="/media/wipro-digital/walking-towards-the-light.jpg" alt="A man walks out of a dark tunnel towards a bright light" width="1500" height="1000"></a>
<figcaption>Photo by <a href="https://www.pexels.com/@kasuma/">Kasuma</a>.</figcaption>
</figure>

With the Dao, everything starts to make sense and becomes so much easier. Approaches that web designers have been championing for years, such as [progressive enhancement](https://www.smashingmagazine.com/2009/04/22/progressive-enhancement-what-it-is-and-how-to-use-it/), [mobile-first](https://www.lukew.com/ff/entry.asp?933), and [content-first](https://adactio.com/journal/4523/) suddenly make even more perfect sense. They work with the [grain of the Web](https://frankchimero.com/writing/the-webs-grain/) rather than against.

Naturally website projects should follow these approaches. Used wisely, they can provide robust, accessible, performant and long-lasting sites that serve users exceedingly well.

To get started on your path to enlightenment, I encourage you and your colleagues to look at the Web from a different perspective:

- **Don’t curse the fragmentation of [the device landscape](https://www.mobileindustryreview.com/2014/11/5000-mobile-devices-fragmentation.html). Instead, celebrate its diversity.** It is not a tedious inconvenience to overcome but a vast opportunity to explore. The Web provides the means to get your messages, your products and your services out to people in any place, at any time on any device. A bigger audience means more customers.
- **Stop starting out with rectangular pages that need filling up. Instead [treat your content and services as the starting point](https://www.markboulton.co.uk/journal/a-richer-canvas).** What is the message you want your customers to take? What do you want to empower them to do? Expect designs to support your content rather than contain it.
- **Let go of the expectation that there is a correct, visual rendering of your pages and that anything that deviates is wrong. Instead demand that your site achieve its goals regardless of how it is represented and interacted with.** Carefully consider what is more important: your customers being able to find and buy your products or text appearing in your brand’s preferred font?

Free your mind and join us as we weave a better, more [future-friendly](https://futurefriendlyweb.com/thinking.html) web.
