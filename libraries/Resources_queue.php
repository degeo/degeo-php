<?php
/**
 * DeGeo\Libraries\Resources_queue
 *
 * @package DeGeo-PHP
 * @since 0.0.2
 * @version 0.0.2
 */
namespace DeGeo\Libraries;
use \DeGeo\Libraries\Queue;
/**
 * Resources Queue
 *
 * Queue Resources to Render at the end of data processing.
 * Resources can be rendered in the header or footer of the document.
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Resources_queue extends Queue {

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
		 * Tag
		 * HTML Tag (script or link)
		 * @var String
		 */
		'tag' => '',
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

	public function add( $id, $tag, $position = '' )
	{
		if( empty( $position ) )
			$position = $this->default_position;

		$resource = array(
			'id' => $id,
			'tag' => $tag,
			'position' => $position
		);

		return $this->queue( $resource );
	} // function

	public function remove( $position )
	{
		return $this->unqueue( 'position', $position );
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

		foreach( $this->queue as &$resource ):
			$output .= $resource['tag'];
		endforeach;

		if( $echo_output === TRUE )
			echo $output;

		return $output;
	} // function

} // class