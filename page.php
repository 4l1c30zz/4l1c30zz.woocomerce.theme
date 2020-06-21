<?php
get_header();

if (have_posts()):
    while (have_posts()) :the_post();
        the_content();
    endwhile;
else :
    e('Sorry no posts here','4l1c30zz');

endif;

wp_reset_postdata();

get_footer();
?>
