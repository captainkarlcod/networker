<?php
/**
 * Assets
 *
 * All enqueues of scripts and styles.
 *
 * @package Networker
 */

if ( ! function_exists( 'csco_editor_style' ) ) {
	/**
	 * Add callback for custom editor stylesheets.
	 */
	function csco_editor_style() {
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
	}
}
add_action( 'current_screen', 'csco_editor_style' );

if ( ! function_exists( 'csco_enqueue_block_editor_assets' ) ) {
	/**
	 * Enqueue block editor specific scripts.
	 */
	function csco_enqueue_block_editor_assets() {
		$version = csco_get_theme_data( 'Version' );

		// Register theme scripts.
		wp_register_script( 'csco-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery', 'imagesloaded' ), $version, true );

		// Localization array.
		$localize = array(
			'siteSchemeMode'   => 'light',
			'siteSchemeToogle' => false,
		);

		// Localize the main theme scripts.
		wp_localize_script( 'csco-scripts', 'csLocalize', $localize );

		// Enqueue theme scripts.
		wp_enqueue_script( 'csco-scripts' );

		// Register theme styles.
		wp_register_style( 'csco-editor', csco_style( get_template_directory_uri() . '/assets/css/editor-style.css' ), false, $version );

		// Add RTL support.
		wp_style_add_data( 'csco-editor', 'rtl', 'replace' );

		// Enqueue theme styles.
		wp_enqueue_style( 'csco-editor' );
	}
	add_action( 'enqueue_block_editor_assets', 'csco_enqueue_block_editor_assets' );
}
