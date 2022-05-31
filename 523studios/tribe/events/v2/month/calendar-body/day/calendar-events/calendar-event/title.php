<?php
/**
 * View: Month View - Calendar Event Title
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/month/calendar-body/day/calendar-events/calendar-event/title.php
 *
 * See more documentation about our views templating system.
 *
 * @link {INSERT_ARTICLE_LINK_HERE}
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

?>
<h3 class="tribe-events-calendar-month__calendar-event-title tribe-common-h8 tribe-common-h--alt">
	<a
		href="<?php echo esc_url( $event->permalink ) ?>"
		title="<?php echo esc_attr( $event->title ); ?>"
		rel="bookmark"
		class="tribe-events-calendar-month__calendar-event-title-link tribe-common-anchor-thin"
		data-js="tribe-events-tooltip"
		data-tooltip-content="#tribe-events-tooltip-content-<?php echo esc_attr( $event->ID ); ?>"
		aria-describedby="tribe-events-tooltip-content-<?php echo esc_attr( $event->ID ); ?>"
	>
		<?php
		$time_format      = tribe_get_time_format();
		$display_end_date = $event->dates->start_display->format( 'H:i' ) !== $event->dates->end_display->format( 'H:i' );
		?>
			<?php if ( ! empty( $event->featured ) ) : ?>
				<em
					class="tribe-events-calendar-month__calendar-event-datetime-featured-icon tribe-common-svgicon tribe-common-svgicon--featured"
					aria-label="<?php esc_attr_e( 'Featured', 'the-events-calendar' ) ?>"
					title="<?php esc_attr_e( 'Featured', 'the-events-calendar' ) ?>"
				>
				</em>
			<?php endif; ?>
				<?php echo esc_html( $event->dates->start_display->format( $time_format ) ); ?>
			<?php if ( $display_end_date ) : ?>
				<?php echo esc_html( $date_formats->time_range_separator ); ?>
				<?php echo esc_html( $event->dates->end_display->format( $time_format ) ); ?>
			<?php endif; ?>
			<?php $this->template( 'month/calendar-body/day/calendar-events/calendar-event/date/meta', [ 'event' => $event ] ); ?>
		<?php
		// phpcs:ignore
		echo $event->title;
		?>
	</a>
</h3>
