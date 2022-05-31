<?php get_header(); ?>
<div class="container">
<div class="row">
	
	<div class="col-xs-12">
		
		<div class="row no-margin">

		<?php if( have_posts() ): ?>
		
			<?php while( have_posts() ): the_post(); ?>
				
				<?php get_template_part('template-parts/content', 'book'); ?>
			
			<?php endwhile; ?>
				
			<div class="col-xs-12 text-center">
				<?php posts_nav_link(); ?>
			</div>
			
			<?php endif; ?>
			
		</div>
	
	</div>
	
</div>

</div>
<?php get_footer(); ?>