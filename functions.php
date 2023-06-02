<?php



// Enqueue theme stylesheets
function enqueue_theme_styles() {
  // Enqueue main stylesheet
  wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');


// Enqueue theme scripts
function enqueue_theme_scripts() {
  // Enqueue custom scripts if needed
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

// Add theme support
function theme_setup() {
  // Add support for featured images
  add_theme_support('post-thumbnails');

  // Add other theme support options as needed
}
add_action('after_setup_theme', 'theme_setup');

// Register Custom Post Type
function create_casino_hotels_post_type() {
    $labels = array(
        'name'                  => _x( 'Casino Hotels', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Casino Hotel', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Casino Hotels', 'text_domain' ),
        'name_admin_bar'        => __( 'Casino Hotel', 'text_domain' ),
        'archives'              => __( 'Hotel Archives', 'text_domain' ),
        'attributes'            => __( 'Hotel Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Hotel:', 'text_domain' ),
        'all_items'             => __( 'All Hotels', 'text_domain' ),
        'add_new_item'          => __( 'Add New Hotel', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Hotel', 'text_domain' ),
        'edit_item'             => __( 'Edit Hotel', 'text_domain' ),
        'update_item'           => __( 'Update Hotel', 'text_domain' ),
        'view_item'             => __( 'View Hotel', 'text_domain' ),
        'view_items'            => __( 'View Hotels', 'text_domain' ),
        'search_items'          => __( 'Search Hotel', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into hotel', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this hotel', 'text_domain' ),
        'items_list'            => __( 'Hotels list', 'text_domain' ),
        'items_list_navigation' => __( 'Hotels list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter hotels list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Casino Hotel', 'text_domain' ),
        'description'           => __( 'Casino Hotels', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
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
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'casino_hotel', $args );
}
add_action( 'init', 'create_casino_hotels_post_type', 0 );

function register_footer_menu() {
  register_nav_menu('footer-menu', 'Footer Menu');
}
add_action('after_setup_theme', 'register_footer_menu');
