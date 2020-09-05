---
title: Symbian SQL Demo
canonicalUrl: https://symbianmwc08.wordpress.com/2008/02/21/symbian-sql-demo/
date: 2008-02-21T11:01Z
summary: Details and screenshots of Symbian's SQL tech demo
keywords:
  - sql
  - database
  - s60
  - sqlite
  - wikipedia
---
Here’s some more demo goodness for those who couldn’t see it in person at the MWC last week. One of the new features of Symbian OS version 9.3 is Symbian SQL. It’s designed to search through large (as in Terabyte large) amounts of data very quickly.

This can be used to speed up searches in large address books or calendars. It will also be invaluable in the realm of multimedia since people are carrying around ever more pictures, songs and videos on their phones. No doubt developers will find plenty of other ingenious uses for it too.

The team looking after this component in Symbian is called System Libraries (aka SysLibs) and they cooked up a neat little demo application that runs on S60 (They were showing it on a Nokia N95 8GB). It searches through a local copy of [Wikipedia](https://www.wikipedia.org/)‘s titles and abstracts (that’s **2.2. million entries** taking up 1.4GB of storage). The search is instantly narrowed down as you begin typing something which demonstrates just how quick Symbian SQL can cut through all that data.

I’ve put together a series of screenshots as an animation to give you an idea of what this looks like when searching for “Symbian”:

![A list of Wikipedia articles is narrowed down with each keypress, as someone types "symbian" into a search field. The "Symbian Ltd" result is selected and the corresponding article appears](/media/symbian-mwc-2008/sqlite-demo.gif)

Pretty impressive I’m sure you’ll agree!

The eagle-eyed amongst you may be thinking “Hang on a minute, if SQL server is in Symbian OS 9.3 how did you get the demo working on a 9.2-based device?” and you’d be quite right, the N95 8gig does not have SQL server out of the box. However, Symbian will begin offering the server as an installable SIS file for 9.2 devices soon (via [SDN++](https://web.archive.org/web/20081006122133/https://developer.symbian.com/sdnpp/) probably) and the demo was built using that!
