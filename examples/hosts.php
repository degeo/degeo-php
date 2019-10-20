<h1>Hosts Library Example</h1>
<?php

// Load the Library
require_once( '../libraries/Hosts.php' );

// Instantiate Library
$hosts = new \DeGeo\Hosts();

// Add Hosts
$hosts->add_host( 'localhost', 'localhost', 'assets' );
$hosts->add_host( 'cdn', 'cdn.localhost' );
$hosts->add_host( 'server1', 'a.localhost' );
$hosts->add_host( 'server2', 'b.localhost' );
$hosts->add_host( 'server3', 'c.localhost' );

echo '<h2>Hosts List</h2>';
$host_list = $hosts->get_hosts();
echo '<pre>';
var_dump($host_list);
echo '</pre>';

echo '<h2>Default Host</h2>';
echo $hosts->get_url( 'logo.png' );

echo '<h2>Alternative Host</h2>';
echo $hosts->get_url( 'logo.png', 'cdn' );

echo '<h2>Random Host</h2>';
echo $hosts->get_url_random( 'logo.png' );