<?php
/**
 * All core theme actions.
 *
 * Please do not modify this file directly.
 * You may remove actions in your child theme by using remove_action().
 *
 * Please see /inc/partials.php for the list of partials,
 * added to actions.
 *
 * @package Networker
 */

/**
 * Body
 */

add_action( 'csco_site_before', 'csco_offcanvas' );

/**
 * Main
 */
add_action( 'csco_main_before', 'csco_page_header', 100 );

/**
 * Category
 */
add_action( 'csco_page_header_after', 'csco_subcategories', 10 );

/**
 * Singular
 */
add_action( 'csco_entry_content_before', 'csco_singular_post_type_before', 10 );
add_action( 'csco_entry_content_after', 'csco_singular_post_type_after', 999 );

/**
 * Entry Media Large
 */
add_action( 'csco_site_content_start', 'csco_entry_breadcrumbs', 10 );
add_action( 'csco_site_content_start', 'csco_entry_media_large', 10 );

/**
 * Entry Header Grid
 */
add_action( 'csco_main_content_before', 'csco_entry_header_grid', 10 );

/**
 * Entry Header
 */
add_action( 'csco_main_before', 'csco_entry_header', 10 );

/**
 * Entry Elements
 */
add_action( 'csco_entry_container_start', 'csco_entry_metabar', 10 );

/**
 * Entry Sections
 */
add_action( 'csco_entry_content_after', 'csco_page_pagination', 10 );
add_action( 'csco_entry_content_after', 'csco_entry_tags', 20 );
add_action( 'csco_entry_content_after', 'csco_entry_share_button', 30 );
add_action( 'csco_entry_content_after', 'csco_entry_author', 40 );
add_action( 'csco_entry_content_after', 'csco_entry_comments', 50 );
add_action( 'csco_entry_content_after', 'csco_entry_subscribe', 60 );
add_action( 'csco_entry_content_after', 'csco_entry_prev_next', 70 );
add_action( 'csco_main_content_after', 'csco_entry_related', 10 );

/**
 * Template Page
 */
add_action( 'csco_entry_content_after', 'csco_meet_team', 10 );
