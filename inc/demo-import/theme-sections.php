<?php
/**
 * Theme sections.
 *
 * @package Networker
 */

/**
 * Register section categories.
 */
function csco_canvas_section_categories() {
	return array(
		'posts'        => esc_html__( 'Posts Section', 'networker' ),
		'large-posts'  => esc_html__( 'Large Posts Section', 'networker' ),
		'subscription' => esc_html__( 'Subscription', 'networker' ),
	);
}
add_filter( 'canvas_register_layouts_categories', 'csco_canvas_section_categories' );

/**
 * Register section categories.
 */
function csco_canvas_sections() {
	return array(
		array(
			'title'     => esc_html__( 'Section 1', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-1.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-1.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 2', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-2.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-2.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 3', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-3.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-3.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 4', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-4.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-4.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 5', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-5.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-5.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 6', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-6.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-6.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 7', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-7.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-7.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 8', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-8.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-8.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 9', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-9.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-9.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 10', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-10.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-10.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 11', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-11.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-11.jpg',
			'category'  => array( 'posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 12', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-12.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-12.jpg',
			'category'  => array( 'subscription' ),
		),
		array(
			'title'     => esc_html__( 'Section 13', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-13.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-13.jpg',
			'category'  => array( 'large-posts' ),
		),
		array(
			'title'     => esc_html__( 'Section 14', 'networker' ),
			'json'      => get_template_directory() . '/inc/demo-import/sections/section-14.json',
			'thumbnail' => get_template_directory_uri() . '/inc/demo-import/sections/section-14.jpg',
			'category'  => array( 'large-posts' ),
		),
	);
}
add_filter( 'canvas_register_layouts', 'csco_canvas_sections' );
