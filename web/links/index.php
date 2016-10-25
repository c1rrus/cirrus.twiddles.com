<?php
	require_once("../../includes/common.inc");
	$thePageRenderer->setThisPage( 3 ); // 3 = links
	$thePageRenderer->doHeader();
?>
<div class="box">
	<h2>Link love</h2>
	<p>This page will be updated very soon! In the mean time, here's a random selection of links:</p>
	<ul>
		<li><a href="http://www.twiddles.com/">Twiddles</a> - <q>Coming soon</q>, honest guv'!</li>
		<li><a href="http://twiddles.spreadshirt.net/">The official Twiddles shop</a>!</li>
		<li><a href="http://www.hyper-timer.com/">Hyper Timer</a> - the awesome countdown timer app by Twiddles.</li>
		<li><a href="http://adonthell.nongnu.org/">Adonthell</a>. A cool, open-source RPG adventure game.</li>
	</ul>	
</div>	
<?php
	$thePageRenderer->doFooter();
?>
