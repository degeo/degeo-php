<?php
/**
 * DeGeo\Libraries\Codeigniter4_layout
 *
 * @package DeGeo-PHP
 * @since 0.0.6
 * @version 0.0.6
 */
namespace DeGeo\Libraries;
use \DeGeo\Libraries\Bootstrap4_layout;
/**
 * CodeIgniter 4 Layout
 *
 * Queue Layouts to Render at the end of data processing
 * Allows for dynamic rendering of Bootstrap columns, rows, and columns
 * Renders layouts using the CodeIgniter 4 view functions
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Codeigniter4_layout extends Bootstrap4_layout {

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
		'view' => '',
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
	protected $file_identifier = 'view';

	/**
	 * Render
	 * Renders the Layouts in the Queue
	 * @param Bool $echo_output - Echo's the rendered output
	 * @param Array $data - Data to be loaded for all Layouts
	 * @return String
	 */
	public function render( $data = array(), $echo_output = FALSE )
	{
		if( empty( $this->queue ) )
			return '';

		$this->_sort_queue();

		$output = '';

		foreach( $this->queue as $layout ):
			// Make sure the layout follows the layout structure
			$layout = array_merge( $this->data_structure, $layout );

			try{
				$output .= $this->render_layout( $layout, $data );
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

		// Load the File for the Layout
		return view( $layout[ $this->file_identifier ],  $data );
	} // function

} // class