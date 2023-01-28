<?php
/**
 * Editor Settings.
 *
 * @package Networker
 */

/**
 * Register breakpoints for Canvas
 */
function csco_register_breakpoints() {
	return array(
		'mobile'  => 599,  // <=599
		'tablet'  => 1019, // <=1019
		'desktop' => 1020, // >=1020
	);
}
add_filter( 'canvas_register_breakpoints', 'csco_register_breakpoints' );

/**
 * Enqueue editor scripts
 */
function csco_block_editor_scripts() {
	wp_enqueue_script(
		'csco-editor-scripts',
		get_template_directory_uri() . '/assets/jsx/editor-scripts.js',
		array(
			'wp-editor',
			'wp-element',
			'wp-compose',
			'wp-data',
			'wp-plugins',
		),
		csco_get_theme_data( 'Version' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'csco_block_editor_scripts' );

/**
 * Adds classes to <div class="editor-styles-wrapper"> tag
 */
function csco_block_editor_wrapper() {
	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return;
	}

	// Set post type.
	$post_type = sprintf( 'post-type-%s', get_post_type( $post_id ) );

	// Set page layout.
	$default_layout = csco_get_page_sidebar( $post_id, 'default' );
	$page_layout    = csco_get_page_sidebar( $post_id, false );

	if ( 'disabled' === $default_layout ) {
		$default_layout = 'cs-sidebar-disabled';
	} else {
		$default_layout = 'cs-sidebar-enabled';
	}

	if ( 'disabled' === $page_layout ) {
		$page_layout = 'cs-sidebar-disabled';
	} else {
		$page_layout = 'cs-sidebar-enabled';
	}

	// Post Metabar.
	if ( 'post' === get_post_type( $post_id ) && csco_powerkit_module_enabled( 'share_buttons' ) && powerkit_share_buttons_exists( 'metabar-post' ) ) {
		$post_sidebar = 'cs-metabar-enabled';
	} else {
		$post_sidebar = 'cs-metabar-disabled';
	}

	// Section Heading.
	$section_heading = 'section-heading-default-' . get_theme_mod( 'section_heading', 'style-1' );

	wp_enqueue_script(
		'csco-editor-wrapper',
		get_template_directory_uri() . '/assets/jsx/editor-wrapper.js',
		array(
			'wp-editor',
			'wp-element',
			'wp-compose',
			'wp-data',
			'wp-plugins',
		),
		csco_get_theme_data( 'Version' ),
		true
	);

	wp_localize_script(
		'csco-editor-wrapper',
		'cscoGWrapper',
		array(
			'post_type'       => $post_type,
			'default_layout'  => $default_layout,
			'page_layout'     => $page_layout,
			'post_sidebar'    => $post_sidebar,
			'section_heading' => $section_heading,
		)
	);
}
add_action( 'enqueue_block_editor_assets', 'csco_block_editor_wrapper' );

/**
 * Change editor color palette.
 */
function csco_change_editor_color_palette() {
	// Editor Color Palette.
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Blue', 'networker' ),
				'slug'  => 'blue',
				'color' => '#59BACC',
			),
			array(
				'name'  => esc_html__( 'Green', 'networker' ),
				'slug'  => 'green',
				'color' => '#58AD69',
			),
			array(
				'name'  => esc_html__( 'Orange', 'networker' ),
				'slug'  => 'orange',
				'color' => '#FFBC49',
			),
			array(
				'name'  => esc_html__( 'Red', 'networker' ),
				'slug'  => 'red',
				'color' => '#e32c26',
			),
			array(
				'name'  => esc_html__( 'Pale Pink', 'networker' ),
				'slug'  => 'pale-pink',
				'color' => '#f78da7',
			),
			array(
				'name'  => esc_html__( 'White', 'networker' ),
				'slug'  => 'white',
				'color' => '#FFFFFF',
			),
			array(
				'name'  => esc_html__( 'Gray 50', 'networker' ),
				'slug'  => 'gray-50',
				'color' => '#f8f9fa',
			),
			array(
				'name'  => esc_html__( 'Gray 100', 'networker' ),
				'slug'  => 'gray-100',
				'color' => '#f8f9fb',
			),
			array(
				'name'  => esc_html__( 'Gray 200', 'networker' ),
				'slug'  => 'gray-200',
				'color' => '#e9ecef',
			),
			array(
				'name'  => esc_html__( 'Secondary', 'networker' ),
				'slug'  => 'secondary',
				'color' => get_theme_mod( 'color_secondary', '#818181' ),
			),
			array(
				'name'  => esc_html__( 'Black', 'networker' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
		)
	);
}
add_action( 'after_setup_theme', 'csco_change_editor_color_palette' );
