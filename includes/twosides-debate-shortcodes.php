<?php 
/**
* @package twosides
*/
defined( 'ABSPATH' ) or die( 'X' );
// F1 deprecated for do_shortcode in comments @since 1.1.0
//add_filter( 'the_content', 'twosides_debate_shortcode_autoto_post' );

/**
 * @return comment count
 * @param string $comment_type Comment type, either user-submitted comment,
 *                             trackback, or pingback.
 */
function comments_twosides_debate_get_comment_positive_count() 
{
    global $post, $comments, $wp_query; 
  
    $num_comments = get_comments(
    array(
        'post_id'    => get_the_ID(),
        'meta_key'   => 'twosides_commtype',
        'meta_value' => 'twosides_positive', 
        'count'      => true  
    ) );

    ob_start(); 
    echo '<figure class="twosides-prohead">
    <span class="procount">' . absint($num_comments) .' </span>
    <span class="prohead-count" style="width:'. esc_attr($num_comments) .'em"></span>
    </figure><div class="twosidesclearfix"></div> '; 
    $comment_pos = ob_get_clean();
    return wp_kses_post($comment_pos);
}
/**
* @returns comment count
*/
function comments_twosides_debate_get_comment_negative_count() 
{
    global $post, $comments, $wp_query;

    $num_comments = get_comments (
    array(
        'post_id'    => get_the_ID(),
        'meta_key'   => 'twosides_commtype',
        'meta_value' => 'twosides_negative', 
        'count'      => true  
    ) );

    ob_start(); 
    echo '<figure class="twosides-conhead">
    <span class="concount">' . absint($num_comments) .' </span>
    <span class="conhead-count" style="width:'. esc_attr($num_comments) .'em;"></span>
    </figure><div class="twosidesclearfix"></div> '; 
    $comment_con = ob_get_clean();
    return wp_kses_post($comment_con);
}
/**
 * Shortcode [twosides_form_header]
 *
 * @returns $content
 */
function twosides_debate_header_form_shortcode( $atts ='', $content = null)
{ 
    if( !is_single() ) return;

    $options = get_option('twosides_admin'); 

    $checkbox = (empty($options['twosides_checkbox_commlists'] )) 
                 ? 0 : $options['twosides_checkbox_commlists']; 
    $def3 = " + ";
    $twosides_positxt     = $options['twosides_positxt'];
    if( $twosides_positxt == '' ) $twosides_positxt = $def3;  
    
    $def4 = " - ";
    $twosides_negatxt     = $options['twosides_negatxt'];
    if( $twosides_negatxt == '' ) $twosides_negatxt = $def4; 

    $def5 = "Positive Comment";
    $twosides_posiheader  = $options['twosides_posiheader'];
    if( $twosides_posiheader == '' ) $twosides_posiheader = $def5;  

    $def6 = "Negative Comment";
    $twosides_negaheader  = $options['twosides_negaheader'];
    if( $twosides_negaheader == '' ) $twosides_negaheader = $def6;  

    $twosides_addhtml  = (empty($options['twosides_addhtml'])) ? ''
                            : $options['twosides_addhtml'];  
          
    $legendP = comments_twosides_debate_get_comment_positive_count();
    $legendN = comments_twosides_debate_get_comment_negative_count();
      
    // display header above comments list
    // /?replytocom=22#respond https://wpvkp.com/fix-replytocom-link-issue-in-wordpress/
    ob_start();
    echo '
<div class="comments-above-list twosides">
    
    <header class="twosides-header">' . wp_kses( $twosides_addhtml, 'post') . '</header>

    <fieldset class="twosides_fieldset"> 
    <div class="twosides-left">
    <h4>'. esc_html__( $twosides_posiheader, 'twosides-debate' ) .'</h4>
    <legend>' . $legendP .'</legend>
        <form name="twoside-comment-positive" method="POST" action="#twosidesMain">
            
            
            <input type="submit" id="actionPositive" name="action_positive" 
            value="'. $twosides_positxt .'">
            <input id="twosides_positive" type="hidden" name="twosides_positive" 
            value="twosides_positive">
        </form>  
    </div>

    <div class="twosides-right">
    <h4>'. esc_html__( $twosides_negaheader, 'twosides-debate' ) .'</h4>
        <legend>' . $legendN .'</legend>
        <form name="twoside-comment-negative" method="POST" action="#twosidesMain">
            
            
            <input type="submit" id="actionNegative" name="action_negative" 
            value="'. $twosides_negatxt .'">
            <input id="twosides_negative" type="hidden" name="twosides_negative" 
            value="twosides_negative">
        </form>
    </div>
    </fieldset>
</div>';

    $contents = ob_get_clean();
    //if ( $checkbox != '0' ) 
        return $contents; 

}

/**
 * @id F1 - loaded in base file
 * Auto post shortcode into $content
 *
 * @since 1.0.3
 * deprecated for do_shortcode in comments @since 1.1.0
 */

function twosides_debate_shortcode_autoto_post( $content ) 
{
    global $post;
    
    if( ! $post instanceof WP_Post ) return $content;
    $checkd = false; //twosides_debate_commlist_class();
    
    if ( !$checkd ) { 
        switch( $post->post_type ) {
          case 'post':
            return $content . stripslashes('[twosides_form_header]'); 

          case 'page':
            return $content;

          default:
            return $content;
        }
    } else {  
        return $content;
    }
} 
