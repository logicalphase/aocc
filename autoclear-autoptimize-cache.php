<?php
/**
 * Plugin Name:     Autoclear Autoptimize Cache
 * Plugin URI:      https://github.com/hyperpress/aocc
 * Description:     A companion plugin for Autoptimize that automatically clears cache if it grows larger then selected size.
 * Author:          Theme Surgeons
 * Author URI:      https://themesurgeons.com/
 * License:         GPL2
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     autoclear-autoptimize-cache
 * Domain Path:     /languages/
 * Version:         1.0.0
 *
 * WC requires: 	>=4.0.0
 * WC tested to: 	4.9.7
 *
 * @package			Autoclear_Autoptimize_Cache
 */

 /**
 * If this file is called directly, abort.
 */ 
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 */
define( 'AOCC_VERSION', '1.0.0' );

/**
* Class manages settings, options, and purging of cache
*
* @since   1.0.0
*/
class AutoclearAutoptimizeCache {

	private $autoclear_autoptimize_cache_settings_options;
	
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'autoclear_autoptimize_cache_settings_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'autoclear_autoptimize_cache_settings_page_init' ) );
		add_action( 'admin_info', array( $this, 'autoclear_autoptimize_cache_settings_section_info' ) );
		add_action( 'plugins_loaded', array( $this, 'autoclear_autoptimize_cache_load_text_domain' ) );
	}

	/**
	* Class manages settings, options, and purging of cache
	*
	* @since   1.0.0
	*/
	public function autoclear_autoptimize_cache_settings_add_plugin_page() {
		add_options_page(
			'Autoclear Autoptimize Cache Settings', // page_title
			'Autoptimize Cache Settings', // menu_title
			'manage_options', // capability
			'autoclear-autoptimize-cache-settings', // menu_slug
			array( $this, 'autoclear_autoptimize_cache_settings_create_admin_page' ) // function
		);
	}

	/**
	* Function creates the settings admin page.
	*
	* @since   1.0.0
	*/
	public function autoclear_autoptimize_cache_settings_create_admin_page() {
		if ( class_exists( 'autoptimizeCache' ) ) {
			$this->autoclear_autoptimize_cache_settings_options = get_option( 'autoclear_autoptimize_cache_settings_option_name' ); ?>
				<div class="wrap">
					<h2><?php _e('Autoclear Autoptimize Cache Settings', 'autoclear-autoptimize-cache' );?></h2>
					<p><?php _e('Automatically clears Autoptimize cache if it exceeds the value you select.', 'autoclear-autoptimize-cache' ); ?></p>

					<form method="post" action="options.php">
					<?php
							settings_fields( 'autoclear_autoptimize_cache_settings_option_group' );
							do_settings_sections( 'autoclear-autoptimize-cache-settings-admin' );
							submit_button();
						?>
					</form>
				</div>
			<?php
		} else {
			echo '<div class="notice notice-error"><p>';
			_e( 'Oh no! We can\'t find Autoptimize. Please install the Autoptimize plugin before trying to use this one.', 'autoclear-autoptimize-cache' );
			echo '</p></div>';
		}
	}

	/**
	* Function load textdomain for localization.
	*
	* @since   1.0.0
	*/	
	public function autoclear_autoptimize_cache_load_text_domain() {
    	load_plugin_textdomain( 'autoclear_autoptimize_cache', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	* Function initializes settings page.
	*
	* @since   1.0.0
	*/
	public function autoclear_autoptimize_cache_settings_page_init() {
		register_setting(
			'autoclear_autoptimize_cache_settings_option_group', // option_group
			'autoclear_autoptimize_cache_settings_option_name', // option_name
			array( $this, 'autoclear_autoptimize_cache_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'autoclear_autoptimize_cache_settings_setting_section', // id
			'Settings', // title
			array( $this, 'autoclear_autoptimize_cache_settings_section_info' ), // callback
			'autoclear-autoptimize-cache-settings-admin' // page
		);

		add_settings_field(
			'maximum_autoptimize_cache_file_size_0', // id
			'Maximum cache file size', // title
			array( $this, 'maximum_autoptimize_cache_file_size_0_callback' ), // callback
			'autoclear-autoptimize-cache-settings-admin', // page
			'autoclear_autoptimize_cache_settings_setting_section' // section
		);
	}

	/**
	* Function sanitizes input.
	*
	* @since   1.0.0
	*/
	public function autoclear_autoptimize_cache_settings_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['maximum_autoptimize_cache_file_size_0'] ) ) {
			$sanitary_values['maximum_autoptimize_cache_file_size_0'] = $input['maximum_autoptimize_cache_file_size_0'];
		}

		return $sanitary_values;
	}

	/**
	* Function creates our maximum cache options for the select field. Mileage may vary.
	*
	* 128 MB for small blogging site on shared hosting
	* 512 MB for sites running complex themes and plugins on shared or small VPS
	* 768 MB for sites running complex themes and plugins, e-commerce, memberships on med VPS
	* 1 GB for large sites running complex themes, plugins, e-commerce, memberships on med to large VPS
	*
	* @since   1.0.0
	*/
	public function maximum_autoptimize_cache_file_size_0_callback() {
		?> 
			<select name="autoclear_autoptimize_cache_settings_option_name[maximum_autoptimize_cache_file_size_0]" id="maximum_autoptimize_cache_file_size_0">
				<?php $selected = (isset( $this->autoclear_autoptimize_cache_settings_options['maximum_autoptimize_cache_file_size_0'] ) && $this->autoclear_autoptimize_cache_settings_options['maximum_autoptimize_cache_file_size_0'] === '128') ? 'selected' : '' ; ?>
				<option value="128" <?php echo $selected; ?>>128 Megabytes</option>
				<?php $selected = (isset( $this->autoclear_autoptimize_cache_settings_options['maximum_autoptimize_cache_file_size_0'] ) && $this->autoclear_autoptimize_cache_settings_options['maximum_autoptimize_cache_file_size_0'] === '512') ? 'selected' : '' ; ?>
				<option value="512" <?php echo $selected; ?>>512 Megabytes</option>
				<?php $selected = (isset( $this->autoclear_autoptimize_cache_settings_options['maximum_autoptimize_cache_file_size_0'] ) && $this->autoclear_autoptimize_cache_settings_options['maximum_autoptimize_cache_file_size_0'] === '764') ? 'selected' : '' ; ?>
				<option value="764" <?php echo $selected; ?>>764 Megabytes</option>
				<?php $selected = (isset( $this->autoclear_autoptimize_cache_settings_options['maximum_autoptimize_cache_file_size_0'] ) && $this->autoclear_autoptimize_cache_settings_options['maximum_autoptimize_cache_file_size_0'] === '1000') ? 'selected' : '' ; ?>
				<option value="1000" <?php echo $selected; ?>>1 Gigabyte</option>
			</select> 
		<?php
	}

	/**
	* Function returns autoptimizeCache stats.
	*
	* Calculates and displays current total Autoptimize cache size and maximum allowable cache size and displays result.
	*
	* @since   1.0.0
	*/
	public function autoclear_autoptimize_cache_settings_section_info() {
		// Retrieve current cache size value
		$autoclear_autoptimize_cache_stats = autoptimizeCache::stats();
		$autoclear_autoptimize_cache_size = round( $autoclear_autoptimize_cache_stats[1]/1024/1024 ); // Calculate current cache size
		//echo '<p><strong>Current cache size:</strong> $current_autoptimize_cache_size MB</p>', 'autoclear-autoptimize-cache';
		//echo '<pre>'; print_r( _get_cron_array() ); echo '</pre>';
		echo '<p><strong>';
		printf( 
			__( 'Current cache size is %s MB', 'autoclear-autoptimize-cache' ),
			$autoclear_autoptimize_cache_size
		);
		echo '</strong></p>';

		// Retrieve maximum cache size option value
		$autoclear_autoptimize_cache_settings_options = get_option( 'autoclear_autoptimize_cache_settings_option_name' ); // Array of All Options
		$autoclear_autoptimize_cache_file_size_0 = $autoclear_autoptimize_cache_settings_options['maximum_autoptimize_cache_file_size_0']; // Maximum Autoptimize cache file size
		$max_cache_setting = $autoclear_autoptimize_cache_file_size_0;

		echo '<p><strong>';
		printf( 
			__( 'Current maximum cache setting is %s MB', 'autoclear-autoptimize-cache' ),
			$max_cache_setting
		);
		echo '</strong></p>';			
	}
}

/**
* Must have administrator role privileges to access settings.
*
* @since   1.0.0
*/
if ( is_admin() )
	$autoclear_autoptimize_cache_settings = new AutoclearAutoptimizeCache();


/**
* Function compares current autoptimize cache folder total cache size.
* If the size is greater than the saved maximum cache option value it purges cache.
* Added a quick refresh header to ensure that autoptimize initilizes new cache build.
*
* @since   1.0.0
*/
add_action( 'init', 'autoclear_autoptimize_cache' );
function autoclear_autoptimize_cache() {
	if ( class_exists( 'autoptimizeCache' ) ) {
		// Retrieve current cache size value
		$current_autoptimize_cache_stats = autoptimizeCache::stats();
		$current_autoptimize_cache_size = round( $current_autoptimize_cache_stats[1]/1024/1024 ); // Calculate current cache size
		// Retrieve maximum cache size option value
		$autoclear_autoptimize_cache_settings_options = get_option( 'autoclear_autoptimize_cache_settings_option_name' ); // Array of All Options
		$maximum_autoptimize_cache_file_size_0 = $autoclear_autoptimize_cache_settings_options['maximum_autoptimize_cache_file_size_0']; // Maximum Autoptimize cache file size
		$max_cache_setting = $maximum_autoptimize_cache_file_size_0;

		// Check to see if autoptimize plugin installed and fires if conditions met.
			
		if ( $current_autoptimize_cache_size > $maximum_autoptimize_cache_file_size_0 ) {
			autoptimizeCache::clearall();
			header("Refresh:0"); # Refresh the page so that autoptimize can create new cache files and it does breaks the page after clearall.
		}
	}
}