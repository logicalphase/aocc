<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link       http://gemservers.com
 * @since      1.0.0
 *
 * @package    Autoptimize_Clear_Cache
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$aocc_option_name = 'aocc_max_cache_size';
 
delete_option( $aocc_option_name );
