<?php
require_once('../includes/sitemaps.inc');

header('Content-type: application/xml; charset=utf-8');

$theSitemap->printSitemapXml();

?>
