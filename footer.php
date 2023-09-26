<!--====== FOOTER PART START ======-->

<footer id="footer-part">
    <div class="footer-top pt-10 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-about mt-40">
                        <div class="logo">
                            <a href="<?php bloginfo('url') ?>"><img src="<?= get_option('afdal_footer_logo_img'); ?>" alt="<?php bloginfo('url') ?>"></a>
                        </div>
                        <p><?= get_option('footer_content'); ?> </p>
                        <ul class="mt-20">
                            <?php $facebook = get_option('afdal_fb');  
                                if(!empty($facebook)) :
                            ?>
                            <li><a href="<?=$facebook; ?>"><i class="fa fa-facebook-f"></i></a></li>
                            <?php endif; ?>
                            <?php $instagram = get_option('afdal_insta');  
                                if(!empty($instagram)) :
                            ?>
                            <li><a href="<?=$instagram; ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php $linkedin = get_option('afdal_linkedin');  
                                if(!empty($linkedin)) :
                            ?>
                            <li><a href="<?=$linkedin; ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php $twitter = get_option('afdal_twitter');  
                                if(!empty($twitter)) :
                            ?>
                            <li><a href="<?=$twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div> <!-- footer about -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-link support  mt-40">
                        <div class="footer-title pb-25">
                            <h6>روابط مفيدة</h6>
                        </div>
                         <?php if ( is_active_sidebar('first_sidebar') ) : ?>
                            <?php dynamic_sidebar('first_sidebar'); ?>
                        <?php endif; ?>

                    </div> <!-- footer link -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-link support mt-40">
                        <div class="footer-title pb-25">
                            <h6>الأكثر قراءة</h6>
                        </div>
                        <?php $list_view = afdal_get_list_view(3);
                        if($list_view->have_posts()) : if (!empty($list_view)):?>
                        <ul class="menu-list-view">
                            <?php while($list_view->have_posts()) : $list_view->the_post(); $id = get_the_ID(); 
                            $post_view = get_post_meta($id, 'post_views_count', true);
                            ?>
                            <li>
                                <a href="<?php the_permalink() ?>"><?php the_title()?></a>
                            </li>
                            <?php endwhile;wp_reset_query();?>
                        </ul>
                        <?php  endif; endif; ?>
                    </div> <!-- support -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-address mt-40">
                        <div class="footer-title pb-25">
                            <h6>تواصل معنا</h6>
                        </div>
                        <ul>
                            <?php $afdal_location = get_option('afdal_location');  if(!empty($afdal_location)) : ?>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="cont">
                                    <p><?=$afdal_location?></p>
                                </div>
                            </li>
                            <?php endif ?>
                            <?php $afdal_phone = get_option('afdal_phone');  if(!empty($afdal_phone)) : ?>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="cont">
                                    <a href="tel:<?=$afdal_phone?>"><?=$afdal_phone?></a>
                                </div>
                            </li>
                            <?php endif ?>
                            <?php $afdal_email = get_option('afdal_email');  if(!empty($afdal_email)) : ?>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="cont">
                                    <a href="mailto:<?=$afdal_email?>"><?=$afdal_email?></a>
                                </div>
                            </li>
                            <?php endif ?>
                        </ul>
                    </div> <!-- footer address -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- footer top -->

    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright text-md-right text-center pt-10 pb-10">
                        <p class="text-center">جميع الحقوق محفوظة لدى أفضل 10  &copy; <?= date("Y"); ?> </p>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- footer copyright -->
</footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--====== BACK TO TP PART ENDS ======-->
    <?php wp_footer()?>
</body>

<div class="modal fade" id="postcomments" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق </button>
      </div>
    </div>
  </div>
</div> 

</html>
