<?php
/**
 * The template for displaying search form.
 *
 * @package Networker
 */

?>

<form role="search" method="get" class="cs-search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="cs-search__container">
		<input required data-swplive="false" class="cs-search__input" type="search" value="<?php the_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'Enter keyword', 'networker' ); ?>">

		<button class="cs-search__submit">
			<?php esc_html_e( 'Search', 'networker' ); ?>
		</button>
	</div>
</form>
