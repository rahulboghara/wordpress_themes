<?php

 
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
        <div class="container">
            <div class="row">
        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', 'book' );

/*          the_post_navigation();*/

            // If comments are open or we have at least one comment, load up the comment template.
/*            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;*/

        endwhile; // End of the loop.
        ?>
        <div class="row navigation-post">
        <?php
        $prev_post = get_previous_post();
        if($prev_post) {
           $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
           echo "\t" . '<div class="col-xs-6 pull-left text-left"><span>&laquo; Previous post</span><br><a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" "><strong>&quot;'. $prev_title . '&quot;</strong></a></div>' . "\n";
        }

        $next_post = get_next_post();
        if($next_post) {
           $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
           echo "\t" . '<div class="col-xs-6 pull-right text-right"><span>Next post &raquo;</span><br><a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" "><strong>&quot;'. $next_title . '&quot;</strong></a></div>' . "\n";
        }
        ?>
        </div>
</div>
</div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php wp_reset_query(); ?>
<?php get_footer(); ?>