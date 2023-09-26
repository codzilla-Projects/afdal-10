<?php
/**
** Template Name: Contact Us Template
**/
	get_header(); 
	get_template_part('template-parts/breadcrumb'); 
?>
    <div dir="rtl" class="contact clearfix">
        <div class="container">
            <div class="contact-us">
                <div class="title-section text-center">
                    <h3 class="flat-title">تواصل معنا </h3>
                    <p class="sub-title">يمكنك التواصل معنا من خلال </p>
                </div>
                <div class="contact-options row">
                    <?php if (!empty(get_option('afdal_location'))): ?>
                    <div class="icon-box col-md-4 col-sm-12">
                        <div class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="content-info">
                            <h4 class="name">العنوان </h4>
                            <div class="info-wrap">
                                <p><?=get_option('afdal_location');?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (!empty(get_option('afdal_phone'))): ?>
                    <div class="icon-box col-md-4 col-sm-12 border-both-sides">
                        <div class="icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="content-info">
                            <h4 class="name">رقم التليفون </h4>
                            <div class="info-wrap">
                                <a href="tel:+<?=get_option('afdal_phone')?>">+<?=get_option('afdal_phone')?></a>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>

                    <?php if (!empty(get_option('afdal_email'))): ?>
                    <div class="icon-box col-md-4 col-sm-12">
                        <div class="icon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="content-info">
                            <h4 class="name">البريد الالكترونى</h4>
                            <div class="info-wrap">
                                <a href="mailto:<?=get_option('afdal_email')?>"><?=get_option('afdal_email')?></a>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div><!-- contact -->
    <div class="write-something">
        <div class="container">
            <div class="title-section text-center">
                <h3 class="flat-title">اترك لنا رساله </h3>
            </div>
            <?= do_shortcode(''.get_option('contact_form').''); ?>
        </div>
    </div><!-- write-something -->
    <?php if (!empty(get_option('afdal_map'))) : ?>
    <div class="flat-map">
        <iframe src="<?=get_option('afdal_map')?>" width="100%" height="500" style="border:0; width: 100%; height: 500px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div><!-- flat-map -->
    <?php endif ?>
<?php get_footer() ?>