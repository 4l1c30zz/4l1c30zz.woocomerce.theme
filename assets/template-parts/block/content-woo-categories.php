<?php
/**
 * Block Name: Project
 *
 * This is the template that displays woo-categories block.
 */
//$woo_categories = wp_list_categories( array('taxonomy' => 'product_cat', 'title_li'  => '') );
//echo $woo_categories ;
$prod_categories = get_terms( 'product_cat', array(
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => true
    ));
?>
   <div class="wp-block-columns are-vertically-aligned-center has-3-columns category_wraper"> 
<?php
    foreach( $prod_categories as $prod_cat ) :
        $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
        $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
        $term_link = get_term_link( $prod_cat, 'product_cat' );
        $cat_name = $prod_cat->name;
        ?>
        <div class="wp-block-column is-vertically-aligned-center woo-category-block"> 
        <a href="<?php echo $term_link; ?>">
          <img src="<?php echo $shop_catalog_img[0]; ?>" alt="<?php echo $cat_name; ?>" />
          <h3>
            <?php echo $cat_name ?>
          </h3>
        </a>
    </div>
    <?php endforeach; ?>
 </div>
    <?php wp_reset_query(); ?>


