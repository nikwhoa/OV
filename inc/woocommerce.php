<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package oversizedtemplate
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return voidwoocommerce_template_loop_product_link_open
 */
function oversizedtemplate_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
//			'thumbnail_image_width' => 280,
//			'thumbnail_image_height' => 380,
			'single_image_width'    => 680,
			'product_grid'          => array(
				'default_rows'    => 4,
				'min_rows'        => 1,
				'default_columns' => 3,
				'min_columns'     => 1,
				'max_columns'     => 3,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'oversizedtemplate_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function oversizedtemplate_woocommerce_scripts() {
	wp_enqueue_style( 'oversizedtemplate-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

//	wp_enqueue_style( 'oversizedtemplate-woocommerce-style-default', get_template_directory_uri() . '/woocommerce-old.css', array(), _S_VERSION );

//	$font_path   = WC()->plugin_url() . '/assets/fonts/';
//	$inline_font = '@font-face {
//			font-family: "star";
//			src: url("' . $font_path . 'star.eot");
//			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
//				url("' . $font_path . 'star.woff") format("woff"),
//				url("' . $font_path . 'star.ttf") format("truetype"),
//				url("' . $font_path . 'star.svg#star") format("svg");
//			font-weight: normal;
//			font-style: normal;
//		}';
//
//	wp_add_inline_style( 'oversizedtemplate-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'oversizedtemplate_woocommerce_scripts' );
/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function oversizedtemplate_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'oversizedtemplate_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function oversizedtemplate_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'oversizedtemplate_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'oversizedtemplate_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function oversizedtemplate_woocommerce_wrapper_before() {
		?>
        <div class="divider-xl"></div>
			<div class="container">
            <div class="row">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'oversizedtemplate_woocommerce_wrapper_before' );

if ( ! function_exists( 'oversizedtemplate_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function oversizedtemplate_woocommerce_wrapper_after() {
		?>
        </div>
			</div><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'oversizedtemplate_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'oversizedtemplate_woocommerce_header_cart' ) ) {
			oversizedtemplate_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'oversizedtemplate_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function oversizedtemplate_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		oversizedtemplate_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'oversizedtemplate_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'oversizedtemplate_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function oversizedtemplate_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'oversizedtemplate' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'oversizedtemplate' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'oversizedtemplate_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function oversizedtemplate_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php oversizedtemplate_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}


remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
/* removing sale and others things */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
/* removing sale and others things */

/* removing link from picture and adding link only to a title */
//remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
//add_filter('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open');
//add_filter('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close');
/* removing link from picture and adding link only to a title */

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

//remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20  );
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);



add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
	return array(
		'width' => 680,
		'height' => 980,
		'crop' => 2,
	);
} );

//add_filter( 'woocommerce_get_image_size_single', function( $size ) {
//	return array(
//		'width' => 593,
//		'height' => 700,
//		'crop' => 2,
//	);
//} );
//add_filter( 'subcategory_archive_thumbnail_size', function( $size ) {
//	return array(
//		'width' => 594,
//		'height' => 700,
//		'crop' => 2,
//	);
//} );


add_filter('woocommerce_variable_sale_price_html', 'shop_variable_product_price', 10, 2);
add_filter('woocommerce_variable_price_html','shop_variable_product_price', 10, 2 );

function shop_variable_product_price( $price, $product ){
	$variation_min_reg_price = $product->get_variation_regular_price('max', true);
	$variation_min_sale_price = $product->get_variation_sale_price('max', true);
	if ( $product->is_on_sale() && !empty($variation_min_sale_price)){
		if ( !empty($variation_min_sale_price) )
			$price = '<div class="strike">' .  wc_price($variation_min_reg_price) . '</div>
        <div>' .  wc_price($variation_min_sale_price) . '</div>';
	} else {
		if(!empty($variation_min_reg_price))
			$price = '<div>'.wc_price( $variation_min_reg_price ).'</div>';
		else
			$price = '<div>'.wc_price( $product->regular_price ).'</div>';
	}
	return $price;
}


/**
 * Replace add to cart button in the loop.
 */
function iconic_change_loop_add_to_cart() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_after_shop_loop_item', 'iconic_template_loop_add_to_cart', 10 );
}

add_action( 'init', 'iconic_change_loop_add_to_cart', 10 );

/**
 * Use single add to cart button for variable products.
 */
function iconic_template_loop_add_to_cart() {
	global $product;

	if ( ! $product->is_type( 'variable' ) ) {
		woocommerce_template_loop_add_to_cart();
		return;
	}

	remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
	add_action( 'woocommerce_single_variation', 'iconic_loop_variation_add_to_cart_button', 20 );

	woocommerce_template_single_add_to_cart();
}

/**
 * Customise variable add to cart button for loop.
 *
 * Remove qty selector and simplify.
 */
function iconic_loop_variation_add_to_cart_button() {
	global $product;

	?>
    <div class="woocommerce-variation-add-to-cart variations_button">
        <button type="submit" class="single_add_to_cart_button button"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
        <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
        <input type="hidden" name="variation_id" class="variation_id" value="0" />
    </div>
	<?php
}

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_filter( 'woocommerce_show_variation_price', '__return_true' );



add_filter( 'woocommerce_single_product_carousel_options', 'sf_update_woo_flexslider_options' );
/**
 * Filer WooCommerce Flexslider options - Add Navigation Arrows
 */
function sf_update_woo_flexslider_options( $options ) {

	$options['directionNav'] = true;
//	$options['slideshow']      = true;
	$options['touch']          = true;
	$options['controlNav']     = true;
//	$options['easing']         = 'swing';
	$options['animationSpeed'] = 1200;
	$options['slideshowSpeed'] = 3500;
	$options['prevText']       = "<img class='left-arrow' src='https://theoversized.com/wp-content/themes/oversizedtemplate/assets/image/left-arrow.png'>";  // String - Set the text for the "previous" directionNav item
	$options['nextText']       = "<img class='right-arrow' src='https://theoversized.com/wp-content/themes/oversizedtemplate/assets/image/left-arrow.png'>";  // String - Set the text for the "next" directionNav item
//	$options['animation'] = 'fade';
//	$options['animation'] = 'fade';

	return $options;
}




//add_filter( 'woocommerce_single_product_carousel_options', 'filter_single_product_carousel_options' );
//function filter_single_product_carousel_options( $args ) {
//	$args['animation']      = 'fade';
//	$args['easing']         = 'swing';
//	$args['controlNav']     = true;
//	$args['slideshow']      = true;
//	$args['touch']          = true;
//	$args['animationSpeed'] = 1200;
//	$args['slideshowSpeed'] = 3500;
//	$args['animationLoop']  = true; // Breaks photoswipe pagination if true.
//	$args['allowOneSlide']  = true;
//	$args['prevText']       = "<";  // String - Set the text for the "previous" directionNav item
//	$args['nextText']       = ">";  // String - Set the text for the "next" directionNav item
//
//	return $args;
//}


//function mihdan_wc_add_to_cart_message( $message, $product_id ) {
//	global $product;
//	return wpm_translate_string( '[:ru]'.$product->title.'Индивидуальный заказ[:en]Upcycle it' );
//}
//add_filter( 'wc_add_to_cart_message', 'mihdan_wc_add_to_cart_message', 10, 2 );



/* Adding sold oud hover */
add_action( 'woocommerce_before_shop_loop_item_title', function() {
	global $product;
	if ( !$product->is_in_stock() ) {
		echo '<span class="now_sold">Sold Out</span>';
	}
});