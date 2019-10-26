<?php
/**
 * DeGeo\Objects\Document
 *
 * @package DeGeo-PHP
 * @since 0.0.6
 * @version 0.0.6
 */
namespace DeGeo\Objects;
/**
 * Document
 *
 * Document structure for pages
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Document {

	/**
	 * Title
	 * Document Title
	 * @var protected String
	 */
	protected $title;

	/**
	 * Description
	 * Document Description
	 * @var protected String
	 */
	protected $description;

	/**
	 * Attributes
	 * Document Attributes
	 * @var protected Array
	 */
	protected $attributes = array();

	public function __construct( $title = '', $description = '', $attributes = array() )
	{
		if( !empty( $title ) )
			$this->title = $title;

		if( !empty( $description ) )
			$this->description = $description;

		if( !is_array( $attributes ) )
			throw new \Exception( 'Invalid parameter type for $attributes in ' . __METHOD__ );

		if( !empty( $attributes ) )
			$this->attributes = $attributes;

		return $this;
	} // function

	/**
	 * Title
	 * Set and Get the Document Title
	 *
	 * @param String
	 * @return String
	 */
	public function title( $title = '' )
	{
		if( !empty( $title ) )
			$this->title = $title;

		return $this->title;
	} // function

	/**
	 * Description
	 * Set and Get the Document Description
	 *
	 * @param String
	 * @return String
	 */
	public function description( $description = '' )
	{
		if( !empty( $description ) )
			$this->description = $description;

		return $this->description;
	} // function

	/**
	 * Attributes
	 * Set and Get the Document Attributes
	 *
	 * @param Array
	 * @return Array
	 */
	public function attributes( $attributes = array() )
	{
		if( !empty( $attributes ) )
			$this->attributes = $attributes;

		return $this->attributes;
	} // function

} // class