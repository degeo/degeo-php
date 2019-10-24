<?php
/**
 * DeGeo\Crawler
 *
 * @package DeGeo-PHP
 * @since 0.0.1
 * @version 0.0.1
 */
namespace DeGeo;
/**
 * Crawler
 *
 * Reads the contents of a web page
 * Identities additional links on the web page
 *
 * @author Jay Fortner <jay@degeo.net>
 */
class Crawler {

	/**
	 * Timeout
	 * Timeout for requests in seconds
	 * @var protected Integer
	 */
	protected $timeout = 30;

	/**
	 * Response Options
	 * List of available parsing options for a response
	 * Acts as default when parsing if parameter isn't provided
	 * @var protected Array
	 */
	protected $response_options = array(
		'information',
		'links',
		'images'
	);

	public function crawl( $url )
	{
		$response = $this->request( $url );

		$response_data = $this->parse_response( $response );

		return $response_data;
	} // function

	public function request( $url )
	{
		$context = stream_context_create( array( 'http' => array( 'timeout' => $this->timeout ) ) );

		$response = file_get_contents( $url, 0, $context );

		if( $response !== false )
			return $response;

		return false;
	} // function

	public function parse_response( $response, $response_options = array() )
	{
		if( empty( $response_options ) )
			$response_options = $this->response_options;

		$response_data = array();

		// @TODO identify page information (title, description, etc.)
		if( in_array( 'information', $response_options ) ):
			$response_data['information'] = $this->response_information( $response );
		endif;

		// @TODO identify links (anchor tags, internal, external)
		if( in_array( 'links', $response_options ) ):
			$response_data['links'] = $this->response_links( $response );
		endif;

		// @TODO identify images (img tags, src, title, alt)
		if( in_array( 'images', $response_options ) ):
			$response_data['images'] = $this->response_images( $response );
		endif;

		return $response_data;
	} // function

	public function response_information( $response )
	{
		$response_information = array(
			//'response' => trim( $response )
		);

		// HTML Title Tag
		preg_match( '/<title>(?<title>.*)<\/title>/m', $response, $matches );

		if( array_key_exists( 'title', $matches ) )
			$response_information['title'] = $matches['title'];

		// Meta Tag Charset
		preg_match( '/<meta charset="(?<charset>.*?)"/', $response, $matches );

		if( array_key_exists( 'charset', $matches ) )
			$response_information['charset'] = $matches['charset'];

		echo '<pre>';
		print_r( $response_information );
		echo '</pre>';

		// Meta Tags
		$total_matches = preg_match_all( '/(<meta.*?>)/m', $response, $matches );

		print_r( $matches );

		if( $total_matches > 0 && array_key_exists( 1, $matches ) ):

			$metatags = array();

			foreach( $matches[1] as $metatag ):
				$metatags[] = htmlentities( trim( $metatag ) );
			endforeach;

			$response_information['metatags'] = $metatags;

		endif;

		echo '<pre>';
		print_r( $response_information );
		echo '</pre>';

		return $response_information;
	} // function

	public function response_links( $response )
	{
		$response_information = array();

		return $response_information;
	} // function

	public function response_images( $response )
	{
		$response_information = array();

		return $response_information;
	} // function

} // class