<?php
/**
 * Category Settings
 *
 * @package Networker
 */

CSCO_Kirki::add_section(
	'category_settings',
	array(
		'title'    => esc_html__( 'Category Settings', 'networker' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod',
	array(
		'type'     => 'checkbox',
		'settings' => 'category_subcategories',
		'label'    => esc_html__( 'Display subcategory filter', 'networker' ),
		'section'  => 'category_settings',
		'default'  => false,
		'priority' => 10,
	)
);
