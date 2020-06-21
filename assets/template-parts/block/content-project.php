<?php
/**
 * Block Name: Project
 *
 * This is the template that displays the project block.
 */
$title = get_field('title');
$img = get_field('img');
$proj_desc = get_field('proj_desc');
$link = get_field('link');
$link_external = get_field('link_external');
$git = get_field('git');

?>

<div class="proj_wrapper">
  <div class="media">
    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />

  </div>
  <div class="copy">
    <div class="row_wrap">
        <h4 class="copy-hd">
            <?php echo $title; ?>
        </h4>
        <div class="mark"></div>
    </div>
    <div class="copy-bd">
      <?php
      $proj_desc_arr = explode(' ', $proj_desc);
      $trimmedArray = array_map('trim', $proj_desc_arr);
      $proj_desc_arr_c =   array_filter($trimmedArray);
      foreach ($proj_desc_arr_c as $key => $v) {
        if (!empty($v)) {
        ?>
        <div class="row_wrap">
              <p> <?php echo $v; ?> </p>
             <div class="mark"></div>
        </div>
      <?php } }
      if($link){?>
      <a class="inner_link" href="<?php echo $link ;?>
    "> more </a>
  <?php } ?>
    </div>

  </div>

</div>
<div class="proj_links">
  <?php if($git){ ?>
<a class="primary" href="<?php echo $git ?>" target="_blank"> GitHub </a>
<?php } ?>
<a class="secondary" href="<?php echo $link_external; ?>" target="_blank"> see it live > </a>
</div>
