<div class="single_i_wrap">
  <div class="proj_wrapper">
  <div class="media">
    <?php the_post_thumbnail('full'); ?>
  </div>
  <div class="copy">
    <div class="row_wrap">
      <h4 class="copy-hd">
        <?php the_title(); ?>
        </h4>
        <div class="mark"></div>
      </div>
    <div class="copy-bd">
      <?php
      $id = get_the_ID();
      $proj_desc = get_field('tech', $id );
      $show_link = get_field('show_link', $id );
      $proj_desc_arr = explode(' ', $proj_desc);
      $trimmedArray = array_map('trim', $proj_desc_arr);
      $proj_desc_arr_c =   array_filter($trimmedArray);
      foreach ($proj_desc_arr_c as $key => $v) {
      if (!empty($v)) { ?>
        <div class="row_wrap">
          <p> <?php echo $v; ?> </p>
          <div class="mark"></div>
        </div>
      <?php } } ?>
      <?php   if ( $show_link ) { ?>
        <a class="inner_link" href="<?php the_permalink(); ?>
        "> more </a>
      <?php } ?>
    </div>
  </div>
  </div>
  <div class="proj_links">
    <?php
    $git = get_field('git_link' , $id);
    $link_external = get_field('external_link' , $id);
    if($git){ ?>
      <a class="primary" href="<?php echo $git ?>" target="_blank"> GitHub </a>
    <?php } ?>
    <a class="secondary" href="<?php echo $link_external; ?>" target="_blank"> live > </a>
  </div>
</div>
