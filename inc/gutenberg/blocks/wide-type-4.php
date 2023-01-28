<?php
/**
 * Block Wide Type 4
 *
 * @package Networker
 */

/**
 * Register New Layout
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_layout_wide_type_4( $layouts = array() ) {

	$layout = 'wide-type-4';

	// Add new layout.
	$layouts[ $layout ] = array(
		'location'    => array( 'section-wide', 'section-content' ),
		'name'        => esc_html__( 'Wide 4', 'networker' ),
		'template'    => get_template_directory() . "/template-parts/blocks/{$layout}.php",
		'icon'        => '<svg fill="none" height="44" viewBox="0 0 52 44" width="52" xmlns="http://www.w3.org/2000/svg"><g stroke="#000"><rect height="42" rx="2" stroke-width="1.5" width="50" x="1" y="1"/><rect height="18" rx="1" stroke-width="1.5" width="15" x="24" y="5"/><path d="m25 26h10" stroke-linecap="round" stroke-linejoin="round"/><path d="m25 30h12" stroke-linecap="round" stroke-linejoin="round"/><path d="m48 24-2 2 2 2" stroke-linecap="round" stroke-linejoin="round"/><path d="m46 20 2-2-2-2" stroke-linecap="round" stroke-linejoin="round"/><path d="m25 32h7" stroke-linecap="round" stroke-linejoin="round"/><path d="m6 26h10" stroke-linecap="round" stroke-linejoin="round"/><path d="m6 30h12" stroke-linecap="round" stroke-linejoin="round"/><path d="m6 32h7" stroke-linecap="round" stroke-linejoin="round"/><path d="m25 28h13" stroke-linecap="round" stroke-linejoin="round"/><path d="m6 28h13" stroke-linecap="round" stroke-linejoin="round"/><rect height="18" rx="1" stroke-width="1.5" width="15" x="5" y="5"/></g><circle cx="10" cy="38" fill="#000" r="1"/><circle cx="14" cy="38" fill="#000" r="1"/><circle cx="6" cy="38" r="1" stroke="#000"/></svg>',
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
					'default' => 5,
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
					'key'            => 'columns',
					'label'          => esc_html__( 'Number of Columns', 'networker' ),
					'section'        => 'general',
					'type'           => 'number',
					'min'            => 1,
					'max'            => 6,
					'default'        => 4,
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
					'key'            => 'gap_posts',
					'label'          => esc_html__( 'Gap between Posts', 'networker' ),
					'type'           => 'dimension',
					'section'        => 'general',
					'responsive'     => true,
					'default'        => '30px',
					'default_tablet' => '30px',
					'default_mobile' => '30px',
					'output'         => array(
						array(
							'element'  => '$',
							'property' => '--cs-carousel-gap',
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
					'default' => 'original',
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
					'default'    => '1.25rem',
					'responsive' => true,
					'output'     => array(
						array(
							'element'  => '$ .cs-entry__title a',
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
					'key'     => 'color_heading',
					'label'   => esc_html__( 'Heading Color', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__title',
							'property' => '--cs-color-title',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_heading_hover',
					'label'   => esc_html__( 'Heading Color Hover', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__title',
							'property' => '--cs-color-title-hover',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'             => 'color_excerpt',
					'label'           => esc_html__( 'Excerpt', 'networker' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__excerpt',
							'property' => '--cs-color-excerpt',
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
				array(
					'key'     => 'color_meta',
					'label'   => esc_html__( 'Post Meta', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta',
							'property' => '--cs-color-meta',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_meta_links',
					'label'   => esc_html__( 'Post Meta Links', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta, $ .cs-entry__content .cs-entry__author-meta',
							'property' => '--cs-color-meta-links',
							'suffix'   => '!important',
						),
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta',
							'property' => '--cs-color-category',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_meta_links_hover',
					'label'   => esc_html__( 'Post Meta Links Hover', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta, $ .cs-entry__content .cs-entry__author-meta',
							'property' => '--cs-color-meta-links-hover',
							'suffix'   => '!important',
						),
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta',
							'property' => '--cs-color-category-hover',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_categories',
					'label'   => esc_html__( 'Post Meta Categories Color', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta',
							'property' => '--cs-color-category',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'color_categories_hover',
					'label'   => esc_html__( 'Post Meta Categories Color Hover', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__post-meta',
							'property' => '--cs-color-category-hover',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'             => 'color_more_bg',
					'label'           => esc_html__( 'Read More Background Color', 'networker' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__read-more a',
							'property' => '--cs-color-style',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => '$#more_button',
							'operator' => '!=',
							'value'    => false,
						),
					),
				),
				array(
					'key'             => 'color_more_bg_hover',
					'label'           => esc_html__( 'Read More Background Color Hover', 'networker' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__read-more a',
							'property' => '--cs-color-style-hover',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => '$#more_button',
							'operator' => '!=',
							'value'    => false,
						),
					),
				),
				array(
					'key'             => 'color_more_border',
					'label'           => esc_html__( 'Read More Border Color', 'networker' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__read-more a',
							'property' => '--cs-color-style-border',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => '$#more_button',
							'operator' => '!=',
							'value'    => false,
						),
					),
				),
				array(
					'key'             => 'color_more_border_hover',
					'label'           => esc_html__( 'Read More Border Color Hover', 'networker' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__read-more a',
							'property' => '--cs-color-style-hover-border',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => '$#more_button',
							'operator' => '!=',
							'value'    => false,
						),
					),
				),
				array(
					'key'             => 'color_more_text',
					'label'           => esc_html__( 'Read More Text Color', 'networker' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__read-more a',
							'property' => '--cs-color-style-contrast',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => '$#more_button',
							'operator' => '!=',
							'value'    => false,
						),
					),
				),
				array(
					'key'             => 'color_more_text_hover',
					'label'           => esc_html__( 'Read More Text Color Hover', 'networker' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .cs-entry__content .cs-entry__read-more a',
							'property' => '--cs-color-style-hover-contrast',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => '$#more_button',
							'operator' => '!=',
							'value'    => false,
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
					'default'      => false,
				)
			),
			csco_get_gutenberg_more_button_fields(
				array(
					'section_name' => 'post-meta',
					'default'      => false,
				)
			)
		),
	);

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_layout_wide_type_4' );
