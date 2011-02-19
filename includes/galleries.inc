<?php

require_once("common.inc");

class GalleryListing{
	
	public function __construct( SiteSections $galleries ){
		$this->galleries = $galleries;
	}

	public function printList( $thisPageIndex ){
		print '<ul class="galleries">'."\n";
		
		for( $i = 0; $i < $this->galleries->sectionCount(); ++$i ){
			print '	<li>';
			
			$page = $this->galleries->getSection( $i );
			
			if( $thisPageIndex != $i ){
				print '<a id="'.strtolower($page->getShortName()).'" href="'.PageRenderer::SITEROOT.$page->getPath().'">';	
			}
			else{
				print '<span id="'.strtolower($page->getShortName()).'">';	
			}
			
			// trim off the "by James Nash"
			$tmp = $page->getTitle();
			$pos = strrpos( $tmp, " by " );
			if( $pos !== false ){
				$tmp = substr( $tmp, 0, $pos );	
			}
			print $tmp;
			
			if( $thisPageIndex != $i ){
				print '</a>';	
			}
			else{
				print '</span>';	
			}
			
			print '</li>'."\n";
		}
		
		print '</ul>'."\n";

	}


	public function getRelLinks( $thisPageIndex ){
		$lastIndex = $this->galleries->sectionCount() - 1;
		
		$output = '';
		
		// first gallery & previous gallery
		if( $thisPageIndex != 0 ){
			$output = $output."\t\t".'<link rel="first" href="'.PageRenderer::SITEROOT.$this->galleries->getSection(0)->getPath().'" />'."\n";
			$output = $output."\t\t".'<link rel="prev" href="'.PageRenderer::SITEROOT.$this->galleries->getSection( $thisPageIndex-1 )->getPath().'" />'."\n";
		}
		
		// next & last gallery
		if( $thisPageIndex != $lastIndex ){
			$output = $output."\t\t".'<link rel="next" href="'.PageRenderer::SITEROOT.$this->galleries->getSection( $thisPageIndex+1 )->getPath().'" />'."\n";
			$output = $output."\t\t".'<link rel="last" href="'.PageRenderer::SITEROOT.$this->galleries->getSection($lastIndex)->getPath().'" />'."\n";	
		}
	
		// index
		$output .= "\t\t".'<link rel="index" href="../" />';		
	
		return $output;
	}

	private $galleries;	
}


// make galleries
$theGalleries = new SiteSections();
$theGalleries->addSection( $theSections->getSection( 4 ) );
$theGalleries->addSection( $theSections->getSection( 5 ) );
$theGalleries->addSection( $theSections->getSection( 6 ) );
$theGalleries->addSection( $theSections->getSection( 7 ) );
$theGalleries->addSection( $theSections->getSection( 8 ) );
$theGalleries->addSection( $theSections->getSection( 9 ) );

$theGalleryListing = new GalleryListing( $theGalleries );

?>