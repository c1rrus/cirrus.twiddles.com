---
title: QSound audio demo
canonicalUrl: https://smartphoneshow.wordpress.com/2008/11/03/qsound-audio-demo/
date: 2008-11-03T14:47Z
summary: Details of Symbian's QSound audio tech demo at the smartphone show
keywords:
  - audio
  - demo
  - sound
  - openmax
  - qsound
---
It’s time to give you the skinny on another demo we presented at the Smartphone Show last month: The **QSound audio demo**.

<a href="https://www.flickr.com/photos/james_nash/2961217471/"><img src="/media/smartphone-show-2008/qsound-demo.jpg" alt="QSound demo" width="450" height="325"></a>

The demo consisted of a development board running Symbian OS which was rigged up to some big-ass speakers. The demo application on the board was playing some music (a rather eclectic playlist containing “[Eve of The War](https://www.youtube.com/watch?v=W8JLqsbK5V0)“, “[Die another Day](https://www.youtube.com/watch?v=dAPh72JQ6qU)“, “[Orinoco Flow](https://www.youtube.com/watch?v=a88-Tyl1gkI)“, “[Alla Hornpipe](https://www.youtube.com/watch?v=RJlJPZx1BRM)” and “[Nocturn](https://www.youtube.com/watch?v=n3mIjoijaSc)” 😉) and presented a 7-band graphical equalizer along and various audio effects for the user to control. The available effects were:

<img src="/media/smartphone-show-2008/audio_demo.png" alt="Screenshot of the audio demo app" width="240" height="320" class="inset-img">

- Bass & Treble boost
- Stereo Widening
- Loudness

You could play with the EQ and the various effects in real-time and hear the effect over the speakers. The software for the effects was provided by [**QSound**](https://www.qsound.com/). The sound quality was excellent and really showed off what phones will be capable of pumping out in the near future!

However, what was equally (or perhaps more) interesting was what was going on under the hood. The Multimedia system in Symbian OS is in the process of getting some substantial improvements. One of them is support for [OpenMAX IL](https://www.khronos.org/openmax/il/) components. The QSound plug-in we used was one such OpenMAX IL component running inside our new Multimedia system.

OpenMAX IL is an [industry standard API for Multimedia components](https://en.wikipedia.org/wiki/OpenMAX#Integration_layer) like codecs and effects which is maintained by the [Khronos Group](https://www.khronos.org/) (who are also responsible for OpenGL and OpenVG).

Why is this cool and why should you care? Well, standardised APIs are more attractive to device and software vendors because a single implementation can potentially target many platforms. Less development costs + bigger market = more $$$s! Integration also becomes easier. In theory, if you have an OpenMAX component that conforms to the spec it should be able to work with Symbian’s new Multimedia system out of the box with minimal configuration! That’s particularly interesting for phone manufacturers since it speeds up their development. They can add exciting new Multimedia features quickly and cheaply!

Case in point: It took one engineer about a day to get the QSound plug-in up and running in our Symbian Multimedia system and another 3 days to write and attach the colourful user interface!

You can see some footage of this demo on [Sky’s Technofile video](/blog/2008/10/27/on-sky-news/) from the show. For those of you with access to SDN++ there [another video](https://web.archive.org/web/20071130011357/http://developer.symbian.com/login.action) available there (SDN++ log-in required)

<!-- original URL: https://developer.symbian.com/sdnpp/getstarted/themes/Oct_sps/index.jsp -->
