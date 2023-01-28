<?php
/**
 * Filters.
 *
 * @package Networker
 */

/**
 * PinIt exclude selectors from archive
 *
 * @param string $selectors List selectors.
 */
function csco_archive_pinit_exclude_selectors( $selectors ) {
	$selectors[] = '.cs-posts-area__main';
	$selectors[] = '.cs-entry';

	return $selectors;
}
add_filter( 'powerkit_pinit_exclude_selectors', 'csco_archive_pinit_exclude_selectors' );

/**
 * Set the correct slug for the default scheme
 *
 * @param string $slug The slug of scheme.
 */
function csco_canvas_scheme_default_slug( $slug ) {
	$slug = csco_detect_color_scheme( get_theme_mod( 'color_site_background', '#FFFFFF' ) );

	return $slug;
}
add_filter( 'canvas_scheme_default_slug', 'csco_canvas_scheme_default_slug' );

/**
 * Set the correct slug for the dark scheme
 *
 * @param string $slug The slug of scheme.
 */
function csco_canvas_scheme_dark_slug( $slug ) {
	$slug = csco_detect_color_scheme( get_theme_mod( 'color_site_background_dark', '#1c1c1c' ) );

	return $slug;
}
add_filter( 'canvas_scheme_dark_slug', 'csco_canvas_scheme_dark_slug' );

/**
 * Change settings of canvas posts
 *
 * @param array $blocks All registered blocks.
 */
function csco_change_settings_canvas_posts( $blocks ) {

	foreach ( $blocks as $key => $block ) {
		if ( 'canvas/posts' !== $block['name'] ) {
			continue;
		}

		$blocks[ $key ] = array_merge( $blocks[ $key ], array(
			'template'      => get_template_directory() . '/template-parts/blocks/posts-area.php',
			'fallback'      => array(
				'layout' => 'standard-type-1',
			),
			'layouts'       => array(),
			'style'         => null,
			'script'        => null,
			'editor_style'  => null,
			'editor_script' => null,
		) );
	}

	return $blocks;

}
add_filter( 'canvas_register_block_type', 'csco_change_settings_canvas_posts', 999 );

/**
 * Add new styles to "Section Headings"
 *
 * @param array $blocks All registered blocks.
 */
function csco_add_styles_section_headings( $blocks ) {

	$fields_remove = array(
		'colorHeadingBorder',
		'colorHeadingAccent',
		'colorHeading',
	);

	foreach ( $blocks as $key => $block ) {

		if ( 'canvas/section-heading' !== $block['name'] ) {
			continue;
		}

		// Add new heading.
		$blocks[ $key ]['styles'][] = array(
			'name'  => 'cnvs-block-section-subheading',
			'label' => esc_html__( 'Subheading', 'networker' ),
		);

		// Remove basic fields.
		foreach ( $blocks[ $key ]['fields'] as $f => $field ) {
			if ( in_array( $field['key'], $fields_remove, true ) ) {
				unset( $blocks[ $key ]['fields'][ $f ] );
			}
		}

		// Reset keys.
		$blocks[ $key ]['fields'] = array_values( $blocks[ $key ]['fields'] );

		// Add color fields.
		$blocks[ $key ]['fields'][] = array(
			'key'     => 'colorHeadingBorder',
			'label'   => esc_html__( 'Border Color', 'networker' ),
			'section' => 'color',
			'type'    => 'color',
			'output'  => array(
				array(
					'element'  => '$.cnvs-block-section-heading',
					'property' => '--cnvs-section-heading-border-color',
					'suffix'   => '!important',
				),
			),
		);
		$blocks[ $key ]['fields'][] = array(
			'key'     => 'colorHeadingAccent',
			'label'   => esc_html__( 'Accent Color', 'networker' ),
			'section' => 'color',
			'type'    => 'color',
			'output'  => array(
				array(
					'element'  => '$.cnvs-block-section-heading',
					'property' => '--cnvs-section-heading-icon-color',
					'suffix'   => '!important',
				),
				array(
					'element'  => '$.cnvs-block-section-heading',
					'property' => '--cnvs-section-heading-accent-block-backround',
					'suffix'   => '!important',
				),
			),
		);
		$blocks[ $key ]['fields'][] = array(
			'key'     => 'colorHeadingAccentContrast',
			'label'   => esc_html__( 'Accent Contrast Color', 'networker' ),
			'section' => 'color',
			'type'    => 'color',
			'output'  => array(
				array(
					'element'  => '$.cnvs-block-section-heading',
					'property' => '--cnvs-section-heading-accent-block-color',
					'suffix'   => '!important',
				),
			),
		);
		$blocks[ $key ]['fields'][] = array(
			'key'     => 'colorHeading',
			'label'   => esc_html__( 'Text Color', 'networker' ),
			'section' => 'color',
			'type'    => 'color',
			'output'  => array(
				array(
					'element'  => '$.cnvs-block-section-heading',
					'property' => '--cnvs-section-heading-color',
					'suffix'   => '!important',
				),
			),
		);
	}

	return $blocks;
}
add_filter( 'canvas_register_block_type', 'csco_add_styles_section_headings', 999 );

/**
 * Change settings of canvas sections
 *
 * @param array $blocks All registered blocks.
 */
function csco_change_settings_canvas_sections( $blocks ) {

	foreach ( $blocks as $key => $block ) {

		if ( 'canvas/section' === $block['name'] ) {
			$blocks[ $key ] = array_merge(
				$blocks[ $key ],
				array(
					'style'        => null,
					'editor_style' => null,
				)
			);

			csco_smart_array_push( $blocks[ $key ]['fields'], array(
				'key'             => 'gapSection',
				'label'           => esc_html__( 'Gap', 'networker' ),
				'type'            => 'dimension',
				'section'         => 'general',
				'responsive'      => true,
				'default'         => '60px',
				'default_tablet'  => '40px',
				'default_mobile'  => '48px',
				'output'          => array(
					array(
						'element'  => '$ .cnvs-block-section-inner',
						'property' => '--cs-block-section-gap',
						'suffix'   => '!important',
					),
				),
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '!=',
						'value'    => 'full',
					),
				),
			), 4, true );

			csco_smart_array_push( $blocks[ $key ]['fields'], array(
				'key'             => 'sidebarWidth',
				'label'           => esc_html__( 'Sidebar Width', 'networker' ),
				'type'            => 'dimension',
				'section'         => 'general',
				'responsive'      => true,
				'default'         => '300px',
				'default_tablet'  => '300px',
				'default_mobile'  => '300px',
				'output'          => array(
					array(
						'element'  => '$ .cnvs-block-section-inner',
						'property' => '--cs-block-section-sidebar-width',
						'suffix'   => '!important',
					),
				),
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '!=',
						'value'    => 'full',
					),
				),
			), 5, true );
		}

		if ( 'canvas/section-content' === $block['name'] || 'canvas/section-sidebar' === $block['name'] ) {
			csco_smart_array_push( $blocks[ $key ]['fields'], array(
				'key'     => 'textColor',
				'label'   => esc_html__( 'Text Color', 'networker' ),
				'section' => esc_html__( 'Color Settings', 'networker' ),
				'type'    => 'color',
				'default' => '',
				'output'  => array(
					array(
						'property' => 'color',
						'suffix'   => '!important',
					),
				),
			), false, true );

			csco_smart_array_push( $blocks[ $key ]['fields'], array(
				'key'     => 'backgroundColor',
				'label'   => esc_html__( 'Background Color', 'networker' ),
				'section' => esc_html__( 'Color Settings', 'networker' ),
				'type'    => 'color',
				'default' => '',
				'output'  => array(
					array(
						'property' => 'background-color',
						'suffix'   => '!important',
					),
				),
			), false, true );
		}
	}

	return $blocks;
}
add_filter( 'canvas_register_block_type', 'csco_change_settings_canvas_sections', 999 );

/**
 * Change breakpoints for gap of section content
 */
add_filter( 'canvas_blocks_dynamic_breakpoint_width', function( $width, $field ) {

	if ( isset( $field['key'] ) && 'gapSection' === $field['key'] ) {
		$width = 1019 === $width ? 1199 : $width;
		$width = 599 === $width ? 1019 : $width;
	}

	return $width;
}, 10, 2 );

/**
 * Register Current Date block
 *
 * @param array $blocks all registered blocks.
 */
function csco_register_current_date_block( $blocks ) {
	$blocks[] = array(
		'name'        => 'canvas/current-date',
		'title'       => esc_html__( 'Current Date', 'networker' ),
		'description' => '',
		'category'    => 'canvas',
		'keywords'    => array(),
		'icon'        => '<svg viewBox="0 0 32 32"><g fill="#101820"><path d="m26 29h-24a1 1 0 0 1 -1-1v-20a2 2 0 0 1 2-2h26a2 2 0 0 1 2 2v16a1 1 0 0 1 -.29.71l-4 4a1 1 0 0 1 -.71.29zm-23-2h22.59l3.41-3.41v-15.59h-26z"/><path d="m15 4h2v3h-2z"/><path d="m6 4h2v3h-2z"/><path d="m24 4h2v3h-2z"/><path d="m30 14h-28a1 1 0 0 1 0-2h28a1 1 0 0 1 0 2z"/><path d="m13 24a1 1 0 0 1 -1-1v-4.38l-.55.27a1 1 0 0 1 -.9-1.78l2-1a1 1 0 0 1 1.45.89v6a1 1 0 0 1 -1 1z"/><path d="m20 24h-2a2 2 0 0 1 -2-2v-4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2zm-2-6v4h2v-4z"/><path d="m30 24-4 4v-4z"/><path d="m26 29a.84.84 0 0 1 -.38-.08 1 1 0 0 1 -.62-.92v-4a1 1 0 0 1 1-1h4a1 1 0 0 1 .92.62 1 1 0 0 1 -.21 1.09l-4 4a1 1 0 0 1 -.71.29zm1-4v.59l.59-.59z"/></g></svg>',
		'supports'    => array(
			'className'        => true,
			'anchor'           => true,
			'html'             => false,
			'canvasSpacings'   => true,
			'canvasBorder'     => true,
			'canvasResponsive' => true,
		),
		'styles'      => array(),
		'location'    => array(),
		'layouts'     => array(),
		'sections'    => array(
			'general'    => array(
				'title'    => esc_html__( 'Block Settings', 'networker' ),
				'priority' => 5,
				'open'     => true,
			),
			'color'      => array(
				'title'    => esc_html__( 'Color Settings', 'networker' ),
				'priority' => 10,
			),
			'typography' => array(
				'title'    => esc_html__( 'Typography Settings', 'networker' ),
				'priority' => 10,
			),
		),
		'fields'      => array(
			array(
				'key'     => 'format',
				'label'   => esc_html__( 'Format', 'networker' ),
				'section' => 'general',
				'type'    => 'text',
				'default' => 'F d, Y',
			),
			array(
				'key'      => 'text-align',
				'label'    => esc_html__( 'Text Align', 'networker' ),
				'section'  => 'general',
				'type'     => 'select',
				'multiple' => false,
				'choices'  => array(
					'left'   => esc_html__( 'Left', 'networker' ),
					'right'  => esc_html__( 'Right', 'networker' ),
					'center' => esc_html__( 'Center', 'networker' ),
				),
				'default'  => 'left',
				'output'   => array(
					array(
						'element'  => '$',
						'property' => 'text-align',
						'suffix'   => '!important',
					),
				),
			),
			array(
				'key'     => 'colorText',
				'label'   => esc_html__( 'Color', 'networker' ),
				'section' => 'color',
				'type'    => 'color',
				'output'  => array(
					array(
						'element'  => '$',
						'property' => 'color',
						'suffix'   => '!important',
					),
				),
			),
			array(
				'key'        => 'typographyText',
				'label'      => esc_html__( 'Font Size', 'networker' ),
				'section'    => 'typography',
				'type'       => 'dimension',
				'default'    => '0.75rem',
				'responsive' => true,
				'output'     => array(
					array(
						'element'  => '$',
						'property' => 'font-size',
						'suffix'   => '!important',
					),
				),
			),
		),
		'template'    => get_template_directory() . '/template-parts/blocks/current-date.php',
	);

	return $blocks;
}
add_filter( 'canvas_register_block_type', 'csco_register_current_date_block' );

/**
 * Change post query by posts attributes
 *
 * @param array $args Args for post query.
 * @param array $attributes Block attributes.
 * @param array $options Block options.
 */
function csco_canvas_posts_query_args( $args, $attributes, $options ) {

	// Posts count.
	if ( isset( $options['areaPostsCount'] ) && $options['areaPostsCount'] ) {
		$args['posts_per_page'] = $options['areaPostsCount'];
	}

	return $args;
}
add_filter( 'canvas_block_posts_query_args', 'csco_canvas_posts_query_args', 10, 3 );

/**
 * Remove Widget Layouts
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_remove_widget_layouts( $layouts = array() ) {

	unset( $layouts['sidebar-list'] );
	unset( $layouts['sidebar-numbered'] );
	unset( $layouts['sidebar-large'] );

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_remove_widget_layouts', 999 );
