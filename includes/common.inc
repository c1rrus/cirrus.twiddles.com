<?php
// Init stuff
date_default_timezone_set('Europe/London');


// Main classes...

class PageInfo{

	public function __construct( $title, $shortName, $keywords, $description, $path, $showInNav = true, $isHome = false ){
		$this->title = $title;
		$this->shortName = $shortName;
		$this->keywords = $keywords;
		$this->description = $description;
		$this->path = $path;
		$this->showInNav = $showInNav;
		$this->isHome = $isHome;
	}
	
	public function getTitle(){
		return $this->title;	
	}
	
	public function getShortName(){
		return $this->shortName;	
	}
	
	public function getKeywords(){
		return strtolower($this->shortName).', '.$this->keywords;	
	}
	
	public function getDescription(){
		return $this->description;	
	}
	
	public function getPath(){
		return $this->path;	
	}
	
	public function showInNav(){
		return $this->showInNav;	
	}
	
	public function isHome(){
		return $this->isHome;	
	}
	
	private $title;
	private $shortName;
	private $keywords;
	private $description;
	private $path;
	private $showInNav;
	private $isHome;
}


class SiteSections{

	public function __construct(){
		$this->sections = array();	
	}

	public function addSection( PageInfo $page ){
		$this->sections[] = $page;	
	}
	
	public function sectionCount(){
		return count( $this->sections );	
	}
	
	public function getSection( $index ){
		return $this->sections[ $index ];	
	}
	
	private $sections;	
}


class PageRenderer{
	
	const SITEROOT = '';
	
	public function __construct( SiteSections $sections ){
		$this->sections = $sections;
	}
	
	public function setThisPage( $index ){
		$this->pageIndex = $index;	
	}
	
	private function getThisPage(){
		return $this->sections->getSection( $this->pageIndex );
	}
	
	
	private function doNavLinks(){
		print '<ul id="navigation">'."\n";

		// go through sections
		for( $i = 0; $i < $this->sections->sectionCount(); ++$i ){
			
			$section = $this->sections->getSection( $i );
			
			if( ! $section->showInNav() ){
				// skip pages that should not appear in nvaigation
				continue;	
			}
			
			print '	<li>';

			// avoid linking to self			
			if( $i != $this->pageIndex ){
				print '<a href="'.PageRenderer::SITEROOT.$section->getPath().'" title="'.$section->getTitle().'"'.( $section->isHome() ? ' class="home"' : '' ).'>';
			}
			else{
				print '<span'.( $section->isHome() ? ' class="home"' : '' ).'>';	
			}

			print $section->getShortName();

			// avoid linking to self			
			if( $i != $this->pageIndex ){
				print '</a>';
			}
			else{
				print '</span>';	
			}
			
			print '</li>'."\n";
		}

		print '</ul>'."\n";
	}
	
	
	
	public function doHeader( $extraTags = "" ){
		print '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
	<head profile="http://gmpg.org/xfn/11">
		<title>'.$this->getThisPage()->getTitle().'</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="james, nash, personal, '.$this->getThisPage()->getKeywords().'" />
		<meta name="description" content="'.$this->getThisPage()->getDescription().'" />
		<link rel="shortcut icon" href="'.PageRenderer::SITEROOT.'/favicon.ico" />
		<link rel="stylesheet" type="text/css" media="all" href="'.PageRenderer::SITEROOT.'/style/screen.css" />
';
		if( !empty( $extraTags ) ){
			print "\t\t".$extraTags."\n";	
		}
		// embed home link for non homepages
		if( ! $this->getThisPage()->isHome() ){
			print '		<link rel="home" href="'.PageRenderer::SITEROOT.'/" />';
		}
		
		print '	</head>
	<body>
		<div id="header">
			<h1>'.$this->getThisPage()->getTitle().'</h1>
		</div>
';
		
		$this->doNavLinks();
		
		print '		<div id="body">
';
	// end of header	
	}
	
	public function doFooter(){
		print '
		</div>
		<div id="footer">
			<p class="twidnet">This site is a member of the: <a href="http://www.twiddles.com/">Twiddles Network</a></p>
			<p>&copy; 2002 - '.date('Y').' '.( $this->getThisPage()->isHome() ? '' : '<a href="'.PageRenderer::SITEROOT.'/">' ).'James Nash'.( $this->getThisPage()->isHome() ? '' : '</a>' ).'. All rights reserved.</p>
		</div>
	</body>
</html>';
	// end of footer	
	}
	
	private $pageIndex;
	private $sections;
}



// global vars
$theSections = new SiteSections();

// ==== MAIN PAGES ======


// 0: home page
$theSections->addSection( new PageInfo(
	'James Nash - arty phone geek', // title
	'Home', // short name
	'art, blog, mobile, phone, technology, web, design, geek, twiddles', // extra keywords
	'Personal site of James Nash - the arty phone geek. Includes artwork and a blog by James Nash.', // description
	'/', // path
	true, // show in navigation
	true // is homepage!
) );

// 1: blog page
$theSections->addSection( new PageInfo(
	"James Nash on the Blog",
	'Blog',
	'feed, twitter, mobile, technology, web, geek',
	'Blog posts by James Nash. Mostly musings and ramblings about mobile phone technology.',
	'/blog/'
) );

// 2: art page
$theSections->addSection( new PageInfo(
	'Artwork by James Nash',
	'Art',
	'artwork, graphics, doodles, drawings, designs, logos',
	'Drawings, doodles and designs by James Nash, organised into convenient, themed galleries.',
	'/art/'
) );

// 3: links page
$theSections->addSection( new PageInfo(
	'James Nash\'s Links',
	'Links',
	'friends, websites, sites, personal, technology, art, interesting',
	'James Nash\'s links to sites of friends, projects or just stuff he finds interesting and amusing.',
	'/links/'
) );

// ===== SECONDARY PAGES =====



// 4: adonthell art
$theSections->addSection( new PageInfo(
	'Adonthell Artwork by James Nash',
	'Adonthell',
	'art, artwork, game, rpg, open source, gpl, fanstasy, concept, sprite, dragon, dwarf',
	'Artwork for the open-source RPG game &quot;Adonthell&quot; by James Nash.',
	'/art/adonthell/',
	false // hide from navigation
) );

// 5: mobbler art
$theSections->addSection( new PageInfo(
	'Mobbler logo by James Nash',
	'Mobbler',
	'art, mobbler, s60, app, logo, icon, symbian, application, music, last.fm',
	'Logo and application icon design for Mobbler, the S60 Last.fm client, by James Nash.',
	'/art/mobbler/',
	false // hide from navigation
) );

// 6: nasher art
$theSections->addSection( new PageInfo(
	'Nasher / 9Lives logos by James Nash',
	'Nasher',
	'art, logo, nasher, 9lives, music, dj, label, modern, techno, trance, electro, house',
	'Nasher &amp; 9Lives logo designs by James Nash.',
	'/art/nasher/',
	false // hide from navigation
) );

// 7: twiddles art
$theSections->addSection( new PageInfo(
	'Twiddles logos and art by James Nash',
	'Twiddles',
	'art, logo, twiddles, icon, background, desktop',
	'Logo designs and artwork for Twiddles by James Nash.',
	'/art/twiddles/',
	false // hide from navigation
) );

// 8: logos art
$theSections->addSection( new PageInfo(
	'Logo and icon designs by James Nash',
	'Logos',
	'logo, icon, nimbus, starman, lightsabre, putty, ssh, star wars, app, s60, symbian',
	'Various logos and icons designed by James Nash.',
	'/art/logos/',
	false // hide from navigation
) );

// 9: misc art
$theSections->addSection( new PageInfo(
	'Miscellaneous art by James Nash',
	'Misc',
	'art, pictures, miscellaneous, various, outpost, fantasy, sci-fi',
	'Miscellaneous artwork by James Nash. Mostly sci-fi and fantasy pictures.',
	'/art/misc/',
	false // hide from navigation
) );



// ====== INIT PAGE RENDERER =========
$thePageRenderer = new PageRenderer( $theSections );
?>