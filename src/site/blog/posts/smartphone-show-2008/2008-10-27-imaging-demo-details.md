---
title: Imaging Demo Details
canonicalUrl: https://smartphoneshow.wordpress.com/2008/10/27/imaging-demo-details/
date: 2008-10-27T14:29Z
summary: Details of Symbian's "zero shutter lag" imaging tech demo at the smartphone show
keywords:
  - camera
  - demo
  - omnivision
  - scalado
  - symbian
---
<a href="https://www.flickr.com/photos/james_nash/2964241508/"><img src="/media/smartphone-show-2008/kylie_and_austin.jpg" alt="Kylie and Austin" width="480" height="259"></a>

Incase you hadn’t figured it already, the [demo I was teasing with](/blog/2008/10/02/can-you-tell/) before the show was our “**Zero shutter lag**” imaging demo. We’ve posted [a picture](https://smartphoneshow.wordpress.com/2008/10/20/imaging-demo/) and a [link to the associated Flickr stream](/blog/2008/10/21/imaging-demo-photos/) already but I think a more detailed write-up is in order now…

**Smile! You’re on camera…**

<a href="https://www.flickr.com/photos/james_nash/2962061576/" class="inset-img"><img src="/media/smartphone-show-2008/demo_hardware.jpg" alt="Kylie and Austin" width="200" height="316"></a>

We were demonstrating a camera application that could take pictures the instant you press the capture button. To date, there is always a slight delay on camera phones between the user pressing the button and the camera actually capturing the image. Since our set-up elimates this delay we’ve dubbed it “**Zero shutter lag**“.

To make it a bit more fun we had a few effects that could be applied to the photos such as [black & white](https://www.flickr.com/photos/30945601@N03/2961407346/in/set-72157608257896420/), [sepia](https://www.flickr.com/photos/30945601@N03/2961533278/in/set-72157608257896420/), [milky](https://www.flickr.com/photos/30945601@N03/2964831668/) and more. Some of these also worked in real-time on the camera view-finder. There were also a number of celebrity lookalikes to pose with: [Posh’n’Becks](https://www.flickr.com/photos/30945601@N03/2961092681/in/set-72157608257896420/)*, [Del boy](https://www.flickr.com/photos/30945601@N03/2961786414/in/set-72157608257896420/) (a character from “[Only Fools and Horses](https://en.wikipedia.org/wiki/Only_Fools_and_Horses)” for the non-Brits reading this), [Jean-Luc Picard](https://www.flickr.com/photos/30945601@N03/2963589599/in/set-72157608286205035/), [Austin Powers](https://www.flickr.com/photos/30945601@N03/2964074188/in/set-72157608286205035/) and [Kylie Minogue](https://www.flickr.com/photos/30945601@N03/2963357625/in/set-72157608286205035/).

The finished images could then be [uploaded directly to Flickr](http://www.flickr.com/photos/30945601@N03/) and from there were then downloaded and displayed on the main Symbian stand (behind the coffee bar) and the [ScreenPlay demo](/blog/2008/10/23/screenplay-demos/). You could also get your photo printed out onto a keyring, bottle opener or fridge magnet for added freebie goodness!

**The ingredients**

The demo was built on [Symbian OS](https://web.archive.org/web/20081024221147/http://www.symbian.com/symbianos/) 9.5 and running on a [Texas Instruments](https://www.ti.com/) 3430 development board with a 3.2 mega-pixel [OmniVision](https://www.ovt.com/) camera. Although they don’t look like phones, such dev boards are representative of mobile phones – same CPU, memory, peripherals etc. – but have some extra connections to help software development.

The software that enabled the zero shutter lag feature was by [Scalado](https://web.archive.org/web/20081013083502/http://www.scalado.com/m4n/). By working closely with them, [we have pre-integrated Scalado’s imaging solutions into Symbian OS](https://web.archive.org/web/20081201033745/http://www.scalado.com:80/news/newsview/artikel/scalado-announces-first-ever-live-demo-of-new-imaging-technology-at-the-symbian-smartphone-show/). This means that it’s a lot quicker, cheaper and easier for Symbian OS licensees to use Scalado’s software in their products if they so desire. A great example of the [Symbian Parter Network](https://web.archive.org/web/20081026031957/http://www.symbian.com/partner/) in action!

<a href="https://www.flickr.com/photos/james_nash/2961218659/"><img src="/media/smartphone-show-2008/imaging_demo.jpg" alt="Imaging Demo" width="480" height="231"></a>

**How the magic happens**

You may be wondering why we haven’t had zero shutter lag before. Well, traditionally phone cameras will send a low-resolution stream of images while the viewfinder is being displayed. This is because using full-sized images for the viewfinder is prohibitively CPU and memory intensive. When the user presses the capture button the camera therefore has to switch into full-resolution mode first and this takes some time (largely because it involves re-calibration for which the camera needs to capture a few frames as reference). That’s where the delay is introduced.

Enter Scalado. They have some incredibly clever and effecient JPEG-decoding software. In fact, it’s so nippy that it allows us to use a full resolution feed from the camera for our view-finder (and that’s all running ARM-side btw). When it comes to capture time that means we already have a full sized, JPEG file that we just need to save to disk. No more switching camera modes equals no more lag!

Although our demo app didn’t do this, it wouldn’t be much of a stretch to buffer the last few seconds’ worth of camera frames so that when you capture it could present you with photos from just before you pressed the button. That way even if you were a bit late to press the button you still wouldn’t miss those once-in-a-lifetime moments! You could also implement a burst capture mode along similar lines.

With higher spec camera hardware and sufficient bandwidth on the camera connection you could up the mega-pixels quite significantly too. Scalado recons that with the CPU we were using their solution could comfortably decode up to 20 mega-pixel images. Sweet! 🙂

<a href="https://www.flickr.com/photos/james_nash/2962064230/"><img src="/media/smartphone-show-2008/coffee.jpg" alt="Wall of fame behind the Symbian coffee bar" width="480" height="206"></a>

\* _Incase you were wondering: The Posh’n’Becks were the same ones that [appeared on Dragon’s Den](https://www.bbc.co.uk/programmes/b0084jc5)!_
