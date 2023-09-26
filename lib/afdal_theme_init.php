<?php
//Remove posts from WP sitemap
add_filter(
    'wp_sitemaps_post_types',
    function( $post_types ) {
        unset( $post_types['post'] );
        return $post_types;
    }
);
//Remove taxonomies from WP sitemap
add_filter(
    'wp_sitemaps_taxonomies',
    function( $taxonomies ) {
        unset( $taxonomies['category'] );
        return $taxonomies;
    }
);
add_action( 'init', 'alter_taxonomy_for_post' );
function afdal_register_custom_menu(){
    add_theme_support('post-thumbnails');
    add_image_size( 'post-size', 370, 208, true );

    unregister_post_type( 'post' );
    unregister_taxonomy( 'category');
    $cpts = [
    array(
        'single'   => 'List',
        'plural'   => 'Lists',
        'cptname'  => 'list',
        'icon'     => 'dashicons-editor-ul',
        'supports' => ['title','editor','comments', 'thumbnail','excerpt'],
        'show_in_menu'=> true,
        'position' => 4
        ),
     array(
            'single'   => 'Item',
            'plural'   => 'Items',
            'cptname'  => 'item',
            'icon'     => 'dashicons-admin-post',
            'supports' => ['title','editor','comments', 'thumbnail','excerpt'],
            'show_in_menu'=> true,
            'position' => 5
            ),

 ];
    foreach ($cpts as $cpt) {

         $labels = array(
            'name'                  => _x( $cpt['single'], 'Post Type General Name', 'afdal' ),
            'singular_name'         => _x( $cpt['single'], 'Post Type Singular Name', 'afdal' ),
            'menu_name'             => __( $cpt['plural'], 'afdal' ),
            'all_items'             => __( 'All '.$cpt['plural'], 'afdal' ),
            'add_new_item'          => __( 'Add New '.$cpt['single'] , 'afdal' ),
            'add_new'               => __( 'Add New', 'afdal' ),
            'new_item'              => __( 'New '.$cpt['single'], 'afdal' ),
            'edit_item'             => __( 'Edit '.$cpt['single'], 'afdal' ),
            'update_item'           => __( 'Update '.$cpt['single'], 'afdal' ),
            'view_item'             => __( 'View '.$cpt['single'], 'afdal' ),
            'search_items'          => __( 'Search '.$cpt['plural'], 'afdal' ),
            'not_found'             => __( 'Not found', 'afdal' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'afdal' ),
            'featured_image'        => __( 'Featured Image', 'afdal' ),
            'set_featured_image'    => __( 'Set featured image', 'afdal' ),
            'remove_featured_image' => __( 'Remove featured image', 'afdal' ),
            'use_featured_image'    => __( 'Use as featured image', 'afdal' ),
          );
          $args = array(
            'label'                 => __( $cpt['plural'], 'afdal' ),
            'description'           => __( $cpt['plural'].' Description', 'afdal' ),
            'labels'                => $labels,
            'supports'              => $cpt['supports'],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          =>$cpt['show_in_menu'],
            'menu_position'         => $cpt['position'],
            'menu_icon'             => $cpt['icon'],
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',

          );

        // Register Custom Post Type>
        register_post_type( $cpt['cptname'], $args );

        }


}



add_action('init','afdal_register_custom_menu');
// ************* Remove default Posts type since no blog *************

// Remove side menu
add_action( 'admin_menu', 'afdal_remove_default_post_type' );

function afdal_remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

// Remove +New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'afdal_remove_default_post_type_menu_bar', 999 );

function afdal_remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'afdal_remove_draft_widget', 999 );

function afdal_remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

// End remove post type

/* create my custom menu pages */

function afdal_register_custom_menu_pages() {

    add_menu_page(

        'website options',

        'afdal Options',

        'manage_options',

        'content-area',

        'main_content_area_callback',

        get_option('afdal_favicon_img'),

        2

    );

     add_submenu_page(

        'content-area',

        'Home Page options',

        'home Page Options',

        'manage_options',

        'home-page-content',

        'home_content_area_callback'

    );

    add_submenu_page(

        'content-area',

        'About Page options',

        'About Page Options',

        'manage_options',

        'about-page-content',

        'about_content_area_callback'

    );

    add_submenu_page(

        'content-area',

        'Contact Page options',

        'Contact Page Options',

        'manage_options',

        'contact-page-content',

        'contact_content_area_callback'

    );

}



add_action( 'admin_menu', 'afdal_register_custom_menu_pages' );

require_once ( afdal_ROOT . 'afdal_options/afdal_options.php');

require_once ( afdal_ROOT . 'afdal_options/home_page_options.php');

require_once ( afdal_ROOT . 'afdal_options/about_page_options.php');

require_once ( afdal_ROOT . 'afdal_options/contact_page_options.php');

add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo() { ?>

    <style type="text/css">

        body{

            background:#c5c5d8!important;

        }

        #login h1 a, .login h1 a {

            background-image: url(<?= get_option('afdal_logo_img'); ?>);

            width: 100%;

            height: 100px;

            background-size: contain;

            margin: 0 auto;

        }

        .login form{

            background: rgba(3, 3, 4, .9)!important;

            border-radius: .5rem;

        }

        .login label{

            font-weight: 600!important;

            color: #fff!important;

        }

        .wp-core-ui p .button {

            background: rgba(3, 3, 4, .9)!important;

            border-color: rgba(3, 3, 4, .9)!important;

        }

        .wp-core-ui p .button:hover{

            background-color: #005b52 !important;

            border-color: #005b52 !important;

            color: #fff;

        }

        #reg_passmail{color:#fff;}

    </style>

<?php }



