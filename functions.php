<?php

define('afdal_ROOT', get_stylesheet_directory().'/');

define('afdal_URL', get_stylesheet_directory_uri() .'/');

define('afdal_ADMIN', admin_url());

define('afdal_BlogUrl', get_bloginfo('url'));

remove_filter( 'the_content', 'wpautop' );

remove_filter( 'the_excerpt', 'wpautop' );


    add_action( 'after_setup_theme', 'sand_thumbnails' );

    function sand_thumbnails() {
        add_theme_support('post-thumbnails');
        add_image_size( 'post-size', 370, 210,array('center','center') );
    }


require_once( afdal_ROOT . '/lib/afdal_enqueue_scripts.php' );

require_once( afdal_ROOT . '/lib/afdal_theme_init.php' );

require_once( afdal_ROOT . '/lib/afdal_functions.php');

require_once( afdal_ROOT . '/lib/afdal_meta_fields.php');

require_once( afdal_ROOT . '/lib/afdal_taxonomy_terms.php');

require_once( afdal_ROOT . '/lib/ajax_functions.php');

require_once( afdal_ROOT . '/lib/ajax_search.php');

function afdal_wpb_custom_new_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'afdal_wpb_custom_new_menu' );

function afdal_menu() {

wp_nav_menu( array(

    'menu'              => 'Main Menu',
    'container'         => '',
    'theme_location'    => 'main-menu',
    'menu_class'        => 'navbar-nav mr-auto',
    'depth'             => 3,
        )

 );

}

/**
* Add a custom link to the end of a specific menu that uses the wp_nav_menu() function
*/
add_filter('wp_nav_menu_items', 'afdal_add_categories_link', 10, 2);
function afdal_add_categories_link($items, $args){
    if( $args->theme_location == 'main-menu' ){
        $terms = get_terms( array('taxonomy' => 'list_category','hide_empty' => true,) );

        $items .= ' <li class="nav-item">
                        <a class="active" href="javascript:void(0);">التصنيفات</a>
                        <div class="sub-menu-columns">

                            <ul class="sub-menu ">';
                            foreach ($terms as $term) : if( $term->slug == 'uncategorized' ){ continue; }
                                $items .= '<li><a href="'.get_term_link( $term ).'">'.$term->name.'</a></li>';
                            endforeach;
        $items .= '         </ul>
                        </div>
                    </li>';
    }
    return $items;
}


function afdal_mime_types( $mimes ) {

    $mimes['svg']  = 'image/svg+xml';

    $mimes['svgz'] = 'image/svg+xml';

    return $mimes;

}







add_filter( 'upload_mimes', 'afdal_mime_types' );

/*Remove Title TO Anchor Tag Menu*/

function my_menu_notitle( $menu ){

      return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );

}

add_filter( 'wp_nav_menu', 'my_menu_notitle' );

add_filter( 'wp_page_menu', 'my_menu_notitle' );

add_filter( 'wp_list_categories', 'my_menu_notitle' );



/*Add Footer Widget*/

function afdal_widgets_init() {

  register_sidebar( array(

    'name'          => 'First Sidebar Column',

    'id'            => 'first_sidebar',

    'before_widget' => '<div>',

    'after_widget'  => '</div>',

  ));

}

add_action( 'widgets_init', 'afdal_widgets_init' );



function afdal_second_widgets_init() {

  register_sidebar( array(

    'name'          => 'Second Sidebar Column',

    'id'            => 'second_sidebar',

    'before_widget' => '<div>',

    'after_widget'  => '</div>',

  ));

}

add_action( 'widgets_init', 'afdal_second_widgets_init' );



add_filter( 'the_content', 'wti_remove_autop_for_image', 0 );



function wti_remove_autop_for_image( $content ){

    global $post;

    // Check for single page and image post type and remove

    if ( is_single() && $post->post_type == 'post' )

        remove_filter('the_content', 'wpautop');

    return $content;

}

remove_filter( 'the_content', 'wpautop' );

remove_filter( 'the_excerpt', 'wpautop' );



function remove_wp_logo($wp_admin_bar) {

  $wp_admin_bar->remove_node('wp-logo');

}

add_action('admin_bar_menu', 'remove_wp_logo', 999);



function change_footer_admin() {

  echo '<span id="footer-thankyou">Powered by <a href="https://codzilla.net/" target="_blank">Codezilla</a></span>';

}

add_filter('admin_footer_text', 'change_footer_admin');



function tinymce_remove_root_block_tag( $init ) {

    $init['forced_root_block'] = false;

    return $init;

}

add_filter( 'tiny_mce_before_init', 'tinymce_remove_root_block_tag' );
/*
add_action( 'init', 'cp_change_post_object' );

// Change dashboard Posts to Best Posts

function cp_change_post_object() {

    $get_post_type = get_post_type_object('post');

    $labels = $get_post_type->labels;

    $labels->name = 'Best Posts';

    $labels->singular_name = 'Best Posts';

    $labels->add_new = 'Add Best Posts';

    $labels->add_new_item = 'Add Best Posts';

    $labels->edit_item = 'Edit Best Posts';

    $labels->new_item = 'Best Posts';

    $labels->view_item = 'View Best Posts';

    $labels->search_items = 'Search Best Posts';

    $labels->not_found = 'No Best Posts found';

    $labels->not_found_in_trash = 'No Best Posts found in Trash';

    $labels->all_items = 'All Best Posts';

    $labels->menu_name = 'Best Posts';

    $labels->name_admin_bar = 'Best Posts';

}*/


function codezilla_ajax_header(){
  echo '<script>  var ajax_url="'.admin_url('admin-ajax.php' ).'"; var nonce = "'.wp_create_nonce("afdal_nonce").'";</script>';
}
add_action('wp_head','codezilla_ajax_header' );


/*function codezilla_create_user_votes_table(){

    require_once (ABSPATH .'/wp-admin/includes/upgrade.php');
    global $wpdb;
    global $wp_queries, $charset_collate;

    $table_name = $wpdb->prefix . "user_votes";
    $charset_collate = '';
    $charset_collate .= " COLLATE utf8_general_ci";

    if ($wpdb->get_var('SHOW TABLES LIKE ' . $table_name) != $table_name){
        $sql = 'CREATE TABLE '.$table_name . '(
          id INTEGER(10) UNSIGNED AUTO_INCREMENT ,
          post_id INTEGER(30),
          user_ip VARCHAR(255),
          user_location VARCHAR(255),
          reg_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (id) )'.$charset_collate;
        dbDelta($sql);
    }
}
$new_table=codezilla_create_user_votes_table();*/

/*Comment Earia*/

function gb_comment_form_tweaks ($fields) {
    $fields['author'] = '<div class="row"><div class="col-md-6"><input id="author" name="author" value="" placeholder="اسمك بالكامل  *" size="30" maxlength="245" required="required" type="text"></div>';
    $fields['email'] = '<div class="col-md-6"><input id="email" name="email" type="email" value="" placeholder="البريد الالكترونى  *" size="30" maxlength="100" aria-describedby="email-notes" required="required"></div></div>';

    $fields['comment'] = '<div class="row"><div class="col-md-12"><textarea id="comment" name="comment" cols="45" rows="5" maxlength="65525" placeholder="اكتب تعليقك هنا ..." required="required"></textarea></div></div>';
    if(isset($fields['url']))
       unset($fields['url']);
    return $fields;
}

add_filter('comment_form_fields', 'gb_comment_form_tweaks');

function wpsites_change_comment_form_submit_label($arg) {
$arg['label_submit'] = 'انشر تعليقا ';
return $arg;
}
add_filter('comment_form_defaults', 'wpsites_change_comment_form_submit_label');

add_filter( 'comment_form_default_fields', 'tu_filter_comment_fields', 20 );
function tu_filter_comment_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

    $fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent"> احفظ اسمي، بريدي الإلكتروني، والموقع الإلكتروني في هذا المتصفح لاستخدامها المرة المقبلة في تعليقي.</label></p>';

    return $fields;
}

add_filter('comment_form_logged_in', function( $logged_in_as, $commenter, $user_identity) {
  return sprintf(
            '<p class="logged-in-as">%s</p>',
            sprintf(
                /* translators: 1: Edit user link, 2: Accessibility text, 3: User name, 4: Logout URL. */
                __( 'مرحبا بك  <a href="%1$s" aria-label="%2$s">%3$s</a>. <a class="log-out-link" href="%4$s">تسجيل خروج ؟</a>' ),
                get_edit_user_link(),
                /* translators: %s: User name. */
                esc_attr( sprintf( __( 'مرحبا بك  %s. تحديث حسابك .' ), $user_identity ) ),
                $user_identity,
                /** This filter is documented in wp-includes/link-template.php */
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ), get_the_ID() ) )
            )
        );
}, 10, 3 );

function ajaxify_comments( $comment_ID, $comment_status ){
    if( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {
        //If AJAX Request Then
        switch( $comment_status ) {
            case '0':
                //notify moderator of unapproved comment
                wp_notify_moderator( $comment_ID );
            case '1': //Approved comment
                echo "success";
                $commentdata = &get_comment( $comment_ID, ARRAY_A );
                $post = &get_post( $commentdata['comment_post_ID'] );
                wp_notify_postauthor( $comment_ID, $commentdata['comment_type'] );
                break;
            default:
                echo "error";
        }
        exit;
    }
}
add_action( 'comment_post', 'ajaxify_comments', 20, 2 );

 /*
 * Set post views count using post meta
 */
function count_post_visits() {
      if( is_single() ) {
         global $post;
         $views = get_post_meta( $post->ID, 'post_views_count', true );
         if( $views == '' ) {
            update_post_meta( $post->ID, 'post_views_count', '1' );
         } else {
            $views_no = intval( $views );
            update_post_meta( $post->ID, 'post_views_count', ++$views_no );
         }
      }
   }
   add_action( 'wp_head', 'count_post_visits' );

/*********************************************************/
/*
 * WordPress: Remove unwonted image sizes.
 * In this code I remove the five sizes medium, large, medium_large, 1536x1536, 2048x2048
 * See full article:
 */

add_filter('intermediate_image_sizes', function($sizes) {
  return array_diff($sizes, ['medium_large','medium','large']);  // Medium Large (768 x 0)
});

add_action( 'init', 'afdal_remove_large_image_sizes' );
function afdal_remove_large_image_sizes() {
  remove_image_size( '1536x1536' );             // 2 x Medium Large (1536 x 1536)
  remove_image_size( '2048x2048' );             // 2 x Large (2048 x 2048)
}
