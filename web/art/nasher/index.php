<?php
	$myPageIndex = 6; // 6 = nasher art

	require_once("../../../includes/galleries.inc");
	$thePageRenderer->setThisPage( $myPageIndex ); 
	$thePageRenderer->doHeader( '<link rel="stylesheet" type="text/css" media="all" href="'.PageRenderer::SITEROOT.'/art/art.css" />'."\n".$theGalleryListing->getRelLinks( $myPageIndex - 4 ) );
?>
<div id="main-content">
	<div class="box">
		<h2 id="intro">Introducing Nasher / 9Lives</h2>
		<p><strong>Nasher</strong> is an up-and-coming trance and electro <abbr title="disc jockey">DJ</abbr> and producer. He has also set up his own label <strong>9Lives</strong> under which
		he'll be publishing his own music. I have designed the logos for both his stage name and label. They share the same "Nasher" logotype to re-enforce the fact that they represent different
		aspects of the same artist.</p>
		<p>Be sure to check out his <a href="http://www.myspace.com/djnasher">Nasher MySpace</a> and <a href="http://twitter.com/DJNasher">Nasher Twitter page</a> for more info and music samples!</p>
	</div>
	<div class="box">
		<h2 id="nasher_logos">Nasher logos</h2>	
		<ul class="gallery">
			<li><a href="pics/nasher.jpg"><img src="nasher.jpg" alt="Nasher &quot;N&quot; emblem" /> <span>Nasher logo</span></a></li>
			<li><a href="pics/nasher_text.jpg"><img src="nasher_text.jpg" alt="Nasher logotype" /> <span>Nasher logotype</span></a></li>
		</ul>
		<p class="break">By the way, the similarity between "Nasher" and my own name, James <em>Nash</em>, is no coincidence - he's my nephew!</p>
	</div>
	<div class="box">
		<h2 id="9lives_logos">9Lives logos</h2>	
		<ul class="gallery">
			<li><a href="pics/9lives.jpg"><img src="9lives.jpg" alt="9Lives heart emblem" /> <span>9Lives logo</span></a></li>
			<li><a href="pics/9lives_text.jpg"><img src="9lives_text.jpg" alt="9Lives logotype" /> <span>9Lives logotype</span></a></li>
		</ul>
		<p class="break">Like the <strong>9Lives</strong> logo? Why not buy some groovy <a href="http://nasher9lives.spreadshirt.co.uk/9lives-C145153"><strong>9Lives</strong> merchandise</a>!</p>
	</div>
	<div class="box">
		<h2 id="old">Old "DJ Nasher" &amp; "Nasher 9 Lives" logos</h2>
		<p>Previsouly Mike Nash(er) intended to use "DJ Nasher" as his DJ name and "Nasher 9Lives" as his
		producer name. The logos and logotype where originally designed around these names and can be seen
		below. However, in late 2009, a slight re-branding took place: The "DJ" prefix was dropped and
		"<strong>Nasher</strong>" is now used for both his DJing and music production work. At the same time
		the "Nasher" portion of "Nasher 9Lives" was dropped and "<strong>9Lives</strong>" is now used as the
		name for <strong>Nasher</strong>'s music label.</p>
		<p>Here are the original, old logos:</p>
		<ul class="gallery">
			<li><a href="pics/djnasher_combo.jpg"><img src="djnasher_combo.jpg" alt="DJ Nasher logo" /> <span>DJ Nasher logo design</span></a></li>
			<li><a href="pics/9lives_combo.jpg"><img src="9lives_combo.jpg" alt="Nasher 9 Lives logo" /> <span>Nasher 9 Lives logo design</span></a></li>
			<li><a href="pics/djnasher_vol1.jpg"><img src="djnasher_vol1.jpg" alt="DJ Nasher Volume 1" /> <span>Album cover for DJ Nasher "Volume 1" sampler CD</span></a></li>
			<li><a href="pics/djnasher_vol2.jpg"><img src="djnasher_vol2.jpg" alt="DJ Nasher Volume 2" /> <span>Album cover for DJ Nasher "Volume 2" sampler CD</span></a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/3151250030/"><img src="djnasher_warehouse.jpg" alt="DJ Nasher Warehouse" /> <span>DJ Nasher warehouse wallpaper</span></a></li>
		</ul>
		<p class="break">If you like the Vol1 &amp; 2 album covers, you can also get them in widescreen wallpaper format: <a href="http://www.flickr.com/photos/james_nash/3771215603/">DJ Nasher Volume 1 desktop wallpaper</a> &amp; <a href="http://www.flickr.com/photos/james_nash/3771215639/">DJ Nasher Volume 2 desktop wallpaper</a>. Enjoy!</p>
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
