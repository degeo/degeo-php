<h1>Messages Queue Library Example</h1>
<?php

// Load the Library
require_once( '../libraries/Queue.php' );
require_once( '../libraries/Messages_queue.php' );

// Instantiate the Library
$example = new \DeGeo\Messages_queue();

// Queue data
$example->queue( [ 'id' => 'test1', 'type' => 'warning', 'content' => 'Danger! Danger!', 'position' => 50 ] );
$example->queue( [ 'id' => 'test2', 'type' => 'error', 'content' => 'Noooooo!', 'position' => 20 ] );
$example->queue( [ 'id' => 'test3', 'type' => 'success', 'content' => 'Hazzah!', 'position' => 80 ] );
$example->queue( [ 'id' => 'test4', 'type' => 'info', 'content' => 'Chess is fun.', 'position' => 10 ] );

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
$example->queue( [ 'id' => 'test1', 'type' => 'warning', 'content' => 'Danger! Danger!' ] );
$example->queue( [ 'id' => 'test2', 'type' => 'error', 'content' => 'Noooooo!' ] );
$example->queue( [ 'id' => 'test3', 'type' => 'success', 'content' => 'Hazzah!' ] );
$example->queue( [ 'id' => 'test4', 'type' => 'info', 'content' => 'Chess is fun.' ] );

$queue = $example->get_queue();

echo '<h2>No Position Set Queue:</h2>';
echo '<pre>';
var_dump( $queue );
echo '</pre>';