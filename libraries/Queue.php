<?php
/**
 * DeGeo\Queue
 *
 * @package DeGeo-PHP
 * @since 0.0.1
 * @version 0.0.1
 */
namespace DeGeo;
/**
 * Queue
 *
 * Queue Data for later Use
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Queue {

	/**
	 * Queue
	 * @var protected Array
	 */
	protected $queue = array();

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
		 * Position in the Queue
		 * @var Integer
		 */
		'position' => 9999
	);

	/**
	 * Position Identifier
	 * Identifier used when sorting the queue
	 * @var protected String
	 */
	protected $position_identifier = 'position';

	/**
	 * Default Position
	 * Default Position in the Data Structure
	 * @var protected Integer
	 */
	protected $default_position = 9999;

	/**
	 * Construct
	 */
	public function __construct()
	{
		// Ensure the Position Identifier is in the Data Structure
		$this->data_structure[ $this->position_identifier ] = $this->default_position;
	} // function

	/**
	 * Structure
	 * Returns the Layout Structure Array
	 * @return Array
	 */
	public function structure()
	{
		return $this->data_structure;
	} // function

	/**
	 * Queue
	 * Add data to the Queue
	 * @param Array $data - Data to be added to the Queue
	 * @return Void
	 */
	public function queue( $data = array() )
	{
		// Make sure the data follows the data structure
		$data = array_merge( $this->data_structure, $data );

		$this->queue[] = $data;

		$this->_sort_queue();
	} // function

	/**
	 * Remove
	 * Remove data from the Queue
	 * @param String $structure_key - Array Key in Data Structure
	 * @param String $value - Array Value in Data Structure
	 * @return Bool
	 */
	public function unqueue( $structure_key, $value )
	{
		$key_to_remove = array_search( $value, array_column( $this->queue, $structure_key ) );

		unset( $this->queue[ $key_to_remove ] );

		$this->_sort_queue();
	} // function

	/**
	 * Empty
	 * Empty all data in the Queue
	 * @return Void
	 */
	public function empty()
	{
		$this->queue = array();
	} // function

	public function get_queue( $sort = TRUE )
	{
		if( $sort === TRUE )
			$this->_sort_queue();

		return $this->queue;
	} // function

	/**
	 * Sort Queue
	 * Sorts the Queue following the Position identifier
	 * @return Void
	 */
	protected function _sort_queue()
	{
		uasort( $this->queue, array( &$this, '_sort_compare_position_identifier' ) );
	} // function

	/**
	 * Sort Comparison Function
	 * Used by `usort` and `uasort`
	 * @param Array $a
	 * @param Array $b
	 * @return Integer
	 */
	private function _sort_compare_position_identifier( $a, $b )
	{
		if( empty( $this->position_identifier ) ):
			throw new \Exception( 'File Identifier not set in ' . __CLASS__ );
		endif;

		return ( $a[ $this->position_identifier ] < $b[ $this->position_identifier ] ) ? 0 : 1 ;
	} // function

} // class