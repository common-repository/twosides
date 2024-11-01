<?php
/*
@since ver: 1.1.0
Author: Tradesouthwest
Author URI: http://tradesouthwest.com
@package twosides
@subpackage includes/twosides-debate-admin-settings
*/
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' ); 

    add_action( 'admin_menu', 'twosides_debate_add_options_page' );  // A1
    add_action( 'admin_init', 'twosides_debate_register_admin_options' ); // A2
     
/** A1
 * Add an options page under the Settings submenu
 * $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position
 * @since  1.0.0
 */
function twosides_debate_add_options_page() 
{
    add_menu_page(
        __( 'Twosides Debate Settings', 'twosides-debate' ),
        __( 'TwoSides Debate', 'twosides-debate' ),
        'manage_options',
        'twosides-debate',
        'twosides_debate_options_page',
        'dashicons-admin-comments',
        46 
    );
}
/** A2
 * register a new sections and fields in the "twosides-debate admin" page
 * $option_group, $option_name
 */
function twosides_debate_register_admin_options() 
{
    register_setting( 'twosides_admin', 'twosides_admin' ); //options pg
    register_setting( 'twosides_docs', 'twosides_docs' ); //listings pg
    
/**
 * listings section
 */        
    add_settings_section(
        'twosides_admin_section',
        '',
        'twosides_debate_admin_section_cb',
        'twosides_admin'
    ); 
    //settings 
    add_settings_field(
        'twosides_posibkgd',
        __('Background color for Positive comments', 'twosides-debate'),
        'twosides_debate_posibkgd_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_negabkgd',
        __( 'Background color for Negative comments', 'twosides-debate' ),
        'twosides_debate_negabkgd_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_posibord',
        __('Border color for Positive comments', 'twosides-debate'),
        'twosides_debate_posibord_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_negabord',
        __( 'Border color for Negative comments', 'twosides-debate' ),
        'twosides_debate_negabord_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_submits',
        __( 'Color of Submit Buttons Text', 'twosides-debate' ),
        'twosides_debate_submits_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_posiheader',
        __('Header for Positive side', 'twosides-debate'),
        'twosides_debate_posiheader_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_negaheader',
        __( 'Header for Negative side', 'twosides-debate' ),
        'twosides_debate_negaheader_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_positxt',
        __('Button text for Positive submit', 'twosides-debate'),
        'twosides_debate_positxt_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_negatxt',
        __( 'Button text for Negative submit', 'twosides-debate' ),
        'twosides_debate_negatxt_cb',
        'twosides_admin',
        'twosides_admin_section'
    ); 
    add_settings_field(
        'twosides_checkbox_twscounter',
        __('Show/Hide Two Sides Counter', 'onlist'),
        'twosides_debate_checkbox_twscounter_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_field_url',
        __('Remove Webiste field', 'twosides-debate'),
        'twosides_debate_field_url_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_checkbox_metadata',
        __('Show/Hide Comments Meta', 'onlist'),
        'twosides_debate_checkbox_metadata_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_field_says',
        __('Remove says wording', 'twosides-debate'),
        'twosides_debate_field_says_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_avatar_height',
        __('Height of Avatar in Comments', 'twosides-debate'),
        'twosides_debate_avatar_height_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_padboth',
        __( 'Padding in comments boxes', 'twosides-debate' ),
        'twosides_debate_padboth_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_maxwidth',
        __( 'Width of comment area', 'twosides-debate' ),
        'twosides_debate_maxwidth_cb',
        'twosides_admin',
        'twosides_admin_section'
    ); 
    add_settings_field(
        'twosides_addhtml',
        __('Content Above Buttons', 'twosides-debate'),
        'twosides_debate_addhtml_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_debate_addcss',
        __('Additional CSS', 'twosides-debate'),
        'twosides_debate_addcss_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_checkbox_commlists',
        __('Use Theme Template for Listing Comments', 'onlist'),
        'twosides_debate_checkbox_commlists_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    add_settings_field(
        'twosides_debug',
        __('Debug Mode', 'twosides-debate'),
        'twosides_debate_debug_cb',
        'twosides_admin',
        'twosides_admin_section'
    );
    
    
/**
 * instructions section
 */        
    add_settings_section(
        'twosides_docs_section',
        __( 'Twosides Documentation and Help', 'twosides-debate' ),
        'twosides_debate_docs_section_cb',
        'twosides_docs'
    ); 
    //docs settings fields
    add_settings_field(
        'twosides_info',
        __('Information', 'twosides-debate'),
        'twosides_debate_docs_cb',
        'twosides_docs',
        'twosides_docs_section'
    );
   
}


// admin section content cb
function twosides_debate_admin_section_cb()
{ 
print( '<h3><span class="dashicons dashicons-paperclip"></span> ' );
esc_html_e( ' Set colors and options', 'twosides-debate' ); print( '</h3>' );  
}
 
// instructions docs section content cb
function twosides_debate_docs_section_cb()
{  
    $imgurl = TWOSIDES_URL . 'library/imgs/icon-128x128.png';
    print( '<h3><span class="dashicons dashicons-paperclip"></span> ' );
    esc_html_e( ' Instructions and Tips', 'twosides-debate' ); print( '</h3>' );

    $twosides_date = get_option( 'twosides_debate_date_plugin_activated' ); 
    echo '<p><img src="' . esc_url($imgurl) . '" alt="logo" height="50"/>' 
    . esc_html__( 'This plugin last activated on: ', 'twosides-debate' ) 
    . '<code>'. esc_html($twosides_date) .'</code> Version '
    . TWOSIDES_VER . '</p>';
}
        
//render admin page
function twosides_debate_options_page() 
{
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) return;
    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url

    // show error/update messages
    //settings_errors( 'twosides_messages' );
    $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'twosides_admin';
    ?>
    <div class="wrap wrap-twosides-debate-admin">
    
    <h1><span id="twosidesAdmin" class="dashicons dashicons-comments"></span> 
    <?php echo esc_html( get_admin_page_title() ); ?></h1>
    
    <h2 class="nav-tab-wrapper">
    <a href="?page=twosides-debate&tab=twosides_admin" 
       class="nav-tab <?php echo $active_tab == 'twosides_admin' ? 
       'nav-tab-active' : ''; ?>">
       <?php esc_html_e( 'Options', 'twosides-debate' ); ?></a>
    <a href="?page=twosides-debate&tab=twosides_docs" 
       class="nav-tab <?php echo $active_tab == 'twosides_docs' ? 
       'nav-tab-active' : ''; ?>">
       <?php esc_html_e( 'Twosides Documentation', 'twosides-debate' ); ?></a></h2>
       
       <form action="options.php" method="post">
    <?php
    if( $active_tab == 'twosides_admin' ) { 
        settings_fields( 'twosides_admin' );
        do_settings_sections( 'twosides_admin' ); 
    } 
    else {
        settings_fields( 'twosides_docs' );
        do_settings_sections( 'twosides_docs' );
    } 
     submit_button( 'Save Settings' ); ?>
    </form>
    
    </div>
<?php
} 
