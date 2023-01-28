<?php
/**
 * Typography
 *
 * @package Networker
 */

CSCO_Kirki::add_panel(
	'typography',
	array(
		'title'    => esc_html__( 'Typography', 'networker' ),
		'priority' => 30,
	)
);

CSCO_Kirki::add_section(
	'typography_general',
	array(
		'title'    => esc_html__( 'General', 'networker' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'typography',
		'settings' => 'font_base',
		'label'    => esc_html__( 'Base Font', 'networker' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Inter',
			'variant'        => 'regular',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1rem',
			'letter-spacing' => 'normal',
			'line-height'    => '1.5',
		),
		'choices'  => apply_filters(
			'powerkit_fonts_choices',
			array(
				'variant' => array(
					'regular',
					'italic',
					'500',
				),
			)
		),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'typography',
		'settings'    => 'font_primary',
		'label'       => esc_html__( 'Primary Font', 'networker' ),
		'description' => esc_html__( 'Used for buttons, and tags and other actionable elements.', 'networker' ),
		'section'     => 'typography_general',
		'default'     => array(
			'font-family'    => 'Inter',
			'variant'        => '500',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters(
			'powerkit_fonts_choices',
			array(
				'variant' => array(
					'regular',
					'500',
				),
			)
		),
		'priority'    => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'typography',
		'settings'    => 'font_secondary',
		'label'       => esc_html__( 'Secondary Font', 'networker' ),
		'description' => esc_html__( 'Used for image captions and other secondary elements.', 'networker' ),
		'section'     => 'typography_general',
		'default'     => array(
			'font-family'    => 'Inter',
			'variant'        => '400',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters(
			'powerkit_fonts_choices',
			array(
				'variant' => array(
					'regular',
					'500',
				),
			)
		),
		'priority'    => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'typography',
		'settings' => 'font_category',
		'label'    => esc_html__( 'Category Font', 'networker' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Inter',
			'variant'        => '600',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.6875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'typography',
		'settings' => 'font_post_meta',
		'label'    => esc_html__( 'Post Meta Font', 'networker' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Inter',
			'variant'        => '400',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'  => apply_filters(
			'powerkit_fonts_choices',
			array(
				'variant' => array(
					'regular',
					'500',
				),
			)
		),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'typography',
		'settings' => 'font_input',
		'label'    => esc_html__( 'Input Font', 'networker' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Inter',
			'variant'        => '400',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.75rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'typography',
		'settings' => 'font_post_subtitle',
		'label'    => esc_html__( 'Post Subtitle Font', 'networker' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'inherit',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1.5rem',
			'letter-spacing' => 'normal',
		),
		'choices'  => apply_filters(
			'powerkit_fonts_choices',
			array(
				'variant' => array(
					'regular',
					'italic',
					'600',
					'700',
					'700italic',
				),
			)
		),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'typography',
		'settings' => 'font_post_content',
		'label'    => esc_html__( 'Post Content Font', 'networker' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Inter',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1rem',
			'letter-spacing' => 'normal',
		),
		'choices'  => apply_filters(
			'powerkit_fonts_choices',
			array(
				'variant' => array(
					'regular',
					'italic',
					'500',
				),
			)
		),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'typography',
		'settings' => 'font_summary',
		'label'    => esc_html__( 'Summary Font', 'networker' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Inter',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1.5rem',
			'letter-spacing' => 'normal',
		),
		'choices'  => apply_filters(
			'powerkit_fonts_choices',
			array(
				'variant' => array(
					'regular',
					'500',
				),
			)
		),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'typography',
		'settings' => 'font_excerpt',
		'label'    => esc_html__( 'Entry Excerpt Font', 'networker' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'Inter',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.875rem',
			'letter-spacing' => 'normal',
		),
		'choices'  => apply_filters(
			'powerkit_fonts_choices',
			array(
				'variant' => array(
					'regular',
					'500',
				),
			)
		),
		'priority' => 10,
	)
);

CSCO_Kirki::add_section(
	'typography_logos',
	array(
		'title'    => esc_html__( 'Logos', 'networker' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'typography',
		'settings'        => 'font_main_logo',
		'label'           => esc_html__( 'Main Logo', 'networker' ),
		'description'     => esc_html__( 'The main logo is used in the navigation bar and mobile view of your website.', 'networker' ),
		'section'         => 'typography_logos',
		'default'         => array(
			'font-family'    => 'Inter',
			'font-size'      => '1.25rem',
			'variant'        => '500',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'         => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'logo',
				'operator' => '==',
				'value'    => '',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'typography',
		'settings'        => 'font_large_logo',
		'label'           => esc_html__( 'Large Logo', 'networker' ),
		'section'         => 'typography_logos',
		'default'         => array(
			'font-family'    => 'Inter',
			'font-size'      => '1.5rem',
			'variant'        => '500',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'description'     => esc_html__( 'The large logo is used in the site header in desktop view.', 'networker' ),
		'choices'         => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'cs-header-three',
			),
			array(
				'setting'  => 'large_logo',
				'operator' => '==',
				'value'    => '',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'typography',
		'settings'        => 'font_footer_logo',
		'label'           => esc_html__( 'Footer Logo', 'networker' ),
		'description'     => esc_html__( 'The footer logo is used in the site footer in desktop and mobile view.', 'networker' ),
		'section'         => 'typography_logos',
		'default'         => array(
			'font-family'    => 'Inter',
			'font-size'      => '1.25rem',
			'variant'        => '500',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'         => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'footer_logo',
				'operator' => '==',
				'value'    => '',
			),
		),
	)
);

CSCO_Kirki::add_section(
	'typography_headings',
	array(
		'title'    => esc_html__( 'Headings', 'networker' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'typography',
		'settings' => 'font_headings',
		'label'    => esc_html__( 'Headings', 'networker' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-family'    => 'Inter',
			'variant'        => '600',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
			'line-height'    => '1.25',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_section(
	'typography_section_headings',
	array(
		'title'    => esc_html__( 'Section Headings', 'networker' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'collapsible',
		'settings' => 'section_heading_collapsible_common',
		'section'  => 'typography_section_headings',
		'label'    => esc_html__( 'Common', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'      => 'typography',
		'settings'  => 'section_heading_font',
		'label'     => esc_html__( 'Default Font', 'networker' ),
		'section'   => 'typography_section_headings',
		'default'   => array(
			'font-family'    => 'Inter',
			'variant'        => '500',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1.125rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'   => apply_filters( 'powerkit_fonts_choices', array() ),
		'transport' => 'auto',
		'priority'  => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'      => 'typography',
		'settings'  => 'section_subheading_font',
		'label'     => esc_html__( 'Sub Heading Default Font', 'networker' ),
		'section'   => 'typography_section_headings',
		'default'   => array(
			'font-family'    => 'Inter',
			'variant'        => '500',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.6875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
		),
		'choices'   => apply_filters( 'powerkit_fonts_choices', array() ),
		'transport' => 'auto',
		'priority'  => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'section_subheading_color_text',
		'label'    => esc_html__( 'Sub Heading Color', 'networker' ),
		'section'  => 'typography_section_headings',
		'priority' => 10,
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => apply_filters(
			'csco_section_subheading_color_text',
			array(
				array(
					'element'  => ':root .cs-section-subheadings, [data-scheme="default"] .cs-section-subheadings',
					'property' => '--cs-section-subheadings-color',
					'context'  => array( 'editor', 'front' ),
				),
				array(
					'element'  => ':root .cnvs-block-section-heading, [data-scheme="default"] .cnvs-block-section-heading',
					'property' => '--cnvs-section-subheading-color',
					'context'  => array( 'editor', 'front' ),
				),
			)
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'section_subheading_color_text_dark',
		'label'    => esc_html__( 'Dark Sub Heading Color', 'networker' ),
		'section'  => 'typography_section_headings',
		'priority' => 10,
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => apply_filters(
			'csco_section_subheading_color_text',
			array(
				array(
					'element'  => '[data-scheme="dark"] .cs-section-subheadings',
					'property' => '--cs-section-subheadings-color',
					'context'  => array( 'editor', 'front' ),
				),
				array(
					'element'  => '[data-scheme="dark"] .cnvs-block-section-heading',
					'property' => '--cnvs-section-subheading-color',
					'context'  => array( 'editor', 'front' ),
				),
			)
		),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'select',
			'settings' => 'section_heading',
			'label'    => esc_html__( 'Default Style', 'networker' ),
			'section'  => 'typography_section_headings',
			'default'  => 'style-1',
			'priority' => 10,
			'choices'  => array(
				'style-1'    => esc_html__( 'Plain', 'networker' ),
				'style-2'    => esc_html__( 'Thin Bottom Line', 'networker' ),
				'style-3'    => esc_html__( 'Thick Bottom Line', 'networker' ),
				'style-4'    => esc_html__( 'Thin Side Line', 'networker' ),
				'style-5'    => esc_html__( 'Thick Side Line', 'networker' ),
				'style-6'    => esc_html__( 'Top Line', 'networker' ),
				'style-7'    => esc_html__( 'Bottom Line, Medium Length', 'networker' ),
				'style-8'    => esc_html__( 'Side Line with Angle', 'networker' ),
				'style-9'    => esc_html__( 'Cross Icon', 'networker' ),
				'style-10'   => esc_html__( 'Scewed Background', 'networker' ),
				'style-11'   => esc_html__( 'Scewed Background, Side Line', 'networker' ),
				'style-12'   => esc_html__( 'Solid Background', 'networker' ),
				'style-13'   => esc_html__( 'Bordered', 'networker' ),
				'style-14'   => esc_html__( 'Solid Background, Fullwidth', 'networker' ),
				'style-15'   => esc_html__( 'Bordered, Fullwidth', 'networker' ),
				'style-16'   => esc_html__( 'Double Line with Angle', 'networker' ),
				'style-17'   => esc_html__( 'Bottom Line, Short Length', 'networker' ),
				'subheading' => esc_html__( 'Subheading', 'networker' ),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'select',
		'settings' => 'section_heading_align',
		'label'    => esc_html__( 'Default Align', 'networker' ),
		'section'  => 'typography_section_headings',
		'default'  => 'halignleft',
		'priority' => 10,
		'choices'  => array(
			'halignleft'   => esc_html__( 'Align Text Left', 'networker' ),
			'haligncenter' => esc_html__( 'Align Text Center', 'networker' ),
			'halignright'  => esc_html__( 'Align Text Right', 'networker' ),
		),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'select',
			'settings' => 'section_heading_tag',
			'label'    => esc_html__( 'Default Tag', 'networker' ),
			'section'  => 'typography_section_headings',
			'default'  => 'h5',
			'priority' => 10,
			'choices'  => array(
				'h1'  => esc_html__( 'H1', 'networker' ),
				'h2'  => esc_html__( 'H2', 'networker' ),
				'h3'  => esc_html__( 'H3', 'networker' ),
				'h4'  => esc_html__( 'H4', 'networker' ),
				'h5'  => esc_html__( 'H5', 'networker' ),
				'h6'  => esc_html__( 'H6', 'networker' ),
				'p'   => esc_html__( 'P', 'networker' ),
				'div' => esc_html__( 'DIV', 'networker' ),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'color',
			'settings' => 'section_heading_color_border',
			'label'    => esc_html__( 'Border Color', 'networker' ),
			'section'  => 'typography_section_headings',
			'priority' => 10,
			'choices'  => array(
				'alpha' => true,
			),
			'output'   => apply_filters(
				'csco_section_heading_color_border',
				array(
					array(
						'element'  => ':root .cnvs-block-section-heading, [data-scheme="default"] .cnvs-block-section-heading, [data-scheme="dark"] [data-scheme="default"] .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-border-color',
						'context'  => array( 'editor', 'front' ),
					),
				)
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'color',
			'settings' => 'section_heading_color_border_dark',
			'label'    => esc_html__( 'Dark Border Color', 'networker' ),
			'section'  => 'typography_section_headings',
			'priority' => 10,
			'choices'  => array(
				'alpha' => true,
			),
			'output'   => apply_filters(
				'csco_section_heading_color_border',
				array(
					array(
						'element'  => '[data-scheme="dark"] .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-border-color',
						'context'  => array( 'editor', 'front' ),
					),
				)
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'color',
			'settings' => 'section_heading_color_accent',
			'label'    => esc_html__( 'Accent Color', 'networker' ),
			'section'  => 'typography_section_headings',
			'priority' => 10,
			'choices'  => array(
				'alpha' => true,
			),
			'output'   => apply_filters(
				'csco_section_heading_color_accent',
				array(
					array(
						'element'  => ':root .cnvs-block-section-heading, [data-scheme="default"] .cnvs-block-section-heading, [data-scheme="dark"] [data-scheme="default"] .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-icon-color',
						'context'  => array( 'editor', 'front' ),
					),
					array(
						'element'  => ':root .cnvs-block-section-heading, [data-scheme="default"] .cnvs-block-section-heading, [data-scheme="dark"] [data-scheme="default"] .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-accent-block-backround',
						'context'  => array( 'editor', 'front' ),
					),
				)
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'color',
			'settings' => 'section_heading_color_accent_dark',
			'label'    => esc_html__( 'Dark Accent Color', 'networker' ),
			'section'  => 'typography_section_headings',
			'priority' => 10,
			'choices'  => array(
				'alpha' => true,
			),
			'output'   => apply_filters(
				'csco_section_heading_color_accent',
				array(
					array(
						'element'  => '[data-scheme="dark"] .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-icon-color',
						'context'  => array( 'editor', 'front' ),
					),
					array(
						'element'  => '[data-scheme="dark"] .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-accent-block-backround',
						'context'  => array( 'editor', 'front' ),
					),
				)
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'color',
			'settings' => 'section_heading_color_accent_contrast',
			'label'    => esc_html__( 'Accent Contrast Color', 'networker' ),
			'section'  => 'typography_section_headings',
			'priority' => 10,
			'choices'  => array(
				'alpha' => true,
			),
			'output'   => apply_filters(
				'csco_section_heading_color_accent',
				array(
					array(
						'element'  => ':root .cnvs-block-section-heading, [data-scheme="default"] .cnvs-block-section-heading, [data-scheme="dark"] [data-scheme="default"] .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-accent-block-color',
						'context'  => array( 'editor', 'front' ),
					),
				)
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'color',
			'settings' => 'section_heading_color_accent_contrast_dark',
			'label'    => esc_html__( 'Dark Accent Contrast Color', 'networker' ),
			'section'  => 'typography_section_headings',
			'priority' => 10,
			'choices'  => array(
				'alpha' => true,
			),
			'output'   => apply_filters(
				'csco_section_heading_color_accent',
				array(
					array(
						'element'  => '[data-scheme="dark"] .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-accent-block-color',
						'context'  => array( 'editor', 'front' ),
					),
				)
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'section_heading_color_text',
		'label'    => esc_html__( 'Text Color', 'networker' ),
		'section'  => 'typography_section_headings',
		'priority' => 10,
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => apply_filters(
			'csco_section_heading_color_text',
			array(
				array(
					'element'  => ':root .cnvs-block-section-heading, [data-scheme="default"] .cnvs-block-section-heading, [data-scheme="dark"] [data-scheme="default"] .cnvs-block-section-heading',
					'property' => '--cnvs-section-heading-color',
					'context'  => array( 'editor', 'front' ),
				),
			)
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'color',
		'settings' => 'section_heading_color_text_dark',
		'label'    => esc_html__( 'Dark Text Color', 'networker' ),
		'section'  => 'typography_section_headings',
		'priority' => 10,
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => apply_filters(
			'csco_section_heading_color_text',
			array(
				array(
					'element'  => '[data-scheme="dark"] .cnvs-block-section-heading',
					'property' => '--cnvs-section-heading-color',
					'context'  => array( 'editor', 'front' ),
				),
			)
		),
	)
);




CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'collapsible',
		'settings' => 'section_heading_collapsible_submenu',
		'section'  => 'typography_section_headings',
		'label'    => esc_html__( 'Widgetized Sub-Menus', 'networker' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'toggle',
		'settings'    => 'section_heading_submenu_default',
		'label'       => esc_html__( 'Default Settings', 'networker' ),
		'description' => esc_html__( 'You may change the default settings in Common Settings', 'networker' ),
		'section'     => 'typography_section_headings',
		'default'     => true,
		'priority'    => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'typography',
		'settings'        => 'section_heading_submenu_font',
		'label'           => esc_html__( 'Default Font', 'networker' ),
		'section'         => 'typography_section_headings',
		'default'         => array(
			'font-family'    => 'Inter',
			'variant'        => '500',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1.125rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'none',
		),
		'choices'         => apply_filters( 'powerkit_fonts_choices', array() ),
		'transport'       => 'auto',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_submenu_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'typography',
		'settings'        => 'section_subheading_submenu_font',
		'label'           => esc_html__( 'Sub Heading Default Font', 'networker' ),
		'section'         => 'typography_section_headings',
		'default'         => array(
			'font-family'    => 'Inter',
			'variant'        => '500',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.6875rem',
			'letter-spacing' => 'normal',
			'text-transform' => 'uppercase',
		),
		'choices'         => apply_filters( 'powerkit_fonts_choices', array() ),
		'transport'       => 'auto',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_submenu_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'color',
		'settings'        => 'section_subheading_submenu_color_text',
		'label'           => esc_html__( 'Sub Heading Color', 'networker' ),
		'section'         => 'typography_section_headings',
		'priority'        => 10,
		'choices'         => array(
			'alpha' => true,
		),
		'output'          => apply_filters(
			'csco_section_subheading_submenu_color_text',
			array(
				array(
					'element'  => ':root .cs-header__widgets-column .cnvs-block-section-heading, [data-scheme="default"] .cs-header__widgets-column .cnvs-block-section-heading',
					'property' => '--cnvs-section-subheading-color',
					'context'  => array( 'editor', 'front' ),
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_submenu_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'color',
		'settings'        => 'section_subheading_submenu_color_text_dark',
		'label'           => esc_html__( 'Dark Sub Heading Color', 'networker' ),
		'section'         => 'typography_section_headings',
		'priority'        => 10,
		'choices'         => array(
			'alpha' => true,
		),
		'output'          => apply_filters(
			'csco_section_subheading_submenu_color_text',
			array(
				array(
					'element'  => '[data-scheme="dark"] .cs-header__widgets-column .cnvs-block-section-heading',
					'property' => '--cnvs-section-subheading-color',
					'context'  => array( 'editor', 'front' ),
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_submenu_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'select',
			'settings'        => 'section_heading_submenu',
			'label'           => esc_html__( 'Default Style', 'networker' ),
			'section'         => 'typography_section_headings',
			'default'         => 'style-1',
			'priority'        => 10,
			'choices'         => array(
				'style-1'    => esc_html__( 'Plain', 'networker' ),
				'style-2'    => esc_html__( 'Thin Bottom Line', 'networker' ),
				'style-3'    => esc_html__( 'Thick Bottom Line', 'networker' ),
				'style-4'    => esc_html__( 'Thin Side Line', 'networker' ),
				'style-5'    => esc_html__( 'Thick Side Line', 'networker' ),
				'style-6'    => esc_html__( 'Top Line', 'networker' ),
				'style-7'    => esc_html__( 'Bottom Line, Medium Length', 'networker' ),
				'style-8'    => esc_html__( 'Side Line with Angle', 'networker' ),
				'style-9'    => esc_html__( 'Cross Icon', 'networker' ),
				'style-10'   => esc_html__( 'Scewed Background', 'networker' ),
				'style-11'   => esc_html__( 'Scewed Background, Side Line', 'networker' ),
				'style-12'   => esc_html__( 'Solid Background', 'networker' ),
				'style-13'   => esc_html__( 'Bordered', 'networker' ),
				'style-14'   => esc_html__( 'Solid Background, Fullwidth', 'networker' ),
				'style-15'   => esc_html__( 'Bordered, Fullwidth', 'networker' ),
				'style-16'   => esc_html__( 'Double Line with Angle', 'networker' ),
				'style-17'   => esc_html__( 'Bottom Line, Short Length', 'networker' ),
				'subheading' => esc_html__( 'Subheading', 'networker' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'select',
		'settings'        => 'section_heading_submenu_align',
		'label'           => esc_html__( 'Default Align', 'networker' ),
		'section'         => 'typography_section_headings',
		'default'         => 'halignleft',
		'priority'        => 10,
		'choices'         => array(
			'halignleft'   => esc_html__( 'Align Text Left', 'networker' ),
			'haligncenter' => esc_html__( 'Align Text Center', 'networker' ),
			'halignright'  => esc_html__( 'Align Text Right', 'networker' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_submenu_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'select',
			'settings'        => 'section_heading_submenu_tag',
			'label'           => esc_html__( 'Default Tag', 'networker' ),
			'section'         => 'typography_section_headings',
			'default'         => 'h5',
			'priority'        => 10,
			'choices'         => array(
				'h1'  => esc_html__( 'H1', 'networker' ),
				'h2'  => esc_html__( 'H2', 'networker' ),
				'h3'  => esc_html__( 'H3', 'networker' ),
				'h4'  => esc_html__( 'H4', 'networker' ),
				'h5'  => esc_html__( 'H5', 'networker' ),
				'h6'  => esc_html__( 'H6', 'networker' ),
				'p'   => esc_html__( 'P', 'networker' ),
				'div' => esc_html__( 'DIV', 'networker' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_submenu_color_border',
			'label'           => esc_html__( 'Border Color', 'networker' ),
			'section'         => 'typography_section_headings',
			'priority'        => 10,
			'choices'         => array(
				'alpha' => true,
			),
			'output'          => apply_filters(
				'csco_section_heading_submenu_color_border',
				array(
					array(
						'element'  => ':root .cs-header__widgets-column .cnvs-block-section-heading, [data-scheme="default"] .cs-header__widgets-column .cnvs-block-section-heading, [data-scheme="dark"] [data-scheme="default"] .cs-header__widgets-column .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-border-color',
						'context'  => array( 'front' ),
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_submenu_color_border_dark',
			'label'           => esc_html__( 'Dark Border Color', 'networker' ),
			'section'         => 'typography_section_headings',
			'priority'        => 10,
			'choices'         => array(
				'alpha' => true,
			),
			'output'          => apply_filters(
				'csco_section_heading_submenu_color_border',
				array(
					array(
						'element'  => '[data-scheme="dark"] .cs-header__widgets-column .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-border-color',
						'context'  => array( 'front' ),
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_submenu_color_accent',
			'label'           => esc_html__( 'Accent Color', 'networker' ),
			'section'         => 'typography_section_headings',
			'priority'        => 10,
			'choices'         => array(
				'alpha' => true,
			),
			'output'          => apply_filters(
				'csco_section_heading_submenu_color_accent',
				array(
					array(
						'element'  => ':root .cs-header__widgets-column .cnvs-block-section-heading, [data-scheme="default"] .cs-header__widgets-column .cnvs-block-section-heading, [data-scheme="dark"] [data-scheme="default"] .cs-header__widgets-column .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-icon-color',
						'context'  => array( 'front' ),
					),
					array(
						'element'  => ':root .cs-header__widgets-column .cnvs-block-section-heading, [data-scheme="default"] .cs-header__widgets-column .cnvs-block-section-heading, [data-scheme="dark"] [data-scheme="default"] .cs-header__widgets-column .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-accent-block-backround',
						'context'  => array( 'front' ),
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_submenu_color_accent_dark',
			'label'           => esc_html__( 'Dark Accent Color', 'networker' ),
			'section'         => 'typography_section_headings',
			'priority'        => 10,
			'choices'         => array(
				'alpha' => true,
			),
			'output'          => apply_filters(
				'csco_section_heading_submenu_color_accent',
				array(
					array(
						'element'  => '[data-scheme="dark"] .cs-header__widgets-column .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-icon-color',
						'context'  => array( 'front' ),
					),
					array(
						'element'  => '[data-scheme="dark"] .cs-header__widgets-column .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-accent-block-backround',
						'context'  => array( 'front' ),
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_submenu_color_accent_contrast',
			'label'           => esc_html__( 'Accent Contrast Color', 'networker' ),
			'section'         => 'typography_section_headings',
			'priority'        => 10,
			'choices'         => array(
				'alpha' => true,
			),
			'output'          => apply_filters(
				'csco_section_heading_submenu_color_accent',
				array(
					array(
						'element'  => ':root .cs-header__widgets-column .cnvs-block-section-heading, [data-scheme="default"] .cs-header__widgets-column .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-accent-block-color',
						'context'  => array( 'front' ),
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'color',
			'settings'        => 'section_heading_submenu_color_accent_contrast_dark',
			'label'           => esc_html__( 'Dark Accent Contrast Color', 'networker' ),
			'section'         => 'typography_section_headings',
			'priority'        => 10,
			'choices'         => array(
				'alpha' => true,
			),
			'output'          => apply_filters(
				'csco_section_heading_submenu_color_accent',
				array(
					array(
						'element'  => '[data-scheme="dark"] .cs-header__widgets-column .cnvs-block-section-heading',
						'property' => '--cnvs-section-heading-accent-block-color',
						'context'  => array( 'front' ),
					),
				)
			),
			'active_callback' => array(
				array(
					'setting'  => 'section_heading_submenu_default',
					'operator' => '!=',
					'value'    => true,
				),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'            => 'color',
		'settings'        => 'section_heading_submenu_color_text',
		'label'           => esc_html__( 'Text Color', 'networker' ),
		'section'         => 'typography_section_headings',
		'priority'        => 10,
		'choices'         => array(
			'alpha' => true,
		),
		'output'          => apply_filters(
			'csco_section_heading_submenu_color_text',
			array(
				array(
					'element'  => ':root .cs-header__widgets-column .cnvs-block-section-heading, [data-scheme="default"] .cs-header__widgets-column .cnvs-block-section-heading, [data-scheme="dark"] [data-scheme="default"] .cs-header__widgets-column .cnvs-block-section-heading',
					'property' => '--cnvs-section-heading-color',
					'context'  => array( 'front' ),
				),
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'section_heading_submenu_default',
				'operator' => '!=',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_section(
	'typography_navigation',
	array(
		'title'    => esc_html__( 'Navigation', 'networker' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'typography',
		'settings'    => 'font_menu',
		'label'       => esc_html__( 'Menu Font', 'networker' ),
		'description' => esc_html__( 'Used for main top level menu elements.', 'networker' ),
		'section'     => 'typography_navigation',
		'default'     => array(
			'font-family'    => 'Inter',
			'variant'        => '400',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.875rem',
			'letter-spacing' => '-0.0125em',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'typography',
		'settings'    => 'font_submenu',
		'label'       => esc_html__( 'Submenu Font', 'networker' ),
		'description' => esc_html__( 'Used for submenu elements.', 'networker' ),
		'section'     => 'typography_navigation',
		'default'     => array(
			'font-family'    => 'Inter',
			'subsets'        => array( 'latin' ),
			'variant'        => '400',
			'font-size'      => '0.75rem',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
	)
);
