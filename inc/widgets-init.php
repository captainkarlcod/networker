<?php
/**
 * Widgets Init
 *
 * Register sitebar locations for widgets.
 *
 * @package Networker
 */

if ( ! function_exists( 'csco_widgets_init' ) ) {
	/**
	 * Register sidebars
	 */
	function csco_widgets_init() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Default Sidebar', 'networker' ),
				'id'            => 'sidebar-main',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, null ),
				'after_title'   => csco_section_heading( null, 'after', false, null ),
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Off-canvas', 'networker' ),
				'id'            => 'sidebar-offcanvas',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, null ),
				'after_title'   => csco_section_heading( null, 'after', false, null ),
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Auto Loaded Sidebar', 'networker' ),
				'id'            => 'sidebar-loaded',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, null ),
				'after_title'   => csco_section_heading( null, 'after', false, null ),
			)
		);

		register_sidebars(
			3, array(
				// Translators: Multi-Column Sidebar Number.
				'name'          => esc_html__( 'Multi-Column Sub-Menu %d', 'networker' ),
				'id'            => 'sidebar-multicolumn',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, null, 'submenu' ),
				'after_title'   => csco_section_heading( null, 'after', false, null, 'submenu' ),
			)
		);
	}
	add_action( 'widgets_init', 'csco_widgets_init' );
}

if ( ! function_exists( 'csco_widget_subheadings_allow_html' ) ) {
	/**
	 * Add support <span class="cs-section-subheadings"> to widget subheadings.
	 *
	 * @param string $subheadings The widget subheadings.
	 */
	function csco_widget_subheadings_allow_html( $subheadings ) {

		$subheadings = csco_add_support_subheadings_style( $subheadings );

		return $subheadings;
	}
}
add_filter( 'widget_title', 'csco_widget_subheadings_allow_html' );
