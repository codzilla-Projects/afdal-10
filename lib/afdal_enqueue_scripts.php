<?php

function afdal_admin_scripts_styles($hook) {

    wp_enqueue_style( 'afdal-admin-main', afdal_URL . 'assets/admin/css/main-style.css');

    //var_dump($hook);

    $afdal_pages = ['toplevel_page_content-area','afdal-options_page_home-page-content','post-new.php','post.php','edit-tags.php','afdal-options_page_about-page-content','afdal-options_page_contact-page-content'];

    if( in_array($hook, $afdal_pages) ) {

        wp_enqueue_style( 'afdal-admin-bootsrtap-css', afdal_URL . 'assets/admin/css/bootstrap.min.css');

         wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' );
        

		wp_enqueue_style( 'afdal-admin-choose_cat-css', afdal_URL . 'assets/admin/css/choose-cat.css');

        wp_enqueue_style( 'afdal-admin-style-css', afdal_URL . 'assets/admin/css/style.css');

        wp_enqueue_script( 'afdal-admin-popper-js', afdal_URL .'assets/admin/js/popper.min.js', array() ,false, true );

        wp_enqueue_script( 'afdal-admin-bootsrtap-js', afdal_URL .'assets/admin/js/bootstrap.bundle.min.js', array() ,false, true );

        wp_enqueue_script( 'afdal-admin-jquery-js', afdal_URL .'assets/admin/js/jquery.js', array() ,false, true );

        wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', array() ,false, true  );

        wp_enqueue_script( 'afdal-admin-voting-js', afdal_URL .'assets/js/voting-system.js', array() ,false, true );

        wp_enqueue_script( 'afdal-choose_cat-js', afdal_URL .'assets/admin/js/choose_cat.js', array() ,false, true ); 

        wp_enqueue_script( 'afdal-admin-script-js', afdal_URL .'assets/admin/js/script.js', array() ,false, true );


        if(function_exists( 'wp_enqueue_media' )){

            wp_enqueue_media();

        }else{

            wp_enqueue_style('thickbox');

            wp_enqueue_script('media-upload');

            wp_enqueue_script('thickbox');

        }

    }



        $primaryColor     = get_option('afdal_primaryColor');

        $secondaryColor   = get_option('afdal_secondaryColor');

        $thirdColor       = get_option('afdal_thirdColor');

        $googleFontUrl    = get_option('afdal_font_url');

        $googleFontName   = get_option('afdal_font_name');

        $custom_css = 

            "

                @import url('{$googleFontUrl}');

                :root {

                   --primaryColor    : {$primaryColor};

                   --secondaryColor  : {$secondaryColor};

                   --thirdColor      : {$thirdColor};

                   --afdal-font      : '{$googleFontName}',sans-serif;

                }

            ";

        wp_add_inline_style('afdal-style-css', $custom_css);

        wp_add_inline_style('afdal-admin-main', $custom_css);

}

 

add_action('admin_enqueue_scripts', 'afdal_admin_scripts_styles');





function afdal_scripts_styles() {

    wp_enqueue_style( 'afdal-slick-css', afdal_URL . 'assets/css/slick.css');
	
	wp_enqueue_style( 'afdal-animate-css', afdal_URL . 'assets/css/animate.css');

    wp_enqueue_style( 'afdal-bootstrap-css', afdal_URL . 'assets/css/bootstrap.min.css');

    wp_enqueue_style( 'afdal-font-awesome-css', afdal_URL . 'assets/css/font-awesome.min.css');

    wp_enqueue_style( 'afdal-default-css', afdal_URL . 'assets/css/default.css');

    wp_enqueue_style( 'afdal-main-style-css', afdal_URL . 'assets/css/style.css');

    wp_enqueue_style( 'afdal-responsive-css', afdal_URL . 'assets/css/responsive.css');




    wp_enqueue_script( 'afdal-jquery-js', afdal_URL .'assets/js/vendor/jquery-1.12.4.min.js', array() ,false, true );

    wp_enqueue_script( 'afdal-bootstrap-js', afdal_URL .'assets/js/bootstrap.min.js', array() ,false, true );

    wp_enqueue_script( 'afdal-slick-js', afdal_URL .'assets/js/slick.min.js', array() ,false, true );

    wp_enqueue_script( 'afdal-voting-js', afdal_URL .'assets/js/voting-system.js', array() ,false, true );
	
	wp_enqueue_script( 'afdal-main-js', afdal_URL .'assets/js/main.js', array() ,false, true ); 

        $primaryColor     = get_option('afdal_primaryColor');

        $secondaryColor   = get_option('afdal_secondaryColor');

        $thirdColor       = get_option('afdal_thirdColor');

        $googleFontUrl    = get_option('afdal_font_url');

        $googleFontName   = get_option('afdal_font_name');

        $custom_css = 

            "

                @import url('{$googleFontUrl}');

                :root {

                   --primaryColor   : {$primaryColor};

                   --secondaryColor : {$secondaryColor};

                   --thirdColor      : {$thirdColor};

                   --afdal-font     : '{$googleFontName}',sans-serif;

                }

            ";

    wp_add_inline_style('afdal-main-style-css', $custom_css);



}

add_action( 'wp_enqueue_scripts', 'afdal_scripts_styles' );



