<?php
// INCLUDES FILE PHP & JS
function flatsome_child_enqueue_scripts() {
	wp_enqueue_script( 'flatsome-child-custom-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0', true );
}
foreach ( glob(__DIR__.'/includes/*.php') as $file ){
	include $file;
}
add_action( 'wp_enqueue_scripts', 'flatsome_child_enqueue_scripts', 999 );
// THAY ĐỔI NỘI DUNG
function my_custom_translations( $strings ) {
    $text = array(

    );
    $strings = str_ireplace( array_keys( $text ), $text, $strings );
    return $strings;
}
add_filter( 'gettext', 'my_custom_translations', 20 );

// 

function breadcrumb() {
	if (!is_front_page()) {
		if (function_exists('rank_math_the_breadcrumbs')) {
			echo '<div class="breadcrumb-wrapper">';
			echo '<div class="container">';
			rank_math_the_breadcrumbs();
			echo '</div>';
			echo '</div>';
		}
		else {
			echo '<div class="breadcrumb-wrapper"><div class="container"><nav aria-label="breadcrumbs" class="rank-math-breadcrumb"><p><a href="https://kan.com.vn/">Trang chủ</a><span class="separator"> » </span><span class="last">Tuyển dụng</span></p></nav></div></div>';
		}
	}
}
// add_action('flatsome_after_header', 'breadcrumb');
add_shortcode('breadcrumb', 'breadcrumb');

function ux_builder_element_breadcrumb(){
    add_ux_builder_shortcode('breadcrumb', array(
        'name'      => __('Breadcrumb'),
        'category'  => __('Content'),
        'priority'  => 1,
    ));
}
add_action('ux_builder_setup', 'ux_builder_element_breadcrumb');


add_filter('get_the_date', function($the_date, $d, $post) {
    return mysql2date('j \T\há\n\g n, Y', $post->post_date);
}, 10, 3);