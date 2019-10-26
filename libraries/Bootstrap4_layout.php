<?php
/**
 * DeGeo\Libraries\Bootstrap4_layout
 *
 * @package DeGeo-PHP
 * @since 0.0.4
 * @version 0.0.4
 */
namespace DeGeo\Libraries;
use \DeGeo\Libraries\Layout;
/**
 * Bootstrap 4 Layout
 *
 * Queue Layouts to Render at the end of data processing
 * Allows for dynamic rendering of Bootstrap columns, rows, and columns
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Bootstrap4_layout extends Layout {

	/**
	 * Containers
	 * Available Containers within the Layout
	 * @var protected Array
	 */
	protected $containers = array(
		'container' => 'container',
		'full' => 'container-fluid'
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
		'xs' => 'col-',
		'sm' => 'col-sm-',
		'md' => 'col-md-',
		'lg' => 'col-lg-',
		'xl' => 'col-xl-'
	);

	/**
	 * Default Size
	 * Default Size for Columns
	 * @var protected Integer
	 */
	protected $default_size = 12;

} // class