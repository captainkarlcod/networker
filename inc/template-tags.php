<?php
/**
 * Template Tags
 *
 * Functions that are called directly from template parts or within actions.
 *
 * @package Networker
 */

if ( ! function_exists( 'csco_header_nav_menu' ) ) {
	class CSCO_NAV_Walker extends Walker_Nav_Menu {
		/**
		 * Starts the list before the elements are added.
		 *
		 * @since 3.0.0
		 *
		 * @see Walker::start_lvl()
		 *
		 * @param string   $output Used to append additional content (passed by reference).
		 * @param int      $depth  Depth of menu item. Used for padding.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = null ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = str_repeat( $t, $depth );

			$classes = array( 'sub-menu' );

			$scheme = csco_color_scheme(
				get_theme_mod( 'color_submenu_background', '#FFFFFF' ),
				get_theme_mod( 'color_submenu_background_dark', '#1c1c1c' )
			);

			/**
			 * Filters the CSS class(es) applied to a menu list element.
			 *
			 * @since 4.8.0
			 *
			 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
			 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
			 * @param int      $depth   Depth of menu item. Used for padding.
			 */
			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$output .= "{$n}{$indent}<ul$class_names {$scheme}>{$n}";
		}
	}

	/**
	 * Header Nav Menu
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_nav_menu( $settings = array() ) {
		if ( ! get_theme_mod( 'header_navigation_menu', true ) ) {
			return;
		}

		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu(
				array(
					'menu_class'      => 'cs-header__nav-inner',
					'theme_location'  => 'primary',
					'container'       => 'nav',
					'container_class' => 'cs-header__nav',
					'walker'          => new CSCO_NAV_Walker(),
				)
			);
		}
	}
}

if ( ! function_exists( 'csco_header_additional_menu' ) ) {
	/**
	 * Header Additional Menu
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_additional_menu( $settings = array() ) {
		if ( has_nav_menu( 'additional' ) ) {
			wp_nav_menu(
				array(
					'menu_class'      => 'cs-header__top-nav',
					'theme_location'  => 'additional',
					'container'       => '',
					'container_class' => '',
					'depth'           => 1,
				)
			);
		}
	}
}

if ( ! function_exists( 'csco_header_logo' ) ) {
	/**
	 * Header Logo
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_logo( $settings = array() ) {

		$logo_default_name = 'logo';
		$logo_dark_name    = 'logo_dark';
		$logo_class        = null;

		$settings = array_merge(
			array(
				'variant' => null,
			),
			$settings
		);

		// For hide logo.
		if ( 'hide' === $settings['variant'] ) {
			$logo_class = 'cs-logo-hide';
		}

		// For large logo.
		if ( 'large' === $settings['variant'] ) {
			$logo_default_name = 'large_logo';
			$logo_dark_name    = 'large_logo_dark';
			$logo_class        = 'cs-logo-large';
		}

		// Get default logo.
		$logo_id = get_theme_mod( $logo_default_name );

		// Set mode of logo.
		$logo_mode = 'cs-logo-once';

		// Check display mode.
		if ( $logo_id ) {
			$logo_mode = 'cs-logo-default';
		}
		?>
		<div class="cs-logo">
			<a class="cs-header__logo <?php echo esc_attr( $logo_mode ); ?> <?php echo esc_attr( $logo_class ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
				if ( $logo_id ) {
					csco_get_retina_image( $logo_id, array( 'alt' => get_bloginfo( 'name' ) ) );
				} else {
					bloginfo( 'name' );
				}
				?>
			</a>

			<?php
			if ( 'cs-logo-default' === $logo_mode ) {

				$logo_dark_id = get_theme_mod( $logo_dark_name ) ? get_theme_mod( $logo_dark_name ) : $logo_id;

				if ( $logo_dark_id ) {
					?>
						<a class="cs-header__logo cs-logo-dark <?php echo esc_attr( $logo_class ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php csco_get_retina_image( $logo_dark_id, array( 'alt' => get_bloginfo( 'name' ) ) ); ?>
						</a>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_header_offcanvas_toggle' ) ) {
	/**
	 * Header Offcanvas Toggle
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_offcanvas_toggle( $settings = array() ) {

		if ( csco_offcanvas_exists() ) {

			$class = null;

			if ( ! get_theme_mod( 'header_offcanvas', true ) ) {
				$class = ' cs-d-lg-none';
			}

			if ( ! is_active_sidebar( 'sidebar-offcanvas' ) ) {
				$class = ' cs-d-lg-none';
			}
			?>
				<span class="cs-header__offcanvas-toggle <?php echo esc_attr( $class ); ?>" role="button">
					<span></span>
				</span>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_header_search_toggle' ) ) {
	/**
	 * Header Search Toggle
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_search_toggle( $settings = array() ) {
		if ( ! get_theme_mod( 'header_search_button', true ) ) {
			return;
		}
		?>
		<span class="cs-header__search-toggle" role="button">
			<i class="cs-icon cs-icon-search"></i>
		</span>
		<?php
	}
}

if ( ! function_exists( 'csco_header_search_form' ) ) {
	/**
	 * Header Search Form
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_search_form( $settings = array() ) {
		if ( ! get_theme_mod( 'header_search_form', true ) ) {
			return;
		}
		?>
		<form role="search" method="get" class="cs-search__nav-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="cs-search__group">
				<button class="cs-search__submit">
					<i class="cs-icon cs-icon-search"></i>
				</button>

				<input required class="cs-search__input" data-swpparentel=".cs-header .cs-search-live-result-container" data-swplive="true" type="search" value="<?php the_search_query(); ?>" name="s" placeholder="<?php echo esc_attr( get_theme_mod( 'misc_search_placeholder', esc_html__( 'Enter keyword', 'networker' ) ) ); ?>">

				<button class="cs-search__close">
					<i class="cs-icon cs-icon-x"></i>
				</button>
			</div>
		</form>
		<?php
	}
}

if ( ! function_exists( 'csco_header_scheme_toggle' ) ) {
	/**
	 * Header Scheme Toggle
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_scheme_toggle( $settings = array() ) {
		if ( ! get_theme_mod( 'color_scheme_toggle', true ) ) {
			return;
		}
		?>
			<span role="button" class="cs-header__scheme-toggle cs-site-scheme-toggle">
				<span class="cs-header__scheme-toggle-element"></span>
				<span class="cs-header__scheme-toggle-label"><?php esc_html_e( 'dark', 'networker' ); ?></span>
			</span>
		<?php
	}
}

if ( ! function_exists( 'csco_header_scheme_toggle_mobile' ) ) {
	/**
	 * Header Scheme Toggle Mobile
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_scheme_toggle_mobile( $settings = array() ) {
		if ( ! get_theme_mod( 'color_scheme_toggle', true ) ) {
			return;
		}
		?>
		<span role="button" class="cs-header__scheme-toggle cs-header__scheme-toggle-mobile cs-site-scheme-toggle">
			<i class="cs-header__scheme-toggle-icon cs-icon cs-icon-sun"></i>
			<i class="cs-header__scheme-toggle-icon cs-icon cs-icon-moon"></i>
		</span>
		<?php
	}
}

if ( ! function_exists( 'csco_header_multi_column_widgets' ) ) {
	/**
	 * Header Multi-Column Widgets
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_multi_column_widgets( $settings = array() ) {

		if ( ! get_theme_mod( 'header_multi_column_display', true ) ) {
			return;
		}

		if ( ! is_active_sidebar( 'sidebar-multicolumn' ) && ! is_active_sidebar( 'sidebar-multicolumn-2' ) && ! is_active_sidebar( 'sidebar-multicolumn-3' ) ) {
			return;
		}

		$scheme = csco_color_scheme(
			get_theme_mod( 'color_submenu_background', '#FFFFFF' ),
			get_theme_mod( 'color_submenu_background_dark', '#1c1c1c' )
		);
		?>
		<div <?php csco_site_submenu_class( array( 'cs-header__multi-column' ) ); ?>>
			<span class="cs-header__multi-column-toggle"><i class="cs-icon cs-icon-more-horizontal"></i>
			</span>
			<div class="cs-header__multi-column-container" <?php echo wp_kses( $scheme, 'post' ); ?>>
				<div class="cs-header__multi-column-row">
					<div class="cs-header__multi-column-col cs-header__widgets-column cs-widget-area">
						<?php dynamic_sidebar( 'sidebar-multicolumn' ); ?>
					</div>
					<div class="cs-header__multi-column-col cs-header__widgets-column cs-widget-area">
						<?php dynamic_sidebar( 'sidebar-multicolumn-2' ); ?>
					</div>
					<div class="cs-header__multi-column-col cs-header__widgets-column cs-widget-area">
						<?php dynamic_sidebar( 'sidebar-multicolumn-3' ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_header_button' ) ) {
	/**
	 * Header Button
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_button( $settings = array() ) {
		$button = get_theme_mod( 'header_button_label', esc_html__( 'Subscribe', 'networker' ) );
		$link   = get_theme_mod( 'header_button_link' );

		if ( $button && $link ) {
			?>
			<a href="<?php echo esc_url( $link ); ?>" class="cs-header__button" target="_blank">
				<?php echo wp_kses( $button, 'post' ); ?>
			</a>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_header_social_links' ) ) {
	/**
	 * Header Social Links
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_header_social_links( $settings = array() ) {

		if ( ! get_theme_mod( 'header_social_links', false ) ) {
			return;
		}

		if ( ! csco_powerkit_module_enabled( 'social_links' ) ) {
			return;
		}

		$scheme  = get_theme_mod( 'header_social_links_scheme', 'default' );
		$maximum = get_theme_mod( 'header_social_links_maximum', 3 );
		$counts  = get_theme_mod( 'header_social_links_counts', true );
		?>
		<div class="cs-navbar-social-links">
			<?php powerkit_social_links( false, false, $counts, 'nav', $scheme, 'mixed', $maximum ); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_footer_logo' ) ) {
	/**
	 * Footer Logo
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_footer_logo( $settings = array() ) {
		$logo_id = get_theme_mod( 'footer_logo' );

		$logo_mode = 'cs-logo-once';

		if ( $logo_id ) {
			$logo_mode = 'cs-logo-default';
		}
		?>
		<div class="cs-logo">
			<a class="cs-footer__logo <?php echo esc_attr( $logo_mode ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
				if ( $logo_id ) {
					csco_get_retina_image( $logo_id, array( 'alt' => get_bloginfo( 'name' ) ) );
				} else {
					bloginfo( 'name' );
				}
				?>
			</a>

			<?php
			if ( 'cs-logo-default' === $logo_mode ) {

				$logo_dark_id = get_theme_mod( 'footer_logo_dark' ) ? get_theme_mod( 'footer_logo_dark' ) : $logo_id;

				if ( $logo_dark_id ) {
					?>
						<a class="cs-footer__logo cs-logo-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php csco_get_retina_image( $logo_dark_id, array( 'alt' => get_bloginfo( 'name' ) ) ); ?>
						</a>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_footer_description' ) ) {
	/**
	 * Footer Description
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_footer_description( $settings = array() ) {
		/* translators: %s: Author name. */
		$footer_text = get_theme_mod( 'footer_text', sprintf( esc_html__( 'Designed & Developed by %s', 'networker' ), '<a href="' . esc_url( csco_get_theme_data( 'AuthorURI' ) ) . '">Code Supply Co.</a>' ) );
		if ( $footer_text ) {
			?>
			<div class="cs-footer__desc">
				<?php echo do_shortcode( $footer_text ); ?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_footer_nav_menu' ) ) {
	/**
	 * Footer Nav Menu
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_footer_nav_menu( $settings = array() ) {

		$settings = array_merge(
			array(
				'menu_class' => null,
			),
			$settings
		);

		if ( has_nav_menu( 'footer' ) ) {
			?>
			<div class="footer-nav-menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'footer',
						'container_class' => '',
						'menu_class'      => sprintf( 'cs-footer__nav %s', $settings['menu_class'] ),
						'container'       => '',
						'depth'           => 1,
					)
				);
				?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_footer_nav_columns_menu' ) ) {
	/**
	 * Footer Nav Columns Menu
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_footer_nav_columns_menu( $settings = array() ) {

		if ( has_nav_menu( 'footer_columns' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'footer_columns',
					'container_class' => '',
					'menu_class'      => 'cs-footer__nav cs-nav-columns',
					'container'       => '',
					'depth'           => 2,
				)
			);
		}
	}
}

if ( ! function_exists( 'csco_footer_social_links' ) ) {
	/**
	 * Footer Social Links
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_footer_social_links( $settings = array() ) {

		if ( ! get_theme_mod( 'footer_social_links', false ) ) {
			return;
		}

		if ( ! csco_powerkit_module_enabled( 'social_links' ) ) {
			return;
		}

		$scheme  = get_theme_mod( 'footer_social_links_scheme', 'default' );
		$maximum = get_theme_mod( 'footer_social_links_maximum', 4 );
		$counts  = get_theme_mod( 'footer_social_links_counts', true );
		?>
		<div class="cs-footer-social-links">
			<?php powerkit_social_links( false, false, $counts, 'nav', $scheme, 'mixed', $maximum ); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_footer_instagram' ) ) {
	/**
	 * Footer Instagraam
	 *
	 * @param array $settings The advanced settings.
	 */
	function csco_footer_instagram( $settings = array() ) {
		$username = get_theme_mod( 'footer_instagram_username' );

		add_filter( 'powerkit_instagram_templates', 'csco_footer_instagram_default', 20 );

		if ( $username && csco_powerkit_module_enabled( 'instagram_integration' ) ) {

			if ( 'simple' === get_theme_mod( 'footer_instagram_type', 'simple' ) ) {
				?>
				<div class="cs-footer__instagram">
					<?php
						powerkit_instagram_get_recent(
							array(
								'user_id' => $username,
								'header'  => get_theme_mod( 'footer_instagram_header', true ),
								'number'  => apply_filters( 'csco_instagram_footer_number', 4 ),
								'columns' => apply_filters( 'csco_instagram_footer_columns', 1 ),
								'size'    => 'small',
								'target'  => '_blank',
							)
						);
					?>
				</div>
				<?php
			} else {
				?>
				<div class="cs-footer__instagram">
					<div class="cs-flickity-init">
						<?php
							powerkit_instagram_get_recent(
								array(
									'user_id' => $username,
									'header'  => get_theme_mod( 'footer_instagram_header', true ),
									'number'  => apply_filters( 'csco_instagram_footer_number', 12 ),
									'columns' => apply_filters( 'csco_instagram_footer_columns', 1 ),
									'size'    => 'small',
									'target'  => '_blank',
								)
							);
						?>
					</div>
				</div>
				<?php
			}
		}

		$function = sprintf( 'remove_%s', 'filter' );

		$function( 'powerkit_instagram_templates', 'csco_footer_instagram_default', 20 );
	}
}

if ( ! function_exists( 'csco_the_post_format_icon' ) ) {
	/**
	 * Post Format Icon
	 *
	 * @param string $content After content.
	 */
	function csco_the_post_format_icon( $content = null ) {
		$post_format = get_post_format();

		if ( 'gallery' === $post_format ) {
			$attachments = count(
				(array) get_children(
					array(
						'post_parent' => get_the_ID(),
						'post_type'   => 'attachment',
					)
				)
			);

			$content = $attachments ? sprintf( '<span>%s</span>', $attachments ) : '';
		}

		if ( $post_format ) {
			?>
			<span class="cs-entry-format">
				<a class="cs-format-icon cs-format-<?php echo esc_attr( $post_format ); ?>" href="<?php the_permalink(); ?>">
					<?php echo wp_kses( $content, 'post' ); ?>
				</a>
			</span>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_post_subtitle' ) ) {
	/**
	 * Post Subtitle
	 */
	function csco_post_subtitle() {
		if ( ! is_single() ) {
			return;
		}

		if ( get_theme_mod( 'post_subtitle', true ) ) {
			$subtitle = apply_filters( 'plugins/wp_subtitle/get_subtitle', '', array(
				'before'  => '',
				'after'   => '',
				'post_id' => get_the_ID(),
			) );

			if ( $subtitle ) {
				?>
				<div class="cs-entry__subtitle">
					<?php echo wp_kses( $subtitle, 'post' ); ?>
				</div>
				<?php
			} elseif ( has_excerpt() ) {
				?>
				<div class="cs-entry__subtitle">
					<?php the_excerpt(); ?>
				</div>
				<?php
			}
		}
	}
}

if ( ! function_exists( 'csco_post_author' ) ) {
	/**
	 * Post Author Details
	 *
	 * @param int $id Author ID.
	 */
	function csco_post_author( $id = null ) {
		if ( ! $id ) {
			$id = get_the_author_meta( 'ID' );
		}
		?>
		<div class="cs-entry__author-inner">
			<div class="cs-entry__author-photo-wrapper">
				<a href="<?php echo esc_url( get_author_posts_url( $id ) ); ?>" class="cs-entry__author-photo">
					<?php echo get_avatar( $id, '56' ); ?>
				</a>
				<div class="cs-entry__author-name-wrapper">
					<a href="<?php echo esc_url( get_author_posts_url( $id ) ); ?>" class="cs-entry__author-name">
						<?php the_author_meta( 'display_name', $id ); ?>
					</a>

					<span class="cs-entry__author-position"><?php esc_html_e( 'Author', 'networker' ); ?></span>
				</div>
			</div>

			<div class="cs-entry__author-info">
				<?php if ( get_the_author_meta( 'description', $id ) ) { ?>
					<div class="cs-entry__author-description"><?php the_author_meta( 'description', $id ); ?></div>
				<?php } ?>

				<?php if ( csco_powerkit_module_enabled( 'social_links' ) ) { ?>
					<div class="cs-entry__author-social">
						<?php powerkit_author_social_links( $id ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_archive_post_description' ) ) {
	/**
	 * Post Description in Archive Pages
	 */
	function csco_archive_post_description() {
		$description = get_the_archive_description();
		if ( $description ) {
			?>
			<div class="cs-page__archive-description">
				<?php echo do_shortcode( $description ); ?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_archive_post_count' ) ) {
	/**
	 * Post Count in Archive Pages
	 */
	function csco_archive_post_count() {
		global $wp_query;
		$found_posts = $wp_query->found_posts;
		?>
		<div class="cs-page__archive-count">
			<?php
			/* translators: 1: Singular, 2: Plural. */
			echo esc_html( apply_filters( 'csco_article_full_count', sprintf( _n( '%s post', '%s posts', $found_posts, 'networker' ), $found_posts ), $found_posts ) );
			?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_subcategories' ) ) {
	/**
	 * Subcategories
	 */
	function csco_subcategories() {

		if ( false === get_theme_mod( 'category_subcategories', false ) ) {
			return;
		}

		if ( ! is_category() ) {
			return;
		}

		$args = apply_filters(
			'csco_subcategories_args',
			array(
				'parent' => get_query_var( 'cat' ),
			)
		);

		$categories = get_categories( $args );

		if ( $categories ) {
			?>
			<div class="cs-page__subcategories">
				<?php csco_section_heading( esc_html__( 'Subcategories', 'networker' ) ); ?>

				<div class="cs-page__tags">
					<ul>
						<?php
						foreach ( $categories as $category ) {
							// Translators: category name.
							$title = sprintf( esc_html__( 'View all posts in %s', 'networker' ), $category->name );
							$link  = get_category_link( $category->term_id )
							?>
								<li>
									<a href="<?php echo esc_url( $link ); ?>" title="<?php echo esc_attr( $title ); ?>">
										<?php echo esc_html( $category->name ); ?>
									</a>
								</li>
							<?php
						}
						?>
					</ul>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_entry_details' ) ) {
	/**
	 * Entry Details
	 *
	 * @param string $meta_location  The location meta.
	 * @param bool   $readmore       Display readmore.
	 * @param string $share_location The location share meta.
	 * @param array  $settings       The settings.
	 */
	function csco_entry_details( $meta_location = 'post_meta', $readmore = false, $share_location = null, $settings = array() ) {
		if ( 'post' !== get_post_type() ) {
			return;
		}

		$settings = array_merge( array(
			'class'          => null,
			'readmore_label' => null,
		), $settings );

		if ( is_array( $meta_location ) ) {
			$post_author = in_array( 'author', $meta_location, true );
			$post_date   = in_array( 'date', $meta_location, true );
		} else {
			$post_author = csco_has_post_meta( 'author', $meta_location );
			$post_date   = csco_has_post_meta( 'date', $meta_location );
		}

		$post_share = $share_location && csco_powerkit_module_enabled( 'share_buttons' ) && powerkit_share_buttons_exists( $share_location );

		if ( $post_author || $post_date || $readmore ) {
			?>
			<div class="cs-entry__details <?php echo esc_attr( $settings['class'] ); ?>">
				<?php
				if ( $post_author || $post_date ) {
					?>
					<div class="cs-entry__details-data">
						<?php
						$authors_list = array();

						if ( $post_author ) {
							$authors = array( get_the_author_meta( 'ID' ) );

							if ( csco_coauthors_enabled() ) {
								$authors = csco_get_coauthors();
							}
						}

						if ( $post_author ) {
							foreach ( $authors as $author ) {
								$author_id   = isset( $author->ID ) ? $author->ID : $author;
								$author_name = isset( $author->display_name ) ? $author->display_name : get_the_author_meta( 'display_name', $author_id );

								$author_url = get_author_posts_url( $author_id, isset( $author->user_nicename ) ? $author->user_nicename : '' );

								$authors_list[] = sprintf( '<a href="%s">%s</a>', esc_url( $author_url ), esc_html( $author_name ) );

								if ( get_avatar( $author_id, 40 ) ) {
									?>
										<a class="cs-author-avatar" href="<?php echo esc_url( $author_url ); ?>"><?php echo get_avatar( $author_id, 40 ); ?></a>
									<?php
								}
							}
						}
						?>
						<div class="cs-entry__details-meta">
							<?php
							if ( $authors_list ) {
								echo sprintf( '<div class="cs-entry__author-meta">%s</div>', wp_kses( implode( '', $authors_list ), 'post' ) );
							}

							if ( $post_date ) {
								csco_get_post_meta( array( 'date' ), false, true, $meta_location );
							}
							?>
						</div>
					</div>
				<?php } ?>

				<?php
				if ( $readmore ) {
					$readmore_label = $settings['readmore_label'] ? $settings['readmore_label'] : esc_html__( 'Read More', 'networker' );
					?>
					<div class="cs-entry__read-more">
						<a href="<?php the_permalink(); ?>">
							<?php echo esc_attr( get_theme_mod( 'misc_label_more', $readmore_label ) ); ?>
						</a>
					</div>
				<?php } ?>

				<?php if ( $post_share ) { ?>
					<div class="cs-entry__share-buttons">
						<?php powerkit_share_buttons_location( $share_location ); ?>
					</div>
				<?php } ?>
			</div>
			<?php
		}
	}
}
