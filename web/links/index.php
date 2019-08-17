<?php
	require_once("../../includes/common.inc");
	$thePageRenderer->setThisPage( 3 ); // 3 = links
	$thePageRenderer->doHeader();
?>
<div class="box">
	<h2>Link love</h2>
	<p>Here's a random selection of links of things I have done or am involved in:</p>
	<ul>
		<li><a href="https://udt.design/">Universal Design Tokens</a> - a project I started in 2018 with the goal of defining a standard file format for exchanging design tokens.</li>
		<li><a href="http://www.twiddles.com/">Twiddles</a> - <q>Coming soon</q>, honest guv'!</li>
		<li><a href="https://shop.spreadshirt.co.uk/twiddles/">The official Twiddles shop</a>!</li>
		<li><a href="http://adonthell.nongnu.org/">Adonthell</a>. A cool, open-source RPG adventure game.</li>
	</ul>	
</div>	
<?php
	$thePageRenderer->doFooter();
?>
