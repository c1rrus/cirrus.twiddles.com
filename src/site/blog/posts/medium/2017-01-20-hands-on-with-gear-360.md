---
title: Hands on with Samsung’s Gear 360
date: 2017-01-20T12:00Z
summary: A detailed review of Samsung’s Gear 360 camera, after having played with it for about a month.
keywords:
  - virtual reality
  - "360 video"
  - samsung
  - InsidersGear360
  - cameras
---

<img src="/media/medium/samsung-gear360.webp" alt="Samsung Gear360 camera standing on a wall by the Thames in central London on a sunny day" width="2800" height="981">

I recently got a [Samsung Gear 360](https://web.archive.org/web/20170120134936/http://www.samsung.com/global/galaxy/gear-360/) on loan courtesy of [The Insiders](https://www.theinsidersnet.com/). It’s a camera that can record 360º photos (up to 30 megapixels) and 360º videos (up to 4k 30fps). When viewed via appropriate software or online services, you can interactively pan around the photos or videos in all directions to observe the scene as though you were where the camera was. This is especially impressive and immersive, when you view them via a VR headset like [Google Cardboard](https://arvr.google.com/cardboard/).

The camera’s official price is currently £349 in the UK. However, if you shop around you can find it cheaper (for example, [Amazon currently offers it for about £275](https://www.amazon.co.uk/Samsung-Gear-360-Camera-White/dp/B01M4J53CO/))

## What's in the box

The Gear 360 comes in a funky, cylindrical package. Besides the camera and its removable battery, you’ll find the following in there:

- Mini tripod
- Wrist strap that attaches to the mini tripod
- microUSB cable
- Soft pouch
- Cleaning cloth
- Instructions
- License key for Samsung’s Action Director software for Windows

<img src="/media/medium/samsung-gear360-box-contents.webp" alt="The Gear 360 and the above mentioned accessories all laid out on a plain surface" width="3669" height="2478">

Notably absent are:

- A USB wall charger
- A microSD card (the camera does **not** have internal storage, so you _will_ need to get a memory card before using it!)

## Setup

Connecting the camera to my phone (a Samsung Galaxy S7) was pretty straight forward:

- Download & install the [Gear 360 app](https://galaxystore.samsung.com/detail/com.samsung.android.gear360manager) from Google Play store
- Run it and follow the in-screen prompts

One minor niggle was that, on the first run, the app asks for some unexpected permissions (e.g.: the ability to make phone calls). I’m inclined to trust Samsung not to abuse them for nefarious purposes, but it’s still not clear to me _why_ the app even needs those permissions. If this had been an app from a random publisher, I’d have quit and uninstalled at this point (considering the amount of phishing and malware that’s about these days). I’d suggest that Samsung either explain what those permissions are being used for before requesting them or else avoid requiring them in the first place.

<figure>
<img src="/media/medium/samsung-gear360-app-install.webp" alt="Two screenshots side by side. One of the Gear 360 app prompting for permission to &quot;make and manage phone calls&quot;. The other showing a list of all the permssions the app requires, which also include the ability to &quot;receive text messages (SMS)&quot;." width="3200" height="2760">
<figcaption>Why would a camera app need phone & SMS capabilities?</figcaption>
</figure>

Note that the app only supports the following phones — if you have something else, you’re out of luck unfortunately:

- Samsung Galaxy S7 & S7 Edge
- Samsung Galaxy S6, S6 Edge & S6 Edge+
- Samsung Galaxy Note 5

Technically, you can use the camera without a phone and the app (you can still take photos and videos and then transfer them off the microSD card), but I wouldn’t recommend it. The live viewfinder provided by the app is very helpful. The app also allows you to control some settings that can’t be done on the camera directly. It is also responsible for downloading firmware updates and installing them onto the camera. Finally — and perhaps most importantly — the app takes care of [stitching](https://en.wikipedia.org/wiki/Image_stitching) the images and videos it downloads off the camera. Without the stitching, they won’t look quite right when displayed in scrollable 360º viewers / players or in VR.

<figure>
<img src="/media/medium/image-stitching-comparison.webp" alt="Side-by-side comparison of stitched and unstitched pictures of the Hong Kong skyline at night. In the stitched one everything looks normal. In the unstitched one, there is a wedge-shaped void in the top middle of the image. Also, some of the buildings towards the centre of the image appear twice." width="1400" height="788">
<figcaption>Screengrabs of how YouTube renders stitched (on the left) versus unstitched (on the right) footage. Note how on the unstitched one you can still make out the black area between the two lenses and there is also some duplication of things visible near the edge of the lenses’ field of vision.</figcaption>
</figure>

## Usage

Using the Gear 360 is pretty straightforward. The buttons on the camera let you switch it on, switch between the various photo and video modes, take pictures and record videos. Alternatively, via the app on your phone, you can see a live viewfinder and remote control all functions of the camera.

At first I found myself trying to keep the camera level as I would with a normal one. However, after a while I realised it doesn’t matter (as much), since it’s recording a complete 360º, spherical view of its surroundings. You can’t **not** get something in the shot! Of course, a consequence of this is that yourself are in the shot too — unless you hide from the camera and remote control it from your phone.

The supplied mini tripod is quite sturdy and is invisible in photos and videos. However, if you have the wrist strap attached to it, that _does_ tend to be partly visible in the photo. With the legs folded in it also doubles as a handle for holding the camera, though your hand will then be visible in the shot. Fortunately, it attaches via a standard tripod screw mount, so you can use pretty much any tripod or selfie stick instead. I got some good results with a selfie stick as it ends up being invisible in the final shot but is much longer than the mini tripod, thus giving photos and videos the appearance that the camera was floating in the air.

Using the app, you can then wirelessly download photos and videos from the camera to your phone. This uses [Wi-Fi Direct](https://en.wikipedia.org/wiki/Wi-Fi_Direct) and is reasonably quick — transferring photos (which weigh in at around 5–6mb each) takes about 10–20 seconds. Videos take longer obviously (to give you a rough idea, a 56 second clip I recorded at 3840 x 1920 resolution was 406mb). Depending on their duration, they can therefore take several minutes to transfer.

Once on your phone, the app allows you to view them in various ways:

- **360º view**: Displays photos & videos as (the inside of?) a sphere. You can pan around it by swiping the screen. Alternatively, switching on “Motion View” lets you look around by moving your phone instead.
- **Dual view**: Shows what was captured by the front and back cameras as 2 images side-by-side.
- **Panoramic view**: Displays an [equirectangular](https://en.wikipedia.org/wiki/Equirectangular_projection) version of the photo / video. This is actually unaltered image (if you open the photo or video in a non-360º-aware viewer, this is what you’ll see).
- **Round view**: Gives you a “tiny world” representation. You can pan around in all directions and zoom in and out. These often look quite cool. Unfortunately, there’s no option to export a high-res copy of this view. You have to therefore screenshot it, if you’d like to take a copy of what you see there.
- **Stretched view**: Is a stretched and, in my opinion, ugly view. You can pan around in this view too. But it seems pretty pointless.

<figure>
<img src="/media/medium/samsung-gear360-previews.webp" alt="Screenshots of the above five views described above" width="2000" height="1742">
<figcaption>The same 360º photo viewed in 5 different ways</figcaption>
</figure>

A more natural view option, akin to how services like Facebook or YouTube display 360º content, would have been nice. Also, built-in support for [Google Cardboard](https://arvr.google.com/cardboard/) would have been nice (currently, you need to find other 3rd party apps to do that). Perhaps future updates to the app will add things like that.

When transferring many photos and/or large videos, it is much faster to read them direct off the camera’s microSD card. You’ll need to use a card reader though, since the camera does not identify as a standard mass storage device when plugged in via USB (at least it did not on my Mac). The other drawback with this approach is that the images and videos are not stitched. Instead, you just get the raw images from both cameras side-by-side.

<figure>
<img src="/media/medium/samsung-gear360-raw-image.webp" alt="Two circular, fisheye lens photos side-by-side in one image" width="2560" height="1280">
<figcaption>Example of an unstitched image directly off the camera’s memory card. Note the black areas and slight overlap in what each camera captured.</figcaption>
</figure>

I believe Samsung’s Action Director can do the stitching on a PC. However, on a Mac or Linux computer you’ll need to find alternative software to do it. I wasn’t able to find any free ones for the Mac, so I ended up relying entirely on the Gear 360 Android app for my stitching (which meant some of transfers took quite a long time).

Interestingly, videos stored on the camera’s microSD use the H.26**5** codec. Presumably the Gear 360 Android app converts to H.264 as part of its stitching process. Given that support for H.264 playback is much broader, on players, online services and devices, this is a sensible choice.

## Sharing photos & videos

You can share photos and videos direct from the Gear 360 app. This uses Android’s standard sharing mechanism, so the options presented to you depend on what other apps you have installed. The photos are actually just JPEG files and the videos are MP4 files (with H.264 video and AAC audio), except that they contain some [extra meta data](https://developers.google.com/streetview/spherical-metadata) that indicates to compatible viewers and players that they should be displayed as 360º.

If you share them to an app or service that supports 360º content and understands that meta data (of the ones I tried, Facebook, YouTube and Flickr all do), then they will be displayed as an interactive 360º view that allows people to pan around and look in all directions. If the service does not, then you simply see a flat, equirectangular view (identical to the “Panoramic View” mode described above).

<figure>
<img src="/media/medium/360-photo-flickr-preview.avif" alt="View from a hotel room balcony in the Grand Caloane Resort in Macau. Taken with a Samsung Gear 360." width="2121" height="1062">
<figcaption><a href="https://www.flickr.com/photos/james_nash/31716084290/">"360º view from Grand Coloane Resort"</a> as displayed on Flickr</figcaption>
</figure>

## Editing content

The Gear 360 app does not provide any photo or video editing facilities. Apparently, the [Action Director](https://www.cyberlink.com/learning/gear-360-actiondirector/606/introducing-gear-360-actiondirector) PC software that Samsung provides does. I don’t have a Windows PC though, so I was unable to try that out. Samsung doesn’t provide any software for Mac or Linux.

Apple’s iMovie does not currently support 360º video. I wasn’t able to find any free apps to edit 360º video on my Mac. However, I have access to Adobe Premiere and was able to use that. I’m not an expert at video editing, so I probably only scratched the surface of what’s possible. For an expensive professional tool, the 360º features in Premiere felt a bit underwhelming though. It can import and export 360º videos with the necessary meta data and you get an interactive 360º preview while editing. That’s about it as far as I could see.

The ability to change the default vantage point was something I wanted, but couldn’t do directly in Premiere. Eventually, I found a work-around using After Effects in this “[360 Video Production Tactics](https://wistia.com/learn/production/360-video-shooting-techniques)” blog post, but it’s quite tedious to do.

With a bit of trial and error, I was able to put together the following video and I’m quite pleased with the result (considering that I’m a newbie to video editing in general, let along 360º video):

<figure>
<div class="video-embed">
<iframe width="560" height="315" src="https://www.youtube.com/embed/50F1-zsfV2Y?si=hH2NFTKnIogfg1Jb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</div>
<figcaption>Video made from footage I captured while on vacation in Hong Kong and Macau</figcaption>
</figure>

This is a nascent technology though, so I’m confident that the availability and feature set of 360º editing software, viewers and sharing services will evolve quickly.

## Conclusion

Overall I’m quite impressed with the Gear 360. Compared to using your phone camera’s panorama or photosphere functions, being able to take a 360º photo in an instant is vastly more convenient. Furthermore, 360º _videos_ aren’t even be possible at all using a traditional camera, so being able to capture those opens the door to whole new world of creative opportunities.

I’ve had a lot of fun playing with the camera and gradually figuring out what works and what doesn’t. There’s still much to discover and learn, but it’s exciting to explore what feels like a new medium.

Since it’s still a novelty, sharing 360º photos and videos online gets a lot of _ooohs_ and _aaahs_. When you’re out with friends or family, standing in a circle around the camera and taking pictures produces some pretty cool group photos. Letting people see places you’ve visited as if they were there themselves goes down a treat too.

For a first generation product, the Gear 360 is pretty good. The device looks nice and feels sturdy. It’s fairly easy to operate and has very good picture quality. The Android app is functional, but could do with some improvements.

Considering the price point, it’s definitely an “early adopter” product for now. If you’re keen to dip your toes into 360º content production, then I can definitely recommend it. If you’re looking for your next camera for holiday snaps, you may want wait another generation or two so that the software kinks get ironed out and the prices drops further.
