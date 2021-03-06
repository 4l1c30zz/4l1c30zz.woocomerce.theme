<!DOCTYPE html>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
      <svg id="morph"  width="100" viewBox="0 300 1920 800" preserveAspectRatio="none">
        <path class="morph" d="M1-1C86.5,1.8,222.9,5.9,391,9c297.1,5.4,531.2,4.6,628,4c171.8-1,187.1-2.9,572-8c165.7-2.2,301.4-3.7,390.7-4.7C1321.4-0.1,661.2-0.6,1-1z"></path>
      </svg>
        <header id="site_header">
          <div class="cont_wrap">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <svg id="logo" viewBox="0 0 146 137" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path  class="circle" d="M83.2141 28.2484C57.6116 28.2484 36.8551 48.6087 36.8551 73.716C36.8551 98.8233 57.6116 119.184 83.2141 119.184C108.817 119.184 129.573 98.8233 129.573 73.716C129.573 48.6087 108.817 28.2484 83.2141 28.2484ZM83.2141 110.305C62.6132 110.305 45.9104 93.9277 45.9104 73.716C45.9104 53.5042 62.6132 37.1268 83.2141 37.1268C103.815 37.1268 120.518 53.5042 120.518 73.716C120.518 93.9277 103.815 110.305 83.2141 110.305Z"/>
                        <path  class="symbol" d="M142.265 83.6061H100.235C100.235 83.6061 100.348 21.3649 100.384 9.43734C96.4151 7.69702 92.4534 5.96378 88.4846 4.22346C88.6261 16.5472 89.2274 71.3814 89.1566 83.6061C85.485 83.5495 79.0048 83.6627 75.3331 83.6061C75.1068 71.9969 75.2058 12.8897 75.3331 0C73.1754 0.558883 53.6923 0.72867 53.6923 0.72867L0.202271 72.1242L10.0004 92.145C10.0004 92.145 48.8392 92.1662 66.9216 92.1733C66.9216 106.259 66.9216 118.122 66.9216 132.208C69.1359 132.767 73.232 135.695 75.3331 136.113C75.2765 127.178 75.2482 98.3068 75.3331 92.1733C79.1321 92.2298 85.1454 92.1379 88.9444 92.1945C88.909 98.9577 88.8171 105.869 88.7959 112.64C88.7676 120.563 88.7393 136.41 88.7393 136.41L100.087 132.172L100.03 92.145L146 92.2298L142.265 83.6061ZM56.5433 9.13314L66.8862 8.70867L66.9216 82.9057L15.9713 82.9198L11.6063 73.7726L56.5433 9.13314Z"/>
                        </svg>
                    </a>
                    <div id="nav_toggle">menu</div>
                </div>

            <nav>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'header',
                        'menu_class' => 'header_nav',
                         'before' => '<div class="txt_wrap">',
                         'after' => '<span class="line"></span></div>',

                    )
                );
                ?>
            </nav>
           <div class="cart">
            <div class="cart_icon_wrap">
              <i class="fas fa-shopping-cart"></i>
            <span id="cart_counter"></span>
              </div>
            <div class="inner_cart_wrap">
            <?php woocommerce_mini_cart( [ 'list_class' => 'mini-cart-list' ] ); ?>
              </div>
          </div>
          </div>
        </header>
        <?php  if( is_front_page()  ) { ?>
          <div class="home_wrap page_wrapper">
      <?php } else { ?>
    <div id="main" class="page_wrapper">

      <?php  } ?>