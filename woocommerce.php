<?php
get_header();
woocommerce_content();
if (is_shop() or is_product_category() or is_product_tag() ) { ?>
<div id="side_toggle">
</div>
<sidebar id="sidebar">
<div class="inner">
<?php dynamic_sidebar('woo_archive'); ?>
</div>
</div>
<?php }
get_footer();
?>
