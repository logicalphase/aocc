<?php
/**
 * Plugin Name:     Autoptimize Clear Cache
 * Plugin URI:      https://github.com/hyperpress/aocc
 * Description:     Automatically clears Autoptimize cache when cache reaches selected maximum cache file size.
 * Author:          GEMServers Hosting
 * Author URI:      https://gemservers.com/
 * License:         GPL2
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     autoptimize-clear-cache
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * WC requires at least: 4.0.0
 * WC tested up to:      4.9.7
 *
 * @package         Autoptimize_Clear_Cache
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AOCC_VERSION', '1.0.0' );

/**
* Class manages settings, options, and purging of cache
*
* @since   1.0.0
*/

 class AutoptimizeClearCacheSettings {
	private $autoptimize_clear_cache_settings_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'autoptimize_clear_cache_settings_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'autoptimize_clear_cache_settings_page_init' ) );
	}

	public function autoptimize_clear_cache_settings_add_plugin_page() {
		add_options_page(
			'Autoptimize Clear Cache Settings', // page_title
			'Autoptimize Clear Cache Settings', // menu_title
			'manage_options', // capability
			'autoptimize-clear-cache-settings', // menu_slug
			array( $this, 'autoptimize_clear_cache_settings_create_admin_page' ) // function
		);
	}

	public function autoptimize_clear_cache_settings_create_admin_page() {
		$this->autoptimize_clear_cache_settings_options = get_option( 'autoptimize_clear_cache_settings_option_name' ); ?>

		<div class="wrap">
			<h2>Autoptimize Clear Cache Settings</h2>
			<p>Automatically clear your Autoptimize cache when it reaches a selected size you select and save below.</p>
			

			<form method="post" action="options.php">
				<?php
					settings_fields( 'autoptimize_clear_cache_settings_option_group' );
					do_settings_sections( 'autoptimize-clear-cache-settings-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function autoptimize_clear_cache_settings_page_init() {
		register_setting(
			'autoptimize_clear_cache_settings_option_group', // option_group
			'autoptimize_clear_cache_settings_option_name', // option_name
			array( $this, 'autoptimize_clear_cache_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'autoptimize_clear_cache_settings_setting_section', // id
			'Settings', // title
			array( $this, 'autoptimize_clear_cache_settings_section_info' ), // callback
			'autoptimize-clear-cache-settings-admin' // page
		);

		add_settings_field(
			'maximum_autoptimize_cache_file_size_0', // id
			'Maximum Autoptimize cache file size', // title
			array( $this, 'maximum_autoptimize_cache_file_size_0_callback' ), // callback
			'autoptimize-clear-cache-settings-admin', // page
			'autoptimize_clear_cache_settings_setting_section' // section
		);
	}

	public function autoptimize_clear_cache_settings_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['maximum_autoptimize_cache_file_size_0'] ) ) {
			$sanitary_values['maximum_autoptimize_cache_file_size_0'] = $input['maximum_autoptimize_cache_file_size_0'];
		}

		return $sanitary_values;
	}

	public function autoptimize_clear_cache_settings_section_info() {
		
	}

	public function maximum_autoptimize_cache_file_size_0_callback() {
		?> <select name="autoptimize_clear_cache_settings_option_name[maximum_autoptimize_cache_file_size_0]" id="maximum_autoptimize_cache_file_size_0">
			<?php $selected = (isset( $this->autoptimize_clear_cache_settings_options['maximum_autoptimize_cache_file_size_0'] ) && $this->autoptimize_clear_cache_settings_options['maximum_autoptimize_cache_file_size_0'] === '128000') ? 'selected' : '' ; ?>
			<option value="128000" <?php echo $selected; ?>>128 Megabytes</option>
			<?php $selected = (isset( $this->autoptimize_clear_cache_settings_options['maximum_autoptimize_cache_file_size_0'] ) && $this->autoptimize_clear_cache_settings_options['maximum_autoptimize_cache_file_size_0'] === '512000') ? 'selected' : '' ; ?>
			<option value="512000" <?php echo $selected; ?>>512 Megabytes</option>
			<?php $selected = (isset( $this->autoptimize_clear_cache_settings_options['maximum_autoptimize_cache_file_size_0'] ) && $this->autoptimize_clear_cache_settings_options['maximum_autoptimize_cache_file_size_0'] === '764000') ? 'selected' : '' ; ?>
			<option value="764000" <?php echo $selected; ?>>764 Megabytes</option>
			<?php $selected = (isset( $this->autoptimize_clear_cache_settings_options['maximum_autoptimize_cache_file_size_0'] ) && $this->autoptimize_clear_cache_settings_options['maximum_autoptimize_cache_file_size_0'] === '1000000') ? 'selected' : '' ; ?>
			<option value="1000000" <?php echo $selected; ?>>1 Gigabyte</option>
		</select> <?php
  }

}
if ( is_admin() )
	$autoptimize_clear_cache_settings = new AutoptimizeClearCacheSettings();

/* 
 * Retrieve maximum cache size option value with:
 * $autoptimize_clear_cache_settings_options = get_option( 'autoptimize_clear_cache_settings_option_name' ); // Array of All Options
 * $maximum_autoptimize_cache_file_size_0 = $autoptimize_clear_cache_settings_options['maximum_autoptimize_cache_file_size_0']; // Maximum Autoptimize cache file size
 */

 $autoptimize_clear_cache_settings_options = get_option( 'autoptimize_clear_cache_settings_option_name' ); // Array of All Options
 $maximum_autoptimize_cache_file_size = $autoptimize_clear_cache_settings_options['maximum_autoptimize_cache_file_size_0']; // Maximum Autoptimize cache file size
 print "Value is: $maximum_autoptimize_cache_file_size";

 if ( class_exists( 'autoptimizeCache' ) ) {

  $current_autoptimize_cache_stats = autoptimizeCache::stats();
  $current_autoptimize_cache_size = round( $current_autoptimize_cache_stats[1]/1024 ); // Calculate current cache size
  $maximum_autoptimize_cache_size_default = 512000; // Set default to 512 MB if not otherwise saved as option
  
  if ( empty( $maximum_autoptimize_cache_file_size ) ) {
    $max_file_size_result = $maximum_autoptimize_cache_size_default;
  } else {
    $max_file_size_result = $maximum_autoptimize_cache_file_size;
  }
  if ( $current_autoptimize_cache_size > $max_file_size_result ){
    autoptimizeCache::clearall();
    header( "Refresh:0" ); // Refresh the page so autoptimize will rebuild cache files.
  }

 }

?>