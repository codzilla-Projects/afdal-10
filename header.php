<?php  $terms = get_terms( array('taxonomy' => 'list_category','hide_empty' => true,) ); ?>
<!doctype html>
<html lang="en">
<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--====== Title ======-->
    <title>
        <?php wp_title('|','true','right') ?>
        <?php bloginfo('name'); ?>
    </title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?=get_option('afdal_favicon_img')?>" id="fav-shortcut" type="image/x-icon">
    <link rel="icon" href="<?=get_option('afdal_favicon_img')?>" id="fav-icon" type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body  data-post-id="<?= get_the_ID(); ?>" >
    <!--====== HEADER PART START ======-->
    <header id="header-part" >
        <div class="navigation navigation-2 <?php if(is_404()){echo"menu-error";}?>">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="<?php bloginfo('url')?>">
                                <img src="<?=get_option('afdal_header_logo_img')?>" alt="<?php bloginfo('name')?>">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <?php afdal_menu();?>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>
    <!--====== HEADER PART ENDS ======-->
