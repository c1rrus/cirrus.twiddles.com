<?php
	$myPageIndex = 7; // 7 = twiddles art

	require_once("../../../includes/galleries.inc");
	$thePageRenderer->setThisPage( $myPageIndex ); 
	$thePageRenderer->doHeader( '<link rel="stylesheet" type="text/css" media="all" href="'.PageRenderer::SITEROOT.'/art/art.css" />'."\n".$theGalleryListing->getRelLinks( $myPageIndex - 4 ) );
?>
<div id="main-content">
	<div class="box">
		<h2>Twiddles artwork</h2>
		<p><a href="http://www.twiddles.com/">Twiddles</a> is a site run by my good friend <a href="http://rnilz.twiddles.com/">Nils</a> and myself where we intend to publish bits and pieces we make in our spare time. It's been around since 1997! Both the old and the current Twiddles logos have been designed by myself. I have also produced some promotional Twiddles artwork. A selection of these can be seen below.</p>
		<ul class="gallery">
			<li><a href="pics/twiddles_logo.jpg"><img src="twiddles_logo.jpg" alt="Twiddles Logo" /> <span>Current Twiddles logo.</span></a></li>
			<li><a href="pics/twiddles_network.jpg"><img src="twiddles_network.jpg" alt="Twiddles Network Logo" /> <span>"Twiddles Network" logo.</span></a></li>
			<li><a href="http://twiddles.deviantart.com/art/Twiddles-Doodles-120812492"><img src="doodles.jpg" alt="Twiddles Doodles" /> <span>Collage of doodles with Twiddles branding.</span></a></li>
			<li><a href="http://twiddles.deviantart.com/art/Twiddles-Doodle-Invert-120813086"><img src="doodles_inverted.jpg" alt="Inverted Twiddles Doodles" /> <span>Inverted version of the Twiddles doodles.</span></a></li>
		</ul>
		<p class="break">Please feel free to share them! Also, any links to <a href="http://www.twiddles.com/">Twiddles</a> would be much appreciated!</p>
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
