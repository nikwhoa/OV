<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oversizedtemplate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="container-wrapper"> <!-- container wrapper is beginig -->
    <header>
        <div class="container mt-xl-5 mt-xl-5 mt-4">
            <div class="row">
                <!-- catalog link -->
                <div class="d-xl-flex d-lg-flex d-none col-xl-5 col-lg-4 item pt-2">
                    <div class="catalog">
                        <a class="target-active-link"
                           href="<?php echo wpm_translate_url( get_permalink( 12 ) ); ?>"><?php echo get_the_title( 12 ); ?></a>
                    </div>
                </div>
                <!-- logo -->
                <div class="col-7 col-xl-1 col-lg-1 item header-logo"><a
                            href="<?php echo wpm_translate_url( home_url() ); ?>"><img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/Logo-vector-black.svg"
                                alt="Home Page"/></a></div>
                <!-- shopping cart -->
                <div class="col-2 col-xl-5 col-lg-4 item pt-2">
                    <div class="cart">
                        <a class="target-active-link" href="<?php echo wpm_translate_url( get_permalink( 13 ) ); ?>"><?php echo wpm_translate_string( '[:ru]Корзина[:en]Cart' ); ?></a>
                        <span class="counter" id="cart-count"><?php
							$cart_count = WC()->cart->get_cart_contents_count();
							echo sprintf( _n( '%d', '%d', $cart_count ), $cart_count );
							?></span>
                    </div>
                </div>
                <!-- navigation -->
                <div class="col-2 col-xl-1 col-lg-1 item pt-2 pl-xl-5 pl-lg-5">
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">
                            <span class="rectangle-1"></span>
                            <span class="rectangle-2"></span>
                        </button>
                        <!--	            --><?php //wp_nav_menu( [
						//	                'container' => 'div',
						//		            'container_class' => 'dropdown-content',
						//                    'container_id' => 'myDropdown',
						//	                'items_wrap' => '%3$s'
						////		            'theme_location'  => 'primary'
						//	            ] ); ?>
						<?php
						$menuParameters = array(
							'container'       => 'div',
							'echo'            => false,
							'container_class' => 'dropdown-content',
							'container_id'    => 'myDropdown',
							'items_wrap'      => '%3$s',
							'depth'           => 0,
						);

						echo strip_tags( wp_nav_menu( $menuParameters ), '<div><a>' );
						?>
                        <!-- <div id="myDropdown" class="dropdown-content">
							 <a href="#">Link 1</a>
							 <a href="#">Link 2</a>
							 <a href="#">Link 3</a>
						 </div>-->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- back to page link -->
	<?php
	if ( is_woocommerce() ) :
		?>
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
<!--                    <div class="arrow-left"></div>-->
                    <a class="back-link" href="javascript:history.go(-1)"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/left-arrow.png" alt=""> назад</a>

                </div>
            </div>
        </div>
	<?php endif; ?>
