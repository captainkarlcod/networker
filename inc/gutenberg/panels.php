<?php
/**
 * Adding New Panels.
 *
 * @package Networker
 */

/**
 * Check display panels for gutenberg panels
 */
function csco_gutenberg_panels_display() {
	// Check Coming Soon Page.
	if ( csco_powerkit_module_enabled( 'coming_soon' ) && powerkit_coming_soon_status() ) {

		$page_id = get_option( 'powerkit_coming_soon_page' );

		if ( (int) get_the_ID() === (int) $page_id ) {
			return;
		}
	}

	return true;
}

/**
 * Register meta fields for gutenberg panels
 */
function csco_gutenberg_panels_register_meta() {

	$post_types = array( 'post', 'page' );

	// Loop Post Types.
	foreach ( $post_types as $post_type ) {

		/**
		 * ==================================
		 * Layout Options
		 * ==================================
		 */

		register_post_meta(
			$post_type,
			'csco_singular_sidebar',
			array(
				'show_in_rest'  => true,
				'type'          => 'string',
				'single'        => true,
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		register_post_meta(
			$post_type,
			'csco_page_header_type',
			array(
				'show_in_rest'  => true,
				'type'          => 'string',
				'single'        => true,
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		register_post_meta(
			$post_type,
			'csco_appearance_grid',
			array(
				'show_in_rest'  => true,
				'type'          => 'string',
				'single'        => true,
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		register_post_meta(
			$post_type,
			'csco_page_load_nextpost',
			array(
				'show_in_rest'  => true,
				'type'          => 'string',
				'single'        => true,
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		/**
		 * ==================================
		 * Video Background
		 * ==================================
		 */

		register_post_meta(
			$post_type,
			'csco_post_video_location',
			array(
				'show_in_rest'  => array(
					'schema' => array(
						'type'  => 'array',
						'items' => array(
							'type' => 'string',
						),
					),
				),
				'type'          => 'array',
				'single'        => true,
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		register_post_meta(
			$post_type,
			'csco_post_video_location_hash',
			array(
				'show_in_rest'  => true,
				'type'          => 'string',
				'single'        => true,
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		register_post_meta(
			$post_type,
			'csco_post_video_url',
			array(
				'show_in_rest'  => true,
				'type'          => 'string',
				'single'        => true,
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		register_post_meta(
			$post_type,
			'csco_post_video_bg_start_time',
			array(
				'show_in_rest'  => true,
				'type'          => 'number',
				'single'        => true,
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		register_post_meta(
			$post_type,
			'csco_post_video_bg_end_time',
			array(
				'show_in_rest'  => true,
				'type'          => 'number',
				'single'        => true,
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
}
add_action( 'init', 'csco_gutenberg_panels_register_meta' );

/**
 * Enqueue assets  for gutenberg panels
 */
function csco_gutenberg_panels_assets() {
	if ( ! csco_gutenberg_panels_display() ) {
		return;
	}

	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return;
	}

	$post = get_post( $post_id );

	$page_static = array();

	// Add pages static.
	$page_static[] = get_option( 'page_on_front' );
	$page_static[] = get_option( 'page_for_posts' );

	// Set options.
	$singular_sidebar = array(
		array(
			'value' => 'default',
			'label' => esc_html__( 'Default', 'networker' ),
		),
		array(
			'value' => 'right',
			'label' => esc_html__( 'Right Sidebar', 'networker' ),
		),
		array(
			'value' => 'left',
			'label' => esc_html__( 'Left Sidebar', 'networker' ),
		),
		array(
			'value' => 'disabled',
			'label' => esc_html__( 'No Sidebar', 'networker' ),
		),
	);

	$page_header_type   = array();
	$appearance_grid    = array();
	$page_load_nextpost = array();

	if ( ! in_array( (string) $post->ID, $page_static, true ) || 'posts' === get_option( 'show_on_front', 'posts' ) ) {

		if ( 'post' === $post->post_type || 'page' === $post->post_type ) {
			$page_header_type = array(
				array(
					'value' => 'default',
					'label' => esc_html__( 'Default', 'networker' ),
				),
				array(
					'value' => 'standard',
					'label' => esc_html__( 'Standard', 'networker' ),
				),
				array(
					'value' => 'grid',
					'label' => esc_html__( 'Grid', 'networker' ),
				),
				array(
					'value' => 'large',
					'label' => esc_html__( 'Large', 'networker' ),
				),
				array(
					'value' => 'title',
					'label' => esc_html__( 'Page Title Only', 'networker' ),
				),
				array(
					'value' => 'none',
					'label' => esc_html__( 'None', 'networker' ),
				),
			);
		}

		if ( 'post' === $post->post_type ) {
			$appearance_grid = array(
				array(
					'value' => 'default',
					'label' => esc_html__( 'Default', 'networker' ),
				),
				array(
					'value' => 'overlay',
					'label' => esc_html__( 'Image Overlay', 'networker' ),
				),
				array(
					'value' => 'minimalist',
					'label' => esc_html__( 'Minimalist', 'networker' ),
				),
			);
		}

		if ( 'post' === $post->post_type ) {
			$page_load_nextpost = array(
				array(
					'value' => 'default',
					'label' => esc_html__( 'Default', 'networker' ),
				),
				array(
					'value' => 'enabled',
					'label' => esc_html__( 'Enabled', 'networker' ),
				),
				array(
					'value' => 'disabled',
					'label' => esc_html__( 'Disabled', 'networker' ),
				),
			);
		}
	}

	// Set video location list.
	$video_location_list = array(
		array(
			'value' => 'large-header',
			'label' => esc_html__( 'Large Header', 'networker' ),
		),
	);

	if ( 'post' === $post->post_type ) {
		array_push(
			$video_location_list,
			array(
				'value' => 'archive',
				'label' => esc_html__( 'Post Archives', 'networker' ),
			)
		);
	}

	$panels_data = array(
		'postType'          => $post->post_type,
		'singularSidebar'   => $singular_sidebar,
		'pageHeaderType'    => $page_header_type,
		'appearanceGrid'    => $appearance_grid,
		'pageLoadNextpost'  => $page_load_nextpost,
		'videoLocationList' => $video_location_list,
	);

	// Enqueue scripts.
	wp_enqueue_script(
		'csco-editor-panels',
		get_template_directory_uri() . '/assets/jsx/panels.js',
		array(
			'wp-i18n',
			'wp-blocks',
			'wp-edit-post',
			'wp-element',
			'wp-editor',
			'wp-components',
			'wp-data',
			'wp-plugins',
			'wp-edit-post',
			'wp-hooks',
		),
		csco_get_theme_data( 'Version' ),
		true
	);

	// Localize scripts.
	wp_localize_script(
		'csco-editor-panels',
		'csPanelsData',
		apply_filters( 'csco_panels_data', $panels_data, $post )
	);

}
add_action( 'enqueue_block_editor_assets', 'csco_gutenberg_panels_assets' );
