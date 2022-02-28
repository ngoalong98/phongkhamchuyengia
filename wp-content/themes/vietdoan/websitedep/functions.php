<?php
/**
 * Theme functions and definitions
 *
 * @package Hellowebsitedep
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_WEBSITEDEP_VERSION', '2.3.1' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'hello_websitedep_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_websitedep_setup() {
		$hook_result = apply_filters_deprecated( 'websitedep_hello_theme_load_textdomain', [ true ], '2.0', 'hello_websitedep_load_textdomain' );
		if ( apply_filters( 'hello_websitedep_load_textdomain', $hook_result ) ) {
			load_theme_textdomain( 'hello-websitedep', get_template_directory() . '/languages' );
		}

		$hook_result = apply_filters_deprecated( 'websitedep_hello_theme_register_menus', [ true ], '2.0', 'hello_websitedep_register_menus' );
		if ( apply_filters( 'hello_websitedep_register_menus', $hook_result ) ) {
			register_nav_menus( array( 'menu-1' => __( 'Primary', 'hello-websitedep' ) ) );
		}
		$hook_result = apply_filters_deprecated( 'websitedep_hello_theme_register_menus', [ true ], '2.0', 'hello_websitedep_register_menus' );
		if ( apply_filters( 'hello_websitedep_register_menus', $hook_result ) ) {
			register_nav_menus( array( 'menu-2' => __( 'Menu-sidebar', 'hello-websitedep' ) ) );
		}
		$hook_result = apply_filters_deprecated( 'websitedep_hello_theme_register_menus', [ true ], '2.0', 'hello_websitedep_register_menus' );
		if ( apply_filters( 'hello_websitedep_register_menus', $hook_result ) ) {
			register_nav_menus( array( 'menu-3' => __( 'Menu-sidebar-chuyenkhoa', 'hello-websitedep' ) ) );
		}

		$hook_result = apply_filters_deprecated( 'websitedep_hello_theme_add_theme_support', [ true ], '2.0', 'hello_websitedep_add_theme_support' );
		if ( apply_filters( 'hello_websitedep_add_theme_support', $hook_result ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				array(
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
				)
			);
			add_theme_support(
				'custom-logo',
				array(
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				)
			);

			/*
			 * Editor Style.
			 */
			add_editor_style( 'editor-style.css' );
			
			/*
			 * Gutenberg wide images.
			 */
			add_theme_support( 'align-wide' );

			/*
			 * WooCommerce.
			 */
			$hook_result = apply_filters_deprecated( 'websitedep_hello_theme_add_woocommerce_support', [ true ], '2.0', 'hello_websitedep_add_woocommerce_support' );
			if ( apply_filters( 'hello_websitedep_add_woocommerce_support', $hook_result ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'hello_websitedep_setup' );

if ( ! function_exists( 'hello_websitedep_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_websitedep_scripts_styles() {
		$enqueue_basic_style = apply_filters_deprecated( 'websitedep_hello_theme_enqueue_style', [ true ], '2.0', 'hello_websitedep_enqueue_style' );
		$min_suffix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'hello_websitedep_enqueue_style', $enqueue_basic_style ) ) {
			wp_enqueue_style(
				'hello-websitedep',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_WEBSITEDEP_VERSION
			);
		}

		if ( apply_filters( 'hello_websitedep_enqueue_theme_style', true ) ) {
			wp_enqueue_style(
				'hello-websitedep-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_WEBSITEDEP_VERSION
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'hello_websitedep_scripts_styles' );

if ( ! function_exists( 'hello_websitedep_register_websitedep_locations' ) ) {
	/**
	 * Register websitedep Locations.
	 *
	 * @param websitedepPro\Modules\ThemeBuilder\Classes\Locations_Manager $websitedep_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_websitedep_register_websitedep_locations( $websitedep_theme_manager ) {
		$hook_result = apply_filters_deprecated( 'websitedep_hello_theme_register_websitedep_locations', [ true ], '2.0', 'hello_websitedep_register_websitedep_locations' );
		if ( apply_filters( 'hello_websitedep_register_websitedep_locations', $hook_result ) ) {
			$websitedep_theme_manager->register_all_core_location();
		}
	}
}
function pk_widget_init() {
  register_sidebar( array(
     'name'          => 'Top Header',
     'id'            => 'top_header',
     
  ) );
}
add_action('widgets_init', 'pk_widget_init');

add_action( 'websitedep/theme/register_locations', 'hello_websitedep_register_websitedep_locations' );

if ( ! function_exists( 'hello_websitedep_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_websitedep_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hello_websitedep_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'hello_websitedep_content_width', 0 );

if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-functions.php';
}

if ( ! function_exists( 'hello_websitedep_check_hide_title' ) ) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_websitedep_check_hide_title( $val ) {
		if ( defined( 'websitedep_VERSION' ) ) {
			$current_doc = \websitedep\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'hello_websitedep_page_title', 'hello_websitedep_check_hide_title' );

/**
 * Wrapper function to deal with backwards compatibility.
 */
if ( ! function_exists( 'hello_websitedep_body_open' ) ) {
	function hello_websitedep_body_open() {
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} else {
			do_action( 'wp_body_open' );
		}
	}
}


/**
 * Activated Elementor
 */
// add_action('init', function(){
// 		$data = [
// 			'success'          => true,
// 			'license'          => 'valid',
// 			'item_id'          => false,
// 			'item_name'        => 'Elementor Pro',
// 			'is_local'         => false,
// 			'license_limit'    => '1000',
// 			'site_count'       => '1000',
// 			'activations_left' => 1,
// 			'expires'          => 'lifetime',
// 			'customer_email'   => 'info@wpopal.com'
// 		];
// 		update_option('elementor_pro_license_key', 'Licence Hacked');
// 		ElementorPro\License\API::set_license_data($data, '+2 years');

// });


/* 23-04 */
function custom_shortcode( $atts) {
	  $args = array(
        'post_type' => '',
        'so_luong' => '',
		'danh_muc' => '',
		  'mo_ta' => '',
    );
	
	  // Query
	  $the_query = new WP_Query( array ( 'posts_per_page' => $atts['so_luong'], 'post_type' => $atts['post_type'], 'dich_vu' => $atts['danh_muc'] ) );
	  
	  // Posts
	  $output = '<div class="box-product">';
	  while ( $the_query->have_posts() ) :
	    $the_query->the_post();
	    $output .= '<div class="col-product '.$atts['mo_ta'].'">
	                    <div class="box-img">
						<a href="'.get_permalink().'">'.get_the_post_thumbnail().'</a>
						</div>
						<div class="box-text">
							<p class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></p>
							<p class="product-desc">'.get_the_excerpt().'</p>
							<p class="product-price"><span class="price-1">Giá: '.get_post_meta(get_the_ID(), 'gia', TRUE).'</span><span class="price-2">Giá: '.get_post_meta(get_the_ID(), 'gia_km', TRUE).'</span></p>
							<a href="'.get_permalink().'" class="btn-sub">Xem chi tiết</a>
						</div>
	                </div>';
	  endwhile;
	  $output .= '</div>';	  
	  // Reset post data
	  wp_reset_postdata();  
	  // Return code
	  return $output;
	}
add_shortcode( 'post_custom', 'custom_shortcode' );

function create_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Right Sidebar' ),
            'id' => 'right-sidebar',
            'description' => __( 'Right Sidebar'),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'create_sidebar' );
function get_time_since_posted() {
 
    $time_since_posted = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' trước';
 
    return $time_since_posted;
 
}