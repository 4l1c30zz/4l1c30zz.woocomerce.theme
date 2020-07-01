<?php
/*basic setup (navs , textdomain ,thumbnails-support)*/

if ( ! function_exists( 'theme_setup' ) ) :
function theme_setup() {
    load_theme_textdomain( '4l1c30zz', get_template_directory() . '/languages' );
    add_theme_support( 'post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menus( array(
        'header'   =>  esc_html__( 'Main Menu', '4l1c30zz' ),
        'footer' => esc_html__('Footer Menu', '4l1c30zz' )
    ));

    add_theme_support( 'post-formats', array ( 'gallery', 'project', 'image') );
    /*theme colors*/

    	add_theme_support( 'disable-custom-colors' );

    	// Editor Color Palette
    	add_theme_support( 'editor-color-palette', array(
        array(
          'name'  => __( 'white', '4l1c30zz' ),
          'slug'  => 'white',
          'color' => '#ffffff',
        ),
    		array(
    			'name'  => __( 'black', '4l1c30zz' ),
    			'slug'  => 'black',
    			'color' => '#000300',
    		),
        array(
          'name'  => __( 'gray', '4l1c30zz' ),
          'slug'  => 'gray',
          'color'	=> '#1a181b',
        ),
    		array(
    			'name'	=> __( 'magenta', '4l1c30zz' ),
    			'slug'	=> 'magenta',
    			'color'	=> '#EC008C',
    		),
        array(
          'name'	=> __( 'yellow', '4l1c30zz' ),
          'slug'	=> 'yellow',
          'color'	=> '#faff00',
        ),
        array(
          'name'	=> __( 'blue', '4l1c30zz' ),
          'slug'	=> 'blue',
          'color'	=> '#02a9ea',
        ),
    	) );
}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}
/*styles & scripts*/

function theme_scripts(){

  $theme = wp_get_theme();
  $ver = $theme->get( 'Version' );
  $themecsspath = get_stylesheet_directory() . '/assets/css/style.scss';
  $style_ver = filemtime( $themecsspath );
  wp_enqueue_style('style', get_stylesheet_uri(),array(),$style_ver  );
  $themecsspath = get_stylesheet_directory() . '/assets/js/anime.min.js';
  wp_enqueue_script('animate' ,get_template_directory_uri() . '/assets/js/anime.min.js', array(), $style_ver, true);
  $themecsspath = get_stylesheet_directory() . '/assets/js/main.js';
  
  wp_enqueue_script('main' ,get_template_directory_uri() . '/assets/js/main.js', array(), $style_ver, true);
  $themecsspath = get_stylesheet_directory() . '/assets/js/woo.js';
  wp_enqueue_script('woo' ,get_template_directory_uri() . '/assets/js/woo.js', array('jquery'), $style_ver, true);
    wp_enqueue_script('fontAwesome' , 'https://kit.fontawesome.com/efa9a3e947.js', array(), 1.0, true);

}
add_action('wp_enqueue_scripts','theme_scripts');

//woo add counter to minicart
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    ?>
    <div id="cart_counter">
        <?php echo WC()->cart->get_cart_contents_count();
      /*  echo ("<pre>");
        print_r(WC()->cart);
        echo ("</pre>");*/
        ?>
    </div>
    <?php
        $fragments['#cart_counter'] = ob_get_clean();
    return $fragments;
}


add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_items');
function wc_refresh_mini_cart_items($fragments){
    ob_start();
    ?>
    <ul class="woocommerce-mini-cart cart_list product_list_widget mini-cart-list">
            <?php
    if ( WC()->cart->is_empty() ) {
        echo '<span class="no-items-mini">No items added</span>';
    } else {
        $currency = get_woocommerce_currency_symbol();
        $cart_total = WC()->cart->cart_contents_total;
        foreach(WC()->cart->get_cart() as $cart_item ) {
            $_product = $cart_item['data'];
            $product_link = $_product->get_permalink();
            $price = $_product->get_price();
            $product_title = $_product->get_title();
            echo "<li>";

            echo "<div class='price'>"."<span class='quanity'>".$cart_item['quantity']."</span>" ." x " ."<span class='amnount'>" . $currency . $price . "</span></div>";
            echo "<span class='product_name'>".$product_title."</span>";
            echo "<a href='".$product_link."'>";
            echo $_product->get_image();
            echo "</a>";
      
             echo "</li>";
        }
  
    }
             ?>
    </ul>

    <?php
    add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_subtotal');
function wc_refresh_mini_cart_subtotal($fragments){
    ob_start();
    ?>
    <p class="woocommerce-mini-cart__total total">
        <?php 
 echo "<strong>Total: </strong>". $currency . $cart_total;
        ?>
    </p>
    <?php
        $fragments['.woocommerce-mini-cart__total total'] = ob_get_clean();
    return $fragments;
}
        $fragments['.mini-cart-list'] = ob_get_clean();
    return $fragments;
}



/*wiget areas*/
function my_register_sidebars() {
    register_sidebar(
        array(
            'id'            => 'woo-archive',
            'name'          => __( 'woo_archive' ),
            'description'   => __( 'woocomerce archive sidebar' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_register_sidebars' );
//breadcrumbs
function the_breadcrumb() {

    $sep = ' > ';

    if (!is_front_page()) {

	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;

	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( ' Archives', 'text_domain' );
            }
        }

	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }

	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}
/*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/

//woo integration
//basic setup
function theme_woocommerce_support() {
  add_theme_support( 'woocommerce', array(
    'thumbnail_image_width' => 500,
    'single_image_width'    => 1024,

    'product_grid'          => array(
        'default_rows'    => 3,
        'min_rows'        => 2,
        'max_rows'        => 8,
        'default_columns' => 4,
        'min_columns'     => 2,
        'max_columns'     => 5,
    ),
) ); }
add_action( 'after_setup_theme', 'theme_woocommerce_support' );
//enable default woo gallery   and slider
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
//disable default woo styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
//woo single change title_
remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_title', 5 );
add_action('woocommerce_before_single_product_summary', 'new_title', 5 );
function new_title() {
     the_title( '<h1 class="product_title entry-title">', '</h1>' );
}

//add title to cart & checkout
add_action( 'woocommerce_before_cart', 'new_title', 10 );   
add_action( 'woocommerce_before_checkout_form', 'new_title', 10 );    

//remove add to cart from woo archive
add_action( 'woocommerce_after_shop_loop_item', function(){
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}, 1 );
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
//remove woo sorting
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',30 );
//add breadcrumbs
add_action( 'woocommerce_archive_description', 'attach_bread', 7 );
add_action('woocommerce_before_single_product_summary', 'attach_bread',20);
if ( ! function_exists( 'woocommerce_template_single_title' ) ) {
   function attach_bread() {

     $args = array(
       'delimiter' => '>',
   );
   woocommerce_breadcrumb($args);

    }
}


//blocks extensions for wp editor
add_action('acf/init', 'my_acf_init');
function my_acf_init() {

	if( function_exists('acf_register_block') ) {

		acf_register_block(array(
			'name'				=> 'woo-categories',
			'title'				=> __('woo categories'),
			'description'		=> __('A woocomerce block'),
			'render_callback'	=> 'acf_render_callback',
			'category'			=> 'common',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'woo categories', 'smiley' ),
        ));
	}
}
function acf_render_callback( $block ) {

	$slug = str_replace('acf/', '', $block['name']);
	if( file_exists( get_theme_file_path("/assets/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/assets/template-parts/block/content-{$slug}.php") );
	}
}

//acf blocks admin view fx
function my_acf_admin_head() {
?>
<style type="text/css">
.acf-block-preview .wp-block-columns{
    display: flex;
    justify-content: space-between;
    align-content: center;
    flex-wrap: wrap;
}
.acf-block-preview .wp-block-columns > div{
    flex-basis: calc(33.33% - 40px);
    margin: 20px;
    flex-grow: 0;
}
</style>
<?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');
?>
