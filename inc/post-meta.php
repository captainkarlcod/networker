<?php
/**
 * Post Meta Helper Functions
 *
 * These helper functions return post meta, if its enabled in WordPress Customizer.
 *
 * @package Networker
 */

if ( ! function_exists( 'csco_block_post_meta' ) ) {
	/**
	 * Block Post Meta
	 *
	 * A wrapper function that returns all post meta types either
	 * in an ordered list <ul> or as a single element <span>.
	 *
	 * @param array $settings Settings of block.
	 * @param mixed $meta     Contains post meta types.
	 * @param bool  $echo     Echo or return.
	 * @param bool  $compact  If meta compact.
	 */
	function csco_block_post_meta( $settings, $meta, $echo = true, $compact = false ) {

		$allowed = array();

		$prefix = isset( $settings['meta-settings']['prefix'] ) ? sprintf( '%s_', $settings['meta-settings']['prefix'] ) : null;

		if ( isset( $settings[ $prefix . 'display_meta_category' ] ) && $settings[ $prefix . 'display_meta_category' ] ) {
			$allowed[] = 'category';
		}

		if ( isset( $settings[ $prefix . 'display_meta_author' ] ) && $settings[ $prefix . 'display_meta_author' ] ) {
			$allowed[] = 'author';
		}

		if ( isset( $settings[ $prefix . 'display_meta_date' ] ) && $settings[ $prefix . 'display_meta_date' ] ) {
			$allowed[] = 'date';
		}

		if ( isset( $settings[ $prefix . 'display_meta_comments' ] ) && $settings[ $prefix . 'display_meta_comments' ] ) {
			$allowed[] = 'comments';
		}

		if ( isset( $settings[ $prefix . 'display_meta_views' ] ) && $settings[ $prefix . 'display_meta_views' ] ) {
			$allowed[] = 'views';
		}

		if ( isset( $settings[ $prefix . 'display_meta_reading_time' ] ) && $settings[ $prefix . 'display_meta_reading_time' ] ) {
			$allowed[] = 'reading_time';
		}

		if ( isset( $settings[ $prefix . 'display_meta_shares' ] ) && $settings[ $prefix . 'display_meta_shares' ] ) {
			$allowed[] = 'shares';
		}

		if ( isset( $settings[ $prefix . 'display_meta_compact' ] ) && $settings[ $prefix . 'display_meta_compact' ] ) {
			$compact = true;
		}

		$allowed = apply_filters( 'csco_allowed_block_post_meta', $allowed, $settings, $meta, $echo, $compact );

		if ( ! $allowed ) {
			return;
		}

		$meta_settings = array(
			'shares_location' => 'block-posts',
		);

		if ( isset( $settings['meta-settings'] ) ) {
			$meta_settings = array_merge( $meta_settings, $settings['meta-settings'] );
		}

		return csco_get_post_meta( $meta, $compact, $echo, $allowed, $meta_settings );
	}
}

if ( ! function_exists('csco_get_post_meta' ) ) {
	/**
	 * Post Meta
	 *
	 * A wrapper function that returns all post meta types either
	 * in an ordered list <ul> or as a single element <span>.
	 *
	 * @param mixed $meta     Contains post meta types.
	 * @param bool  $compact  If compact version shall be displayed.
	 * @param bool  $output   Output or return.
	 * @param mixed $allowed  Allowed meta types (array: list types, true: auto definition, option name: get value of option).
	 * @param array $settings The advanced settings.
	 */
	function csco_get_post_meta( $meta, $compact = false, $output = true, $allowed = null, $settings = array() ) {

		// Return if no post meta types provided.
		if ( ! $meta ) {
			return;
		}

		$meta = (array) $meta;

		// Set default settings.
		$settings = array_merge( array(
			'author_avatar'   => false,
			'shares_location' => 'post-meta',
		), $settings );

		if ( is_string( $allowed ) || true === $allowed ) {
			$option_default = null;

			$option_name = is_string( $allowed ) ? $allowed : csco_get_archive_option( 'post_meta' );

			if ( class_exists( 'Kirki' ) && property_exists( 'Kirki', 'all_fields' ) && isset( Kirki::$all_fields[ $option_name ]['default'] ) ) {
				$option_default = Kirki::$all_fields[ $option_name ]['default'];
			} elseif ( class_exists( 'Kirki' ) && property_exists( 'Kirki', 'fields' ) && isset( Kirki::$fields[ $option_name ]['default'] ) ) {
				$option_default = Kirki::$fields[ $option_name ]['default'];
			} elseif ( isset( CSCO_Kirki::$fields[ $option_name ]['default'] ) ) {
				$option_default = CSCO_Kirki::$fields[ $option_name ]['default'];
			}

			$allowed = get_theme_mod( $option_name, $option_default );
		}

		// Set default allowed post meta types.
		if ( ! is_array( $allowed ) && ! $allowed ) {

			$allowed = apply_filters( 'csco_post_meta', array( 'category', 'author', 'date', 'comments', 'views', 'shares', 'reading_time' ) );
		}

		// Intersect provided and allowed meta types.
		if ( is_array( $meta ) ) {
			$meta = array_intersect( $meta, $allowed );
		}

		// Build meta markup.
		$markup = null;

		if ( is_array( $meta ) && $meta ) {

			// Add normal meta types to the list.
			foreach ( $meta as $type ) {
				$markup .= call_user_func( "csco_get_meta_$type", 'div', $compact, $settings );
			}

			$scheme = apply_filters( 'csco_post_meta_scheme', null, $settings );

			$markup = sprintf( '<div class="cs-entry__post-meta" %s>%s</div>', $scheme, $markup );

		} elseif ( in_array( $meta, $allowed, true ) ) {
			// Markup single meta type.
			$markup .= call_user_func( "csco_get_meta_$meta", 'div', $compact, $settings );
		}

		// If output is enabled.
		if ( $output ) {
			return call_user_func( 'printf', '%s', $markup );
		}

		return $markup;
	}
}

if ( ! function_exists( 'csco_get_meta_category' ) ) {
	/**
	 * Post Сategory
	 *
	 * @param string $tag      Element tag, i.e. div or span.
	 * @param bool   $compact  If compact version shall be displayed.
	 * @param array  $settings The advanced settings.
	 */
	function csco_get_meta_category( $tag = 'div', $compact = false, $settings = array() ) {

		$output = '<' . esc_html( $tag ) . ' class="cs-meta-category">';

		$output .= get_the_category_list( '', '', get_the_ID() );

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;
	}
}

if ( ! function_exists( 'csco_get_meta_date' ) ) {
	/**
	 * Post Date
	 *
	 * @param string $tag      Element tag, i.e. div or span.
	 * @param bool   $compact  If compact version shall be displayed.
	 * @param array  $settings The advanced settings.
	 */
	function csco_get_meta_date( $tag = 'div', $compact = false, $settings = array() ) {

		$output = '<' . esc_html( $tag ) . ' class="cs-meta-date">';

		if ( false === $compact ) {
			$time_string = get_the_date();
		} else {
			$time_string = get_the_date( 'd.m.y' );
		}

		if ( get_the_time( 'd.m.Y H:i' ) !== get_the_modified_time( 'd.m.Y H:i' ) ) {
			if ( ! get_theme_mod( 'misc_published_date', true ) ) {
				$time_string = get_the_modified_date();
			}
		}

		$output .= apply_filters( 'csco_post_meta_date_output', $time_string );

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;
	}
}

if ( ! function_exists( 'csco_get_meta_author' ) ) {
	/**
	 * Post Author
	 *
	 * @param string $tag      Element tag, i.e. div or span.
	 * @param bool   $compact  If compact version shall be displayed.
	 * @param array  $settings The advanced settings.
	 */
	function csco_get_meta_author( $tag = 'div', $compact = true, $settings = array() ) {

		$authors = array( get_the_author_meta( 'ID' ) );

		$output = '<' . esc_attr( $tag ) . ' class="cs-meta-author">';

		if ( csco_coauthors_enabled() ) {
			$authors = csco_get_coauthors();
		}

		if ( $authors ) {

			$counter = 0;

			foreach ( $authors as & $author ) {

				$output .= $counter > 0 ? sprintf( '<span class="cs-sep">%s</span>', esc_html__( 'and', 'networker' ) ) : '';

				$author_id    = isset( $author->ID ) ? $author->ID : $author;
				$display_name = isset( $author->display_name ) ? $author->display_name : get_the_author_meta( 'display_name', $author_id );
				$posts_url    = get_author_posts_url( $author_id, isset( $author->user_nicename ) ? $author->user_nicename : '' );

				$author_avatar = null;

				if ( false === $compact && $settings['author_avatar'] ) {
					$author_avatar = sprintf( '<span class="cs-photo">%s</span>', get_avatar( $author_id, apply_filters( 'csco_meta_avatar_size', 26 ) ) );
				}

				$output .= sprintf(
					'<a class="cs-meta-author-inner url fn n" href="%1$s" title="%2$s">%4$s<span class="cs-by">' . esc_html__( 'by', 'networker' ) . '</span><span class="cs-author">%3$s</span></a>',
					esc_url( $posts_url ),
					/* translators: %s: author name */
					esc_attr( sprintf( __( 'View all posts by %s', 'networker' ), $display_name ) ),
					$display_name,
					$author_avatar
				);

				$counter++;
			}
		}

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;

	}
}

if ( ! function_exists( 'csco_get_meta_comments' ) ) {
	/**
	 * Post Comments
	 *
	 * @param string $tag      Element tag, i.e. div or span.
	 * @param bool   $compact  If compact version shall be displayed.
	 * @param array  $settings The advanced settings.
	 */
	function csco_get_meta_comments( $tag = 'div', $compact = false, $settings = array() ) {

		if ( ! comments_open( get_the_ID() ) ) {
			return;
		}

		$output  = '<' . esc_html( $tag ) . ' class="cs-meta-comments">';
		$output .= '<span class="cs-meta-icon"><i class="cs-icon cs-icon-message-square"></i></span>';

		if ( true === $compact ) {
			ob_start();
			comments_popup_link( '0', '1', '%', 'comments-link', '' );
			$output .= ob_get_clean();
		} else {
			ob_start();
			comments_popup_link( esc_html__( 'No comments', 'networker' ), esc_html__( 'One comment', 'networker' ), '% ' . esc_html__( 'comments', 'networker' ), 'comments-link', '' );
			$output .= ob_get_clean();
		}

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;
	}
}

if ( ! function_exists( 'csco_get_meta_reading_time' ) ) {
	/**
	 * Post Reading Time
	 *
	 * @param string $tag      Element tag, i.e. div or span.
	 * @param bool   $compact  If compact version shall be displayed.
	 * @param array  $settings The advanced settings.
	 */
	function csco_get_meta_reading_time( $tag = 'div', $compact = false, $settings = array() ) {

		if ( ! csco_powerkit_module_enabled( 'reading_time' ) ) {
			return;
		}

		$reading_time = powerkit_get_post_reading_time();

		$output  = '<' . esc_html( $tag ) . ' class="cs-meta-reading-time">';
		$output .= '<span class="cs-meta-icon"><i class="cs-icon cs-icon-clock"></i></span>';

		if ( true === $compact ) {
			$output .= intval( $reading_time ) . ' ' . esc_html__( 'min', 'networker' );
		} else {
			/* translators: %s number of minutes */
			$output .= esc_html( sprintf( _n( '%s minute read', '%s minute read', $reading_time, 'networker' ), $reading_time ) );
		}

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;
	}
}

if ( ! function_exists( 'csco_get_meta_views' ) ) {
	/**
	 * Post Views
	 *
	 * @param string $tag      Element tag, i.e. div or span.
	 * @param bool   $compact  If compact version shall be displayed.
	 * @param array  $settings The advanced settings.
	 */
	function csco_get_meta_views( $tag = 'div', $compact = false, $settings = array() ) {

		switch ( csco_post_views_enabled() ) {
			case 'post_views':
				$views = pvc_get_post_views();
				break;
			case 'pk_post_views':
				$views = powerkit_get_post_views( null, false );
				break;
			default:
				return;
		}

		// Don't display if minimum threshold is not met.
		if ( $views < apply_filters( 'csco_minimum_views', 1 ) ) {
			return;
		}

		$output  = '<' . esc_html( $tag ) . ' class="cs-meta-views">';
		$output .= '<span class="cs-meta-icon"><i class="cs-icon cs-icon-bar-chart"></i></span>';

		$views_rounded = csco_get_round_number( $views );

		if ( true === $compact ) {
			$output .= esc_html( $views_rounded );
		} else {
			if ( $views > 1000 ) {
				$output .= $views_rounded . ' ' . esc_html__( 'views', 'networker' );
			} else {
				/* translators: %s number of post views */
				$output .= esc_html( sprintf( _n( '%s view', '%s views', $views, 'networker' ), $views ) );
			}
		}

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;

	}
}

if ( ! function_exists( 'csco_get_meta_shares' ) ) {
	/**
	 * Post Shares
	 *
	 * @param string $tag      Element tag, i.e. div or span.
	 * @param bool   $compact  If compact version shall be displayed.
	 * @param array  $settings The advanced settings.
	 */
	function csco_get_meta_shares( $tag = 'div', $compact = false, $settings = array() ) {

		$location = $settings['shares_location'];

		if ( ! csco_powerkit_module_enabled( 'share_buttons' ) ) {
			return;
		}

		if ( ! get_option( "powerkit_share_buttons_{$location}_display" ) ) {
			return;
		}

		$output = '<' . esc_html( $tag ) . ' class="cs-meta-shares">';

		$accounts = get_option( "powerkit_share_buttons_{$location}_multiple_list", array( 'facebook', 'twitter', 'pinterest' ) );

		// Share Count.
		$shares = powerkit_share_buttons_get_total_count( $accounts, get_the_ID(), null, true );

		$shares_rounded = powerkit_share_buttons_count_format( $shares );

		// Don't display if minimum threshold is not met.
		if ( $shares < apply_filters( 'csco_minimum_shares', 1 ) ) {
			return;
		}

		ob_start();
		?>
			<div class="cs-meta-share-total">
				<div class="cs-meta-icon"><i class="cs-icon cs-icon-share"></i></div>
				<div class="cs-total-number">
					<?php
					if ( true === $compact ) {
						echo esc_html( $shares_rounded );
					} else {
						if ( $shares > 1000 ) {
							echo esc_html( $shares_rounded ) . ' ' . esc_html__( 'shares', 'networker' );
						} else {
							/* translators: %s number of post views */
							echo esc_html( sprintf( _n( '%s share', '%s shares', $shares, 'networker' ), $shares ) );
						}
					}
					?>
				</div>
			</div>
			<div class="cs-meta-share-links" data-scheme="default">
				<?php
					powerkit_share_buttons_location( $location );
				?>
			</div>
		<?php

		$output .= ob_get_clean();

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;

	}
}
