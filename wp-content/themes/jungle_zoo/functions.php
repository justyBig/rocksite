<?php

/*************************************************************/
/*  ENQUEUE SCRIPTS AND STYLES 								*/
/***********************************************************/
// for documentation and a list of scripts that are pre-registered by wordpress see https://developer.wordpress.org/reference/functions/wp_enqueue_script
// for a quick overview read this http://www.wpbeginner.com/wp-tutorials/how-to-properly-add-javascripts-and-styles-in-wordpress

function my_add_theme_scripts() {

    // vendor styles
    $styles_vendor = '/dist/css/vendor.min.css';
    wp_enqueue_style( 'vendor-style', get_template_directory_uri().$styles_vendor, null, filemtime(get_stylesheet_directory().$styles_vendor), false );

    // custom styles
    $styles_custom = '/dist/css/style.min.css';
    wp_enqueue_style( 'custom-style', get_template_directory_uri().$styles_custom, null, filemtime(get_stylesheet_directory().$styles_custom), false );

    // css hotfixes
    $styles_hotfix = '/dist/css/hotfix.css';
    wp_enqueue_style( 'hotfix', get_template_directory_uri().$styles_hotfix, null, filemtime(get_stylesheet_directory().$styles_hotfix), false );
    // stylesheets for compiling sass on the server at runtime
    wp_enqueue_style( 'style', get_template_directory_uri().'/dist/css/style.css' );

    // fontawesome
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/fonts/fontawesome-5.6.3/css/all.min.css', null, null, false );

    // vendor scripts
    $scripts_vendor = '/dist/js/vendor.min.js';
    wp_register_script( 'vendor-scripts', get_template_directory_uri().$scripts_vendor, array('jquery'), filemtime(get_stylesheet_directory().$scripts_vendor), true );
    wp_enqueue_script('vendor-scripts');

    // custom scripts
    $scripts_custom = '/dist/js/custom.min.js';
    wp_register_script( 'custom-scripts', get_template_directory_uri().$scripts_custom, array('jquery'), filemtime(get_stylesheet_directory().$scripts_custom), true );
    wp_enqueue_script('custom-scripts');
    // scripts
    wp_register_script( 'compiled-scripts', get_template_directory_uri() . '/dist/js/compiled.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('compiled-scripts');

}
add_action( 'wp_enqueue_scripts', 'my_add_theme_scripts' );


/*************************************************************/
/*  REGISTER MENUS 			 								*/
/***********************************************************/

function register_my_menus() {

  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
	  'footer-menu' => __( 'Footer Menu' ),
    )
  );

}
add_action( 'init', 'register_my_menus' );

/*************************************************************/
/*  REGISTER SIDEBAR                    */
/***********************************************************/

function arphabet_widgets_init() {

  register_sidebar( array(
    'name'          => 'Sidebar One',
    'id'            => 'sidebar_one',
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    'description'   => ''
  ) );

  register_sidebar( array(
    'name'          => 'Sidebar Two',
    'id'            => 'sidebar_two',
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    'description'   => ''
  ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/*************************************************************/
/*  OPTIONS PAGE                   */
/***********************************************************/

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}


/*************************************************************/
/*  FEATURED IMAGE                  */
/***********************************************************/
add_action( 'after_setup_theme', 'ja_theme_setup' );
function ja_theme_setup() {
    add_theme_support( 'post-thumbnails');
}

/*************************************************************/
/*  CUSTOM EXCERPT LENGTH                  */
/***********************************************************/
// create a shorter/longer excerpt
function get_my_excerpt($length=30){
    $text = get_the_content();
    $text = strip_shortcodes($text);
    $text = apply_filters('the_content', $text);
    $text = strip_tags($text);
    $excerpt_length = $length; // set the number of words here
    $excerpt_more = '...';
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    return $text;
}

// Register Custom Post Type
function custom_post_type() {

    $labels = array(
        'name'                  => _x( 'Animals', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Animal', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Animals', 'text_domain' ),
        'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Animal', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'post-formats' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'animals', $args );

}
add_action( 'init', 'custom_post_type', 0 );