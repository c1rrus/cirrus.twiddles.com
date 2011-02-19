<?php

require_once('simplepie.inc');


function getFeed( $url ){
		
	$feed = new SimplePie();
	$feed->set_feed_url( $url );
	$feed->set_cache_location( '/stuff/sites/cirrus.twiddles.com/cache/simplepie' );
	$feed->init();
	$feed->handle_content_type();
	
	return $feed;
}


?>