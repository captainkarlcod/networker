<?php
/**
 * Register Mixed.
 *
 * @package Networker
 */

/**
 * Register New Layout
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_layout_mixed( $layouts = array() ) {

	$layout = 'mixed';

	// Add new layout.
	$layouts[ $layout ] = array(
		'location'    => array(),
		'name'        => esc_html__( 'Mixed', 'networker' ),
		'template'    => get_template_directory() . '/template-parts/blocks/posts-area.php',
		'icon'        => '<svg fill="none" height="44" viewBox="0 0 52 44" width="52" xmlns="http://www.w3.org/2000/svg"><g stroke="#000"><rect height="42" rx="2" stroke-width="1.5" width="50" x="1" y="1"/><rect height="8" rx="1" stroke-width="1.5" width="19" x="28" y="5"/><g stroke-linecap="round" stroke-linejoin="round"><path d="m29 16h12"/><path d="m29 20h7"/><path d="m29 39h2"/><path d="m39 20h2"/><path d="m6 16h12"/><path d="m6 35h12"/><path d="m6 20h7"/><path d="m6 39h7"/><path d="m16 20h2"/><path d="m29 18h17"/><path d="m6 18h17"/><path d="m6 37h20"/><path d="m29 37h17"/></g><rect height="8" rx="1" stroke-width="1.5" width="19" x="5" y="5"/><rect height="8" rx="1" stroke-width="1.5" width="42" x="5" y="24"/></g></svg>',
		'sections'    => array(
			'general'    => array(
				'title'    => esc_html__( 'Block Settings', 'networker' ),
				'priority' => 5,
				'open'     => true,
			),
			'small-meta' => array(
				'title'    => esc_html__( 'Small Post Meta Settings', 'networker' ),
				'priority' => 10,
			),
			'large-meta' => array(
				'title'    => esc_html__( 'Large Post Meta Settings', 'networker' ),
				'priority' => 10,
			),
			'typography' => array(
				'title'    => esc_html__( 'Typography Settings', 'networker' ),
				'priority' => 10,
			),
		),
		'hide_fields' => csco_get_gutenberg_posts_hide_fields(),
		'fields'      => array_merge(
			csco_get_gutenberg_pagination_fields(),

			array(
				array(
					'key'            => 'columns',
					'label'          => esc_html__( 'Number of Columns', 'networker' ),
					'section'        => 'general',
					'type'           => 'number',
					'min'            => 1,
					'max'            => 6,
					'default'        => 1,
					'default_tablet' => 1,
					'default_mobile' => 1,
					'responsive'     => true,
					'output'         => array(
						array(
							'element'  => '$ .cs-posts-area__grid',
							'property' => '--cs-posts-area-grid-columns-const',
							'suffix'   => '!important',
						),
						array(
							'element'  => '$ .cs-posts-area__grid',
							'property' => '--cs-posts-area-grid-columns',
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
					'default'        => '40px',
					'default_tablet' => '40px',
					'default_mobile' => '40px',
					'output'         => array(
						array(
							'element'  => '$ .cs-posts-area__main',
							'property' => '--cs-posts-area-grid-gap',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'custom_appearance',
					'label'   => esc_html__( 'Enable custom appearance', 'networker' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => false,
				),
				array(
					'key'     => 'post_format',
					'label'   => esc_html__( 'Enable post format', 'networker' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => true,
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
					'key'     => 'small_image_orientation',
					'label'   => esc_html__( 'Small Post Image Orientation', 'networker' ),
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
					'key'     => 'small_image_size',
					'label'   => esc_html__( 'Small Post Images Size', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'select',
					'default' => 'medium_large',
					'choices' => csco_get_list_available_image_sizes(),
				),
				array(
					'key'     => 'small_image_border_radius',
					'label'   => esc_html__( 'Small Post Image Border Radius', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'dimension',
					'output'  => array(
						array(
							'element'  => '$ .cs-posts-area__grid',
							'property' => '--cs-image-border-radius',
						),
					),
				),
				array(
					'key'     => 'large_image_orientation',
					'label'   => esc_html__( 'Large Post Image Orientation', 'networker' ),
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
					'key'     => 'large_image_size',
					'label'   => esc_html__( 'Large Post Images Size', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'select',
					'default' => 'medium_large',
					'choices' => csco_get_list_available_image_sizes(),
				),
				array(
					'key'     => 'large_image_border_radius',
					'label'   => esc_html__( 'Large Post Image Border Radius', 'networker' ),
					'section' => 'thumbnail',
					'type'    => 'dimension',
					'output'  => array(
						array(
							'element'  => '$ .cs-posts-area__alt',
							'property' => '--cs-image-border-radius',
						),
					),
				),
				// Typography.
				array(
					'key'        => 'small_typography_heading',
					'label'      => esc_html__( 'Small Post Heading Font Size', 'networker' ),
					'section'    => 'typography',
					'type'       => 'dimension',
					'default'    => '1.25rem',
					'responsive' => true,
					'output'     => array(
						array(
							'element'  => '$ .cs-posts-area__grid .cs-entry__title a',
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
				array(
					'key'             => 'small_typography_excerpt',
					'label'           => esc_html__( 'Small Post Excerpt Font Size', 'networker' ),
					'section'         => 'typography',
					'type'            => 'dimension',
					'default'         => '0.875rem',
					'responsive'      => true,
					'output'          => array(
						array(
							'element'  => '$ .cs-posts-area__grid .cs-entry__excerpt',
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
					'key'        => 'large_typography_heading',
					'label'      => esc_html__( 'Large Post Heading Font Size', 'networker' ),
					'section'    => 'typography',
					'type'       => 'dimension',
					'default'    => '1.5rem',
					'responsive' => true,
					'output'     => array(
						array(
							'element'  => '$ .cs-posts-area__alt .cs-entry__title a',
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
					'default'         => '1rem',
					'responsive'      => true,
					'output'          => array(
						array(
							'element'  => '$ .cs-posts-area__alt .cs-entry__excerpt',
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
				// Color Settings.
				array(
					'key'     => 'color_heading',
					'label'   => esc_html__( 'Heading Color', 'networker' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .cs-entry__information .cs-entry__title',
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
							'element'  => '$ .cs-entry__information .cs-entry__title',
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
							'element'  => '$ .cs-entry__information .cs-entry__excerpt',
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
							'element'  => '$ .cs-entry__information .cs-entry__post-meta',
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
							'element'  => '$ .cs-entry__information .cs-entry__post-meta, $ .cs-entry__information .cs-entry__author-meta',
							'property' => '--cs-color-meta-links',
							'suffix'   => '!important',
						),
						array(
							'element'  => '$ .cs-entry__information .cs-entry__post-meta',
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
							'element'  => '$ .cs-entry__information .cs-entry__post-meta, $ .cs-entry__information .cs-entry__author-meta',
							'property' => '--cs-color-meta-links-hover',
							'suffix'   => '!important',
						),
						array(
							'element'  => '$ .cs-entry__information .cs-entry__post-meta',
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
							'element'  => '$ .cs-entry__information .cs-entry__post-meta',
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
							'element'  => '$ .cs-entry__information .cs-entry__post-meta',
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
							'element'  => '$ .cs-entry-default .cs-entry__read-more a',
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
							'element'  => '$ .cs-entry-default .cs-entry__read-more a',
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
							'element'  => '$ .cs-entry-default .cs-entry__read-more a',
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
							'element'  => '$ .cs-entry-default .cs-entry__read-more a',
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
							'element'  => '$ .cs-entry-default .cs-entry__read-more a',
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
							'element'  => '$ .cs-entry-default .cs-entry__read-more a',
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
			// Small Meta.
			csco_get_gutenberg_meta_fields(
				array(
					'field_prefix' => 'small',
					'section_name' => 'small-meta',
				)
			),
			csco_get_gutenberg_excerpt_fields(
				array(
					'field_prefix' => 'small',
					'section_name' => 'small-meta',
					'default'      => true,
				)
			),
			csco_get_gutenberg_more_button_fields(
				array(
					'field_prefix' => 'small',
					'section_name' => 'small-meta',
					'default'      => true,
				)
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
			csco_get_gutenberg_more_button_fields(
				array(
					'field_prefix' => 'large',
					'section_name' => 'large-meta',
					'default'      => true,
				)
			)
		),
	);

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_layout_mixed' );
