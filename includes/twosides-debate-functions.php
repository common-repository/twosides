<?php 
/**
 * Functionality
 * @package twosides
 *
 * @since 1.0.4
 */
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' );
/* ******** FILTERS ******** */
// @id F2
add_filter('comment_post_redirect',  'twosides_debate_redirect_after_comment');
// @id F5 
add_filter( 'preprocess_comment',    'twosides_debate_verify_comment_type_data' );

/* ******** ACTIONS ******** */
// @id A1
add_action( 'wp_enqueue_scripts',    'twosides_debate_background_colors_cb' ); 
// @id A7
add_action( 'comment_form_after_fields', 'twosides_debate_verify_comment_meta_data');
// @id A8
add_action( 'comment_post',              'twosides_debate_saving_comment_meta_data');
// @id A9
add_action( 'twosides_debate_comment_form', 'twosides_debate_render_comment_form' );
// @id A10
add_action( 'twosides_debate_before_comment_list', 'twosides_debate_render_before_comment_list' );
// @id A11
add_action( 'twosides_debate_debug_info',          'twosides_debate_render_debug_info' );

/**
 * @id F2
 * Redirect commentor to same page without url parsed
 *
 * @since 1.0.2
 */

function twosides_debate_redirect_after_comment($location)
{
    return $_SERVER["HTTP_REFERER"];
}

/**
 * @id F5
 * Preprocess metadata commentmetadata
 * 
 * @since 1.0.3
 *
 * @param string $commentdata Adds field to valid data when passed to wp-comments-post.php
 */

function twosides_debate_verify_comment_type_data($commentdata )
{
    if ( isset( $_POST['twosides_commtype'] ) ) {
        $commentdata['twosides_commtype'] = $_POST['twosides_commtype'];
    }
    return $commentdata;

}

/**
 * @id A1
 * comment_class() uses the following global variables. 
 * 
 * -$comment_alt
 * -$comment_depth
 * -$comment_thread_alt
 * returns inline-'stylesheet' changes to the HTML layout. 
 */
function twosides_debate_background_colors_cb()
{   
    $options = get_option('twosides_admin'); 

    $def1 = "#aafaca";
    $twosides_color_1      = $options['twosides_posibkgd'];
    if( $twosides_color_1  == '' ) $twosides_color_1   = esc_attr($def1);

    $def2 = "#faaa99";
    $twosides_color_2      = $options['twosides_negabkgd'];
    if( $twosides_color_2  == '' ) $twosides_color_2   = esc_attr($def2);  
    
    $def6 = '#f8f8f8';  
    $twosides_negabord      = $options['twosides_negabord'];
    if( $twosides_negabord  == '' ) $twosides_negabord = esc_attr($def6);  
    
    $def7 = '#ffffff';  
    $twosides_posibord      = $options['twosides_posibord'];
    if( $twosides_posibord  == '' ) $twosides_posibord = esc_attr($def7); 
    
    $twosides_submits       = $options['twosides_submits'];
    if( $twosides_submits   == '' ) $twosides_submits = 'currentColor';

    $def8 = 'block';   //flex works well too  
    $twosides_field_url     = (empty($options['twosides_field_url'])) ? 0 
                                    : $options['twosides_field_url'];
    if( $twosides_field_url == '0' ) { $twosides_field_url = esc_attr($def8); } 
                                else { $twosides_field_url = 'none'; }
    //flex works well too  
    $twosides_field_says    = (empty($options['twosides_field_says'])) 
                              ? '' : $options['twosides_field_says'];
    if( $twosides_field_says != '1' ) { $twosides_field_says = esc_attr($def8); } 
                                else { $twosides_field_says  = 'none'; }
    // def = def8
    $twosides_metadata      = (empty($options['twosides_checkbox_metadata']))
                               ? 0 : $options['twosides_checkbox_metadata'];
    if( $twosides_metadata  == '0' ) { $twosides_metadata = esc_attr($def8); } 
                                 else { $twosides_metadata = 'none'; }
    // def = def8
    $twosides_twscounter     = (empty($options['twosides_checkbox_twscounter']))
                                ? 0 : $options['twosides_checkbox_twscounter'];
    if( $twosides_twscounter == '0' ) { $twosides_twscounter = esc_attr($def8); } 
                                 else { $twosides_twscounter = 'none'; }
    $def9 = "0";
    $twosides_padboth       = $options['twosides_padboth'];
    if( $twosides_padboth   == '' ) $twosides_padboth = esc_attr($def9);

    $twosides_maxwidth      = (empty($options['twosides_maxwidth'])) 
                              ? esc_attr('915') : $options['twosides_maxwidth'];
    $twosides_addcss        = (empty($options['twosides_addcss'] )) 
                              ? '' : $options['twosides_addcss']; 
    $htm = ''; 
    $htm .= 
    '.prohead-count,.comment-list.comments-positive .comment,#actionPositive{
background-color: '. esc_attr($twosides_color_1) .';border:1px solid '. esc_attr($twosides_posibord) .';
margin-bottom: 1%;}#actionPositive{color:'. esc_attr($twosides_submits) .';}
.conhead-count,.comment-list.comments-negative .comment, #actionNegative{
background-color: '. esc_attr($twosides_color_2) .';border:1px solid '. esc_attr($twosides_negabord) .';
margin-bottom: 1%;}#actionNegative{color:'. $twosides_submits .';}
.comment-list.comments-positive .comment,.comment-list.comments-negative .comment{
padding: '. absint($twosides_padboth).'px; list-style: none;}
.comment-meta .says {display: '. esc_attr($twosides_field_says) .';}.comment-metadata{display:'. esc_attr($twosides_metadata) .';}
p.comment-form-url{display:' . esc_attr($twosides_field_url) .';}
legend p.twosides-conhead, legend p.twosides-prohead{display:'. esc_attr($twosides_twscounter) .';}
#comments.comments-area.twosides{max-width:'. esc_attr($twosides_maxwidth) .'px;}';
    $htm .= stripslashes( $twosides_addcss );

    ob_start();     
    echo $htm; 
    $css = ob_get_clean();

        wp_register_style( 'twosides-debate-entry-set', false );
        wp_enqueue_style(   'twosides-debate-entry-set' );
        wp_add_inline_style( 'twosides-debate-entry-set', strip_tags($css) );
}

/** @id A7
 * Find twosides-debate type to add to form
 * 
 * @since 1.0.3
 * 
 */

function twosides_debate_verify_comment_meta_data()
{
    $twosides_commtype = '';
    $twosides_commtype = twosides_debate_get_comment_types();
    ?>
    <input id="twosides_commtype" type="hidden" name="twosides_commtype" 
           value="<?php echo esc_attr($twosides_commtype); ?>"/> 
    <?php 
}

/**
 * Establish param $ctype
 *
 * @since 1.0.3
 */
function twosides_debate_get_comment_types()
{
    $twosides_commtype = '';
    if( isset( $_POST['twosides_positive'] ) ) { 
        $twosides_commtype = wp_filter_nohtml_kses($_POST['twosides_positive']);
    } 
    elseif( isset( $_POST['twosides_negative'] ) ) {
        $twosides_commtype = wp_filter_nohtml_kses($_POST['twosides_negative']);
    }

        return $twosides_commtype;
} 
/** 
 * @id A8
 * Save metadata commentmetadata of comment form
 * 
 * @since 1.0.3
 * 
 * @return string $commtype Plain text value.
 */
function twosides_debate_saving_comment_meta_data($comment_id)
{
    if ( ( isset( $_POST['twosides_commtype'] ) ) 
      && ( '' !== $_POST['twosides_commtype'] ) ) 
    
        $commtype = wp_filter_nohtml_kses($_POST['twosides_commtype']);
        add_comment_meta( $comment_id, 'twosides_commtype', 
                        sanitize_text_field($commtype) );
}

/** 
 * @id A9
 * Comment form custom field renderer
 * Required by all comment forms to include twosides_commtype into respond form.
 *
 * @since 1.0.5
 *
 * @return comment_form w/ $arguments
 */
function twosides_debate_render_comment_form($args=[])
{
    $ctype = twosides_debate_get_comment_types();
    $ctext = '';
    $options               = get_option('twosides_admin'); 
    $twosides_positxt      = $options['twosides_positxt'];
    if( $twosides_positxt == '' ) $twosides_positxt = " + ";  
    $twosides_negatxt      = $options['twosides_negatxt'];
    if( $twosides_negatxt == '' ) $twosides_negatxt = " - "; 
    
    if( 'twosides_positive' == $ctype ) $ctext = esc_html($twosides_positxt);
    if( 'twosides_negative' == $ctype ) $ctext = esc_html($twosides_negatxt);
    
    $args = array( 
            'comment_notes_after' => '<input id="twosides_commtype" type="hidden" 
                            name="twosides_commtype" value="'.esc_attr($ctype).'"/>
                            <label for="twosides_commtype">
                            <span id="commtype_' .esc_attr($ctype) . '">( ' 
                            .esc_html__($ctext) . ' )</span></label>'
            );

    return comment_form($args);
}

/** 
 * @id A10
 * Comment form custom field renderer
 * Required by all comment forms to include twosides header form.
 *
 * @since 1.0.7
 *
 * @return HTML before comment_list
 */
function twosides_debate_render_before_comment_list()
{   
    echo do_shortcode('[twosides_form_header]');
}

/** 
 * @id A11
 * Comment form custom field renderer
 * Required by all comment forms to include twosides header form.
 *
 * @since 1.0.7
 *
 * @return HTML before comment_list
 */
function twosides_debate_render_debug_info()
{
    $dbug = twosides_debate_debug_class(); 
    ?>
    <p class="<?php echo esc_attr( $dbug ); ?>">
    <?php esc_html_e( 'Viewing comments template from TwoSides plugin.', 'twosides-debate' ); ?> 
    </p>
    <?php
}
/**
 * @id A12
 * grab state of avatar height option
 *
 * @since 1.0.7
 * @return absint
 */
function twosides_debate_avatar_height_value()
{
    $options = get_option('twosides_admin'); 
    $avsz = (empty( $options['twosides_avatar_height'] ) ) 
          ? "38" : $options['twosides_avatar_height']; 
        
        return $avsz;       
}                
/**
 * grab state of debug option
 *
 * @since 1.0.2
 * @return Boolean
 */
function twosides_debate_debug_class()
{
    $tws_dbug   = 'twshide';
    $options    = get_option('twosides_admin'); 
    $listbox    = 0; 
    $dbugs      = (empty($options['twosides_debug'] )) 
                  ? 0 :  $options['twosides_debug'];
    
    if( $listbox != 1 ) :      // commlist not checkd - reserved
	  if( $dbugs  == 0 ) { 
	    $tws_dbug = 'twshide';   // dbug not checkd
        } else {
        $tws_dbug = 'twsshow'; // dbug checkd
    }
    endif;
        return $tws_dbug;
} 

/**
 * grab state of form usage option
 *
 * @since 1.0.2
 * @return Boolean Do, Do Not use theme comment form.
 */
function twosides_debate_commform_class()
{
    $tws_plgnform = false;
    $options      = get_option('twosides_admin'); 
    $commform     = (empty($options['twosides_checkbox_commform'] )) 
                    ? 0 :  $options['twosides_checkbox_commform'];
    if( $commform    == '0' ) { 
	    $tws_plgnform = false;   // not checkd
    } 
        else {
            $tws_plgnform = true; // checkd
    }
        return $tws_plgnform;
} 
/**
 * grab state of commlist option
 *
 * @since 1.0.4
 * @return Boolean
 */
function twosides_debate_commlist_class()
{
    $listbx     = false;
    $options    = get_option('twosides_admin'); 
    $listbox    = ( empty( $options['twosides_checkbox_commlists'] ) ) 
                  ? 0 :  $options['twosides_checkbox_commlists']; 
    
    if( $listbox == 0 ) {      // commlist not checkd
	    $listbx = false;   // cmlist not checkd
    } else {
        $listbx = true; // cmlist checkd
    }
        return wp_unslash($listbx);
} 