<?php
	require_once("../includes/common.inc");
	$thePageRenderer->setThisPage( 0 ); // 0 = home
	$thePageRenderer->doHeader( '<link rel="stylesheet" type="text/css" media="all" href="home.css" />'."\n\t\t".'<link rel="meta" type="application/rdf+xml" title="FOAF" href="/foaf.rdf" />' );
?>
<div id="main-content">
	<div class="box">
		<h2>James Nash in a nutshell</h2>
		<p>Hi there! My name is <strong>James Nash</strong> and this is my personal website. It's primarily a place for me to share things I have made, am involved in or just find interesting with the world. Who knows, perhaps it will also let long lost acquaintances find me and get in touch.</p>
		<p>I chose the subtitle "<em>arty phone geek</em>" because it was the most concise summary of myself that I could think of:</p>
		<ul>
			<li>I like drawing, doing graphics on the computer and just generally making stuff that looks nice (amazingly, some people seem to think I'm good at it too! I'll let you <a href="/art/">judge for yourself</a> though).</li>
			<li>I like gadgets and gizmos, in particular mobile phones (it's like having all the other gadgets combined into one!).</li>
			<li>I consider myself a bit of <a href="http://catb.org/jargon/html/G/geek.html">geek</a> (when I'm not playing with phones, I'm often found mucking about on the computer).</li>
		</ul>
		<p>So there you go, that's me. I hope you enjoy the <a href="/blog/">blog</a>, <a href="/art/">art</a> &amp; <a href="/links/">links</a> sections of my site!</p>
	</div>
	<div class="box">
		<h2>James Nash on the social intertubes</h2>
		<p>Find me, follow me and poke me on...</p>
		<ul class="social">
			<li><a href="http://twitter.com/c1rrus" id="twitter" rel="me">Follow James Nash on Twitter</a></li>
			<li><a href="http://www.flickr.com/photos/james_nash/" id="flickr" rel="me">James Nash's Flickr Photo Stream</a></li>
			<li><a href="http://www.facebook.com/james.nash" id="facebook" rel="me">Add James Nash on Facebook</a></li>
			<li><a href="http://delicious.com/c1rrus" id="delicious" rel="me">James Nash's del.icio.us bookmarks</a></li>
		</ul>
		<p class="break">Please note that I probably won't follow / add / whatever you back automatically unless I actually know you from <a href="http://catb.org/jargon/html/M/meatspace.html">meatspace</a>! Call me old-skool if you like, but I don't want every Tom, Dick and Harry seeing photos of me on a night out! :-P</p>
		<p>Oh yeah, incase you're wondering, I've not bothered with MySpace since I have a perfectly good "space" here (and one that doesn't look like someone barfed all over your browser either)!</p>
	</div>
	<div class="box">
		<h2>About James Nash's site</h2>
		<p>The page and design you see before you now are the first major re-design of this site since it launched in 2002. I lovingly hand-coded all the <a href="http://www.w3.org/TR/xhtml1/">XHTML</a> and <a href="http://www.w3.org/TR/CSS2/">CSS</a> as well as the back-end <a href="http://www.php.net/">PHP</a> code in <a href="http://www.skti.org/skedit/">skEdit</a> myself (none of this WYSIWYG rubbish!). I made all the graphics in <a href="http://www.gimp.org/">GIMP</a>. The site runs on <a href="http://event-horizon.kicks-ass.net/">my own webserver</a> (<a href="http://www.apache.org/">Apache</a> on <a href="http://www.kernel.org/">Linux</a>, naturally!) which I built and configured myself too. I think it's therefore fair to say this really is <em>my</em> personal site through and through! :-)</p>
		<p>Admittedly the site is still a bit light on functionality and content but I intend to improve it over time. A proper <a href="/blog/">blog</a> of my own will be next hopefully. After that, perhaps a more sophisticated <a href="/art/">picture gallery</a>? We'll see...</p>
		<p>In the mean time, why don't you go ahead and bookmark this site so you can check by once in a while? Hope to see you here again soon!</p>
	</div>
</div>
<div id="secondary-content">
	<div class="box">
		<h2>James Nash's Work</h2>
		<p>I have been doing mobile software development for over <?php print date('Y') - 2005; ?> years (yes, I really am a <em>phone geek</em>!). I therefore like to think I know a thing or two about mobile software, operating systems and the industry in general. However, <strong>unless clearly stated otherwise</strong>, everything I say and write on this site and elsewhere online is my own, <em>personal</em> oppinion and <strong>in no way represents the views of my employer</strong>!</p>
		<p>For other professional networking, please check out my: <a href="http://www.linkedin.com/in/jamescnash" id="linkedin" rel="me">LinkedIn profile.</a> Please note that I usually only accept people as a new contact if I've actually met them in real life!</p>
		<h3>Shameless book plug</h3>
		<p>By the way, if you're into developing multimedia apps for Symbian you may find this book useful:</p>
		<ul>
			<li id="mmbook"><a href="http://www.amazon.co.uk/Multimedia-Symbian-OS-Inside-Convergence/dp/0470695072/ref=sr_1_1?ie=UTF8&amp;s=books&amp;qid=1253820406&amp;sr=8-1">Multimedia on Symbian OS</a></li>
		</ul>
		<p>I wrote one of the chapters for it, so it must be good! ;-)</p>
	</div>
	<div class="box">
		<h2>Obligatory badges</h2>
		<p>No self-respecting geek's site would be complete without an assortment of badges, banners and obscure codes so here are mine:</p>
		<ul id="badges">
			<li><a href="/foaf.rdf" title="James Nash's FOAF file" id="foaf" class="small-button"><span>James Nash's FOAF file</span></a> (<a href="http://www.foaf-project.org/" title="What is the FOAF Project?">?</a>)</li>
			<li><a href="http://gmpg.org/xfn" title="This site is XFN Friendly" class="small-button" id="xfn"><span>XFN Friendly</span></a></li>
			<li><a href="http://validator.w3.org/check?uri=referer" title="This page is valid XHTML" class="small-button" id="valid-xhtml"><span>Valid XHTML 1.0</span></a></li>
		</ul>
		<p class="break geekcode"><span>-----BEGIN <a href="http://www.geekcode.com/geek.html">GEEK CODE</a> BLOCK-----</span><br />
Version: 3.1<br />
GCS d- s+:--- a<?php

$currentDate = new DateTime();
$age = intval( $currentDate->sub( new DateInterval('P1981Y10M30D') )->format('Y') );

if( $age >= 25 && $age <= 29 ){
	print '-';	
}
else if( $age >= 40 && $age <= 49 ){
	print '+';
}
else if( $age >= 50 && $age <= 59 ){
	print '++';	
}
else{
	print '+++';	
}

?> C++$ UL P++ L+++ E W+++ N o? K? w O? M++ V? PS+ PE Y+ PGP t 5? X+ R tv+ DI++ D+ G e+++ h+ r++ y?<br />
<span>------END GEEK CODE BLOCK------</span></p>
	</div>
</div>
<?php
	$thePageRenderer->doFooter();
?>
