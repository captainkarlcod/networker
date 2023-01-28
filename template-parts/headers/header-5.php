<?php
/**
 * The template for displaying the header 5
 *
 * @package Networker
 */

$scheme = csco_color_scheme(
	get_theme_mod( 'color_topbar_background', '#f8f9fa' ),
	get_theme_mod( 'color_topbar_background_dark', '#333335' )
);
?>

<div class="cs-topbar cs-topbar-large" <?php echo wp_kses( $scheme, 'post' ); ?>>
	<div class="cs-container">
		<div class="cs-header__inner cs-inner-large-height">
			<div class="cs-header__col cs-col-left">
				<?php csco_component( 'header_button' ); ?>
			</div>
			<div class="cs-header__col cs-col-center">
				<?php csco_component( 'header_logo', true, array( 'variant' => 'large' ) ); ?>
			</div>
			<div class="cs-header__col cs-col-right">
				<?php csco_component( 'header_social_links' ); ?>
			</div>
		</div>
	</div>
</div>

<?php
$scheme = csco_color_scheme(
	get_theme_mod( 'color_header_background', '#FFFFFF' ),
	get_theme_mod( 'color_header_background_dark', '#1c1c1c' )
);
?>

<header class="cs-header cs-header-five" <?php echo wp_kses( $scheme, 'post' ); ?>>
	<div class="cs-container">
		<div class="cs-header__inner cs-header__inner-desktop">
			<div class="cs-header__col cs-col-left">
				<?php
					csco_component( 'header_offcanvas_toggle' );
					csco_component( 'header_logo', true, array( 'variant' => 'hide' ) );
				?>
			</div>
			<div class="cs-header__col cs-col-nav  cs-col-center">
				<?php
					csco_component( 'header_nav_menu' );
					csco_component( 'header_multi_column_widgets' );
				?>
			</div>
			<div class="cs-header__col cs-col-right">
				<?php
					csco_component( 'header_scheme_toggle' );
					csco_component( 'header_search_toggle' );
					csco_component( 'wc_header_cart' );
				?>
			</div>
		</div>

		<?php csco_site_nav_mobile(); ?>
	</div>

	<?php csco_site_search(); ?>
</header>
