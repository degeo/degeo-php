<?php
/**
 * DeGeo\Metatags_queue
 *
 * @package DeGeo-PHP
 * @since 0.0.2
 * @version 0.0.2
 */
namespace DeGeo;
use \DeGeo\Queue;
/**
 * Metatags Queue
 *
 * Queue Metatags to Render at the end of data processing
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Metatags_queue extends Queue {

	/**
	 * Data Structure
	 * Data added to the Queue will conform to this structure
	 * @var protected Array
	 */
	protected $data_structure = array(
		/**
		 * Identifier
		 * @var String
		 */
		'id' => '',
		/**
		 * Metatag
		 * @var String
		 */
		'metatag' => '',
		/**
		 * Position in the Queue
		 * @var Integer
		 */
		'position' => 9999
	);

	/**
	 * Construct
	 * @return Void
	 */
	public function __construct()
	{
		// Ensure the core Data Structure is intact
		parent::__construct();
	} // function

	/**
	 * Render
	 * Renders the Layouts in the Queue
	 * @param Bool $echo_output - Echo's the rendered output
	 * @return String
	 */
	public function render( $echo_output = TRUE )
	{
		$output = '';

		foreach( $this->queue as &$metatag ):
			$output .= $metatag;
		endforeach;

		if( $echo_output === TRUE )
			echo $output;

		return $output;
	} // function

} // class