/* --------- jQuery capsule ---------- */
(function( $ ) {
    "use strict";
	$(document).ready( function(){
        $(function() {
        $( 'div#comments' ).addClass('twosides');
        $( '.comment-list.comments-positive .comment:last-child' ).addClass('lastpositive');
        $( '.comment-list.comments-negative .comment:last-child' ).addClass('lastnegative');

        });
    });
})(jQuery);