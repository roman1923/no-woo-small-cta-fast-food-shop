<?php

add_filter( 'show_admin_bar', '__return_false' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

remove_action( 'wp_head', 'wp_resource_hints', 2 ); // remove dns-prefetch
remove_action( 'wp_head', 'wp_generator' ); // remove meta name="generator"
remove_action( 'wp_head', 'wlwmanifest_link' ); // remove wlwmanifest
remove_action( 'wp_head', 'rsd_link' ); // remove EditURI
remove_action( 'wp_head', 'rest_output_link_wp_head' ); // remove 'https://api.w.org/
remove_action( 'wp_head', 'rel_canonical' ); // remove canonical
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 ); // remove shortlink
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); // remove alternate

add_action( 'wp_enqueue_scripts', 'site_scripts' );
function site_scripts() {
	wp_dequeue_style( 'wp-block-library' );
	wp_deregister_script( 'wp-embed' );

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:900%7CRoboto:300&display=swap&subset=cyrillic', array(), '1.0' );
	wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), '1.0' );

	wp_enqueue_script( 'focus-visible', 'https://unpkg.com/focus-visible@5.0.2/dist/focus-visible.js', array(), '5.0.2', true );
	wp_enqueue_script( 'lazyload', 'https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js', array(), '12.4.0', true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array( 'focus-visible', 'lazyload' ), '1.0', true );

	wp_localize_script(
		'main-js',
		'WPJS',
		array(
			'siteUrl' => get_template_directory_uri(),
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'after_setup_theme', 'theme_support' );
function theme_support() {
	register_nav_menu( 'menu_main_header', 'Header menu' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'product', 500, 313, true );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once 'inc/carbon-fields/vendor/autoload.php';
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'register_carbon_fields' );
function register_carbon_fields() {
	require_once 'inc/carbon-theme-options/theme-options.php';
	require_once 'inc/carbon-theme-options/post-meta.php';
}

add_action( 'init', 'create_global_variable' );
function create_global_variable() {
	global $pizza_time;
	$pizza_time = array(
		'phone'        => carbon_get_theme_option( 'site_phone' ),
		'phone_digits' => carbon_get_theme_option( 'site_phone_digits' ),
		'address'      => carbon_get_theme_option( 'site_address' ),
		'li_url'       => carbon_get_theme_option( 'site_li_url' ),
		'fb_url'       => carbon_get_theme_option( 'site_fb_url' ),
		'inst_url'     => carbon_get_theme_option( 'site_inst_url' ),
	);
}

function coverToWebpSrc( $src ) {
	$src_webp = $src . '.webp';
	return $src_webp;
}

add_action( 'init', 'register_post_types' );
function register_post_types() {
	register_post_type(
		'product',
		array(
			'labels'        => array(
				'name'               => 'Products',
				'singular_name'      => 'Product',
				'add_new'            => 'Add product',
				'add_new_item'       => 'Edit product',
				'edit_item'          => 'Change product',
				'new_item'           => 'New product',
				'view_item'          => 'Look product',
				'search_items'       => 'Search product',
				'not_found'          => 'Not found',
				'not_found_in_trash' => 'Not found in trash',
				'menu_name'          => 'Products',
			),
			'menu_icon'     => 'dashicons-cart',
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'products' ),
		)
	);

	register_taxonomy(
		'product-categories',
		'product',
		array(
			'labels'       => array(
				'name'                       => 'Products categories',
				'singular_name'              => 'Product category',
				'search_items'               => 'Search category',
				'popular_items'              => 'Popular categories',
				'all_items'                  => 'All categories',
				'edit_item'                  => 'Change category',
				'update_item'                => 'Update category',
				'add_new_item'               => 'Add new category',
				'new_item_name'              => 'New category name',
				'separate_items_with_commas' => 'Separe categories by commas',
				'add_or_remove_items'        => 'Add or delete category',
				'choose_from_most_used'      => 'Choose the most popular category',
				'menu_name'                  => 'Categories',
			),
			'hierarchical' => true,
		)
	);
}

function sanitize_pagination( $content ) {
	$content = preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $content );
	return $content;
}
add_action( 'navigation_markup_template', 'sanitize_pagination' );

add_filter( 'nav_menu_css_class', 'add_current_class_on_taxonomy_page', 10, 4 );
function add_current_class_on_taxonomy_page( $classes ) {
	$post_type = get_post_type();
	if ( is_tax() && $post_type === 'product' && array_search( 'menu-item-object-product', $classes ) ) {
		array_push( $classes, 'current-menu-item' );
	}
	return $classes;
}

add_action( 'wp_ajax_send_email', 'pizzatime_send_email' );
add_action( 'wp_ajax_nopriv_send_email', 'pizzatime_send_email' );
function pizzatime_send_email() {
	$method = $_SERVER['REQUEST_METHOD'];

	if ( $method !== 'POST' ) {
		exit();
	}

	$admin_email  = '';
	$form_subject = 'From PizzaTime';
	$message      = '';

	$color_counter = 1;

	foreach ( $_POST as $key => $value ) {
		if ( $value === '' ) {
			continue;
		}
		$color    = $color_counter % 2 === 0 ? '#fff' : '#f8f8f8';
		$message .= "
		<tr style='background-color: $color;'>
		  <td style='padding: 10px; border: 1px solid #e9e9e9;'>$key</td>
		  <td style='padding: 10px; border: 1px solid #e9e9e9;'>$value</td>
		</tr>";
		++$color_counter;
	}

	function adopt( $text ) {
		return '=?utf-8?B?' . base64_encode( $text ) . '?=';
	}

	$message = "<table style='width: 100%;'>$message</table>";

	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	$headers .= 'From:' . adopt( $form_subject ) . " <$admin_email>\r\n";

	$success_send = wp_mail( $admin_email, adopt( $form_subject ), $message, $headers );

	if ( $success_send ) {
		echo 'success';
	} else {
		echo 'error';
	}
	wp_die();
}
