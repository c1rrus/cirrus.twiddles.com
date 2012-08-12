<?php
	$myPageIndex = 4; // 4 = adonthell art

	require_once("../../../includes/galleries.inc");
	$thePageRenderer->setThisPage( $myPageIndex ); 
	$thePageRenderer->doHeader( '<link rel="stylesheet" type="text/css" media="all" href="'.PageRenderer::SITEROOT.'/art/art.css" />'."\n".$theGalleryListing->getRelLinks( $myPageIndex - 4 ) );
?>
<div id="main-content">
	<div class="box">
		<h2>Adonthell artwork</h2>
		<p><a href="http://adonthell.nongnu.org/">Adonthell</a> is an open-source <abbr title="Role Playing Game">RPG</abbr>. I've been on the development team as an artist since about 1999 and produced much of the in-game graphics for versions <a href="http://adonthell.nongnu.org/download/roots.shtml">0.1, 0.2</a> and <a href="http://adonthell.nongnu.org/download/index.shtml#wastesedge">0.3</a>. I am still involved with the game but work and other commitments mean I don't have as much time as I used to so, although I have done some artwork for the new 0.4 release, my contributions are less frequent. We're always keen for new people to <a href="http://adonthell.berlios.de/doc/index.php/Development:Join_The_Team">join the team</a>, so if you're a budding game artist (or musician, coder, author etc.) please get involved!</p>
		<p>Anyway, here's some of my artwork for the game:</p>
		<ul class="gallery">
			<li><a href="http://www.flickr.com/photos/james_nash/1449623448/"><img src="dwarf.jpg" alt="Mountain Dwarf" /> <span>Grumpy looking dwarf guard in the mountains</span></a></li>
			<li><a href="pics/adonthell_island.jpg"><img src="island.jpg" alt="Island" /> <span>Sketch of the island of Adonthell (that the game is named after).</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/3850122558/"><img src="dragon.jpg" alt="Dragon's Lair" /> <span>Dragon guarding its eggs.</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/3673722176/"><img src="censer.jpg" alt="Censer" /> <span>Censer - a morning-star weapon loaded with a magic potion.</span></a></li>
		</ul>
		<p class="break">If you liked these pictures then you might like the rest of <a href="/art/">my artwork</a> too!</p>
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
