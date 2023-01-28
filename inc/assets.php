<?php
/**
 * Assets
 *
 * All enqueues of scripts and styles.
 *
 * @package Networker
 */

if ( ! function_exists( 'csco_content_width' ) ) {
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function csco_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'csco_content_width', 1200 );
	}
}
add_action( 'after_setup_theme', 'csco_content_width', 0 );

if ( ! function_exists( 'csco_enqueue_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 */
	function csco_enqueue_scripts() {

		$version = csco_get_theme_data( 'Version' );

		// Register theme scripts.
		wp_register_script( 'flickity', get_template_directory_uri() . '/assets/vendor/flickity.pkgd.min.js', array( 'jquery' ), $version, true );
		wp_register_script( 'csco-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery', 'imagesloaded', 'flickity' ), $version, true );

		// Localization array.
		$localize = array(
			'siteSchemeMode'   => get_theme_mod( 'color_scheme', 'system' ),
			'siteSchemeToogle' => get_theme_mod( 'color_scheme_toggle', true ),
		);

		// Localize the main theme scripts.
		wp_localize_script( 'csco-scripts', 'csLocalize', $localize );

		// Enqueue theme scripts.
		wp_enqueue_script( 'csco-scripts' );

		// Enqueue comment reply script.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Register theme styles.
		wp_register_style( 'csco-styles', csco_style( get_template_directory_uri() . '/style.css' ), array(), $version );

		// Enqueue theme styles.
		wp_enqueue_style( 'csco-styles' );

		// Add RTL support.
		wp_style_add_data( 'csco-styles', 'rtl', 'replace' );

		// Add Inline Style.
		wp_add_inline_style( 'csco-styles', sprintf( ':root { --social-links-label: "%s"; }', esc_html__( 'CONNECT', 'networker' ) ) );

		// Dequeue Contact Form 7 styles.
		wp_dequeue_style( 'contact-form-7' );

	}
}
add_action( 'wp_enqueue_scripts', 'csco_enqueue_scripts' );

if ( ! function_exists( 'csco_magnific_popup_enqueue_scripts' ) ) {
	/**
	 * Enqueue magnific popup scripts and styles.
	 */
	function csco_magnific_popup_enqueue_scripts() {
		$version = csco_get_theme_data( 'Version' );

		if ( wp_style_is( 'magnific-popup', 'enqueued' ) ) {

			wp_deregister_style( 'magnific-popup' );

			wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), $version );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'csco_magnific_popup_enqueue_scripts', 999 );
