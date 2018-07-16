<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link       http://gemservers.com
 * @since      1.0.0
 *
 * @package    Autoclear_Autoptimize_Cache
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$aocc_option_name = 'autoclear_autoptimize_cache_settings_option_name';
 
delete_option( $aocc_option_name );
