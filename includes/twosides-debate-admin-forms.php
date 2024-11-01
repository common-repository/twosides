<?php 
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' ); 
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.3
 */
function twosides_debate_posibkgd_cb() 
{ 
    $def = "#aafaca";
    $options = get_option('twosides_admin'); 
    $twosides_color_1 = $options['twosides_posibkgd'];
    if( $twosides_color_1 == '' ) $twosides_color_1 = $def;
    ?>
    <label class="olmin"><?php esc_html_e( 
        'Select color for background of positive comments.', 
                                           'twosides-debate'  ); ?></label>
    <input type="text" 
           id="color_wrap_a" 
           name="twosides_admin[twosides_posibkgd]"
           class="twosides-color-field" data-default-color="#aafaca"
           value="<?php echo $twosides_color_1; ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default title
 * @since  1.0.3
 */
function twosides_debate_negabkgd_cb() 
{   
    $def = "#faaa99";
    $options = get_option('twosides_admin'); 
    $twosides_color_2 = $options['twosides_negabkgd'];
    if( $twosides_color_2 == '' ) $twosides_color_2 = $def;
    ?>
    <label class="olmin"><?php esc_html_e( 
        'Select color for background of negative comments.', 
                                           'twosides-debate'  ); ?></label>
    <input type="text" 
           id="color_wrap_b" 
           name="twosides_admin[twosides_negabkgd]" 
           class="twosides-color-field" data-default-color="#faaa99" 
           value="<?php echo $twosides_color_2; ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.3
 */
function twosides_debate_posibord_cb() 
{ 
    $def = "#aafaca";
    $options = get_option('twosides_admin'); 
    $twosides_posibord = $options['twosides_posibord'];
    if( $twosides_posibord == '' ) $twosides_posibord = $def;
    ?>
    <label class="olmin"><?php esc_html_e( 'Select color for borders of positive comments.', 
                                           'twosides-debate'  ); ?></label>
    <input type="text" 
           id="color_wrap_a" 
           name="twosides_admin[twosides_posibord]"
           class="twosides-color-field" data-default-color="#aafaca"
           value="<?php echo $twosides_posibord; ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.2
 */
function twosides_debate_negabord_cb() 
{ 
    $def = "#faaa99";
    $options = get_option('twosides_admin'); 
    $twosides_negabord = $options['twosides_negabord'];
    if( $twosides_negabord == '' ) $twosides_negabord = $def;
    ?>
    <label class="olmin"><?php esc_html_e( 'Select color for borders of negative comments.', 
                                           'twosides-debate'  ); ?></label>
    <input type="text" 
           id="color_wrap_a" 
           name="twosides_admin[twosides_negabord]"
           class="twosides-color-field" data-default-color="#faaa99"
           value="<?php echo $twosides_negabord; ?>"><br>
<?php     
}
/**
 * Render the branding colors option
 * @string $def = default color
 * @since  1.0.2
 */
function twosides_debate_submits_cb() 
{ 
    $def = "#ffffff";
    $options = get_option('twosides_admin'); 
    $twosides_submits = $options['twosides_submits'];
    if( $twosides_submits == '' ) $twosides_submits = $def;
    ?>
    <label class="olmin"><?php esc_html_e( 'Select pro/con buttons text color.', 
                                           'twosides-debate'  ); ?></label>
    <input type="text" 
           id="color_wrap_a" 
           name="twosides_admin[twosides_submits]"
           class="twosides-color-field" data-default-color="#ffffff"
           value="<?php echo $twosides_submits; ?>"><br>
<?php     
}

/** 
 * Text of header
 * @since 1.0.1
 */
function twosides_debate_posiheader_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_posiheader = (empty($options['twosides_posiheader'] )) 
                ? "" : $options['twosides_posiheader']; ?>
    <label class="olmin" for="twosides_posiheader"><?php esc_html_e( 
'Set text field.', 'twosides-debate' ); ?></label><br>
    <input type="text" name="twosides_admin[twosides_posiheader]" 
           value="<?php echo esc_attr( $twosides_posiheader ); ?>" 
           size="35"/><br><small><?php esc_html_e('Add text above buttons, using option: Content Above Buttons', 'twosides-debate'); ?></small>
    <?php 
}

/** 
 * Text of header
 * @since 1.0.1
 */
function twosides_debate_negaheader_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_negaheader = (empty($options['twosides_negaheader'] )) 
                ? "" : $options['twosides_negaheader']; ?>
    <label class="olmin" for="twosides_negaheader"><?php esc_html_e( 
'Set text field.', 'twosides-debate' ); ?></label><br>
    <input type="text" name="twosides_admin[twosides_negaheader]" 
           value="<?php echo esc_attr( $twosides_negaheader ); ?>" 
           size="35"/>
    <?php 
}

/** 
 * Text of submit
 * @since 1.0.1
 */
function twosides_debate_negatxt_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_negatxt = (empty($options['twosides_negatxt'] )) 
                ? "" : $options['twosides_negatxt']; ?>
    <label class="olmin" for="twosides_negatxt"><?php esc_html_e( 
'Set text field.', 'twosides-debate' ); ?></label>
    <input type="text" name="twosides_admin[twosides_negatxt]" 
           value="<?php echo esc_attr( $twosides_negatxt ); ?>" 
           size="15"/>
    <?php 
}

/** 
 * Text of submit
 * @since 1.0.1
 */
function twosides_debate_positxt_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_positxt = (empty($options['twosides_positxt'] )) 
                ? "" : $options['twosides_positxt']; ?>
    <label class="olmin" for="twosides_positxt"><?php esc_html_e( 
'Set text field.', 'twosides-debate' ); ?></label>
    <input type="text" name="twosides_admin[twosides_positxt]" 
           value="<?php echo esc_attr( $twosides_positxt ); ?>" 
           size="15"/>
    <?php 
}

/** 
 * Order of comments
 * @since 1.0.1
 */
function twosides_debate_orderof_cb()
{
    $options  = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_orderof'] )) 
                 ? 0 : $options['twosides_orderof']; ?>
 <p><input type="hidden" 
           name="twosides_admin[twosides_orderof]" 
           value="0" />
    <input name="twosides_admin[twosides_orderof]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to reverse the order of comments.', 
                      'twosides-debate' ); ?></p>
    <small><?php esc_html_e( 'Some themes may not honor the order you set in Settings > Discussion > display with older/newer at top of page.', 
                             'twosides-debate' ); ?> </small>
                             
    <?php   print( $checkbox );
}

/**
 * checkbox for 'metadata' field
 * @since 1.0.1
 */
function twosides_debate_checkbox_metadata_cb() {
    $options  = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_checkbox_metadata'] )) 
                 ? 0 : $options['twosides_checkbox_metadata']; ?>
 <p><input type="hidden" 
           name="twosides_admin[twosides_checkbox_metadata]" 
           value="0" />
    <input name="twosides_admin[twosides_checkbox_metadata]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to hide the metadata for comments.', 
                      'twosides-debate' ); ?></p>
    <small><?php esc_html_e( 'Date, time and other data which shows below author.', 
                             'twosides-debate' ); ?> </small>
                             
    <?php   print( $checkbox );
} 

/**
 * checkbox for 'twscounter' field
 * @since 1.0.1
 */
function twosides_debate_checkbox_twscounter_cb() {
    $options  = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_checkbox_twscounter'] )) 
                 ? 0 : $options['twosides_checkbox_twscounter']; ?>
 <p><input type="hidden" 
           name="twosides_admin[twosides_checkbox_twscounter]" 
           value="0" />
    <input name="twosides_admin[twosides_checkbox_twscounter]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to not show counters.', 
                      'twosides-debate' ); ?></p>
    <small><?php esc_html_e( 'The counter and progress bar above the submit buttons.', 
                             'twosides-debate' ); ?> </small>
                             
    <?php  print( $checkbox );
} 

/**
 * checkbox for 'use theme template' field
 * @since 1.0.1
 * @package twosides-debate
 * @subpackage includes/twosides-debate-admin-forms
 */
function twosides_debate_checkbox_commlists_cb() {
    $options = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_checkbox_commlists'] )) 
                 ? 0 : $options['twosides_checkbox_commlists']; ?>
 <p><input type="hidden" name="twosides_admin[twosides_checkbox_commlists]" 
           value="0" />
    <input name="twosides_admin[twosides_checkbox_commlists]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to use ', 'twosides-debate' ); ?><span class="twosides-highlite"><?php esc_html_e( 'Theme', 'twosides-debate' ); ?>
    </span><?php esc_html_e( ' comments list', 'twosides-debate' ); ?></p>
    <small><?php esc_html_e( 'Use if for some reason you want to change back to a single list of comments.', 'twosides-debate' ); ?><br>
    <span class="twosides-highlite"><?php esc_html_e( 'Comments can still be styled by adding commentmetadata.', 'twosides-debate' ); ?></span></small>
    <?php  print( $checkbox ); //todo doc commmetadata class
} 

/**
 * checkbox for 'use theme template' field
 * @since 1.0.1
 * @package twosides-debate
 * @subpackage includes/twosides-debate-admin-forms
 */
function twosides_debate_checkbox_commform_cb() {
    $options = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_checkbox_commform'] )) 
                 ? 0 : $options['twosides_checkbox_commform']; ?>
 <p><input type="hidden" name="twosides_admin[twosides_checkbox_commform]" 
           value="0" />
    <input name="twosides_admin[twosides_checkbox_commform]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to use ', 'twosides-debate' ); ?><span class="twosides-highlite"><?php esc_html_e( 'Theme', 'twosides-debate' ); ?>
    </span><?php esc_html_e( ' comment form', 'twosides-debate' ); ?></p>
    <small><?php esc_html_e( 'Use if for some reason the Comments form is not working properly.', 'twosides-debate' ); ?><br>
    <span class="twosides-highlite"><?php esc_html_e( 'Documentation must be read to use your theme form. Installing code snippet is required.', 'twosides-debate' ); ?></span></small>
    <?php  print( $checkbox );
} 

/**
 * checkbox for 'use debug mode' field
 * @since 1.0.2
 * @package twosides-debate
 * @subpackage includes/twosides-debate-admin-forms
 */
function twosides_debate_debug_cb() {
    $options  = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_debug'] )) 
                 ? 0 : $options['twosides_debug']; ?>
 <p><input type="hidden" name="twosides_admin[twosides_debug]" 
           value="0" />
    <input name="twosides_admin[twosides_debug]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to use debug mode.', 'twosides-debate' ); ?></p>
    <small><?php esc_html_e( 'Use if for testing of which comment list is being displayed - theme or plugin. Also resolves buffering issues.', 'twosides-debate' ); ?></small>
    <?php print( $checkbox );
} 

/**
 * checkbox for 'remove url field' field
 * @since 1.0.1
 * @package twosides-debate
 * @subpackage includes/twosides-debate-admin-forms
 */
function twosides_debate_field_url_cb() {
    $options  = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_field_url'] )) 
                 ? 0 : $options['twosides_field_url']; ?>
 <p><input type="hidden" name="twosides_admin[twosides_field_url]" 
           value="0" />
    <input name="twosides_admin[twosides_field_url]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to remove the url field from comments form.', 'twosides-debate' ); ?></p>
    <small><?php esc_html_e( 'Optional', 'twosides-debate' ); ?></small>
    <?php print( $checkbox );
}

/**
 * checkbox for 'remove says in meta
 * @since 1.0.4
 * @package twosides-debate
 * @subpackage includes/twosides-debate-admin-forms
 */
function twosides_debate_field_says_cb() {
    $options  = get_option('twosides_admin'); 
    $checkbox = (empty($options['twosides_field_says'] )) 
                 ? 0 : $options['twosides_field_says']; ?>
 <p><input type="hidden" name="twosides_admin[twosides_field_says]" 
           value="0" />
    <input name="twosides_admin[twosides_field_says]" 
           value="1" 
           type="checkbox" <?php echo esc_attr( 
           checked( 1, $checkbox, true ) ); ?> /> 	
    <?php esc_html_e( 'Check to remove the says wording next to avatar.', 'twosides-debate' ); ?></p>
    <small><?php esc_html_e( 'Optional', 'twosides-debate' ); ?></small>
    <?php print( $checkbox );
}

/** 
 * Text of header
 * @since 1.0.1
 */
function twosides_debate_avatar_height_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_val = (empty($options['twosides_avatar_height'] )) 
                ? "32" : $options['twosides_avatar_height']; ?>
    <label class="olmin" for="twosides_avatar_height"><?php esc_html_e( 
'Set height in pixels.', 'twosides-debate' ); ?></label>
    <input type="number" name="twosides_admin[twosides_avatar_height]" 
           value="<?php echo esc_attr( $twosides_val ); ?>" 
           size="15" min="-1" max="300" /><br><small><?php esc_html_e('Adjust this height to make avatars fit inside of comment top bar.', 'twosides-debate'); ?></small>
    <?php 
}

/** 
 * padding of comments
 * @since 1.0.4
 */
function twosides_debate_padboth_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_padboth = (empty($options['twosides_padboth'] )) 
                       ? "0" : $options['twosides_padboth']; ?>
    <p><label class="olmin" for="twosides_padboth"><?php esc_html_e( 
'Set padding.', 'twosides-debate' ); ?></label>
    <input type="number" name="twosides_admin[twosides_padboth]" 
           value="<?php echo esc_attr( $twosides_padboth ); ?>" 
           size="15" min="0" max="60" class="smallinput"/> px</p>
    <small><?php esc_html_e( 'Setting is in pixels. Controls all twosides-debate comment boxes padding.',
    'twosides-debate' ); ?></small>
    <?php 
}

/** 
 * Width
 * @since 1.0.1
 */
function twosides_debate_maxwidth_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_maxwidth = (empty($options['twosides_maxwidth'] )) 
                ? "1170" : $options['twosides_maxwidth']; ?>
    <p><label class="olmin" for="twosides_maxwidth"><?php esc_html_e( 
'Set width.', 'twosides-debate' ); ?></label>
    <input type="number" name="twosides_admin[twosides_maxwidth]" 
           value="<?php echo esc_attr( $twosides_maxwidth ); ?>" 
           size="15" min="0" max="99999" class="smallinput"/> px</p>
    <small><?php esc_html_e( 'Set the MAXIMUM width, in pixels, of the entire comments section.',
    'twosides-debate' ); ?></small>
    <?php 
} 

/** 
 * padding of comments
 * @since 1.0.4
 */
function twosides_debate_margbord_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_margbord = (empty($options['twosides_margbord'] )) 
                       ? "0" : $options['twosides_margbord']; ?>
    <p><label class="olmin" for="twosides_margbord"><?php esc_html_e( 
'Set spacing.', 'twosides-debate' ); ?></label>
    <input type="number" name="twosides_admin[twosides_margbord]" 
           value="<?php echo esc_attr( $twosides_margbord ); ?>" 
           size="15" min="-90" max="90" class="smallinput"/> px</p>
    <small><?php esc_html_e( 'Setting is in pixels. Controls all twosides-debate comment lists.',
    'twosides-debate' ); ?></small>
    <?php 
}

/** 
 * Additional HTML
 * @since 1.0.1
 */
function twosides_debate_addhtml_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_addhtml = (empty($options['twosides_addhtml'] )) 
                       ? '' : $options['twosides_addhtml']; ?>
    <p><label class="olmin" for="twosides_addhtml"><?php esc_html_e( 
'Add styles', 'twosides-debate' ); ?></label></p>
<textarea name="twosides_admin[twosides_addhtml]" cols="45" rows="4"><?php echo esc_textarea( $twosides_addhtml ); ?></textarea><br>
    <small><?php esc_html_e( 'Add HTML or plain text to above the buttons and counters section. Try: ', 'twosides-debate' ); ?>
    <code>&lt;h3>Here are the rules &lt;/h3></code></small>
    <?php 
}

/** 
 * Additional CSS
 * @since 1.0.1
 */
function twosides_debate_addcss_cb()
{
    $options = get_option('twosides_admin'); 
    $twosides_addcss = (empty($options['twosides_addcss'] )) 
                       ? '' : $options['twosides_addcss']; ?>
    <p><label class="olmin" for="twosides_addcss"><?php esc_html_e( 
'Add styles', 'twosides-debate' ); ?></label></p>
<textarea name="twosides_admin[twosides_addcss]" cols="45" rows="4"><?php echo esc_textarea( $twosides_addcss ); ?></textarea><br>
    <small><?php esc_html_e( 'Add styles directly related to TwoSides plugin.', 'twosides-debate' ); ?>
    <br><?php esc_html_e( 'Try: ', 'twosides-debate'); ?>
    <code>.twosides-comments-container .comment-author.vcard .fn a{line-height: 2.444;} </code><-fixes Show/Hide Comments Meta</small>
    <?php 
}

/**
 * render information section
 * @since 1.0.1
 */
function twosides_debate_docs_cb() 
{
    $urla = "https://developer.wordpress.org/themes/advanced-topics/child-themes/";
    $urlb = "https://twosides.tswdev.com/create-child-theme-for-customization-of-twosides/";
    $urlc = "http://snippwiki.com/public-snippet.php?pub_id=78";
    $urld = "https://twosidesdebate.tswdev.com/docs/";
    $urls1 = "https://twosidesdebate.tswdev.com/docs/twosides-debate-plugin/install-tips/template-and-shortcodes/";
    ?>
<div class="twosides-support">
<h2><?php esc_html_e( 'Full Plugin Documentation: ', 'twosides-debate' ); ?></h2>
<ul>
<li class="button"><a href="<?php echo esc_url($urld); ?>" title="documentation instructions for twosides debate plugin" target="_blank"><?php esc_html_e( 'Online Documentation and Instructions', 'twosides-debate'); ?>[^]</a></li>
</ul>
<h2><?php esc_html_e( 'Basic Information: ', 'twosides-debate' ); ?></h2>
<ul><li><?php esc_html_e( 'To remove twosides comments you should deactivate this plugin. This will keep twosides comment settings in the database for later use. Yet there is also an option to use the Theme comment form if you want to display the comments in a single long vertical list of one column, not two columns. Just tic the Option " Check to use Theme comments list" in TwoSides Debate Settings.', 'twosides-debate' ); ?><br>
<small><?php esc_html_e( 'If you do delete this plugin, TwoSides Comments are saved as WP comments and are not custom comments. So any twosided comments will stay in db as regular comments.', 'twosides-debate' ); ?></small></li>
</ul>
<h2><?php esc_html_e( 'Very Important - Please Read!', 'twosides-debate' ); ?></h2> 
<h5 class="maroon"><?php esc_html_e( 'TwoSides plugin MAY REQUIRE you to replace your comments.php file inside a child-theme (or parent theme)!', 'twosides-debate' ); ?><br>
<?php esc_html_e( 'To add theme templates to a child theme follow the instructions below.', 'twosides-debate' ); ?></h5>

<ul>
<li><?php esc_html_e( 'The process to follow is ONLY to be done if you have checked the ', 'twosides-debate' ); ?><span class="twosides-highlite"><?php esc_html_e( ' Use Theme Comments List Template option.', 'twosides-debate' ); ?></span><br>
<b>&nbsp;<?php esc_html_e( 'If you do not use YOUR theme&#39;s comments list then TwoSides automatically adds one.', 'twosides-debate' ); ?></b></li>    
</ul>
<ol>
<li><?php esc_html_e( 'Create Child Theme. For further instructions on building a child-theme view: ', 'twosides-debate' ); 
echo '<a href="' . esc_url( $urlb ) . '" target="_blank" title="child theme instructions open in new window">' . esc_url( $urlb ) . ' [^]</a>'; ?> </li>

<li><?php esc_html_e( 'You should now have a child-theme folder to add files to.',  'twosides-debate' ); ?></li>
<li><?php esc_html_e( 'Get the comments.php file from your Parent Theme and save it in the Child Theme', 'twosides-debate' ); ?></li>
<li><?php esc_html_e( 'Now highlight and copy the code---from the link below---that is to go inside of the new comments.php file and paste that copied code into your comments.php file of the Child Theme.', 'twosides-debate' ); ?></li>
</ol>
<ul>
<li class="button"><a href="<?php echo esc_url($urlc); ?>" title="share link to this snippet opens in new window" target="_blank">
<?php esc_html_e( 'View: TwoSides plugin MAY REQUIRE you to replace your comments.php file inside a child-theme', 'twosides-debate'); ?> [^]</a></li>
</ul>
<hr>
<h2><?php esc_html_e( 'Setting Up Plugin Tips', 'twosides-debate' ); ?></h2>
<dl>
<dt><b><?php esc_html_e( 'Twosides Shortcodes', 'twosides-debate' ); ?></b></dt>
<dd class="olds"><?php esc_html_e( 'Shortcode to display TwoSides header (buttons and counters) for the single posts pages are automatic and there is a shortcode but it is embedded into the functions of the single page instance. So you may not ever use this one unless you are building custom comment templates.', 'twosides-debate' ); ?>
<pre> [twosides_form_header]</pre></dd>
<!--<dd class="olds"><?php esc_html_e( 'Shortcode to show a page of comments by comment author. You must add author id of the commentor to end of shortcode.', 'twosides-debate' ); ?><sup>1</sup>
<pre> [twosides_author authorid="1"]</pre></dd>

<dt><b><?php esc_html_e( 'Spacing and gaps between comment boxes', 'twosides-debate' ); ?></b></dt>
<dd class="olds"><?php esc_html_e( 'When you set the option for Spacing between comments, you will be creating a gap between the comment boxes. The method used is to set the left and right boxes up using a border attribute of how many pixel wide the border is. And then the margin for the bottom of every box (left and right) is determined by using the same number and multiplying it by two. For example: If you enter 3 as your spacing - what you have is 3 pixels right and 3 pixels left border for each right and left box. Then 3 X 2= 6 pixels width for bottom margin of all boxes. ', 'twosides-debate' ); ?><span></span></dd>
-->
<dt><b><?php esc_html_e( 'To Override Button Styles', 'twosides-debate' ); ?></b></dt>
<dd><?php esc_html_e( 'Use the following CSS selector to change how your submit buttons will appear on the page', 'twosides-debate' ); ?><br>
<pre>
.twosides_fieldset input[type="submit"]{border-radius: 3px;}</pre></dd>
</dl>
<p><sub>1</sub><a href="<?php echo esc_url( $urls1 ); ?>" target="_blank" 
title="instructions open in new window"><?php esc_html_e( 'How to find comment Author id', 'twosides-debate'); ?> [^]</a></p>
</div>

<div class="twosides-support-faq">
    <h4><?php esc_html_e( 'Frequently Asked Questions | Troubleshooting', 'twosides-debate' ); ?></h4>
    <details>
    <summary><?php esc_html_e( 'Comment list columns are not sitting side-by-side', 'twosides-debate'); ?></summary>
    <?php esc_html_e( 'Try setting the margin-left to a lower number. This can be done using Add Styles box or Customizer. Selector: ', 'twosides-debate'); ?>
    <pre>#comments.comments-area.twosides .comment-list{margin-left: -15px;}</pre>
    </details>
    <details>
    <summary><?php esc_html_e( 'Excessive space at bottom of comment.', 'twosides-debate'); ?></summary>
    <?php esc_html_e( 'Try adding CSS to the Additional CSS of this plugin.', 'twosides-debate'); ?>
    <pre>.reply{margin-top: 0;}</pre>
    </details>
    <details>
    <summary><?php esc_html_e( 'Why do the comment reply links not show on individual comments?', 'twosides-debate'); ?></summary>
    <?php esc_html_e( 'TwoSides was not designed to support replies to authored comments. Comment threads will not work because we did not add any scripts to allow each lower level reply the ability to know what type of comment meta each comment has. Without the comment meta (`twosides_positive` or `twosides_negative`) there is no way for a reply to know which comment it shows on. 
    We also did not design this plugin to be used as a Discussion plugin, so much as it is designed to add singular responses to the post, not discussion threads.', 'twosides-debate'); ?>
    </details>
    <details>
    <summary><?php esc_html_e( 'Comments are not displayed in the correct order.', 'twosides-debate'); ?></summary>
    <?php esc_html_e( 'You can change the order under Settings > Discussion > Other Comments Settings. Some themes will behave just the opposite of what you set this for. So try either setting for "Comments should be displayed with the older/newer comments at the top of the page."', 'twosides-debate'); ?>
    </details>
    <details>
    <summary><?php esc_html_e( 'Other', 'twosides-debate'); ?></summary>
    <?php esc_html_e( 'Other', 'twosides-debate'); ?>
    </details>
</div>

<ul class="inside-disc">
<li><?php echo '<a href="' . esc_url( $urla ) . '" target="_blank" title="child theme instructions open in new window">' . esc_url( $urla ) . ' [^]</a>'; ?>
</ul>

</div>
<?php
} 
