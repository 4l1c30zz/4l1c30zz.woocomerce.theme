<?php
 /*
*
* Block Name: Project
*
* This is The template that pulls projects custom post type
*
*/
$type = get_field("loop_argument_type" );
if ($type == "proj_count") :
  $args = array(
    'orderby' => 'title',
    'post_type' => 'projects',
    'posts_per_page' => get_field('project_count'),
   );
else :
  $projects = get_field('project_select');
  $args = array(
    'orderby' => 'title',
    'post_type' => 'projects',
    'posts_in' => $projects,
  );
endif;
$query = new WP_Query($args);
if ( $query->have_posts() ) : ?>
  <div class="proj_row_wrap">
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <?php get_template_part('/assets/template-parts/particals/project'); ?>
  <?php endwhile; ?>
  </div>
<?php else :
e('Sorry no posts here','4l1c30zz');
endif; ?>
