<?php
	require_once("../../includes/common.inc");
	//require_once("../../includes/tweets.inc");
	
	$thePageRenderer->setThisPage( 1 ); // 1 = blog
?>

<div class="box">
    <h2>Blog not found</h2>
    <p>Unfortunately there isn't a proper <strong>James Nash</strong> blog just yet. There will be one someday and when it's ready it will live here!</p>
    <p>However, <strong>James Nash</strong> has contributed some posts to the following blogs:</p>
    <ul>
        <li><a href="https://smartphoneshow.wordpress.com/">Symbian Smartphone Show Blog</a>. (Coverage of the 2008 Smartphone Show)</li>
        <li><a href="https://symbianmwc08.wordpress.com/">Symbian @ MWC 2008</a>. (Coverage of the 2008 Mobile World Congress)</li>
        <li><a href="https://web-beta.archive.org/web/20110202185319/http://blog.symbian.org/">Symbian Foundation Blog</a>. (Now defunct. I wrote some of the original posts when the blog started and also created the <a href="https://web-beta.archive.org/web/20090405043504/http://blog.symbian.org:80/2009/04/01/symbian-based-toaster-announced/">Symbian Toaster April Fool's</a>)</li>
    </ul>
</div>

<?php
	$thePageRenderer->doFooter();
?>
