<?php
get_header();
if (have_posts()):
    while (have_posts()) :the_post(); ?>
        <div class="single_proj_wrap">
          <?php get_template_part('/assets/template-parts/particals/heading'); ?>
        <div class="single_cont">
          <?php the_content(); ?>
        </div>
      </div>
    <?php endwhile; ?>
    <?php
//related posts
  $categories = get_the_category();
  $args=array(
    'post__not_in' => array( $post->ID ),
    'posts_per_page'=>3,
    'caller_get_posts'=>1,
    'category_name'=>  $categories[0]->name,
  );
  $my_query = new WP_Query($args); ?>
  <?php if( $my_query->have_posts() ) {  ?>
    <div class="post_grid">
    <h2>Related posts</h2>
    <?php  while ($my_query->have_posts()) : $my_query->the_post();  ?>
      <?php get_template_part('/assets/template-parts/particals/post'); ?>
    <?php  endwhile; ?>
    </div>
  <?php }
  wp_reset_query();
else :
    e('Sorry no posts here','4l1c30zz');
endif;
get_footer();
?>
