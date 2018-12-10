<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	//'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	//'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( '/inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

// Add Solutions as a custom post type
function create_posttype() {
 
    register_post_type( 'nr_solutions',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Solutions' ),
                'singular_name' => __( 'Solution' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'nr_solutions'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


// shortcode to display the previously submitted info on the Report Step 2
function nr_submitted_info_shortcode() {
   echo '<div class="submitted-info"></div>';
}
add_shortcode( 'submitted', 'nr_submitted_info_shortcode' );

// add the footer widget area

function add_widget_area() {
	register_sidebar( array(
		'name'          => 'Footer Widget Area',
		'id'            => 'footer_widget_area',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Author Logo',
		'id'            => 'author_logo',
		'before_widget' => '<div class="author-logo">',
		'after_widget'  => '</div>',
	) );

}
add_action( 'widgets_init', 'add_widget_area' );

add_filter( ‘wpcf7_remote_ip_addr’, ‘wpcf7_anonymize_ip_addr’ );