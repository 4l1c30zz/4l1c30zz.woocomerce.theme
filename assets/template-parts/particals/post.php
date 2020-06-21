<div class="single_post_wpap">
  <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail(); ?>
    <div class="cont_wrap">
      <div class="inner">
        <h3><?php the_title(); ?></h3>
        <?php the_excerpt(); ?>
      </div>
    </div>
  </a>
</div>
