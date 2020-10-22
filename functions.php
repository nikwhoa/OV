<?php
/**
 * oversizedtemplate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package oversizedtemplate
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'oversizedtemplate_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function oversizedtemplate_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on oversizedtemplate, use a find and replace
		 * to change 'oversizedtemplate' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'oversizedtemplate', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'oversizedtemplate' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'oversizedtemplate_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'oversizedtemplate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oversizedtemplate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'oversizedtemplate_content_width', 640 );
}
add_action( 'after_setup_theme', 'oversizedtemplate_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function oversizedtemplate_scripts() {
	wp_enqueue_style('oversizedtemplate-fonts', get_template_directory_uri().'/fonts/fonts.css', array());
	wp_enqueue_style( 'oversizedtemplate-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'oversizedtemplate-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), _S_VERSION );
//	wp_enqueue_style( 'oversizedtemplate-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css', array(), _S_VERSION );
//	wp_style_add_data( 'oversizedtemplate-style', 'rtl', 'replace' );
	wp_enqueue_style('oversizedcustomteplaye', get_template_directory_uri().'/assets/css/template.css', array('oversizedtemplate-bootstrap'));
	wp_enqueue_style('font-awesome','https://pro.fontawesome.com/releases/v5.10.0/css/all.css', array('oversizedtemplate-bootstrap'));
	wp_enqueue_script( 'oversizedtemplate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'oversizedtemplate-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'oversizedtemplate-bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('oversizedtemplate-popper'), _S_VERSION, true );
//	wp_enqueue_script( 'oversizedtemplate-bootstrapjs', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('oversizedtemplate-popper'), _S_VERSION, true );
	wp_enqueue_script( 'oversizedtemplate-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js', array('oversizedtemplate-bootstrapjs'), _S_VERSION, true );
	wp_enqueue_script( 'oversizedtemplate-script', get_template_directory_uri() . '/assets/js/script.js', array('oversizedtemplate-bootstrapjs'), _S_VERSION, true );
	wp_enqueue_script( 'oversizedtemplate-woocommerce-slider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array(), _S_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'oversizedtemplate_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/* FIle for custom sidebars */

require get_template_directory() . '/inc/template-sidebars.php';

/**
 * Custom gallery plugin
 */
require get_template_directory() . '/inc/gallery-ovbook.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/* .n show numbers of items added to the cart */
add_filter( 'woocommerce_add_to_cart_fragments', 'refresh_cart_count', 50, 1 );
function refresh_cart_count( $fragments ){
	ob_start();
	?>
	<span class="counter" id="cart-count"><?php
		$cart_count = WC()->cart->get_cart_contents_count();
		echo sprintf ( _n( '%d', '%d', $cart_count ), $cart_count );
		?></span>
	<?php
	$fragments['#cart-count'] = ob_get_clean();

	return $fragments;
}

/* ov book post */
add_action('init', 'ovbook_init');
function ovbook_init(){
	register_post_type('ovbook', array(
		'labels'             => array(
			'name'               => 'OV BOOK', // Основное название типа записи
			'singular_name'      => 'OV BOOK', // отдельное название записи типа Book
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую OV BOOK',
			'edit_item'          => 'Редактировать OV BOOK',
			'new_item'           => 'Новая OV BOOK',
			'view_item'          => 'Посмотреть OV BOOK',
			'search_items'       => 'Найти OV BOOK',
			'not_found'          =>  'OV BOOK не найдено',
			'not_found_in_trash' => 'В корзине OV BOOK не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'OV BOOK'


		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'show_in_rest'       => false,
//		'menu_position'      => 4,
//		'taxonomies' => array('post_tag'),
		'menu_icon'          => 'dashicons-screenoptions',
		'supports'           => array('title','thumbnail', 'page-attributes')
	) );
}


// functions.php
add_action( 'init', function () {
	remove_post_type_support( 'product', 'editor' );
}, 99 );

