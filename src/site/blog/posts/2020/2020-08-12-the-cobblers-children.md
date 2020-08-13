---
title: The cobber's children have no shoes
canonicalUrl: https://symbianmwc08.wordpress.com/2008/01/30/demo-teaser/
date: 2020-08-12T12:36Z
---
For someone who regularly works on other people's websites and apps, my own one is pretty old-fashioned and basic. The markup is still [XHTML](https://validator.w3.org/check?uri=referer). Since I redesigned this site in 2009, the design has barely changed (although, I did at least retrofit a responsive layout in 2017). The content has hardly been updated over that 11 year period either. I suppose it's true what they say about the cobbler's children!

However, changes are afoot!

## 11ty, Netlify and HTTPS
In June I migrated this site from some basic PHP running on [my own webserver](http://event-horizon.cyberfinity.net/) to an [11ty](https://www.11ty.dev/)-powered static site build hosted on [Netlify](https://www.netlify.com/). I intentionally preserved the design, content and [URL structure](https://www.w3.org/Provider/Style/URI) as I did so in order to focus on the technical migration and setup.

It was a plesantly smooth transition. My goal was to produce the _exact_ same HTML output I had before (aside from whitespace differences). For the most part it wasn't hard to achieve. The only thing that proved a little tricky was generating the `<link rel="index/next/prev/...">` links I have on the [art pages](/art/). I don't think current browsers do anything useful with them these days (I miss when [Opera would show a links toolbar](https://www.w3.org/wiki/More_about_the_document_head?source=post_page-----283f2ccbd161----------------------) based on them!), but I was determined to preserve them nonetheless.

## A real blog
After teasing it in the site navigation for about 11 years, I have _finally_ added a genuine blog to my site too! In fact, you're reading the very first post to be added to it!

I have wanted to do this for so long, but I was also hellbent on building my own, custom blogging CMS to do it. While there's nothing wrong with Wordpress and its friends, I just really liked the idea of rolling my own. I've found designing and building your own things to be a fantastic learning experience. Even if you later migrate to 3rd party products, you'll have a much greater appreciation of what's going on under their hoods.

Alas, I never found the time to do it. Aside from dreams in my head and occasional pencil sketches on scraps of paper, it never got off the ground. Over the years I've still had things I wanted to publish though. In 2016 I therefore opened a [Medium account](https://medium.com/@cirrus) and posted a few things there.

I have never been entirely happy with that though. I prefer to host my own content. That way, _I_ am in control of how it's presented and distributed and I'm not at the mercy of some corporation's whims. It also means that the longevity of my content is not linked to the continued success of someone else's business. This website launched in 2002 and is now about 18 years old. It is older than Twitter and Facebook. It has already outlived MySpace. It has existed for longer than Netscape did. As long as I am alive and able to do so, I intend to keep this site going. I wouldn't be surprised if it outlives Medium, Twitter and Facebook some day.

Enter 11ty. It provided just the right level of abstraction for my taste. It takes care of the low-level tasks like reading data and feeding it into templates with aplomb, but it is relatively unoppionated about everything else. That means I have full control over the HTML output (which is one of the main things I want) and I have a fair bit of flexibility in terms of combining it with other things for generating CSS, optimising images and so on.

Getting the [archive pages](/blog/2020/) up and running proved a bit tricky, but I managed to pull it off in the end. The details of how I did it will probably be the subject of a future blog post!

The only compromise I had to make was not having a commenting feature. I know I could embed Disqus or cobble together some JavaScript that posts to Firebase or whatever, but I really want something that can work without JavaScript too. If I can't do it right, I don't want to do it at all.

## Roadmap
With a (barebones) blog in place, my plan is to focus on adding some more posts in the near term. I will be republishing posts from my Medium and other places where I have blogged. I like the idea of having all my posts available in one place and, as explained above, this serves as a bit of back-up too incase Medium ever shuts down. Any new material I write will be exclusively published here (I already have a few ideas!).

I also plan to add RSS and Atom feeds soon. The only reason I haven't done it yet is because I want put a bit more thought into how I maintain the various bits of metadata needed for it. I'm afraid you'll have to just bookmark this site and check back periodically for now. Sorry!

Longer term, I want to do a proper redesign. I have some ideas already (involving lots of illustrations and some fun with light and dark modes) but, realistically, it's going to be a while before I find the time to make it all.
