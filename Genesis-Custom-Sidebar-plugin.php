<?php
/**
 * @package Genesis Custom Sidebar Plugin
 * @version 0.1
 */
/*
Plugin Name: Genesis Custom Sidebar Plugin
Plugin URI: https://github.com/Pixelsmith/genesis-custom-sidebar/upload/master
Description: Adds a custom sidebar to the footer for her book ad
Author: Adam Blodgett
Version: 0.1
Author URI: http://PixelsmithDesign.com
*/

// Add Sidebar
if ( ! function_exists( 'genesis_custom_sidebar' ) ) :
function genesis_custom_sidebar() {
	register_sidebar(array(
	  'id' => 'ad-widget',
	  'name' => __( 'Ad widget', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h6>',
	  'after_title' => '</h6>',
	));
}

add_action( 'widgets_init', 'genesis_custom_sidebar' );
endif;

// Add Stylesheets
function custom_sidebar_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style', $plugin_url . 'yourCustom.css' );
}
add_action( 'wp_enqueue_scripts', 'thorn_ad_css' );

// Add Sidebar To Footer
function sidebar_to_footer() {
	echo '<div class="wrap pre-footer-sidebar">';
    dynamic_sidebar( 'ad-widget' );
    echo '</div><!-- .wrap -->';
}
add_action( 'genesis_before_footer', 'sidebar_to_footer' );
?>