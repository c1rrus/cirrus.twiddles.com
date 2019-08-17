<?php
	require_once("../../includes/common.inc");
	//require_once("../../includes/tweets.inc");
	
	$thePageRenderer->setThisPage( 1 ); // 1 = blog
	$thePageRenderer->doHeader();
?>

<div class="box">
    <h2>Blog not found</h2>
    <p>Unfortunately I haven't gotten around to building my own blog just yet. When I eventually do, it will live here!</p>
    <p>However, I have blogged elsewhere over the years:</p>
    <ul>
        <li><a href="https://medium.com/@cirrus" rel="me">My Medium blog</a>. Mostly stuff I write about relating to my work on design systems and web development.</li>
        <li>I've published a few posts on the Wipro Digital blog:
            <ul>
                <li><a href="https://wiprodigital.com/2015/07/07/series-weaving-a-better-web-part-1-of-2/">Weaving a Better Web (Part 1 of 2)</a>, 7. July 2015</li>
                <li><a href="https://wiprodigital.com/2015/07/14/series-weaving-a-better-web-part-2-of-2/">Weaving a Better Web (Part 2 of 2)</a>, 14. July 2015</li>
                <li><a href="https://wiprodigital.com/2015/08/20/whats-your-url-strategy/">What's Your URL Strategy?</a>, 20. August 2015</li>
                <li><a href="https://wiprodigital.com/2016/03/17/implementing-atomic-design-at-wipro-digital/">Implementing Atomic Design at Wipro Digital</a>, 17. March 2016</li>
            </ul>
        </li>
        <li>Some really old stuff I did while working at Symbian:
            <ul>
                <li><a href="https://smartphoneshow.wordpress.com/">Symbian Smartphone Show Blog</a>. Coverage of the 2008 Smartphone Show.</li>
                <li><a href="https://symbianmwc08.wordpress.com/">Symbian @ MWC 2008</a>. Coverage of the 2008 Mobile World Congress.</li>
                <li><a href="https://web-beta.archive.org/web/20110202185319/http://blog.symbian.org/">Symbian Foundation Blog</a>. (Now defunct. I wrote some of the original posts when the blog started and also created the <a href="https://web-beta.archive.org/web/20090405043504/http://blog.symbian.org:80/2009/04/01/symbian-based-toaster-announced/">Symbian Toaster April Fool's</a>)</li>
            </ul>
        </li>
    </ul>
</div>

<?php
	$thePageRenderer->doFooter();
?>
