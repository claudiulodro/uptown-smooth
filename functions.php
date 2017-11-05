<?php

/**
 * Register the theme supports and menus.
 */
function us_theme_setup() {
	load_theme_textdomain( 'uptownsmooth', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array( 
			'main-menu' => __( 'Main Menu', 'uptownsmooth' ),
			'footer' => __( 'Footer', 'uptownsmooth' ), 
		)
	);
}
add_action( 'after_setup_theme', 'us_theme_setup' );

/**
 * Enqueue scripts.
 */
function us_enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'us_enqueue_scripts' );

/**
 * Enqueue the comment script.
 */
function us_enqueue_comment_reply_script() {
	if ( get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
}
add_action( 'comment_form_before', 'us_enqueue_comment_reply_script' );

/**
 * Register the sidebar widget area.
 */
function us_register_widgets() {
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'uptownsmooth' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'us_register_widgets' );

/**
 * Add a link to keep reading in the excerpt.
 *
 * @param string $excerpt
 * @return string
 */
function us_excerpt_link( $excerpt ) {
	$link = ' <a href="' . get_permalink() . '">' . __( 'Continue reading.', 'uptownsmooth' ) . '</a>';
	return $excerpt . $link;
}
add_filter( 'the_excerpt', 'us_excerpt_link', 1 );

/**
 * Output an archive section heading depending on what the current page is.
 */
function us_the_section_heading() {
 	$queried_object = get_queried_object();

	$text = '';
	if ( is_search() ) {
		$text = __( 'Search results: ', 'uptownsmooth' ) . $_GET['s'];
	} else if ( is_404() ) {
		$text = __( 'Not found', 'uptownsmooth' );
	} else if ( $queried_object instanceof WP_Term ) {
		$text = __( 'Archive: ', 'uptownsmooth' ) . $queried_object->name;
	} else if ( $queried_object instanceof WP_User ) {
		$text = __( 'Author: ', 'uptownsmooth' ) . $queried_object->display_name;
	}

	if ( $text ) {
		?><article><h2 class="archive-title"><?php echo esc_html( $text ) ?></h2></article><?php
	}
}

include 'lib/customizer.php';