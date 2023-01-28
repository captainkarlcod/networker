<?php
/**
 * The template for displaying comments
 *
 * @package Networker
 */

?>

<?php do_action( 'csco_comments_before' ); ?>

<?php
$style = 'cs-entry__comments-collapse';

if ( 'page' === get_post_type() ) {
	if ( get_theme_mod( 'page_comments_simple', false ) ) {
		$style = 'cs-entry-comments-simple';
	}
} else {
	if ( get_theme_mod( 'post_comments_simple', false ) ) {
		$style = 'cs-entry-comments-simple';
	}
}

if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) {
	$style = 'cs-entry-comments-simple';
}

$comments_id = 'cs-entry-comments-simple' === $style ? 'comments' : 'comments-hidden';
?>

<div class="cs-entry__comments <?php echo esc_attr( $style ); ?>" id="<?php echo esc_attr( $comments_id ); ?>">

	<?php if ( have_comments() ) { ?>

		<?php
		$comments_number = get_comments_number();

		if ( 1 === $comments_number ) {
			$section_heading = esc_html_e( 'One comment', 'networker' );
		} else {
			/* translators: 1: number of comments */
			$section_heading = sprintf( esc_html( _n( '%s comment', '%s comments', $comments_number, 'networker' ) ), esc_html( number_format_i18n( (int) $comments_number ) ) );
		}

		csco_section_heading( $section_heading );
		?>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 60,
				)
			);
			?>
		</ol>

		<?php the_comments_navigation(); ?>

	<?php } ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'networker' ); ?></p>
	<?php } ?>

	<?php
	comment_form(
		array(
			'title_reply_before' => csco_section_heading( null, 'before', false ),
			'title_reply_after'  => csco_section_heading( null, 'after', false ),
		)
	);
	?>

</div>

<?php if ( 'cs-entry__comments-collapse' === $style ) : ?>
	<div class="cs-entry__comments-show" id="comments">
		<button><?php esc_html_e( 'View Comments', 'networker' ); ?> (<?php echo intval( get_comments_number() ); ?>)</button>
	</div>
<?php endif; ?>

<?php do_action( 'csco_comments_after' ); ?>
