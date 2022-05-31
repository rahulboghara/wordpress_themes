<?php

/*
Template Name: HomePage Template
*/
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
 * @package 523studios
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		
				<div class="home-content">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
					endif;
				endwhile; // End of the loop.
				?>
			</div>
			<div class="main-content-inner">
				<div class="container">
			<div class="row">
				<div class="main-content">
					<script type="text/javascript">
            jQuery(document).ready(function($) {
                // This is required for AJAX to work on our page
                var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
               
                function studio_load_all_posts(page){
                    // Start the transition
                    $(".studio_pag_loading").fadeIn().css('background','#fff');
                   
                    // Data to receive from our server
                    // the value in 'action' is the key that will be identified by the 'wp_ajax_' hook
                    var data = {
                        page: page,
                        action: "demo-pagination-load-posts"
                    };
                   
                    // Send the data
                    $.post(ajaxurl, data, function(response) {
                        // If successful Append the data into our html container
                        $(".studio_container").html(response);
                        // End the transition
                        $(".studio_pag_loading").css({'background':'none', 'transition':'all 1s ease-out'});
                    });
                }
               
                // Load page 1 as the default
                studio_load_all_posts(1);
               
                // Handle the clicks
                $('.studio_container .studio-pagination li.active').live('click',function(){
                    var page = $(this).attr('p');
                    studio_load_all_posts(page);
                    $('html, body').animate({
				        scrollTop: $(".studio_pag_loading").offset().top
				    }, 2000);
                   
                });
                           
            });
            </script>
            <div class = "studio_pag_loading">
                <div class = "studio_container">
                    <div class="studio-content"></div>
                </div>
            </div>
		</div>
		<div class="sidebar-content">
			<?php
			get_sidebar('main');
			?>
		</div>
	</div>
</div>
</div>
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
