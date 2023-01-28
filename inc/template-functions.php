<?php
/**
 * Template Functions
 *
 * Utility functions.
 *
 * @package Networker
 */

if ( ! function_exists( 'csco_doing_request' ) ) {
	/**
	 * Determines whether the current request is a WordPress REST or Ajax request.
	 */
	function csco_doing_request() {
		if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
			return true;
		}
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return true;
		}
	}
}

if ( ! function_exists( 'csco_is_context_editor' ) ) {
	/**
	 * Determines whether the current request is from WordPress Editor.
	 */
	function csco_is_context_editor() {
		wp_verify_nonce( null );

		if ( isset( $_REQUEST['context'] ) && 'edit' === $_REQUEST['context'] ) { // Input var ok; sanitization ok.
			return true;
		}
	}
}

if ( ! function_exists( 'csco_is_nav_menu' ) ) {
	/**
	 * Determines whether a menu contains elements.
	 *
	 * @param string $location Menu location identifier.
	 */
	function csco_is_nav_menu( $location ) {
		if ( ! has_nav_menu( $location ) ) {
			return;
		}

		$locations = get_nav_menu_locations();

		if ( $locations && isset( $locations[ $location ] ) ) {
			$menu_items = wp_get_nav_menu_items( $locations[ $location ] );

			if ( $menu_items ) {
				return true;
			}
		}
	}
}

if ( ! function_exists( 'csco_style' ) ) {
	/**
	 * Processing path of style.
	 *
	 * @param string $path URL to the stylesheet.
	 */
	function csco_style( $path ) {
		// Check RTL.
		if ( is_rtl() ) {
			return $path;
		}

		// Check Dev.
		$dev = get_theme_file_path( 'style-dev.css' );

		if ( file_exists( $dev ) ) {
			return str_replace( '.css', '-dev.css', $path );
		}

		return $path;
	}
}

if ( ! function_exists( 'csco_typography' ) ) {
	/**
	 * Output typography style.
	 *
	 * @param string $field   The field name of kirki.
	 * @param string $type    The type of typography.
	 * @param string $default The default value.
	 */
	function csco_typography( $field, $type, $default ) {
		$value = $default;

		$field_value = get_theme_mod( $field );

		if ( class_exists( 'CSCO_Kirki' ) ) {
			$field_value = CSCO_Kirki::typography_sanitize( $field_value );
		}

		if ( is_array( $field_value ) && $field_value ) {
			if ( isset( $field_value[ $type ] ) ) {
				$value = $field_value[ $type ];
			}
		}

		echo wp_kses_post( $value );
	}
}

if ( ! function_exists( 'csco_component' ) ) {
	/**
	 * Display or return the component from the theme
	 *
	 * @param string $name     The name of component.
	 * @param bool   $output   Output or return.
	 * @param array  $settings The advanced settings.
	 */
	function csco_component( $name, $output = true, $settings = array() ) {

		$func_name = sprintf( 'csco_%s', $name );

		// Call component.
		if ( function_exists( $func_name ) ) {
			ob_start();

			call_user_func( $func_name, $settings );

			$markup = ob_get_clean();

			// If there is no markup.
			if ( ! $markup ) {
				return;
			}

			// If output is enabled.
			if ( $output ) {
				return call_user_func( 'printf', '%s', $markup );
			}

			return $markup;
		}
	}
}

if ( ! function_exists( 'csco_powerkit_module_enabled' ) ) {
	/**
	 * Helper function to check the status of powerkit modules
	 *
	 * @param array $name Name of module.
	 */
	function csco_powerkit_module_enabled( $name ) {
		if ( function_exists( 'powerkit_module_enabled' ) && powerkit_module_enabled( $name ) ) {
			return true;
		}
	}
}

if ( ! function_exists( 'csco_post_views_enabled' ) ) {
	/**
	 * Check post views module.
	 *
	 * @return string Type.
	 */
	function csco_post_views_enabled() {

		// Post Views Counter.
		if ( class_exists( 'Post_Views_Counter' ) ) {
			return 'post_views';
		}

		// Powerkit Post Views.
		if ( csco_powerkit_module_enabled( 'post_views' ) ) {
			return 'pk_post_views';
		}
	}
}

if ( ! function_exists( 'csco_get_locale' ) ) {
	/**
	 * Get locale in uniform format.
	 */
	function csco_get_locale() {

		$csco_locale = get_locale();

		if ( preg_match( '#^[a-z]{2}\-[A-Z]{2}$#', $csco_locale ) ) {
			$csco_locale = str_replace( '-', '_', $csco_locale );
		} elseif ( preg_match( '#^[a-z]{2}$#', $csco_locale ) ) {
			if ( function_exists( 'mb_strtoupper' ) ) {
				$csco_locale .= '_' . mb_strtoupper( $csco_locale, 'UTF-8' );
			} else {
				$csco_locale .= '_' . strtoupper( $csco_locale );
			}
		}

		if ( empty( $csco_locale ) ) {
			$csco_locale = 'en_US';
		}

		return apply_filters( 'csco_locale', $csco_locale );

	}
}

if ( ! function_exists( 'csco_get_theme_data' ) ) {
	/**
	 * Get data about the theme.
	 *
	 * @param mixed $name The name of param.
	 */
	function csco_get_theme_data( $name ) {
		$theme = wp_get_theme( get_template() );

		return $theme->get( $name );
	}
}

if ( ! function_exists( 'csco_rgba2hex' ) ) {
	/**
	 * Convert rgba to hex.
	 *
	 * @param mixed $color Color.
	 */
	function csco_rgba2hex( $color ) {
		if ( isset( $color[0] ) && '#' === $color[0] ) {
			return $color;
		}

		$rgba = array();

		if ( preg_match_all( '#\((([^()]+|(?R))*)\)#', $color, $matches ) ) {
			$rgba = explode( ',', implode( ' ', $matches[1] ) );
		} else {
			$rgba = explode( ',', $color );
		}

		$rr = dechex( $rgba['0'] );
		$gg = dechex( $rgba['1'] );
		$bb = dechex( $rgba['2'] );

		if ( array_key_exists( '3', $rgba ) ) {
			$aa = dechex( $rgba['3'] * 255 );

			return strtoupper( "#$aa$rr$gg$bb" );
		} else {
			return strtoupper( "#$rr$gg$bb" );
		}
	}
}

if ( ! function_exists( 'csco_hex_is_light' ) ) {
	/**
	 * Determine whether a hex color is light.
	 *
	 * @param mixed $color Color.
	 * @return bool  True if a light color.
	 */
	function csco_hex_is_light( $color ) {
		$hex        = str_replace( '#', '', $color );
		$c_r        = hexdec( substr( $hex, 0, 2 ) );
		$c_g        = hexdec( substr( $hex, 2, 2 ) );
		$c_b        = hexdec( substr( $hex, 4, 2 ) );
		$brightness = ( ( $c_r * 299 ) + ( $c_g * 587 ) + ( $c_b * 114 ) ) / 1000;
		return $brightness > 190;
	}
}

if ( ! function_exists( 'csco_detect_color_scheme' ) ) {
	/**
	 * Detect color scheme.
	 *
	 * @param mixed $color Color.
	 * @param int   $level Detect level.
	 */
	function csco_detect_color_scheme( $color, $level = 190 ) {
		// Set alpha channel.
		$alpha = 1;

		$rgba = array( 255, 255, 255 );

		// Trim color.
		$color = trim( $color );

		// If HEX format.
		if ( isset( $color[0] ) && '#' === $color[0] ) {
			// Remove '#' from start.
			$color = str_replace( '#', '', trim( $color ) );

			if ( 3 === strlen( $color ) ) {
				$color = $color[0] . $color[0] . $color[1] . $color[1] . $color[2] . $color[2];
			}

			$rgba[0] = hexdec( substr( $color, 0, 2 ) );
			$rgba[1] = hexdec( substr( $color, 2, 2 ) );
			$rgba[2] = hexdec( substr( $color, 4, 2 ) );

		} elseif ( preg_match_all( '#\((([^()]+|(?R))*)\)#', $color, $color_reg ) ) {
			// Convert RGB or RGBA.
			$rgba = explode( ',', implode( ' ', $color_reg[1] ) );

			if ( array_key_exists( '3', $rgba ) ) {
				$alpha = (float) $rgba['3'];
			}
		}

		// Apply alpha channel.
		foreach ( $rgba as $key => $channel ) {
			$rgba[ $key ] = str_pad( $channel + ceil( ( 255 - $channel ) * ( 1 - $alpha ) ), 2, '0', STR_PAD_LEFT );
		}

		// Set default scheme.
		$scheme = 'default';

		// Get brightness.
		$brightness = ( ( $rgba[0] * 299 ) + ( $rgba[1] * 587 ) + ( $rgba[2] * 114 ) ) / 1000;

		// If color gray.
		if ( $rgba[0] === $rgba[1] && $rgba[1] === $rgba[2] ) {
			if ( $brightness < $level ) {
				$scheme = 'dark';
			}
		} else {
			if ( $brightness < $level ) {
				$scheme = 'inverse';
			}
		}

		return $scheme;
	}
}

if ( ! function_exists( 'csco_color_scheme' ) ) {
	/**
	 * Output color scheme.
	 *
	 * @param mixed $default Default color.
	 * @param mixed $dark    Dark color.
	 */
	function csco_color_scheme( $default, $dark = null ) {

		$data = csco_site_scheme_data();

		if ( 'dark' === $data['site_scheme'] ) {
			$scheme = csco_detect_color_scheme( $dark );
		} else {
			$scheme = csco_detect_color_scheme( $default );
		}

		return sprintf( 'data-scheme="%s"', $scheme );
	}
}

if ( ! function_exists( 'csco_smart_array_push' ) ) {
	/**
	 * Smart array push
	 *
	 * @param array $input_array The array.
	 * @param mixed $value       Value.
	 * @param int   $index       Position.
	 * @param bool  $duplicate   Сheck for duplicates?.
	 */
	function csco_smart_array_push( &$input_array, $value, $index = false, $duplicate = false ) {

		// Check duplicates.
		if ( $duplicate && isset( $value['key'] ) ) {
			foreach ( $input_array as $el ) {
				if ( isset( $el['key'] ) && $value['key'] === $el['key'] ) {
					return;
				}
			}
		}

		// Insert value.
		if ( $index && isset( $input_array[ $index ] ) ) {
			$output_array = array( $index => $value );
			foreach ( $input_array as $k => $v ) {
				if ( $k < $index ) {
					$output_array[ $k ] = $v;
				} else {
					if ( isset( $output_array[ $k ] ) ) {
						$output_array[ $k + 1 ] = $v;
					} else {
						$output_array[ $k ] = $v;
					}
				}
			}
		} else {
			$output_array = $input_array;

			$count = count( $output_array );

			$output_array[ $count ] = $value;
		}

		ksort( $output_array );

		$input_array = $output_array;
	}
}

if ( ! function_exists( 'csco_implode' ) ) {
	/**
	 * Join array elements with a string
	 *
	 * @param array  $pieces The array of strings to implode.
	 * @param string $glue   Defaults to an empty string.
	 */
	function csco_implode( $pieces, $glue = ', ' ) {
		if ( is_array( $pieces ) ) {
			return implode( $glue, $pieces );
		}
		if ( is_string( $pieces ) ) {
			return $pieces;
		}
	}
}

if ( ! function_exists( 'csco_live_get_theme_mod' ) ) {
	/**
	 * Retrieve theme modification value for the current theme.
	 *
	 * @param string $name    Theme modification name.
	 * @param mixed  $default Theme modification default value.
	 */
	function csco_live_get_theme_mod( $name, $default = false ) {
		$result = get_theme_mod( $name, $default );

		if ( is_customize_preview() ) {

			wp_verify_nonce( null );

			if ( isset( $_POST['nonce'] ) && isset( $_POST['customized'] ) ) { // Input var ok; sanitization ok.

				$data = wp_unslash( $_POST['customized'] ); // Input var ok; sanitization ok.

				$data = json_decode( $data, true );

				if ( is_array( $data ) && isset( $data[ $name ] ) ) {
					$result = $data[ $name ];
				}
			}
		}

		return $result;
	}
}

if ( ! function_exists( 'csco_get_round_number' ) ) {
	/**
	 * Get rounded number.
	 *
	 * @param int $number    Input number.
	 * @param int $min_value Minimum value to round number.
	 * @param int $decimal   How may decimals shall be in the rounded number.
	 */
	function csco_get_round_number( $number, $min_value = 1000, $decimal = 1 ) {
		if ( $number < $min_value ) {
			return number_format_i18n( $number );
		}
		$alphabets = array(
			1000000000 => esc_html__( 'B', 'networker' ),
			1000000    => esc_html__( 'M', 'networker' ),
			1000       => esc_html__( 'K', 'networker' ),
		);
		foreach ( $alphabets as $key => $value ) {
			if ( $number >= $key ) {
				return number_format_i18n( round( $number / $key, $decimal ), $decimal ) . $value;
			}
		}
	}
}

if ( ! function_exists( 'csco_the_round_number' ) ) {
	/**
	 * Echo rounded number.
	 *
	 * @param int $number    Input number.
	 * @param int $min_value Minimum value to round number.
	 * @param int $decimal   How may decimals shall be in the rounded number.
	 */
	function csco_the_round_number( $number, $min_value = 1000, $decimal = 1 ) {
		echo esc_html( csco_get_round_number( $number, $min_value, $decimal ) );
	}
}

if ( ! function_exists( 'csco_str_truncate' ) ) {
	/**
	 * Truncates string with specified length
	 *
	 * @param  string $string      Text string.
	 * @param  int    $length      Letters length.
	 * @param  string $etc         End truncate.
	 * @param  bool   $break_words Break words or not.
	 * @return string
	 */
	function csco_str_truncate( $string, $length = 80, $etc = '&hellip;', $break_words = false ) {
		if ( 0 === $length ) {
			return '';
		}

		if ( function_exists( 'mb_strlen' ) ) {

			// MultiBite string functions.
			if ( mb_strlen( $string ) > $length ) {
				$length -= min( $length, mb_strlen( $etc ) );
				if ( ! $break_words ) {
					$string = preg_replace( '/\s+?(\S+)?$/', '', mb_substr( $string, 0, $length + 1 ) );
				}

				return mb_substr( $string, 0, $length ) . $etc;
			}
		} else {

			// Default string functions.
			if ( strlen( $string ) > $length ) {
				$length -= min( $length, strlen( $etc ) );
				if ( ! $break_words ) {
					$string = preg_replace( '/\s+?(\S+)?$/', '', substr( $string, 0, $length + 1 ) );
				}

				return substr( $string, 0, $length ) . $etc;
			}
		}

		return $string;
	}
}

if ( ! function_exists( 'csco_svg_encode' ) ) {
	/**
	 * Encode svg symbols.
	 *
	 * @param string $string Text string.
	 */
	function csco_svg_encode( $string ) {

		$map = array(
			'<' => '%3C',
			'>' => '%3E',
			'#' => '%23',
		);

		foreach ( $map as $key => $value ) {
			$string = str_replace( $key, $value, $string );
		}

		return $string;
	}
}

if ( ! function_exists( 'csco_get_retina_image' ) ) {
	/**
	 * Get retina image.
	 *
	 * @param int    $attachment_id Image attachment ID.
	 * @param array  $attr          Attributes for the image markup. Default empty.
	 * @param string $type          The tag of type.
	 */
	function csco_get_retina_image( $attachment_id, $attr = array(), $type = 'img' ) {
		$attachment_url = wp_get_attachment_url( $attachment_id );

		// Retina image.
		$attached_file = get_attached_file( $attachment_id );

		if ( $attached_file ) {
			$uriinfo  = pathinfo( $attachment_url );
			$pathinfo = pathinfo( $attached_file );

			$retina_uri  = sprintf( '%s/%s@2x.%s', $uriinfo['dirname'], $uriinfo['filename'], $uriinfo['extension'] );
			$retina_file = sprintf( '%s/%s@2x.%s', $pathinfo['dirname'], $pathinfo['filename'], $pathinfo['extension'] );

			if ( file_exists( $retina_file ) ) {
				$attr['srcset'] = sprintf( '%s 1x, %s 2x', $attachment_url, $retina_uri );
			}
		}

		// Sizes.
		if ( 'amp-img' === $type ) {
			$data = wp_get_attachment_image_src( $attachment_id, 'full' );

			if ( isset( $data[1] ) ) {
				$attr['width'] = $data[1];
			}
			if ( isset( $data[2] ) ) {
				$attr['height'] = $data[2];
			}

			// Calc max height and set new width depending on proportion.
			if ( isset( $attr['width'] ) && isset( $attr['height'] ) ) {
				$max_height = apply_filters( 'csco_amp_navbar_height', 60 ) - 20;

				if ( $max_height > 0 && $attr['height'] > $max_height ) {
					$attr['width'] = $attr['width'] / $attr['height'] * $max_height;

					$attr['height'] = $max_height;
				}
			}
		}

		// Attr.
		$output = null;

		foreach ( $attr as $name => $value ) {
			$output .= sprintf( ' %s="%s" ', esc_attr( $name ), esc_attr( $value ) );
		}

		// Image output.
		printf( '<%1$s src="%2$s" %3$s>', esc_attr( $type ), esc_url( $attachment_url ), $output ); // XSS ok.
	}
}

if ( ! function_exists( 'csco_offcanvas_exists' ) ) {
	/**
	 * Check if offcanvas exists.
	 */
	function csco_offcanvas_exists() {
		$locations = get_nav_menu_locations();

		if ( isset( $locations['primary'] ) || isset( $locations['mobile'] ) || is_active_sidebar( 'sidebar-offcanvas' ) ) {
			return true;
		}
	}
}

if ( ! function_exists( 'csco_site_content_class' ) ) {
	/**
	 * Display the classes for the cs-site-content element.
	 *
	 * @param array $class Classes to add to the class list.
	 */
	function csco_site_content_class( $class = array() ) {
		$class[] = 'cs-site-content';

		$class = apply_filters( 'csco_site_content_class', $class );

		// Separates classes with a single space, collates classes.
		echo sprintf( 'class="%s"', esc_attr( join( ' ', $class ) ) );
	}
}

if ( ! function_exists( 'csco_site_submenu_class' ) ) {
	/**
	 * Display the classes for the site-submenu element.
	 *
	 * @param array $class Classes to add to the class list.
	 */
	function csco_site_submenu_class( $class = array() ) {
		$class[] = 'cs-site-submenu';

		$class = apply_filters( 'csco_site_submenu_class', $class );

		// Separates classes with a single space, collates classes.
		echo sprintf( 'class="%s"', esc_attr( join( ' ', $class ) ) );
	}
}

if ( ! function_exists( 'csco_site_scheme_data' ) ) {
	/**
	 * Get site scheme data
	 */
	function csco_site_scheme_data() {

		// Get options.
		$color_scheme = get_theme_mod( 'color_scheme', 'system' );
		$color_toggle = get_theme_mod( 'color_scheme_toggle', true );

		// Set site scheme.
		$site_scheme = 'default';

		switch ( $color_scheme ) {
			case 'dark':
				$site_scheme = 'dark';
				break;
			case 'light':
				$site_scheme = 'default';
				break;
			case 'system':
				if ( isset( $_COOKIE['_color_system_schema'] ) && 'default' === $_COOKIE['_color_system_schema'] ) {
					$site_scheme = 'default';
				}
				if ( isset( $_COOKIE['_color_system_schema'] ) && 'dark' === $_COOKIE['_color_system_schema'] ) {
					$site_scheme = 'dark';
				}
				break;
		}

		if ( $color_toggle ) {
			if ( isset( $_COOKIE['_color_schema'] ) && 'default' === $_COOKIE['_color_schema'] ) {
				$site_scheme = 'default';
			}
			if ( isset( $_COOKIE['_color_schema'] ) && 'dark' === $_COOKIE['_color_schema'] ) {
				$site_scheme = 'dark';
			}
		}

		// Process.
		if ( 'dark' === $site_scheme ) {
			$scheme = csco_detect_color_scheme( get_theme_mod( 'color_site_background_dark', '#1c1c1c' ) );
		} else {
			$scheme = csco_detect_color_scheme( get_theme_mod( 'color_site_background', '#FFFFFF' ) );
		}

		return array(
			'site_scheme' => $site_scheme,
			'scheme'      => $scheme,
		);
	}
}

if ( ! function_exists( 'csco_has_post_meta' ) ) {
	/**
	 * Check if the meta has display.
	 *
	 * @param string $meta     The name of meta.
	 * @param string $location The location of meta.
	 */
	function csco_has_post_meta( $meta, $location = 'post_meta' ) {
		return in_array( $meta, (array) get_theme_mod( $location, array( $meta ) ), true );
	}
}

if ( ! function_exists( 'csco_section_heading' ) ) {
	/**
	 * Display section heading
	 *
	 * @param string $title    Title.
	 * @param string $type     Type output.
	 * @param bool   $echo     Type echo.
	 * @param string $class    Additional class.
	 * @param string $location Location.
	 */
	function csco_section_heading( $title, $type = 'full', $echo = true, $class = '', $location = 'default' ) {

		if ( 'full' === $type && is_string( $title ) && ! $title ) {
			return;
		}

		$tag   = csco_live_get_theme_mod( 'section_heading_tag', 'h5' );
		$align = csco_live_get_theme_mod( 'section_heading_align', 'halignleft' );

		// For submenu location.
		$default = csco_live_get_theme_mod( 'section_heading_submenu_default', true );

		if ( ! $default && ( 'submenu' === get_query_var( 'headinglocation' ) || 'submenu' === $location ) ) {
			$tag   = csco_live_get_theme_mod( 'section_heading_submenu_tag', 'h5' );
			$align = csco_live_get_theme_mod( 'section_heading_submenu_align', 'halignleft' );
		}

		$class = sprintf( 'is-style-cnvs-block-section-heading-default %s %s ', $align, $class );

		$title = csco_add_support_subheadings_style( $title );

		ob_start();

		if ( function_exists( 'cnvs' ) ) {

			if ( 'full' === $type || 'before' === $type ) {
				echo '<' . esc_html( $tag ) . ' class="cs-section-heading cnvs-block-section-heading ' . esc_html( $class ) . '">';

				echo '<span class="cnvs-section-title"><span>';
			}

			if ( 'full' === $type ) {
				echo wp_kses_post( $title );
			}

			if ( 'full' === $type || 'after' === $type ) {
				echo '</span></span>';

				echo '</' . esc_html( $tag ) . '>';
			}
		} else {
			if ( 'full' === $type || 'before' === $type ) {
				echo '<' . esc_html( $tag ) . ' class="cs-section-heading cs-section-heading-common ' . esc_html( $class ) . '">';
			}

			if ( 'full' === $type ) {
				echo wp_kses_post( $title );
			}

			if ( 'full' === $type || 'after' === $type ) {
				echo '</' . esc_html( $tag ) . '>';
			}
		}

		if ( ! $echo ) {
			return ob_get_clean();
		} else {
			ob_end_flush();
		}
	}
}

if ( ! function_exists( 'csco_coauthors_enabled' ) ) {
	/**
	 * Is it possible to check whether it is possible to output CoAuthors.
	 */
	function csco_coauthors_enabled() {
		if ( class_exists( 'Powerkit' ) && class_exists( 'CoAuthors_Plus' ) ) {
			return true;
		}
	}
}

if ( ! function_exists( 'csco_get_coauthors' ) ) {
	/**
	 * Return CoAuthors.
	 */
	function csco_get_coauthors() {
		$authors = array();

		if ( csco_coauthors_enabled() ) {
			$authors = get_coauthors();

			if ( apply_filters( 'csco_coauthors_sort_abc', true ) && $authors ) {
				usort(
					$authors,
					function( $a, $b ) {
						$a_name = function_exists( 'mb_strtolower' ) ? mb_strtolower( $a->display_name ) : strtolower( $a->display_name );
						$b_name = function_exists( 'mb_strtolower' ) ? mb_strtolower( $b->display_name ) : strtolower( $b->display_name );
						return strcmp( $a_name, $b_name );
					}
				);
			}
		}

		return $authors;
	}
}

if ( ! function_exists( 'csco_add_support_subheadings_style' ) ) {
	/**
	 * Add support <span class="cs-section-subheadings"> to subheadings.
	 *
	 * @param string $subheadings The subheadings.
	 */
	function csco_add_support_subheadings_style( $subheadings ) {

		if ( $subheadings ) {
			$subheadings = trim( preg_replace_callback( '/(\[\[)(.*?)(\]\])/s', function( $matches ) {
				return sprintf( '<span class="cs-section-subheadings">%s</span>', $matches[2] );
			}, $subheadings ) );
		}

		return $subheadings;
	}
}

if ( ! function_exists( 'csco_get_youtube_video_id' ) ) {
	/**
	 * Get Youtube video ID from URL
	 *
	 * @param string $url YouTube URL.
	 */
	function csco_get_youtube_video_id( $url ) {
		preg_match( '/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results );

		if ( isset( $results[6] ) && $results[6] ) {
			return $results[6];
		}
	}
}

if ( ! function_exists( 'csco_get_the_excerpt' ) ) {
	/**
	 * Filters the number of words in an excerpt.
	 */
	function csco_get_the_excerpt_length() {
		return 5000;
	}

	/**
	 * Get excerpt of post.
	 *
	 * @param int    $length      Letters length.
	 * @param string $etc         End truncate.
	 * @param bool   $break_words Break words or not.
	 */
	function csco_get_the_excerpt( $length = 80, $etc = '&hellip;', $break_words = false ) {
		add_filter( 'excerpt_length', 'csco_get_the_excerpt_length' );

		$excerpt = get_the_excerpt();

		$func_remove = sprintf( 'remove_%s', 'filter' );

		$func_remove( 'excerpt_length', 'csco_get_the_excerpt_length' );

		return csco_str_truncate( $excerpt, $length, $etc, $break_words );
	}
}

if ( ! function_exists( 'csco_get_video_background' ) ) {
	/**
	 * Get element video background
	 *
	 * @param string $location The current location.
	 * @param int    $post_id  The id of post.
	 * @param string $template Template.
	 * @param bool   $controls Display controls.
	 * @param bool   $link     Display link.
	 */
	function csco_get_video_background( $location = null, $post_id = null, $template = 'default', $controls = true, $link = true ) {
		if ( csco_is_context_editor() ) {
			return;
		}

		if ( is_customize_preview() ) {
			return;
		}

		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		$url   = get_post_meta( $post_id, 'csco_post_video_url', true );
		$start = get_post_meta( $post_id, 'csco_post_video_bg_start_time', true );
		$end   = get_post_meta( $post_id, 'csco_post_video_bg_end_time', true );

		if ( $location ) {
			$support = (array) get_post_meta( $post_id, 'csco_post_video_location', true );

			if ( ! in_array( $location, $support, true ) ) {
				return;
			}
		}

		$id = csco_get_youtube_video_id( $url );
		if ( $id ) {
			?>
			<div class="cs-video-wrapper" data-video-id="<?php echo esc_attr( $id ); ?>" data-video-start="<?php echo esc_attr( (int) $start ); ?>" data-video-end="<?php echo esc_attr( (int) $end ); ?>">
				<div class="cs-video-inner"></div>
				<div class="cs-video-loader"></div>
			</div>
			<?php if ( $controls ) { ?>
				<div class="cs-video-controls cs-video-controls-<?php echo esc_attr( $template ); ?>">
					<?php if ( $link ) { ?>
						<a class="cs-player-control cs-player-link cs-player-stop" target="_blank" href="<?php echo esc_url( $url ); ?>">
							<span class="cs-tooltip"><span><?php esc_html_e( 'View on YouTube', 'networker' ); ?></span></span>
						</a>
					<?php } ?>
					<span class="cs-player-control cs-player-volume cs-player-mute"></span>
					<span class="cs-player-control cs-player-state cs-player-pause"></span>
				</div>
			<?php } ?>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_get_archive_location' ) ) {
	/**
	 * Returns Archive Location.
	 */
	function csco_get_archive_location() {

		global $wp_query;

		if ( isset( $wp_query->query_vars['csco_query']['location'] ) ) {

			return $wp_query->query_vars['csco_query']['location'];
		}

		if ( is_home() ) {

			return 'home';

		} else {

			return 'archive';
		}
	}
}

if ( ! function_exists( 'csco_get_archive_option' ) ) {
	/**
	 * Returns Archive Option Name.
	 *
	 * @param string $option_name The customize option name.
	 */
	function csco_get_archive_option( $option_name ) {

		return csco_get_archive_location() . '_' . $option_name;
	}
}

if ( ! function_exists( 'csco_get_archive_options' ) ) {
	/**
	 * Returns Archive Options.
	 */
	function csco_get_archive_options() {

		$options = array(
			'location'          => csco_get_archive_location(),
			'meta'              => csco_get_archive_option( 'post_meta' ),
			'layout'            => get_theme_mod( csco_get_archive_option( 'layout' ), 'list' ),
			'columns'           => get_theme_mod( csco_get_archive_option( 'columns_desktop' ), 2 ),
			'compact_meta'      => get_theme_mod( csco_get_archive_option( 'compact_post_meta' ), true ),
			'image_orientation' => get_theme_mod( csco_get_archive_option( 'image_orientation' ), 'original' ),
			'image_size'        => get_theme_mod( csco_get_archive_option( 'image_size' ), 'csco-thumbnail' ),
			'image_width'       => get_theme_mod( csco_get_archive_option( 'image_width' ), 'half' ),
			'overlay_image'     => get_theme_mod( csco_get_archive_option( 'overlay_image' ), false ),
			'more_button'       => get_theme_mod( csco_get_archive_option( 'more_button' ), true ),
			'summary_type'      => get_theme_mod( csco_get_archive_option( 'summary' ), 'summary' ),
		);

		$options = apply_filters( 'csco_get_archive_options', $options );

		return $options;
	}
}

if ( ! function_exists( 'csco_get_page_preview' ) ) {
	/**
	 * Returns Page Preview.
	 */
	function csco_get_page_preview() {

		if ( is_home() ) {

			return apply_filters( 'csco_page_media_preview', get_theme_mod( 'home_media_preview', 'uncropped' ) );
		}

		if ( is_singular( array( 'post', 'page' ) ) ) {

			$post_type = get_post_type( get_queried_object_id() );

			return apply_filters( 'csco_page_media_preview', get_theme_mod( $post_type . '_media_preview', 'uncropped' ) );
		}

		if ( is_archive() ) {

			return apply_filters( 'csco_page_media_preview', get_theme_mod( 'archive_media_preview', 'uncropped' ) );
		}

		if ( is_404() ) {

			return apply_filters( 'csco_page_media_preview', 'uncropped' );
		}

		return apply_filters( 'csco_page_media_preview', 'uncropped' );
	}
}

if ( ! function_exists( 'csco_get_page_sidebar' ) ) {
	/**
	 * Returns Page Sidebar: right, left or disabled.
	 *
	 * @param int    $post_id The ID of post.
	 * @param string $layout  The layout of post.
	 */
	function csco_get_page_sidebar( $post_id = false, $layout = false ) {

		// Canvas Full Width.
		if ( is_singular() ) {
			$page_template = get_page_template_slug( $post_id ? $post_id : get_queried_object_id() );

			if ( 'template-canvas-fullwidth.php' === $page_template && ! $layout ) {
				return 'disabled';
			}
		}

		$location = apply_filters( 'csco_sidebar', 'sidebar-main' );

		if ( ! is_active_sidebar( $location ) ) {
			return 'disabled';
		}

		$home_id = false;

		if ( 'page' === get_option( 'show_on_front', 'posts' ) ) {

			$page_on_front = get_option( 'page_on_front' );

			if ( $post_id && intval( $post_id ) === intval( $page_on_front ) ) {
				$home_id = $post_id;
			}
		}

		if ( is_home() || $home_id ) {

			$show_on_front = get_option( 'show_on_front', 'posts' );

			if ( 'posts' === $show_on_front ) {

				return apply_filters( 'csco_page_sidebar', get_theme_mod( 'home_sidebar', 'right' ) );
			}

			if ( 'page' === $show_on_front ) {

				$home_id = $home_id ? $home_id : get_queried_object_id();

				// Get layout for the blog posts page.
				if ( ! $layout ) {
					$layout = get_post_meta( $home_id, 'csco_singular_sidebar', true );
				}

				if ( ! $layout || 'default' === $layout ) {

					return apply_filters( 'csco_page_sidebar', get_theme_mod( 'page_sidebar', 'right' ) );
				}

				return apply_filters( 'csco_page_sidebar', $layout );
			}
		}

		if ( is_singular( array( 'post', 'page' ) ) || $post_id ) {

			$post_id = $post_id ? $post_id : get_queried_object_id();

			// Get layout for current post.
			if ( ! $layout ) {
				$layout = get_post_meta( $post_id, 'csco_singular_sidebar', true );
			}

			if ( ! $layout || 'default' === $layout ) {

				$post_type = get_post_type( $post_id );

				return apply_filters( 'csco_page_sidebar', get_theme_mod( $post_type . '_sidebar', 'right' ) );
			}

			return apply_filters( 'csco_page_sidebar', $layout );
		}

		if ( is_archive() ) {

			return apply_filters( 'csco_page_sidebar', get_theme_mod( 'archive_sidebar', 'right' ) );
		}

		if ( is_404() ) {

			return apply_filters( 'csco_page_sidebar', 'disabled' );
		}

		return apply_filters( 'csco_page_sidebar', 'right' );
	}
}

if ( ! function_exists( 'csco_get_page_header_type' ) ) {
	/**
	 * Returns Page Header
	 */
	function csco_get_page_header_type() {

		$allow = array( 'none', 'standard', 'grid', 'large', 'title' );

		if ( is_singular( array( 'post', 'page' ) ) ) {
			// Get header type for current post.
			$page_header_type = get_post_meta( get_queried_object_id(), 'csco_page_header_type', true );

			if ( ! in_array( $page_header_type, $allow, true ) || 'default' === $page_header_type ) {

				$post_type = get_post_type( get_queried_object_id() );

				return apply_filters( 'csco_page_header_type', get_theme_mod( $post_type . '_header_type', 'standard' ) );
			}

			return apply_filters( 'csco_page_header_type', $page_header_type );
		}

		return apply_filters( 'csco_page_header_type', 'standard' );
	}
}

if ( ! function_exists( 'csco_get_state_load_nextpost' ) ) {
	/**
	 * State Auto Load Next Post.
	 */
	function csco_get_state_load_nextpost() {

		if ( is_singular( 'post' ) ) {
			$page_load_nextpost = get_post_meta( get_queried_object_id(), 'csco_page_load_nextpost', true );

			if ( ! $page_load_nextpost || 'default' === $page_load_nextpost ) {

				return apply_filters( 'csco_page_load_nextpost', get_theme_mod( 'post_load_nextpost', false ) );
			}

			$page_load_nextpost = 'enabled' === $page_load_nextpost ? true : false;

			return apply_filters( 'csco_page_load_nextpost', $page_load_nextpost );
		}

		return apply_filters( 'csco_page_load_nextpost', false );
	}
}

if ( ! function_exists( 'csco_get_appearance_grid' ) ) {
	/**
	 * Returns Appearance Grid
	 */
	function csco_get_appearance_grid() {
		$appearance_grid = get_post_meta( get_the_ID(), 'csco_appearance_grid', true );

		if ( ! $appearance_grid ) {
			$appearance_grid = 'default';
		}

		return apply_filters( 'csco_appearance_grid', $appearance_grid );
	}
}


/**
 * Get the available image sizes
 */
function csco_get_available_image_sizes() {
	$wais = & $GLOBALS['_wp_additional_image_sizes'];

	$sizes       = array();
	$image_sizes = get_intermediate_image_sizes();

	if ( is_array( $image_sizes ) && $image_sizes ) {
		foreach ( $image_sizes as $size ) {
			if ( in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large' ), true ) ) {
				$sizes[ $size ] = array(
					'width'  => get_option( "{$size}_size_w" ),
					'height' => get_option( "{$size}_size_h" ),
					'crop'   => (bool) get_option( "{$size}_crop" ),
				);
			} elseif ( isset( $wais[ $size ] ) ) {
				$sizes[ $size ] = array(
					'width'  => $wais[ $size ]['width'],
					'height' => $wais[ $size ]['height'],
					'crop'   => $wais[ $size ]['crop'],
				);
			}

			// Size registered, but has 0 width and height.
			if ( 0 === (int) $sizes[ $size ]['width'] && 0 === (int) $sizes[ $size ]['height'] ) {
				unset( $sizes[ $size ] );
			}
		}
	}

	return $sizes;
}

/**
 * Gets the data of a specific image size.
 *
 * @param string $size Name of the size.
 */
function csco_get_image_size( $size ) {
	if ( ! is_string( $size ) ) {
		return;
	}

	$sizes = csco_get_available_image_sizes();

	return isset( $sizes[ $size ] ) ? $sizes[ $size ] : false;
}

/**
 * Get the list available image sizes
 */
function csco_get_list_available_image_sizes() {

	$image_sizes = wp_cache_get( 'csco_available_image_sizes' );

	if ( empty( $image_sizes ) ) {
		$image_sizes = array();

		$intermediate_image_sizes = get_intermediate_image_sizes();

		foreach ( $intermediate_image_sizes as $size ) {
			$image_sizes[ $size ] = $size;

			$data = csco_get_image_size( $size );

			if ( isset( $data['width'] ) || isset( $data['height'] ) ) {

				$width  = '~';
				$height = '~';

				if ( isset( $data['width'] ) && $data['width'] ) {
					$width = $data['width'] . 'px';
				}
				if ( isset( $data['height'] ) && $data['height'] ) {
					$height = $data['height'] . 'px';
				}

				$image_sizes[ $size ] .= sprintf( ' [%s, %s]', $width, $height );
			}
		}

		wp_cache_set( 'csco_available_image_sizes', $image_sizes );
	}

	return $image_sizes;
}
