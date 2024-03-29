<?php
/**
 * DeGeo\Libraries\Layout_queue
 *
 * @package DeGeo-PHP
 * @since 0.0.1
 * @version 0.0.1
 */
namespace DeGeo\Libraries;
use \DeGeo\Libraries\Queue;
/**
 * Layout Queue
 *
 * Queue Layouts to Render at the end of data processing
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Layout_queue extends Queue {

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
		 * File to be Loaded
		 * @var String
		 */
		'file' => '',
		/**
		 * Data to be Loaded
		 * @var Array
		 */
		'data' => array(),
		/**
		 * Position in the Queue
		 * @var Integer
		 */
		'position' => 9999
	);

	/**
	 * File Identifier
	 * Identifier used when rendering layouts
	 * @var protected String
	 */
	protected $file_identifier = 'file';

	/**
	 * Data Identifier
	 * Identifier used when rendering layouts
	 * @var protected String
	 */
	protected $data_identifier = 'data';

	/**
	 * Position Identifier
	 * Identifier used when rendering layouts
	 * @var protected String
	 */
	protected $position_identifier = 'position';

	/**
	 * Construct
	 * @return Void
	 */
	public function __construct()
	{
		// Ensure the core Data Structure is intact
		parent::__construct();

		// Ensure the Data Identifier is in the Data Structure
		$this->data_structure[ $this->data_identifier ] = '';
	} // function

	public function add( $file, $position = null, $data = array() )
	{
		if( empty( $position ) )
			$position = $this->default_position;

		$layout = array(
			$this->file_identifier => $file,
			$this->data_identifier => $data,
			$this->position_identifier => $position
		);

		return $this->queue( $layout );
	} // function

	public function remove( $position )
	{
		return $this->unqueue( $this->position_identifier, $position );
	} // function

	/**
	 * Render
	 * Renders the Layouts in the Queue
	 * @param Bool $echo_output - Echo's the rendered output
	 * @param Array $data - Data to be loaded for all Layouts
	 * @return String
	 */
	public function render( $data = array(), $echo_output = TRUE )
	{
		$this->_sort_queue();

		// Load the Data for all Layouts
		if( !empty( $data ) )
			extract( $data );

		$output = '';

		foreach( $this->queue as $layout ):
			// Make sure the layout follows the layout structure
			$layout = array_merge( $this->data_structure, $layout );

			try{
				ob_start();
				echo $this->render_layout( $layout );
				$output .= ob_get_clean();
			} catch( \Exception $e ) {
				echo $e->getMessage();
				exit;
			}

		endforeach;

		if( $echo_output === TRUE )
			echo $output;

		return $output;
	} // function

	/**
	 * Render Layout
	 * Renders the Layout Structure
	 *
	 * @DEV This method could be replaced in a child class for custom rendering
	 *
	 * @param Array $layout - Layout Structure to be Rendered
	 * @return Void
	 */
	protected function render_layout( $layout, $data = array() )
	{
		if( empty( $this->file_identifier ) )
			throw new \Exception( 'File Identifier not set in ' . __CLASS__ );

		$data = array_merge( $layout[ $this->data_identifier ], $data );

		// Load the Data for the Layout
		if( !empty( $this->data_identifier ) && !empty( $layout[ $this->data_identifier ] ) )
			extract( $data );

		// Load the File for the Layout
		include( $layout[ $this->file_identifier ] );
	} // function

} // class