<?php
/**
 * The template for displaying the header mobile
 *
 * @package Networker
 */

?>

<div class="cs-header__inner cs-header__inner-mobile">
	<div class="cs-header__col cs-col-left">
		<?php csco_component( 'header_offcanvas_toggle' ); ?>
	</div>
	<div class="cs-header__col cs-col-center">
		<?php csco_component( 'header_logo' ); ?>
	</div>
	<div class="cs-header__col cs-col-right">
		<?php csco_component( 'header_scheme_toggle_mobile' ); ?>
		<?php csco_component( 'header_search_toggle' ); ?>
	</div>
</div>
