<?php
/*
Plugin Name: TwoSides
Plugin URI: http://themes.tradesouthwest.com/wordpress/plugins/
Description: Display comments in a side by side fashion and divide each side as positive or negative styled.
Version:           1.1.0
Author:            Larry Judd
Author URI:        https://tradesouthwest.com
Stable tag:        trunk
License:           GPLv3
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
*/ /** @since file_version 20230413.110 */
defined( 'ABSPATH' ) or die( 'X' );

if( !defined('TWOSIDES_URL' ) ) { 
     define( 'TWOSIDES_URL', plugin_dir_url(__FILE__) ); }
if( !defined('TWOSIDES_BASE_PATH' ) ) { 
     define( 'TWOSIDES_BASE_PATH', dirname(plugin_basename(__FILE__) ) ); }
if( !defined('TWOSIDES_VER' ) ) { 
     define( 'TWOSIDES_VER', '1.1.0' ); }

/**
 * Get time of activating the plugin
 */
function twosides_debate_plugin_activate()
{
    $format    = get_option('date_format');
    $timestamp = get_the_time();
    $time      = date_i18n($format, $timestamp, true);
    add_option( 'twosides_debate_date_plugin_activated' );
    update_option( 'twosides_debate_date_plugin_activated', $time );
}

/**
 * deactivation settings
 */
function twosides_debate_plugin_deactivate() 
{    
    delete_option( 'twosides_debate_date_plugin_activated' );
        return false;
}

register_activation_hook(__FILE__,   'twosides_debate_plugin_activate');
register_deactivation_hook(__FILE__, 'twosides_debate_plugin_deactivate');
register_uninstall_hook(__FILE__,    'twosides_debate_plugin_uninstall');

/**
 * Add language file.
 * @since 1.0.0
 */
if( function_exists( 'load_plugin_textdomain' ) )
{
    load_plugin_textdomain( 'twosides', false, TWOSIDES_URL . '/languages/');
}

/**
 * Add setup link.
 */
//enqueue or localise scripts 
add_action( 'wp_enqueue_scripts', 'twosides_debate_public_style' );
function twosides_debate_public_style() 
{
    wp_enqueue_style( 'twosides-debate-css',  TWOSIDES_URL
                     . 'library/twosides-debate-css.css', array(), TWOSIDES_VER, false );
    wp_enqueue_script( 'twosides-debate-plugin', plugin_dir_url( __FILE__ ) . 
                       'library/twosides-debate-plugin.js', 
                       array( 'jquery' ), '', true ); 
}

// check for comments theme support
if( !current_theme_supports( 'comments' ) ) 
{ 
    //add_post_type_support( 'post', array( 'comments' ) );
    add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );
}   

/**
 * Include required admin side files.
 *
 * @since 1.0.0
 */
if( is_admin() ) : 
function twosides_debate_enqueue_admin_scripts()
{
    wp_enqueue_style( 'twosides-debate-admin-css',  TWOSIDES_URL
                      . 'library/twosides-debate-admin-css.css', array(), null, false );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'twosides-debate-colors', 
                       plugins_url('library/twosides-debate-colors.js', __FILE__ ), 
                       array( 'wp-color-picker' ), false, true );
    if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
}
    add_action( 'admin_enqueue_scripts', 'twosides_debate_enqueue_admin_scripts' );
endif;

/**
 * Load files needed to run plugin
 *
 * @since 1.0.7
 */
require_once dirname(__FILE__) . '/includes/twosides-debate-admin-settings.php';
require_once dirname(__FILE__) . '/includes/twosides-debate-admin-forms.php';
require_once dirname(__FILE__) . '/includes/twosides-debate-helpers.php';
require_once dirname(__FILE__) . '/includes/twosides-debate-functions.php';
require_once dirname(__FILE__) . '/templates/twosides-debate-comments_templater.php';
require_once dirname(__FILE__) . '/includes/twosides-debate-shortcodes.php';
    // Register shortcodes
    add_action( 'init', 'twosides_debate_register_shortcodes' ); 
    
/**
 * Add/Register plugin shortcodes 
 *
 * @since 1.0.0
 */    
function twosides_debate_register_shortcodes() 
{
    add_shortcode('twosides_form_header', 'twosides_debate_header_form_shortcode' ); 
} 

/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 *
 * @since 1.0.4
 * @return Boolean Only runs when option is activated from this plugin.
 */
$twsdbug = twosides_debate_debug_class();
if ( $twsdbug != 'twshide' ) :  
    remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
    add_action( 'shutdown', function() {
    
        while ( @ob_end_flush() );
} );
endif;  
?>