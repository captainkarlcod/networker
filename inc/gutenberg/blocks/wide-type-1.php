<?php
/**
 * Block Wide Type 1
 *
 * @package Networker
 */

/**
 * Register New Layout
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_layout_wide_type_1( $layouts = array() ) {

	$layout = 'wide-type-1';

	// Add new layout.
	$layouts[ $layout ] = array(
		'location'    => array( 'section-wide', 'section-content' ),
		'name'        => esc_html__( 'Wide 1', 'networker' ),
		'template'    => get_template_directory() . "/template-parts/blocks/{$layout}.php",
		'icon'        => '<svg fill="none" height="44" viewBox="0 0 52 44" width="52" xmlns="http://www.w3.org/2000/svg"><g stroke="#000"><rect height="42" rx="2" stroke-width="1.5" width="50" x="1" y="1"/><rect height="8" rx="1" stroke-width="1.5" width="8" x="28" y="31"/><g stroke-linecap="round" stroke-linejoin="round"><path d="m5 23h7"/><path d="m5 5h12"/><path d="m5 27h17"/><path d="m16 34h5"/><path d="m39 34h5"/><path d="m5 25h26"/><path d="m16 36h8"/><path d="m39 36h8"/></g><rect height="8" rx="1" stroke-width="1.5" width="8" x="5" y="31"/></g></svg>',
		'sections'    => array(
			'general'    => array(
				'title'    => esc_html__( 'Block Settings', 'networker' ),
				'priority' => 5,
				'open'     => true,
			),
			'large-meta' => array(
				'title'    => esc_html__( 'Large Post Meta Settings', 'networker' ),
				'priority' => 10,
			),
			'small-meta' => array(
				'title'    => esc_html__( 'Small Post Meta Settings', 'networker' ),
				'priority' => 10,
			),
			'typography' => array(
				'title'    => esc_html__( 'Typography Settings', 'networker' ),
				'priority' => 10,
			),
		),
		'hide_fields' => csco_get_gutenberg_posts_hide_fields(),
		'fields'      => array_merge(
			array(
				array(
					'key'     => 'video',
					'label'   => esc_html__( 'Enable video backgrounds', 'networker' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => false,
				),
				array(
					'key'        => 'height',
					'label'      => esc_html__( 'Min Height', 'networker' ),
					'type'       => 'dimension',
					'default'    => 'initial',
					'section'    => 'general',
					'responsive' => true,
					'output'     => array(
						array(
							'element'  => '$ .cs-layout-wide__wrap',
							'property' => 'min-height',
							'suffix'   => '!important',
						),
					),
				),
				// Thumbnail.
				array(
					'key'     => 'large_image_size',
					'label'   => esc_html__( 'Large Post Image Size', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'select',
					'default' => 'large',
					'choices' => csco_get_list_available_image_sizes(),
				),
				array(
					'key'     => 'large_image_border_radius',
					'label'   => esc_html__( 'Large Post Image Border Radius', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'dimension',
					'output'  => array(
						array(
							'element'  => '$ .cs-layout-wide__wrap',
							'property' => '--cs-image-wide-border-radius',
						),
					),
				),
				array(
					'key'     => 'small_image_orientation',
					'label'   => esc_html__( 'Small Image Orientation', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'select',
					'default' => 'square',
					'choices' => array(
						'original'       => esc_html__( 'Original', 'networker' ),
						'landscape'      => esc_html__( 'Landscape 4:3', 'networker' ),
						'landscape-3-2'  => esc_html__( 'Landscape 3:2', 'networker' ),
						'landscape-16-9' => esc_html__( 'Landscape 16:9', 'networker' ),
						'portrait'       => esc_html__( 'Portrait 3:4', 'networker' ),
						'portrait-2-3'   => esc_html__( 'Portrait 2:3', 'networker' ),
						'square'         => esc_html__( 'Square', 'networker' ),
					),
				),
				array(
					'key'     => 'small_image_size',
					'label'   => esc_html__( 'Small Post Image Size', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'select',
					'default' => 'csco-smaller',
					'choices' => csco_get_list_available_image_sizes(),
				),
				array(
					'key'     => 'small_image_border_radius',
					'label'   => esc_html__( 'Small Post Image Border Radius', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'dimension',
					'output'  => array(
						array(
							'element'  => '$ .cs-layout-wide__col',
							'property' => '--cs-image-border-radius',
						),
					),
				),
				// Typography.
				array(
					'key'        => 'large_typography_heading',
					'label'      => esc_html__( 'Large Post Heading Font Size', 'networker' ),
					'section'    => 'typography',
					'type'       => 'dimension',
					'default'    => '1.5rem',
					'responsive' => true,
					'output'     => array(
						array(
							'element'  => '$ .cs-layout-wide__inner > .cs-entry__title a',
							'property' => 'font-size',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'large_typography_heading_tag',
					'label'   => esc_html__( 'Large Post Heading Tag', 'networker' ),
					'section' => 'typography',
					'type'    => 'select',
					'default' => 'h2',
					'choices' => array(
						'h1'  => esc_html__( 'H1', 'networker' ),
						'h2'  => esc_html__( 'H2', 'networker' ),
						'h3'  => esc_html__( 'H3', 'networker' ),
						'h4'  => esc_html__( 'H4', 'networker' ),
						'h5'  => esc_html__( 'H5', 'networker' ),
						'h6'  => esc_html__( 'H6', 'networker' ),
						'p'   => esc_html__( 'P', 'networker' ),
						'div' => esc_html__( 'DIV', 'networker' ),
					),
				),
				array(
					'key'             => 'large_typography_excerpt',
					'label'           => esc_html__( 'Large Post Excerpt Font Size', 'networker' ),
					'section'         => 'typography',
					'type'            => 'dimension',
					'default'         => '0.875rem',
					'responsive'      => true,
					'output'          => array(
						array(
							'element'  => '$ .cs-entry__excerpt',
							'property' => 'font-size',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => '$#showExcerpt',
							'operator' => '===',
							'value'    => true,
						),
					),
				),
				array(
					'key'        => 'small_typography_heading',
					'label'      => esc_html__( 'Small Post Heading Font Size', 'networker' ),
					'section'    => 'typography',
					'type'       => 'dimension',
					'default'    => '0.875rem',
					'responsive' => true,
					'output'     => array(
						array(
							'element'  => '$ .cs-layout-wide__col .cs-entry__title a',
							'property' => 'font-size',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'small_typography_heading_tag',
					'label'   => esc_html__( 'Small Post Heading Tag', 'networker' ),
					'section' => 'typography',
					'type'    => 'select',
					'default' => 'h2',
					'choices' => array(
						'h1'  => esc_html__( 'H1', 'networker' ),
						'h2'  => esc_html__( 'H2', 'networker' ),
						'h3'  => esc_html__( 'H3', 'networker' ),
						'h4'  => esc_html__( 'H4', 'networker' ),
						'h5'  => esc_html__( 'H5', 'networker' ),
						'h6'  => esc_html__( 'H6', 'networker' ),
						'p'   => esc_html__( 'P', 'networker' ),
						'div' => esc_html__( 'DIV', 'networker' ),
					),
				),
			),
			// Primary Meta.
			csco_get_gutenberg_meta_fields(
				array(
					'field_prefix' => 'large',
					'section_name' => 'large-meta',
				)
			),
			csco_get_gutenberg_excerpt_fields(
				array(
					'field_prefix' => 'large',
					'section_name' => 'large-meta',
					'default'      => true,
				)
			),
			// Small Meta.
			csco_get_gutenberg_meta_fields(
				array(
					'field_prefix' => 'small',
					'section_name' => 'small-meta',
				)
			)
		),
	);

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_layout_wide_type_1' );

/**
 * Change post query
 *
 * @param array $args       Args for post query.
 * @param array $attributes Block attributes.
 * @param array $options    Block options.
 */
function csco_canvas_posts_query_args_large_type_7( $args, $attributes, $options ) {

	if ( 0 !== strpos( $attributes['layout'], 'wide-type-1' ) ) {
		return $args;
	}

	$args['posts_per_page'] = 5;
	$args['min_limit']      = 5;

	return $args;
}
add_filter( 'canvas_block_posts_query_args', 'csco_canvas_posts_query_args_large_type_7', 10, 3 );
