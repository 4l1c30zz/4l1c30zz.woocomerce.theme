<?php
get_header();
if (have_posts()): ?>
  <?php get_template_part('/assets/template-parts/particals/heading'); ?>
    <div class="proj_row_wrap">
  <?php  while (have_posts()) :the_post(); ?>
  <?php get_template_part('/assets/template-parts/particals/project'); ?>
    <?php endwhile; ?>
  </div>
<?php else :
    e('Sorry no posts here','4l1c30zz');
endif;
get_footer();
?>
