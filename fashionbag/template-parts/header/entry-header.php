<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage fashionbag
 * @since 1.0.0
 */

$discussion = ! is_page() && fashionbag_can_show_post_thumbnail() ? fashionbag_get_discussion_data() : null; ?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php if ( ! is_page() ) : ?>
<div class="entry-meta">
	<?php fashionbag_posted_by(); ?>
	<?php fashionbag_posted_on(); ?>
	<span class="comment-count">
		<?php
		if ( ! empty( $discussion ) ) {
			fashionbag_discussion_avatars_list( $discussion->authors );
		}
		?>
		<?php fashionbag_comment_count(); ?>
	</span>
	<?php
	// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'fashionbag' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . fashionbag_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	?>
</div><!-- .meta-info -->
<?php endif; ?>
