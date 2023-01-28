<?php
/**
 * Footer Settings
 *
 * @package Networker
 */

CSCO_Kirki::add_section(
	'footer',
	array(
		'title'    => esc_html__( 'Footer Settings', 'networker' ),
		'priority' => 40,
	)
);


CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'        => 'collapsible',
		'settings'    => 'footer_collapsible_common',
		'label'       => esc_html__( 'Common', 'networker' ),
		'section'     => 'footer',
		'priority'    => 10,
		'input_attrs' => array(
			'collapsed' => true,
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'radio',
		'settings' => 'footer_layout',
		'label'    => esc_html__( 'Layout', 'networker' ),
		'section'  => 'footer',
		'default'  => 'cs-footer-one',
		'priority' => 10,
		'choices'  => apply_filters( 'csco_footer_layouts', array(
			'cs-footer-one'   => esc_html__( 'Footer 1', 'networker' ),
			'cs-footer-two'   => esc_html__( 'Footer 2', 'networker' ),
			'cs-footer-three' => esc_html__( 'Footer 3', 'networker' ),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'              => 'textarea',
		'settings'          => 'footer_text',
		'label'             => esc_html__( 'Footer Text', 'networker' ),
		'section'           => 'footer',
		/* translators: %s: Author name. */
		'default'           => sprintf( esc_html__( 'Designed & Developed by %s', 'networker' ), '<a href="' . esc_url( csco_get_theme_data( 'AuthorURI' ) ) . '">Code Supply Co.</a>' ),
		'priority'          => 10,
		'sanitize_callback' => 'wp_kses_post',
	)
);

if ( csco_powerkit_module_enabled( 'social_links' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'collapsible',
			'settings' => 'footer_collapsible_social',
			'label'    => esc_html__( 'Social Links', 'networker' ),
			'section'  => 'footer',
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'checkbox',
			'settings' => 'footer_social_links',
			'label'    => esc_html__( 'Display social links', 'networker' ),
			'section'  => 'footer',
			'default'  => false,
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'select',
			'settings'        => 'footer_social_links_scheme',
			'label'           => esc_html__( 'Color scheme', 'networker' ),
			'section'         => 'footer',
			'default'         => 'light',
			'priority'        => 10,
			'choices'         => array(
				'default' => esc_html__( 'Light', 'networker' ),
				'bold'    => esc_html__( 'Bold', 'networker' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'number',
			'settings'        => 'footer_social_links_maximum',
			'label'           => esc_html__( 'Maximum Number of Social Links', 'networker' ),
			'section'         => 'footer',
			'default'         => 4,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'footer_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'checkbox',
			'settings'        => 'footer_social_links_counts',
			'label'           => esc_html__( 'Display counts', 'networker' ),
			'section'         => 'footer',
			'default'         => true,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'footer_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}

if ( csco_powerkit_module_enabled( 'instagram_integration' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'collapsible',
			'settings' => 'footer_collapsible_instagram',
			'label'    => esc_html__( 'Instagram', 'networker' ),
			'section'  => 'footer',
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'     => 'text',
			'settings' => 'footer_instagram_username',
			'label'    => esc_html__( 'Instagram Username', 'networker' ),
			'section'  => 'footer',
			'default'  => '',
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'radio',
			'settings'        => 'footer_instagram_type',
			'label'           => esc_html__( 'Type', 'networker' ),
			'section'         => 'footer',
			'default'         => 'simple',
			'priority'        => 10,
			'choices'         => array(
				'simple'   => esc_html__( 'Simple', 'networker' ),
				'carousel' => esc_html__( 'Carousel', 'networker' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_instagram_username',
					'operator' => '!=',
					'value'    => '',
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'checkbox',
			'settings'        => 'footer_instagram_header',
			'label'           => esc_html__( 'Display header', 'networker' ),
			'section'         => 'footer',
			'default'         => true,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'footer_instagram_username',
					'operator' => '!=',
					'value'    => '',
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'              => 'text',
			'settings'          => 'footer_instagram_title',
			'label'             => esc_html__( 'Title', 'networker' ),
			'section'           => 'footer',
			'default'           => esc_html__( '[[Our Latest]] Instagram Posts', 'networker' ),
			'priority'          => 10,
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => array(
				array(
					'setting'  => 'footer_instagram_username',
					'operator' => '!=',
					'value'    => '',
				),
				array(
					'setting'  => 'footer_instagram_header',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'slider',
			'settings'        => 'footer_instagram_columns_desktop',
			'label'           => esc_html__( 'Number of Columns Desktop', 'networker' ),
			'section'         => 'footer',
			'default'         => 4,
			'choices'         => array(
				'min'  => 1,
				'max'  => 6,
				'step' => 1,
			),
			'priority'        => 10,
			'output'          => array(
				array(
					'element'  => '.cs-footer__instagram .pk-instagram-carousel',
					'property' => '--cs-carousel-columns',
					'suffix'   => '!important',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_instagram_username',
					'operator' => '!=',
					'value'    => '',
				),
				array(
					'setting'  => 'footer_instagram_type',
					'operator' => '==',
					'value'    => 'carousel',
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'slider',
			'settings'        => 'footer_instagram_columns_tablet',
			'label'           => esc_html__( 'Number of Columns Tablet', 'networker' ),
			'section'         => 'footer',
			'default'         => 2,
			'choices'         => array(
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			),
			'priority'        => 10,
			'output'          => array(
				array(
					'element'     => '.cs-footer__instagram .pk-instagram-carousel',
					'property'    => '--cs-carousel-columns',
					'media_query' => '@media (max-width: 1019px)',
					'suffix'      => '!important',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_instagram_username',
					'operator' => '!=',
					'value'    => '',
				),
				array(
					'setting'  => 'footer_instagram_type',
					'operator' => '==',
					'value'    => 'carousel',
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod',
		array(
			'type'            => 'slider',
			'settings'        => 'footer_instagram_columns_mobile',
			'label'           => esc_html__( 'Number of Columns Mobile', 'networker' ),
			'section'         => 'footer',
			'default'         => 1,
			'choices'         => array(
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			),
			'priority'        => 10,
			'output'          => array(
				array(
					'element'     => '.cs-footer__instagram .pk-instagram-carousel',
					'property'    => '--cs-carousel-columns',
					'media_query' => '@media (max-width: 599px)',
					'suffix'      => '!important',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_instagram_username',
					'operator' => '!=',
					'value'    => '',
				),
				array(
					'setting'  => 'footer_instagram_type',
					'operator' => '==',
					'value'    => 'carousel',
				),
			),
		)
	);
}
