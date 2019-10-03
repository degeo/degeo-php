<?php
/**
 * DeGeo\Breadcrumbs_queue
 *
 * @package DeGeo-PHP
 * @since 0.0.2
 * @version 0.0.2
 */
namespace DeGeo;
use \DeGeo\Queue;
/**
 * Breadcrumbs Queue
 *
 * Queue Breadcrumbs to Render at the end of data processing
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Breadcrumbs_queue extends Queue {

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
		 * Label
		 * @var String
		 */
		'label' => '',
		/**
		 * URL
		 * @var String
		 */
		'url' => '',
		/**
		 * Active
		 * @var Boolean
		 */
		'active' => false,
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

} // class