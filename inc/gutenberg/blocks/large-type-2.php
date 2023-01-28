<?php
/**
 * Block Large Type 2
 *
 * @package Networker
 */

/**
 * Register New Layout
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_layout_large_type_2( $layouts = array() ) {

	$layout = 'large-type-2';

	// Add new layout.
	$layouts[ $layout ] = array(
		'location'    => array( 'section-full' ),
		'name'        => esc_html__( 'Large 2', 'networker' ),
		'template'    => get_template_directory() . "/template-parts/blocks/{$layout}.php",
		'icon'        => '<svg fill="none" height="44" viewBox="0 0 52 44" width="52" xmlns="http://www.w3.org/2000/svg"><g stroke="#000"><rect height="42" rx="2" stroke-width="1.5" width="50" x="1" y="1"/><path d="m12 24h10" stroke-linecap="round" stroke-linejoin="round"/><path d="m29 24h10" stroke-linecap="round" stroke-linejoin="round"/><path d="m12 5h7" stroke-linecap="round" stroke-linejoin="round"/><path d="m29 5h7" stroke-linecap="round" stroke-linejoin="round"/><path d="m12 28h8" stroke-linecap="round" stroke-linejoin="round"/><path d="m29 28h8" stroke-linecap="round" stroke-linejoin="round"/><path d="m41 35-2 2 2 2" stroke-linecap="round" stroke-linejoin="round"/><path d="m45 39 2-2-2-2" stroke-linecap="round" stroke-linejoin="round"/><path d="m12 26h11" stroke-linecap="round" stroke-linejoin="round"/><path d="m29 26h11" stroke-linecap="round" stroke-linejoin="round"/><path d="m43 1v30" stroke-width="1.5"/><path d="m9 1v30" stroke-width="1.5"/><path d="m26 1v30" stroke-width="1.5"/><path d="m51 31h-50" stroke-width="1.5"/></g><circle cx="10" cy="38" fill="#000" r="1"/><circle cx="14" cy="38" fill="#000" r="1"/><circle cx="6" cy="38" r="1" stroke="#000"/></svg>',
		'sections'    => array(
			'general'    => array(
				'title'    => esc_html__( 'Block Settings', 'networker' ),
				'priority' => 5,
				'open'     => true,
			),
			'post-meta'  => array(
				'title'    => esc_html__( 'Meta Settings', 'networker' ),
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
					'key'     => 'areaPostsCount',
					'label'   => esc_html__( 'Slides', 'networker' ),
					'section' => 'general',
					'type'    => 'number',
					'default' => 3,
					'min'     => 1,
					'max'     => 100,
				),
				array(
					'key'     => 'autoplay',
					'label'   => esc_html__( 'Enable autoplay', 'networker' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => true,
				),
				array(
					'key'     => 'pagedots',
					'label'   => esc_html__( 'Enable bullets', 'networker' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => true,
				),
				array(
					'key'     => 'wraparound',
					'label'   => esc_html__( 'Enable wrap-around', 'networker' ),
					'help'    => esc_html__( 'At the end of items, wrap-around to the other end for infinite scrolling.', 'networker' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => true,
				),
				array(
					'key'     => 'groupcells',
					'label'   => esc_html__( 'Group сells', 'networker' ),
					'help'    => esc_html__( 'Groups cells together in slides. Flicking, page dots, and previous/next buttons are mapped to group slides, not individual cells.', 'networker' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => true,
				),
				array(
					'key'            => 'columns',
					'label'          => esc_html__( 'Number of Columns', 'networker' ),
					'section'        => 'general',
					'type'           => 'number',
					'min'            => 1,
					'max'            => 6,
					'default'        => 3,
					'default_tablet' => 2,
					'default_mobile' => 1,
					'responsive'     => true,
					'output'         => array(
						array(
							'element'  => '$',
							'property' => '--cs-carousel-columns',
							'suffix'   => '!important',
						),
					),
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
							'element'  => '$ .cs-entry__outer',
							'property' => 'min-height',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'video',
					'label'   => esc_html__( 'Enable video backgrounds', 'networker' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => false,
				),
				array(
					'key'             => 'video_controls',
					'label'           => esc_html__( 'Enable video controls', 'networker' ),
					'section'         => 'general',
					'type'            => 'toggle',
					'default'         => false,
					'active_callback' => array(
						array(
							'field'    => '$#video',
							'operator' => '==',
							'value'    => true,
						),
					),
				),
				// Thumbnail.
				array(
					'key'     => 'image_orientation',
					'label'   => esc_html__( 'Image Orientation', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'select',
					'default' => 'stretch',
					'choices' => array(
						'stretch'        => esc_html__( 'Stretch', 'networker' ),
						'landscape'      => esc_html__( 'Landscape 4:3', 'networker' ),
						'landscape-3-2'  => esc_html__( 'Landscape 3:2', 'networker' ),
						'landscape-16-9' => esc_html__( 'Landscape 16:9', 'networker' ),
						'portrait'       => esc_html__( 'Portrait 3:4', 'networker' ),
						'portrait-2-3'   => esc_html__( 'Portrait 2:3', 'networker' ),
						'square'         => esc_html__( 'Square', 'networker' ),
					),
				),
				array(
					'key'     => 'image_size',
					'label'   => esc_html__( 'Images Size', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'select',
					'default' => 'medium_large',
					'choices' => csco_get_list_available_image_sizes(),
				),
				array(
					'key'     => 'image_border_radius',
					'label'   => esc_html__( 'Image Border Radius', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'dimension',
					'output'  => array(
						array(
							'element'  => '$',
							'property' => '--cs-image-border-radius',
						),
					),
				),
				// Typography.
				array(
					'key'        => 'typography_heading',
					'label'      => esc_html__( 'Heading Font Size', 'networker' ),
					'section'    => 'typography',
					'type'       => 'dimension',
					'default'    => '2rem',
					'responsive' => true,
					'output'     => array(
						array(
							'element'  => '$ .cs-entry__title',
							'property' => 'font-size',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'typography_heading_tag',
					'label'   => esc_html__( 'Heading Tag', 'networker' ),
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
					'key'             => 'typography_excerpt',
					'label'           => esc_html__( 'Excerpt Font Size', 'networker' ),
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
							'field'    => '$#display_excerpt',
							'operator' => '===',
							'value'    => true,
						),
					),
				),
				// Color Settings.
				array(
					'key'     => 'content_nav_primary_color',
					'label'   => esc_html__( 'Navigation Primary Color', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .flickity-page-dots, $ .cs-slider__arrows-wrapper',
							'property' => '--cs-color-primary',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'content_nav_secondary_color',
					'label'   => esc_html__( 'Navigation Secondary Color', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .flickity-page-dots, $ .cs-slider__arrows-wrapper',
							'property' => '--cs-color-contrast-200',
							'suffix'   => '!important',
						),
					),
				),
			),
			// Primary Meta.
			csco_get_gutenberg_meta_fields(
				array(
					'section_name' => 'post-meta',
				)
			),
			csco_get_gutenberg_excerpt_fields(
				array(
					'section_name' => 'post-meta',
					'default'      => true,
				)
			)
		),
	);

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_layout_large_type_2' );
