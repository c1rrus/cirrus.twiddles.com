<?php

require_once('simplepie.inc');


$feed = new SimplePie();
$feed->set_feed_url('http://twitter.com/statuses/user_timeline/18304876.rss');
$feed->set_cache_location( '/stuff/sites/cirrus.twiddles.com/cache/simplepie' );
$feed->init();
$feed->handle_content_type();


/**
 *	Strips the 'username: ' prefix from Twitter RSS feed items.
 *
 */
function stripUser( $tweetFromFeed ){
	$pos = strpos($tweetFromFeed,':');
	if( $pos == -1 ){
		return $tweetFromFeed;
	}
	return substr( $tweetFromFeed, $pos+2 );
}

/**
 *	Turns URLs, @username references and hashtags in a plain-text tweet
 *	into HTML links.
 *
 */
function parseTweet( $rawTweet ){
	$output = htmlspecialchars( $rawTweet, ENT_NOQUOTES );
	
	// find URLs and turn them into links (pretty crude right now!)
	$output = preg_replace( '/(https?\:\/\/[\-_\/\.\w%\?]+)/', '<a href="\1">\1</a>', $output );
	
	// make @username into link to username's Twitter page
	$output = preg_replace( '/\@(\w+)/', '<a href="http://twitter.com/\1">@\1</a>', $output );
	
	// make hashtags links to a search for that hashtag
	$output = preg_replace( '/\#(\w+)/', '<a href="http://twitter.com/search?q=%23\1">#\1</a>', $output );
	
	return $output;
}

/**
 *
 *
 */
function renderTweetsToXhtml( $feed, $amount ){
	print "<ul class=\"twitter\">\n";
	$counter = 0;
	foreach( $feed->get_items() as $item){
		if( $counter >= $amount ){
			break;	
		}
		
		print "  <li>\n";
		print "    <p>".parseTweet( stripUser( $item->get_description() ) )."</p>\n";
		print "    <p class=\"tweetdate\">".$item->get_date()."</p>\n";
		print "  </li>\n";
		
		++$counter;
	}
	print "</ul>\n";
}


?>

