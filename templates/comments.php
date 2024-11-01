<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both 
 * the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Twosides Debate
 * 
 */
global $post, $comments; $commentn = $commentp = '';
if ( !comments_open() ) {
  return;
}
  /** If the current post is protected by a password and 
   * the visitor has not yet entered the password we will 
   * return early without loading the comments. 
   * */ 
if( post_password_required() ) { return; } 

/**
 * Comments are displayed using wpdb query to get comment by commentmeta 
 * @since 1.0.4
 * @param meta_key   twosides_commtype                      Plugin metadata key
 * @param meta_value twosides_positive or twosides_negative */
?>    

<div id="comments" class="comments-area"> 

    <?php 
        /**
        * twosides_debate_before_comment_list hook.
        * Outputs shortcode of submit buttons.
        * twosides_debate_debug_info hook
        * Outputs text about template used.
        */
        do_action( 'twosides_debate_debug_info' );
        do_action( 'twosides_debate_before_comment_list' );
    
    ?> 
    
    <?php if( have_comments() ) : ?> 
        
    <div class="twosides-comments-container">
       <ul class="comment-list comments-positive">  
		<?php 
        $avsize = twosides_debate_avatar_height_value();
        $avsz = (empty($avsize )) ? '38' : absint($avsize);
        $commentp = get_comments( array(
            'post_id' => get_the_ID(),
            'meta_key'   => 'twosides_commtype',
            'meta_value'  => 'twosides_positive', 
            )
        );
        wp_list_comments( array( 
			'style' => 'ul', 
			'short_ping' => true,
			'avatar_size' => absint($avsz), 
            ), 
            $commentp 
        ); 
	?> 
	</ul> 

	<ul class="comment-list comments-negative">  
		<?php 
        $commentn = get_comments( array(
            'post_id'  => get_the_ID(),
            'meta_key'  => 'twosides_commtype',
            'meta_value' => 'twosides_negative', 
            )
        );
        wp_list_comments( array( 
			'style' => 'ul', 
			'short_ping' => true,
			'avatar_size' => absint($avsz), 
            ), 
            $commentn 
        ); 
	?> 
	</ul> 
    <div id="commentsEnd"></div>
    </div>
    <?php
        // Comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>

        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twosides-debate' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twosides-debate' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twosides-debate' ) ); ?></div>
        </nav>
    <?php 
    endif; // Ends Check for comment navigation 
    ?>
    <?php 
    if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.' , 'twosides-debate' ); ?></p>
    <?php 
    endif; 
    ?>
	
    <?php endif; ?> 

    <?php 
    /* ******** ******** ******** ********
     * Starts slide-in form for commenting 
     * ******** ******** ******** ******** */
    ?>
    
    <div id="twosidesMain">

        <?php // if commform false then use plugin form 
        if( isset( $_POST['twosides_positive'] ) || isset( $_POST['twosides_negative'] ) ) 
        
            do_action( 'twosides_debate_comment_form' ); 
        ?>
        
    </div>
</div><div class="twosidesclearfix"></div>
