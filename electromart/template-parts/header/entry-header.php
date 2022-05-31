<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Electromart
 * @since 1.0.0
 */

$discussion = ! is_page() && electromart_can_show_post_thumbnail() ? electromart_get_discussion_data() : null; ?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php if ( ! is_page() ) : ?>
<div class="entry-meta">
	<?php electromart_posted_by(); ?>
	<?php electromart_posted_on(); ?>
	<span class="comment-count">
		<?php
		if ( ! empty( $discussion ) ) {
			electromart_discussion_avatars_list( $discussion->authors );
		}
		?>
		<?php electromart_comment_count(); ?>
	</span>
	<?php
	// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'electromart' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . electromart_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	?>
</div><!-- .meta-info -->
<?php endif; ?>
