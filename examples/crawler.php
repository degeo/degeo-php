<h1>Crawler Library Example</h1>
<?php

// Load the Library
require_once( '../libraries/Crawler.php' );

// Instantiate Library
$crawler = new \DeGeo\Crawler();

$crawler_data = $crawler->crawl( 'http://degeo.net/' );

echo '<h2>Crawler Data for DeGeo.net</h2>';
echo '<pre>';
print_r( $crawler_data );
echo '</pre>';