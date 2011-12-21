<?php
	$myPageIndex = 9; // 9 = misc art

	require_once("../../../includes/galleries.inc");
	$thePageRenderer->setThisPage( $myPageIndex ); 
	$thePageRenderer->doHeader( '<link rel="stylesheet" type="text/css" media="all" href="'.PageRenderer::SITEROOT.'/art/art.css" />'."\n".$theGalleryListing->getRelLinks( $myPageIndex - 4 ) );
?>
<div id="main-content">
	<div class="box">
		<h2>Miscellaneous artwork</h2>
		<p>Here's a motley collection of pictures I've done over the years that didn't fit neatly into one of the other gallery pages.</p>
		<ul class="gallery">
			<li><a href="http://c1rruscl0ud.deviantart.com/art/Obsolete-preview-1-140831457"><img src="obsolete_pre1.jpg" alt="Obsolete (preview 1)" /> <span>Unfinished sci-fi cityscape picture</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/6546380995/"><img src="credit_crunch_north_pole.jpg" alt="The Credit Crunch hits the North Pole" /> <span>Christmas E-card I sent to my friends.</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/1525773555/"><img src="first_light.jpg" alt="First Light" /> <span>Daybreak over some mountains. (Rendered in Bryce)</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/1449685498/"><img src="nighttime.jpg" alt="Night time" /> <span>Night sky over some mountains. (Rendered in Bryce)</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/sets/72157602334721942/"><img src="phone_doodles.jpg" alt="Various phone doodles" /> <span>Doodles drawn on a Sony Ericsson W960 phone</span></a></li>
			<li><a href="http://c1rruscl0ud.deviantart.com/art/Robot-140831688"><img src="robot.jpg" alt="Robot" /> <span>Robot vehicle with big guns!</span></a></li>
			<li><a href="http://event-horizon.twiddles.com/sites/arty/outposts/"><img src="urban_outpost.jpg" alt="Urban Outpost" /> <span>Ominous outpost tower. (Create from a collage of photos)</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/4380562518/"><img src="GNUvara.jpg" alt="Che GNUvara" /> <span>Che GNUvara design for Symbian's Software Freedom Fighters initiative.</span></a></li>
		</ul>
		<p class="break">If you like them please tell your friends, link back here, tweet it, facebook it etc. etc. Cheers!</p>
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
