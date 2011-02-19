<?php
	$myPageIndex = 5; // 5 = mobbler art

	require_once("../../../includes/galleries.inc");
	$thePageRenderer->setThisPage( $myPageIndex ); 
	$thePageRenderer->doHeader( '<link rel="stylesheet" type="text/css" media="all" href="'.PageRenderer::SITEROOT.'/art/art.css" />'."\n".$theGalleryListing->getRelLinks( $myPageIndex - 4 ) );
?>
<div id="main-content">
	<div class="box">
		<h2>Mobbler artwork</h2>
		<p><a href="http://code.google.com/p/mobbler/">Mobbler</a> is an excellent, freeware <a href="http://www.last.fm/">Last.fm</a> client for Symbian/S60 phones. Currently it uses the Last.fm logo as its application icon, but the
		developers always wanted the app to have its own icon and identity. I offered to have a go and, after discussing some ideas with <a href="http://twitter.com/eartle">Michael Coffey</a> (the lead developer), created two
		alternative Mobbler logo designs which were put to a <a href="http://answers.polldaddy.com/poll/1713603/">public vote</a>. The winner has been now been adopted as the official logo and
		will also be used as the app icon in all future releases (the first to feature it is due very soon, by the way!).</p>
		<ul class="gallery">
			<li><a href="http://www.flickr.com/photos/james_nash/3673292876/"><img src="mobbler_icon.jpg" alt="Mobbler app icon" /> <span>Icon for the Mobbler app</span></a></li>
			<li><a href="pics/mobbler_logo.jpg"><img src="mobbler_logo.jpg" alt="Mobbler logo" /> <span>Full Mobbler logo</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/3612366186/"><img src="mobbler_grafitti.jpg" alt="Mobbler grafitti" /> <span>Mobbler Grafitti wallpaper</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/3638476166/"><img src="mobbler_red.jpg" alt="Mobbler red" /> <span>Fancy red Mobbler wallpaper</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/3638476122/"><img src="mobbler_blue.jpg" alt="Mobbler blue" /> <span>Fancy blue Mobbler  wallpaper</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/3635550284/"><img src="mobbler_orange.jpg" alt="Mobbler orange" /> <span>Fancy orange Mobbler  wallpaper</span></a></li>
		</ul>
		<p class="break">For the latest news and updates you may wish to <a href="http://twitter.com/Mobbler">follow Mobbler on Twitter</a>!</p>
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
