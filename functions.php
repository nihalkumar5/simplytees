<?php
/**
 * Asterra Theme Functions and Definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function asterra_theme_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Register Navigation Menus
	register_nav_menus( array(
		'primary' => __( 'Primary Header Menu', 'asterra' ),
		'footer'  => __( 'Footer Menu', 'asterra' ),
	) );

	// Enable WooCommerce support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'asterra_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function asterra_enqueue_scripts() {
	// Google Fonts
	wp_enqueue_style( 'asterra-google-fonts', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Mono:wght@400;500&family=Manrope:wght@400;500;600;700;800&family=Syne:wght@700;800&display=swap', array(), null );

	// Main Theme Stylesheet
	wp_enqueue_style( 'asterra-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );

	// Root WordPress Style.css
	wp_enqueue_style( 'asterra-theme-style', get_stylesheet_uri(), array( 'asterra-main-css' ), '1.0.0' );

	// Main Script JS
	wp_enqueue_script( 'asterra-main-js', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );

	// Pass dynamic parameters to JS (e.g. AJAX URL, products REST endpoint)
	wp_localize_script( 'asterra-main-js', 'asterraParams', array(
		'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
		'themeUri'    => get_template_directory_uri(),
		'productsUrl' => get_template_directory_uri() . '/assets/js/products.json'
	) );
}
add_action( 'wp_enqueue_scripts', 'asterra_enqueue_scripts' );
