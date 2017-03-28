<?php
	$myPageIndex = 8; // 8 = logo art

	require_once("../../../includes/galleries.inc");
	$thePageRenderer->setThisPage( $myPageIndex ); 
	$thePageRenderer->doHeader( '<link rel="stylesheet" type="text/css" media="all" href="'.PageRenderer::SITEROOT.'/art/art.css" />'."\n".$theGalleryListing->getRelLinks( $myPageIndex - 4 ) );
?>
<div id="main-content">
	<div class="box">
		<h2>Introduction</h2>
		<p>Over the years I have designed a number of logos for various things. I don't have any formal academic or professional
		training in logo design (or graphic design in general for that matter!) and just do it for fun, but I have now done some
		logos intended for commercial use too.</p>
		<p>I have organised the logos on this page into the following categories:</p>
		<ul>
			<li><a href="#s60apps">S60 Applications</a></li>
			<li><a href="#music">Music</a></li>
			<li><a href="#miscellaneous">Miscellaneous</a></li>
		</ul>
	</div>
	<div class="box">
		<h2 id="s60apps">S60 Applications</h2>
		<p>I have designed icons for some freeware Symbian / S60 applications that either didn't have their own
		icons or had very basic ones. Luckily the the respective developers liked my designs and used them in updates
		for their apps! So, if you use <a href="https://graho.wordpress.com/2009/03/15/light-sabre-what-is-it/">LightSabre</a>, <a href="http://s2putty.sourceforge.net/">Putty for Symbian OS</a> or <a href="http://code.google.com/p/mobbler/">Mobbler</a> on your
		phone you can see my work right in your app menu! :-)</p>
		<ul class="gallery">
			<li><a href="http://www.flickr.com/photos/james_nash/2020278962/"><img src="lightsabre.jpg" alt="LightSabre app icon" /> <span>Icon for Graham Oldfield's LightSabre app</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/2019479391/"><img src="lightsabre_fancy.jpg" alt="Fancy version of LightSabre icon" /> <span>Fancy promotional image using the LightSabre icon</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/3101765915/"><img src="putty.jpg" alt="Putty app icon" /> <span>Icon for the Symbian OS port of Putty</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/3673292876/"><img src="../mobbler/mobbler_icon.jpg" alt="Mobbler app icon" /> <span>Icon for the Mobbler app</span></a></li>
		</ul>
		<p class="break">Check out my <a href="../mobbler/">Mobbler gallery</a> for several desktop backgrounds and variations using the Mobbler logo!</p>
	</div>
	<div class="box">
		<h2 id="music">Music</h2>
		<p>Here are some logos I have made for musicians...</p>
		<ul class="gallery">
			<li><a href="../nasher/pics/nasher.jpg"><img src="../nasher/nasher.jpg" alt="Nasher logo" /> <span>Nasher logo design</span></a></li>
			<li><a href="../nasher/pics/9lives.jpg"><img src="../nasher/9lives.jpg" alt="9Lives logo" /> <span>9Lives logo design</span></a></li>
			<li><a href="pics/starman.jpg"><img src="starman.jpg" alt="Starman logo" /> <span>Starman logo design</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/3670172246/"><img src="starman_fancy.jpg" alt="Fancy version of Starman logo" /> <span>A fancy version of the full Starman logo</span></a></li>
		</ul>
		<p class="break">Check out my <a href="../nasher/">Nasher gallery</a> to see some more "DJ Nasher" &amp; "Nasher 9 Lives" artwork!</p>
	</div>
	<div class="box">
		<h2 id="miscellaneous">Miscellaneous</h2>
		<p>Finally here's a bunch of other logos I've done for various things.</p>
		<ul class="gallery">
			<li><a href="pics/abi1.jpg"><img src="abi1.jpg" alt="Abi 1 logo" /> <span><abbr title="Deutsche Schule London">DSL</abbr> Abitur 2001 logo</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/1448826945/"><img src="nimbus.jpg" alt="Nimbus logo" /> <span>Nimbus logo</span></a></li>
			<li><a href="pics/cirrus.jpg"><img src="cirrus.jpg" alt="Cirrus logo" /> <span>My own ("cirrus") logo</span></a></li>
		</ul>
		<p 
class="break">Try tilting the 
cirrus logo 90 degrees 
counter-clockwise... ;-)</p>
	</div>
</div>
<div id="secondary-content">
	<div class="box">
		<h2>Other galleries</h2>
		<p>You can see more artwork by <a href="/">James Nash</a> in the following galleries:</p>
<?php

	$theGalleryListing->printList( $myPageIndex - 4 );

?>
	</div>
</div>	
<?php
	$thePageRenderer->doFooter();
?>
