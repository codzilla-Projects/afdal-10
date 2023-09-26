<?php
/**
** Template Name: About Us Template
**/
    get_header();
    get_template_part('template-parts/breadcrumb');
?>
    <!-- Story Section -->
    <section class="story-section">
        <div class="container">
            <div class="row clearfix">
                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-8 col-sm-12">
                    <div class="inner-column">
                        <h2><?= get_option('about_title') ?></h2>
                        <div class="text">
                            <p>
                                <?= get_option('about_content') ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-4 col-md-4 col-sm-12">
                    <div class="inner-column">
                        <div class="image">
                            <img src="<?= get_option('about_img') ?>" alt="<?= get_option('about_title') ?>" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Story Section -->


    <!-- Mission Section -->
    <section class="mission-section">
        <div class="container">
            <div class="row clearfix">
                 <!-- Image Column -->
                <div class="image-column col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image">
                            <img src="<?= get_option('mission_img') ?>" alt="<?= get_option('mission_title') ?>" />
                        </div>
                    </div>
                </div>
                <!-- Content Column -->
                <div class="content-column col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2><?= get_option('mission_title') ?></h2>
                        <?= get_option('mission_content') ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Mission Section -->

    <!-- Call To Action Section -->
    <section class="call-to-action-section" style="background-image: url(<?= get_option('about_contact_img'); ?>)">
        <div class="container">
            <h2><?= get_option('about_contact_title'); ?></h2>
            <div class="text"><?= get_option('about_contact_content'); ?></div>
            <a href="<?= get_option('about_contact_btn_url'); ?>" class="main-btn"><?= get_option('about_contact_btn_txt'); ?></a>
        </div>
    </section>
    <!-- End Call To Action Section -->
<?php get_footer() ?>
