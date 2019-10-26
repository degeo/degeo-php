<?php
/**
 * DeGeo\Libraries\Messages_queue
 *
 * @package DeGeo-PHP
 * @since 0.0.2
 * @version 0.0.2
 */
namespace DeGeo\Libraries;
use \DeGeo\Libraries\Queue;
/**
 * Messages Queue
 *
 * Queue Messages to Render at the end of data processing
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Messages_queue extends Queue {

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
		 * Message Type
		 * @var String
		 */
		'type' => '',
		/**
		 * Message Content
		 * @var String
		 */
		'content' => '',
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

	public function add( $type, $content, $position = '' )
	{
		if( empty( $position ) )
			$position = $this->default_position;

		$message = array(
			'type' => $type,
			'content' => $content,
			'position' => $position
		);

		return $this->queue( $message );
	} // function

	public function remove( $position )
	{
		return $this->unqueue( 'position', $position );
	} // function

} // class