<?php
/**
 * The template part for displaying header info.
 *
 * @package Networker
 */

// Post Meta.
if ( is_singular( 'post' ) ) {
	csco_get_post_meta( array( 'category', 'views', 'shares', 'reading_time', 'comments' ), false, true, 'post_meta' );
}

// Title.
the_title( '<h1 class="cs-entry__title"><span>', '</span></h1>' );

// Details.
if ( is_singular( 'post' ) ) {
	csco_entry_details( 'post_meta', false, 'post-header', array( 'class' => 'cs-entry__header-details' ) );
}

// Subtitle.
csco_post_subtitle();
