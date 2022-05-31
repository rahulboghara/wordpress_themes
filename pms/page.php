<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pms
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<?php if ( is_user_logged_in() ) {?>
					<?php if ( is_front_page() ) {?>        
						<div class="main_heading"><?php echo esc_html__( 'Search Property', 'pms' )?></div>
						<form role="search" method="get" id="searchform_title" action="">
							<div class="input-gp">
								<input type="text" class="input-group-field" value="" name="property_title" id="search_title" placeholder="Search By Name">
							</div>
							<div class="input-gp">
								<select name="property_type" id="property_type" class="form-control selcls">  
							    <option value="" class="property_opt" selected="selected"><?php echo esc_attr(__('All Property Type')); ?></option> 
							    <?php 
									$terms = get_terms( 'property_type', 'hide_empty=0' );
									$count = count( $terms );
									if ( $count > 0 ) {
									foreach ( $terms as $term ) {
									    echo '<option class="property_opt" value="' . $term->name . '">' . $term->name . '</option>';
									}
								}

							    ?>
							</select>
							</div>

							<div class="input-gp">
								<input type="text" class="input-group-field" value="" name="property_address" placeholder="Search By Address">
							</div>
							
							<input type="hidden" name="post_type" value="property">
								<div class="input-group-button">
									<button type="submit" id="searchsubmit" class="button" >Search
										<!-- <i class="fa fa-search" aria-hidden="true"></i> -->
									</button>
								</div>
						</form>

						<div id="results"></div>

						<?php
					} else {

						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							if ( comments_open() || get_comments_number() ) :
								comments_template();
						endif;

					endwhile;
				}
			} else {
				?>
				<?php
				if ( is_page( 'home' ) ) {
				$page = get_page_by_title('login'); 
				$content = apply_filters('the_content', $page->post_content);
				echo $content;
			}else{
				while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							if ( comments_open() || get_comments_number() ) :
								comments_template();
						endif;

					endwhile;
				}
			}
				?>
		</div>
	</div>
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
