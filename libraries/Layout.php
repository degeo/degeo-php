<?php
/**
 * DeGeo\Libraries\Layout
 *
 * @package DeGeo-PHP
 * @since 0.0.4
 * @version 0.0.4
 */
namespace DeGeo\Libraries;
use \DeGeo\Libraries\Layout_queue;
/**
 * Layout
 *
 * Queue Layouts to Render at the end of data processing
 * Allows for dynamic rendering of responsive columns, rows, and columns
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Layout extends Layout_queue {

	/**
	 * Containers
	 * Available Containers within the Layout
	 *
	 * [ {container name} => {container css class} ]
	 * Bootstrap 4 Example:
	 * ` $containers = [ 'container' => 'container', 'wrapper' => 'container', ... ]
	 *
	 * @var protected Array
	 */
	protected $containers = array(
		'container' => 'container'
	);

	/**
	 * Container
	 * Selected Container Name
	 * @var protected String
	 */
	protected $container = 'container';

	/**
	 * Row
	 * Selected Row Name
	 * @var protected String
	 */
	protected $row = 'row';

	/**
	 * Columns
	 * Available Columns within the Layout
	 * Values in the array will have a size integer appended
	 *
	 * [ {column name} => {column css class} ]
	 * Bootstrap 4 Example:
	 * ` $columns = [ 'xs' => 'col-', 'sm' => 'col-sm-', ... ]
	 *
	 * @var protected Array
	 */
	protected $columns = array(
		'xs' => 'col-'
	);

	/**
	 * Default Size
	 * Default Size for Columns
	 * @var protected Integer
	 */
	protected $default_size = 12;

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
	 * Set Container
	 * @param String $container - Container string to output
	 * @return Void
	 */
	public function set_container( $container )
	{
		$this->container = $container;
	} // function

	/**
	 * Set Row
	 * @param String $row - Row string to output
	 * @return Void
	 */
	public function set_row( $row )
	{
		$this->row = $row;
	} // function

	/**
	 * Set Columns
	 *
	 * Bootstrap 4 Example:
	 * ` $columns = [ 'xs' => 'col-', 'sm' => 'col-sm-', ... ]
	 *
	 * @param Array $columns - [ {column name} => {column css class} ]
	 * @return Void
	 */
	public function set_columns( $columns )
	{
		$this->columns = $columns;
	}

	/**
	 * Container
	 * Returns the Container string
	 * @return String
	 */
	public function container()
	{
		if( empty( $this->container ) )
			throw new \Exception( __METHOD__ . ' container property of ' . __CLASS__ . ' cannot be empty.' );

		return $this->container;
	} // function

	/**
	 * Row
	 * Returns the Row string
	 * @return String
	 */
	public function row()
	{
		if( empty( $this->row ) )
			throw new \Exception( __METHOD__ . ' row property of ' . __CLASS__ . ' cannot be empty.' );

		return $this->row;
	} // function

	/**
	 * Column
	 * Renders the Column name
	 *
	 * Bootstrap 4 Example:
	 * ` Layout->columns = [ 'xs' => 'col-', 'sm' => 'col-sm-', ... ]
	 * ` Layout->column( 'xs', 12 )
	 * Would Return:
	 * ` col-12
	 *
	 * @param String $key - Key of the Columns array
	 * @param Integer $size - Size of the Column
	 * @return String
	 */
	public function column( $key, $size = '' )
	{
		if( empty( $this->columns ) )
			throw new \Exception( __METHOD__ . ' columns property of ' . __CLASS__ . ' cannot be empty.' );

		if( empty( $size ) ):
			if( empty( $this->default_size ) ):
				throw new \Exception( __METHOD__ . ' default size property of ' . __CLASS__ . ' cannot be empty.' );
			endif;

			$size = $this->default_size;
		endif;

		return $this->columns[ $key ] . $size;
	} // function

} // class