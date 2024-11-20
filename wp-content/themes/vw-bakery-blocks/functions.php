<?php
/**
 * VW Bakery Blocks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package VW Bakery Blocks
 */

if ( ! defined( 'VW_BAKERY_BLOCKS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'VW_BAKERY_BLOCKS_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! function_exists( 'vw_bakery_blocks_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vw_bakery_blocks_setup() {

		load_theme_textdomain( 'vw-bakery-blocks', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'woocommerce' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		//add_editor_style( 'style.css' );

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 192,
				'width'       => 192,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Experimental support for adding blocks inside nav menus
		add_theme_support( 'block-nav-menus' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Register nav menus.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Navigation', 'vw-bakery-blocks' ),
			)
		);

		// Theme Activation Notice
		global $pagenow;

		if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
			add_action('admin_notices', 'vw_bakery_blocks_activation_notice');
		}

	}
endif;
add_action( 'after_setup_theme', 'vw_bakery_blocks_setup' );

// Notice after Theme Activation
function vw_bakery_blocks_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
	echo '<p>'. esc_html__( 'Thank you for choosing VW Bakery Blocks. Would like to have you on our Welcome page so that you can reap all the benefits of our VW Bakery Blocks.', 'vw-bakery-blocks' ) .'</p>';
	echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=vw-bakery-blocks-info' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'vw-bakery-blocks' ) .'</a></span>';
	echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/vw-bakery-blocks/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'vw-bakery-blocks' ) .'</a></span>';
	echo '<span class="upgrade-btn"><a href="'. esc_url( 'http://localhost/vw-themes-new/wp-admin/themes.php?page=vw-bakery-blocks-info' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE PRO', 'vw-bakery-blocks' ) .'</a></span>';
	echo '<span class="bundle-btn"><a href="'. esc_url( 'https://www.vwthemes.com/products/wp-theme-bundle' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'THEME BUNDLE', 'vw-bakery-blocks' ) .'</a></span>';
	echo '</div>';
}

if ( ! function_exists( 'vw_bakery_blocks_fonts_url' ) ) :
	/**
	 * Register Google fonts for VW Bakery Blocks
	 *
	 * Create your own vw_bakery_blocks_fonts_url() function to override in a child theme.
	 *
	 * @since 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function vw_bakery_blocks_fonts_url() {
		$fonts_url = '';

		/* Translators: If there are characters in your language that are not
		* supported by Poppins, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$poppins = _x( 'on', 'Poppins font: on or off', 'vw-bakery-blocks' );

		if ( 'off' !== $poppins ) {
			$font_families = array();
			$font_families[] = 'Merienda One';
			$font_families[] = 'ABeeZee:ital@0;1';
			$font_families[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';

			$query_args = array(
				'family' => implode( '&family=', $font_families ), //urlencode( implode( '|', $font_families ) ),
				// 'subset' => urlencode( 'latin,latin-ext' ),
				'display' => 'swap',
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
		}

		if ( ! class_exists( 'WPTT_WebFont_Loader' ) ) {
			// Load Google fonts from Local.
			require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		}

		return esc_url( wptt_get_webfont_url( $fonts_url ) );
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function vw_bakery_blocks_scripts() {
	wp_enqueue_style('vw-bakery-blocks-font', vw_bakery_blocks_fonts_url(), array());
	wp_enqueue_style('vw-bakery-blocks-style', get_stylesheet_uri(), array() );
	if (get_theme_mod('vw_bakery_blocks_animation', true) == true){
		wp_enqueue_script( 'vw-bakery-blocks-jquery-wow', esc_url(get_template_directory_uri()) . '/js/wow.js', array('jquery') );
		wp_enqueue_style( 'vw-bakery-blocks-animate-css', esc_url(get_template_directory_uri()).'/css/animate.css' );
	}
	 wp_style_add_data( 'vw-bakery-blocks-style', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'vw_bakery_blocks_scripts' );

add_action( 'admin_enqueue_scripts', function( $hook ) {
  // if ( 'user-edit.php' == $hook ) {
    wp_enqueue_script(
      'vw_bakery_blocks',get_template_directory_uri() . '/js/custom-admin.js',array('jquery'),'',true);
  // }
} );

/**
 * Enqueue block editor style
 */
function vw_bakery_blocks_block_editor_styles() {
	wp_enqueue_style( 'vw-bakery-blocks-block-patterns-style-editor', get_theme_file_uri( '/css/block-editor.css' ), false, '1.0', 'all' );
	wp_enqueue_style('vw-bakery-blocks-font', vw_bakery_blocks_fonts_url(), array());
}
add_action( 'enqueue_block_editor_assets', 'vw_bakery_blocks_block_editor_styles' );

define('VW_BAKERY_BLOCKS_BUY_NOW',__('https://www.vwthemes.com/products/gutenberg-cake-wordpress-theme','vw-bakery-blocks'));
define('VW_BAKERY_BLOCKS_SUPPORT',__('https://wordpress.org/support/theme/vw-bakery-blocks/','vw-bakery-blocks'));
define('VW_BAKERY_BLOCKS_REVIEW',__('https://wordpress.org/support/theme/vw-bakery-blocks/reviews/','vw-bakery-blocks'));
define('VW_BAKERY_BLOCKS_LIVE_DEMO',__('https://www.vwthemes.net/vw-bakery-blocks/','vw-bakery-blocks'));
define('VW_BAKERY_BLOCKS_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/vw-bakery-blocks-pro/','vw-bakery-blocks'));
define('VW_BAKERY_BLOCKS_FREE_DOC',__('https://preview.vwthemesdemo.com/docs/free-vw-bakery-blocks/','vw-bakery-blocks'));
define('VW_BAKERY_BLOCKS_CONTACT',__('https://www.vwthemes.com/contact/','vw-bakery-blocks'));
define('VW_BAKERY_BLOCKS_FAQ',__('https://www.vwthemes.com/faqs/','vw-bakery-blocks'));
define('VW_BAKERY_BLOCKS_THEME_BUNDLE_BUY_NOW',__('https://www.vwthemes.com/products/wp-theme-bundle','vw-bakery-blocks'));
define('VW_BAKERY_BLOCKS_THEME_BUNDLE_DOC',__('https://preview.vwthemesdemo.com/docs/theme-bundle/','vw-bakery-blocks'));

if ( ! function_exists( 'vw_bakery_blocks_switch_sanitization' ) ) {
	function vw_bakery_blocks_switch_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

/* Load Jetpack compatibility file. */
require get_template_directory() . '/inc/customizer.php';

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Load core file.
 */
require_once get_template_directory() . '/inc/core/theme-info.php';
require_once get_template_directory() . '/inc/core/template-functions.php';

/**
 * TGM
 */
require_once get_template_directory() . '/inc/tgm/tgm.php';

/**
 * Section Pro
 */
require get_template_directory() . '/inc/section-pro/customizer.php';