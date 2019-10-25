<h1>Queue Library Example</h1>
<?php

// Load the Library
require_once( '../libraries/Queue.php' );

// Instantiate the Library
$example = new \DeGeo\Libraries\Queue();

// Queue data
$example->queue( [ 'id' => 'test1', 'position' => 50 ] );
$example->queue( [ 'id' => 'test2', 'position' => 20 ] );
$example->queue( [ 'id' => 'test3', 'position' => 80 ] );
$example->queue( [ 'id' => 'test4', 'position' => 10 ] );

$queue = $example->get_queue();

echo '<h2>Queue:</h2>';
echo '<pre>';
var_dump( $queue );
echo '</pre>';

$queue = $example->get_queue( $sort = TRUE, $reversed = TRUE );
echo '<h2>Reversed Queue:</h2>';
echo '<pre>';
var_dump( $queue );
echo '</pre>';

// Empty Queue
$example->empty();
$queue = $example->get_queue();

echo '<h2>Empty Queue:</h2>';
echo '<pre>';
var_dump( $queue );
echo '</pre>';

// Queue data
$example->queue( [ 'id' => 'test1' ] );
$example->queue( [ 'id' => 'test2' ] );
$example->queue( [ 'id' => 'test3' ] );
$example->queue( [ 'id' => 'test4' ] );

$queue = $example->get_queue();

echo '<h2>No Position Set Queue:</h2>';
echo '<pre>';
var_dump( $queue );
echo '</pre>';