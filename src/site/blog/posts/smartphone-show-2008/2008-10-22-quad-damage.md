---
title: Quad Damage
canonicalUrl: https://smartphoneshow.wordpress.com/2008/10/22/quad-damage/
date: 2008-10-22T11:29Z
summary: All about Symbian's quad-core symmetrical multi-processing demo
keywords:
  - symbian
  - demo
  - smp
  - multi-core
---
There a few stands (Symbian’s included) showing off Symbian OS’s SMP (**S**ymmetrical **M**ulti-**p**rocessing) support. We’ve announced [SMP support](https://web.archive.org/web/20080912050714/http://www.symbian.com/symbianos/os_smp.html) some time ago but this is the first we’ve publically shown Symbian OS actually running on multi-core hardware. The hardware in question is rather beastly actually, boasting four ARM11 cores each running at several hundred MHz! (for comparison a [Nokia N95](https://web.archive.org/web/20080222100230/http://developer.nokia.com/devices/N95) has a single ARM11 core at 332MHz)

<img src="/media/smartphone-show-2008/smp-demo.jpg" alt="Erticsson R380" width="450" height="253">

The plan is to optimize for power consumption. X cores running at Y MHz each consume less power than one core running at X * Y MHz so you can potentially get a lot of performance without killing the battery! Furthermore, individual cores can be powered down when not in use further saving power. A lot of the time a phone will be your pocket not doing very much, so a just single core can be kept switched on to keep things ticking over. When you then take your phone out to play games / watch videos / browse the Web it can switch on more cores as and when it needs them. All in the blink of an eye!

<img src="/media/smartphone-show-2008/smp-demo-monitor.jpg" alt="Erticsson R380" width="450" height="488">

I can’t wait for the day when this finds its way into real phones and I can run [Quake](https://web.archive.org/web/20080912045513/http://koti.mbnet.fi/hinkka/) on it to dish out some serious quad damage! 😉

Welcome to the future!
