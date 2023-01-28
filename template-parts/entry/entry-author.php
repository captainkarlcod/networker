<?php
/**
 * The template part for displaying post author section.
 *
 * @package Networker
 */

$authors = array();

if ( csco_coauthors_enabled() ) {
	$authors = csco_get_coauthors();
}
?>

<?php do_action( 'csco_author_before' ); ?>

<div class="cs-entry__author">
	<?php
	if ( $authors ) {

		foreach ( $authors as $author ) {
			csco_post_author( $author->ID );
		}
	} else {
		csco_post_author();
	}
	?>
</div>

<?php do_action( 'csco_author_after' ); ?>
