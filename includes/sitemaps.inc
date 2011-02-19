<?php

require_once("common.inc");

class Sitemap {

	public function __construct( SiteSections $sections ){
		$this->sections = new SiteSections();

		// create hash of path -> index
		$paths = array();
		for( $i = 0; $i < $sections->sectionCount(); ++$i ){
			$paths[ $sections->getSection( $i )->getPath() ] = $i;
		}

		// sort by path
		ksort( $paths );

		// populate internal sections in path-sorted order
		foreach( $paths as $index ){
			$this->sections->addSection( $sections->getSection( $index ) );
		}
	}

	public function printSitemapXml(){
		print '<?xml version="1.0" encoding="UTF-8"?>'."\n";
		print '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

		for( $i = 0; $i < $this->sections->sectionCount(); ++$i ){
			print "\t<url>\n";
			print "\t\t<loc>http://".$_SERVER['HTTP_HOST'].PageRenderer::SITEROOT.$this->sections->getSection($i)->getPath()."</loc>\n";
			print "\t</url>\n";
		}

		print '</urlset>';
	}


	private $sections;
}


$theSitemap = new Sitemap( $theSections );
?>
