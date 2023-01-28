<?php
/**
 * These functions are used to load template parts (partials) or actions when used within action hooks,
 * and they probably should never be updated or modified.
 *
 * @package Networker
 */

if ( ! function_exists( 'csco_singular_post_type_before' ) ) {
	/**
	 * Add Before Singular Hooks for specific post type.
	 */
	function csco_singular_post_type_before() {
		if ( 'post' === get_post_type() ) {
			do_action( 'csco_post_content_before' );
		}
		if ( 'page' === get_post_type() ) {
			do_action( 'csco_page_content_before' );
		}
	}
}

if ( ! function_exists( 'csco_singular_post_type_after' ) ) {
	/**
	 * Add After Singular Hooks for specific post type.
	 */
	function csco_singular_post_type_after() {
		if ( 'post' === get_post_type() ) {
			do_action( 'csco_post_content_after' );
		}
		if ( 'page' === get_post_type() ) {
			do_action( 'csco_page_content_after' );
		}
	}
}

if ( ! function_exists( 'csco_offcanvas' ) ) {
	/**
	 * Off-canvas
	 */
	function csco_offcanvas() {
		get_template_part( 'template-parts/offcanvas' );
	}
}

if ( ! function_exists( 'csco_site_scheme' ) ) {
	/**
	 * Site Scheme
	 */
	function csco_site_scheme() {
		$data = csco_site_scheme_data();

		call_user_func( 'printf', '%s', "data-scheme='{$data['scheme']}' data-site-scheme='{$data['site_scheme']}'" );
	}
}

if ( ! function_exists( 'csco_site_search' ) ) {
	/**
	 * Site Search
	 */
	function csco_site_search() {
		if ( ! get_theme_mod( 'header_search_button', true ) ) {
			return;
		}
		get_template_part( 'template-parts/site-search' );
	}
}

if ( ! function_exists( 'csco_site_nav_mobile' ) ) {
	/**
	 * Site Nav Mobile
	 */
	function csco_site_nav_mobile() {
		get_template_part( 'template-parts/site-nav-mobile' );
	}
}

if ( ! function_exists( 'csco_breadcrumbs' ) ) {
	/**
	 * SEO Breadcrumbs
	 */
	function csco_breadcrumbs() {
		if ( ! apply_filters( 'csco_breadcrumbs', true ) ) {
			return;
		}

		if ( is_front_page() || is_category() ) {
			return;
		}

		if ( csco_doing_request() ) {
			return;
		}

		if ( ! function_exists( 'yoast_breadcrumb' ) ) {
			return;
		}

		ob_start();

		yoast_breadcrumb( '<div class="cs-breadcrumbs" id="breadcrumbs">', '</div>' );

		// Check the number of levels in breadcrumbs.
		preg_match_all( '/<\/a>/', ob_get_contents(), $matches );

		if ( ! isset( $matches[0] ) || count( $matches[0] ) <= 1 ) {
			ob_end_clean();

			return;
		}

		return ob_end_flush();
	}
}

if ( ! function_exists( 'csco_page_header' ) ) {
	/**
	 * Page Header
	 */
	function csco_page_header() {
		if ( ! ( is_archive() || is_search() || is_404() ) ) {
			return;
		}
		get_template_part( 'template-parts/page-header' );
	}
}

if ( ! function_exists( 'csco_page_pagination' ) ) {
	/**
	 * Post Pagination
	 */
	function csco_page_pagination() {
		if ( ! is_singular() ) {
			return;
		}

		do_action( 'csco_pagination_before' );

		wp_link_pages(
			array(
				'before'           => '<div class="navigation pagination"><div class="nav-links">',
				'after'            => '</div></div>',
				'link_before'      => '<span class="page-number">',
				'link_after'       => '</span>',
				'next_or_number'   => 'next_and_number',
				'separator'        => ' ',
				'nextpagelink'     => esc_html__( 'Next page', 'networker' ),
				'previouspagelink' => esc_html__( 'Previous page', 'networker' ),
			)
		);

		do_action( 'csco_pagination_after' );
	}
}

if ( ! function_exists( 'csco_meet_team' ) ) {
	/**
	 * Meet Team
	 */
	function csco_meet_team() {
		if ( is_page_template( 'template-meet-team.php' ) ) {
			get_template_part( 'template-parts/meet-team' );
		}
	}
}

if ( ! function_exists( 'csco_entry_breadcrumbs' ) ) {
	/**
	 * Entry Breadcrumbs
	 */
	function csco_entry_breadcrumbs() {
		csco_breadcrumbs();
	}
}

if ( ! function_exists( 'csco_entry_media_large' ) ) {
	/**
	 * Entry Media Large
	 */
	function csco_entry_media_large() {
		if ( ! is_singular() ) {
			return;
		}
		if ( 'large' !== csco_get_page_header_type() ) {
			return;
		}
		if ( is_page_template( 'template-canvas-fullwidth.php' ) && ( is_front_page() || is_home() ) ) {
			return;
		}
		get_template_part( 'template-parts/entry/entry-media-large' );
	}
}

if ( ! function_exists( 'csco_entry_header_grid' ) ) {
	/**
	 * Entry Header Grid
	 */
	function csco_entry_header_grid() {
		if ( ! is_singular() ) {
			return;
		}
		if ( is_page_template( 'template-canvas-fullwidth.php' ) && ( is_front_page() || is_home() ) ) {
			return;
		}
		if ( 'grid' !== csco_get_page_header_type() ) {
			return;
		}
		get_template_part( 'template-parts/entry/entry-header' );
	}
}

if ( ! function_exists( 'csco_entry_header' ) ) {
	/**
	 * Entry Header Standard
	 */
	function csco_entry_header() {
		if ( ! is_singular() ) {
			return;
		}
		if ( 'none' === csco_get_page_header_type() ) {
			return;
		}
		if ( 'grid' === csco_get_page_header_type() ) {
			return;
		}
		get_template_part( 'template-parts/entry/entry-header' );
	}
}

if ( ! function_exists( 'csco_entry_metabar' ) ) {
	/**
	 * Entry Metabar
	 */
	function csco_entry_metabar() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}

		if ( csco_powerkit_module_enabled( 'share_buttons' ) ) {
			if ( powerkit_share_buttons_exists( 'metabar-post' ) ) {
				?>
				<div class="cs-entry__metabar">
					<div class="cs-entry__metabar-inner">
						<?php powerkit_share_buttons_location( 'metabar-post' ); ?>
					</div>
				</div>
				<?php
			}
		}
	}
}

if ( ! function_exists( 'csco_entry_tags' ) ) {
	/**
	 * Entry Tags
	 */
	function csco_entry_tags() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( false === get_theme_mod( 'post_tags', true ) ) {
			return;
		}

		the_tags( '<div class="cs-entry__tags"><ul><li>', '</li><li>', '</li></ul></div>' );
	}
}

if ( ! function_exists( 'csco_entry_share_button' ) ) {
	/**
	 * Entry Share
	 */
	function csco_entry_share_button() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( csco_powerkit_module_enabled( 'share_buttons' ) ) {

			if ( ! powerkit_share_buttons_exists( 'after-post' ) ) {
				return;
			}
			?>
			<div class="cs-entry__after-share-buttons">
				<?php powerkit_share_buttons_location( 'after-post' ); ?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_entry_author' ) ) {
	/**
	 * Entry Author
	 */
	function csco_entry_author() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( false === get_theme_mod( 'post_author', false ) ) {
			return;
		}
		get_template_part( 'template-parts/entry/entry-author' );
	}
}

if ( ! function_exists( 'csco_entry_comments' ) ) {
	/**
	 * Entry Comments
	 */
	function csco_entry_comments() {
		if ( post_password_required() ) {
			return;
		}

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}

if ( ! function_exists( 'csco_entry_subscribe' ) ) {
	/**
	 * Post Subscribe
	 */
	function csco_entry_subscribe() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( false === get_theme_mod( 'post_subscribe', false ) ) {
			return;
		}

		if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
			get_template_part( 'template-parts/entry/entry-subscribe' );
		}
	}
}

if ( ! function_exists( 'csco_entry_prev_next' ) ) {
	/**
	 * Entry Prev Next
	 */
	function csco_entry_prev_next() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( false === get_theme_mod( 'post_prev_next', true ) ) {
			return;
		}

		$layout = get_theme_mod( 'post_prev_next_layout', 'type-1' );

		if ( 'type-1' === $layout ) {
			get_template_part( 'template-parts/entry/entry-prev-next' );
		} elseif ( 'type-2' === $layout ) {
			get_template_part( 'template-parts/entry/entry-prev-next-alt' );
		}
	}
}

if ( ! function_exists( 'csco_entry_related' ) ) {
	/**
	 * Entry Related
	 */
	function csco_entry_related() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( csco_doing_request() ) {
			return;
		}
		if ( false === get_theme_mod( 'related', true ) ) {
			return;
		}
		get_template_part( 'template-parts/entry/entry-related' );
	}
}
