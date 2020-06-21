<?php
$classes = get_body_class();
$archive = in_array('archive',$classes);
$blog = in_array('blog',$classes);
$single = in_array('single',$classes);
?>
<div class="single_head">
  <?php if ($single) {  the_post_thumbnail('full'); } ?>
  <div class="post_data">
  <h1>  <?php
   if ($archive || $blog ) {
    wp_title();
    }
    else if ($single) {
     the_title();
     }
    ?> </h1>
  <?php the_breadcrumb(); ?>
  <?php
   if ($single) {
    $tech = get_field('tech');
    $client = get_field('client');
    $link = get_field('external_link');
    $git = get_field('git_link');  ?>
  <div class="post_fields">
    <?php if ($tech) { ?>
      <div class="tech"><span class="txt">Stuff used :</span><span class="cont"><?php echo $tech; ?></span> </div>
    <?php  } ?>
    <?php if ($client) { ?>
      <span class="client"><span class="txt"> Client :</span> <?php echo $client; ?> </span>
    <?php } ?>
    <div class="link_wrap">
    <?php if ($git) { ?>
      <a class="git" target="_blank" href="<?php echo $git; ?>">GitHub</a>
    <?php  } ?>
    <?php if ($link) { ?>
      <a class="link" target="_blank" href="<?php echo $link; ?>">see it live ></a>
    <?php  } ?>
      </div>
  </div>
  <?php  } ?>
  </div>
</div>
