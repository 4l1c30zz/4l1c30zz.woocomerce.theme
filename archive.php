<?php get_header(); ?>
<?php if (have_posts()): ?>
  <?php get_template_part('/assets/template-parts/particals/heading'); ?>
  <div class="post_grid">
  <?php  while (have_posts()) :the_post(); ?>
  <?php get_template_part('/assets/template-parts/particals/post'); ?>
  <?php endwhile; ?>
  </div>
<?php else :
  e('Sorry no posts here','4l1c30zz');
endif;
wp_reset_postdata();
get_footer();
?>
