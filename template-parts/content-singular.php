<?php
/**
 * Template part singular content
 *
 * @package Networker
 */

?>

<div class="cs-entry__wrap">

	<?php do_action( 'csco_entry_wrap_start' ); ?>

	<div class="cs-entry__container">

		<?php do_action( 'csco_entry_container_start' ); ?>

		<div class="cs-entry__content-wrap">
			<?php do_action( 'csco_entry_content_before' ); ?>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php do_action( 'csco_entry_content_after' ); ?>
		</div>

		<?php do_action( 'csco_entry_container_end' ); ?>

	</div>

	<?php do_action( 'csco_entry_wrap_end' ); ?>
</div>
