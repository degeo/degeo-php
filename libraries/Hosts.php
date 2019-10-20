<?php
/**
 * DeGeo\Hosts
 *
 * @package DeGeo-PHP
 * @since 0.0.3
 * @version 0.0.5
 */
namespace DeGeo;
/**
 * Hosts
 *
 * Hosts Management Library
 *
 * @author Jay Fortner <jay@degeo.net>
 *
 * Examples:
 * Hosts->add_host( 'default', 'mydomain.com', 'assets' );
 * Hosts->add_host( 'cdn', 'cdn.mydomain.com' );
 * Hosts->add_host( 'server1', 'a.mydomain.com' );
 * Hosts->add_host( 'server2', 'b.mydomain.com' );
 * Hosts->add_host( 'server3', 'c.mydomain.com' );
 * echo "<img src='{Hosts->get_url( 'logo.png' )}' />";
 * echo "<img src='{Hosts->get_url( 'logo.png', 'server1' )}' />";
 * echo "<img src='{Hosts->get_url( 'sprites.png', 'cdn' )}' />";
 * echo "<img src='{Hosts->get_url( 'sprites.png', false, true )}' />";
 *
 */
class Hosts {

	/**
	 * Active Host
	 * @var protected String
	 */
	protected $active_host = 'default';

	/**
	 * Hosts
	 * @var protected Array
	 */
	protected $hosts = array();

	/**
	 * Host Structure
	 * @var protected Array
	 */
	protected $host_structure = array(
		/**
		 * Key
		 * Unique Identifier of Host
		 * used to select Host
		 * @var String
		 */
		'key' => '',
		/**
		 * Domain
		 * URL Domain
		 * @var String
		 */
		'domain' => '',
		/**
		 * Path
		 * Appended to the Domain
		 * @var String
		 */
		'path' => ''
	);

	/**
	 * Construct
	 * @return Void
	 */
	public function __construct()
	{
		$default_host = $this->host_structure;
		$default_host['key'] = $this->active_host;

		$this->hosts[ $this->active_host ] = $default_host;
	} // function

	/**
	 * Set Host
	 * @param String $host - Key of Host
	 * @return Bool
	 */
	public function set_host( $host = 'default' )
	{
		$this->active_host = $host;

		return true;
	} // function

	public function get_hosts()
	{
		return $this->hosts;
	} // function

	/**
	 * Add Host
	 * @param String $key - Unique Identifier of Host
	 * @param String $domain - URL Domain
	 * @param String $path - Path appended to the Domain
	 * @return Bool
	 */
	public function add_host( $key, $domain, $path = '' )
	{
		$domain = str_replace( array( 'http:', 'https:' ), '', rtrim( $domain, '/' ) );

		if( !empty( $path ) ):
			$path = trim( $path, '/' );
		endif;

		$host = array(
			'key' => $key,
			'domain' => $domain,
			'path' => $path
		);

		$this->hosts[$key] = $host;

		return true;
	} // function

	/**
	 * Get URL
	 * @param String $asset_path - Asset Path append to Host Path
	 * @param String $key - Host Key
	 * @param String $use_random_host - True to use a random Host
	 * @return Bool
	 */
	public function get_url( $asset_path, $key = '', $use_random_host = false )
	{
		if( empty( $key ) )
			$key = $this->active_host;

		if( $use_random_host === true ):
			$keys = array_keys( $this->hosts );
			$key = $keys[mt_rand(1, count($keys) - 1)];
			$host = $this->hosts[$key];
		elseif( array_key_exists( $key, $this->hosts ) ):
			$host = $this->hosts[$key];
		else:
			$host = $this->hosts[$this->active_host];
		endif;

		if( !empty( $host['domain'] ) && !empty( $host['path'] ) ):
			$asset_url = "//{$host['domain']}/{$host['path']}/{$asset_path}";
		elseif( !empty( $host['domain'] ) && empty( $host['path'] ) ):
			$asset_url = "//{$host['domain']}/{$asset_path}";
		elseif( empty( $host['domain'] ) && !empty( $host['path'] ) ):
			$asset_url = "/{$host['path']}/{$asset_path}";
		else:
			$asset_url = "/{$asset_path}";
		endif;

		return $asset_url;
	} // function

	/**
	 * Get URL Random
	 * Get a URL from the list of Hosts at Random
	 * @param String $asset_path - Asset Path append to Host Path
	 * @param String $key - Host Key
	 * @return Bool
	 */
	public function get_url_random( $asset_path )
	{
		return $this->get_url( $asset_path, '', true );
	} // function

} // class