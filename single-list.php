<?php  get_header();
get_template_part('template-parts/breadcrumb');
if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID();
    $thebest_choose_post = get_post_meta( $post_id, 'afdal_list_posts', true );
    $posts_title         = get_post_meta( $post_id, 'posts_title', true );
?>

 <div style="display:none;width:100%;height:100%;background: rgb(255 255 255 / 90%) !important;text-align: center;fixed: absolute;top: 85px;right: 0px;text-align: center;z-index: 999999;position:fixed;" id="postsLoader" >
     <img src="<?php echo afdal_URL.'/assets/images/Loader.gif'; ?>" class="reloader_img" style="margin:auto;width:120px;padding-top:10%;" >
</div>

    <!--====== CATEGORY PART START ======-->
<?php
    $terms = get_terms( array('taxonomy' => 'list_category','hide_empty' => true,) );
    $tags = get_terms( array('taxonomy' => 'list_tag','hide_empty' => true,) );
?>
     <section dir="ltr" id="category-3" class="category-2-items pt-40 pb-40 ">
        <div class="container">
            <div class="category-slied">
                 <?php foreach ($terms as $term) : if( $term->slug == 'uncategorized' ){ continue; } ?>
                <div class="services-block-two">
                    <div class="inner-box">
                        <h3><a href="<?=get_term_link( $term ) ?>"><?= $term->name;?></a></h3>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!--====== CATEGORY PART ENDS ======-->

    <section id="blog-singel" class="pt-50 pb-50 gray-bg">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="blog-details mt-30">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="thum">
                                     <img src="<?php echo get_the_post_thumbnail_url($post_id, 'full')?>" alt="<?php the_title() ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cont">
                                  <h3><?php the_title()?></h3>
                                  <ul>
                                       <li><span><i class="fa fa-calendar"></i></span><span><?php the_time('j') ?> <?php the_time('M') ?> <?php the_time('Y') ?></span></li>
                                       <li><span><i class="fa fa-user"></i><?php the_author(); ?></span></li>

                                   </ul>
                                   <?php the_content()?>

                                    <?php
                                    $image= urlencode(get_option('afdal_header_logo_img'));
                                    $title = urlencode(get_the_title());
                                    $link = urlencode(get_the_permalink());
                                    ?>
                                   <ul class="share">
                                       <li class="title">مشاركة :</li>
                                       <li><a onClick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[url]=<?php echo $link; ?>&amp;&p[image][0]=<?php echo $image ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-facebook-f"></i></a></li>
                                       <li><a  target="_parent" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo $link;?>"><i class="fa fa-twitter"></i></a></li>
                                   </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                  <div id="list_id" class="blog-details  mt-30" data-id="<?=$post_id?>">
                        <div class="blog-comment blog-posts">


                            <div id="posts-list" class="row">
                                <?php $posts_list = afdal_get_posts_single(10, $thebest_choose_post, 'votes'.$post_id);

                                $post_number = 1; if($posts_list->have_posts()) :
                                if (!empty($posts_list)):
                                    $i = 1;
                                    while($posts_list->have_posts()) : $posts_list->the_post(); $id = get_the_ID();
                                        $posts_advertisements  = get_post_meta( $post_id, 'post_advertisement_'.$i, true );
                                        ?>

                                        <div class="col-lg-12 post" data-post-id="<?= $id ?>">
                                          <div class="singel-event-list mt-30">
                                                <div class="post_number_count">
                                                    <div class="title-details">
                                                        <?=$i. '-';  ?>
                                                        <a href="<?php the_permalink(); ?>">
                                                           <?php  the_title(); ?>

                                                        </a>
                                                    </div>
                                                </div>
                                               <div class="event-thum">
                                                   <img src="<?php echo get_the_post_thumbnail_url($id, 'post-size');?>" alt="<?php the_title();?>">
                                              </div>
                                              <div class="event-cont mt-10">
                                                   <?php the_content();?>
                                               </div>
                                               <div class="vote-cont">
                                                <?php
                                                    add_post_meta( $id, 'votes'.$post_id.'','0', true );
                                                    $votes = get_post_meta($id, 'votes'.$post_id.'', true);
                                                    $votes = ($votes == "") ? 0 : $votes;
                                                    ?>
                                                    <div class="post_btn_list text-center mt-20">
                                                       <span>
                                                           <a class="user_vote"  data-votes="<?= $votes;?>" data-post_id="<?= $id ?>" href="javascript:void(0)">    <i class="fa fa-heart"></i>
                                                                <div class="vote_counter" data-votes="<?= $votes;?>"><?= $votes; ?></div>
                                                                <div class="vote_number"></div>
                                                            </a>
                                                        </span>
                                                        <input type="hidden" value="<?= $id ?>" name="post_id"/>
                                                        <span>
                                                        <a class="comment_post_quick_view"  data-bs-target="#postcomments" data-id="<?= $id ?>" data-comments="<?= get_comments_number();?>"  data-post-title="<?php the_title()?>" href="javascript:void(0)"><i class="fa fa-comment"></i> <div id="comment_counter">
                                                            <?= get_comments_number();?></div></a>
                                                        </span>
                                                    </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 post" data-post-id="<?= $id ?>">
                                        <?php if (!empty($posts_advertisements)) :?>
                                            <div class="advertisement mt-20">
                                                <?=$posts_advertisements?>
                                            </div>
                                            <?php endif ?>
                                        </div>
                                       <?php $i++; endwhile; wp_reset_query();endif;
                                    endif; ?>


                            </div> <!-- row -->

<!--
                            <div style="display:none;padding-top:55px;width:500px;height:500px;backgroung-color:#fff;" id="finishPostsLoader" >
                                <p>تم التصويت بنجاح</p>
                            </div>
-->
                        </div> <!-- blog comment -->

                        <div class="blog-comment pt-35">

                           <div class="title pb-15">
                               <h3>اترك لنا تعليقك</h3>
                           </div> <!-- title -->
                           <div class="form-inner">
                                <div class="row">
                                    <?php
                                        comment_form(array('title_reply' => '', 'comment_notes_before' => '')); // Get wp-comments.php template
                                    ?>
                                </div>
                            </div>
                            <?php if (comments_open()) :?>
                            <?php
                                $args = array (
                                    'number'   => 5,
                                    'post_id'  => $post_id,
                                    'status'   => 'approve',
                                    'order'    => 'DESC'
                                );
                                $comments = get_comments( $args );
                            ?>
                            <?php if (!empty($comments)): ?>
                            <div class="comments mt-5">
                                <h4><?php comments_number('0 تعليق ', '1 تعليق ', '% تعليق '); ?></h4>

                                <ul class="comments-list">
                                    <?php foreach ($comments as $comment): ?>
                                    <li>
                                        <div class="comment-wrap">
                                            <div class="avatar">
                                                 <?=get_avatar( $comment->comment_author_email, 32 ); ?>
                                            </div>
                                            <div class="comment-content">
                                                <div class="comment-meta">
                                                    <h5 class="name"><?="$comment->comment_author"; ?></h5>
                                                    <span class="comment-time"><?="$comment->comment_date"; ?></span>
                                                </div>
                                                <p>
                                                   <?="$comment->comment_content"; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                     <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div> <!-- cont -->
                    <?php
                        $cats = wp_get_post_terms( $post_id , array( 'list_category') );
                        if (!empty($cats)):
                    ?>

                    <?php
                        $i = 1;
                        foreach ( $cats as $cat ) :
                         $posts_list = afdal_get_cat_with_tax(5,$cat->term_id ); if($posts_list->have_posts()) : $post_related_id = get_the_ID();

                            ?>
                    <div class="row list_related">
                        <div class="col-lg-12 col-md-6">
                            <div class="title">
                                <h3>قوائم ذات صله مشتركة</h3>
                            </div> <!-- title -->
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="saidbar-post mt-30">

                                <ul>
                                    <?php while($posts_list->have_posts()) : $posts_list->the_post();?>
                                    <li>
                                        <a href="<?php the_permalink()?>">
                                            <div class="singel-post">
                                                <div class="thum">
                                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')?>" alt="<?php the_title()?>">
                                                </div>
                                                <div class="cont">
                                                    <h6><?php the_title()?></h6>
                                                    <span><?php the_time('j') ?> <?php the_time('M') ?> <?php the_time('Y') ?></span>
                                                </div>
                                            </div> <!-- singel post -->
                                        </a>
                                    </li>

                                    <?php  endwhile; wp_reset_query();?>
                                </ul>
                            </div> <!-- saidbar post -->
                        </div>
                    </div>
                    <?php endif?>
                    <?php $i++;if ($i == 2) break; endforeach;endif; ?>
                </div> <!-- blog details -->
                <div class="col-lg-4">
                   <div class="saidbar">
                       <div class="row">
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-search mt-30">
                                    <div class="slider-cont-3 text-center">
                                        <div class="slider-search">
                                            <?= do_shortcode('[single_asearch  image="false" source="list, post, page"]'); ?>
                                        </div>
                                    </div> <!-- slider cont3 -->
                               </div> <!-- saidbar search -->
                               <div class="categories mt-30">
                                   <h4>التصنيفات</h4>
                                   <ul>
                                    <?php foreach ($terms as $term) : if( $term->slug == 'uncategorized' ){ continue; } ?>
                                        <li>
                                            <a href="<?=get_term_link( $term ) ?>">
                                                <?= $term->name;?>
                                            </a>
                                        </li>
                                       <?php endforeach; ?>
                                   </ul>
                               </div>
                               <div class="categories mt-30">
                                   <h4>العلامات</h4>
                                   <ul>
                                       <?php foreach ($tags as $tag) :  if( $tag->slug == 'uncategorized' ){ continue; } ?>
                                        <li>
                                            <a href="<?=get_term_link( $tag ) ?>">
                                                <?= $tag->name;?>
                                            </a>
                                        </li>
                                       <?php endforeach; ?>
                                   </ul>
                               </div>
                           </div> <!-- categories -->
                            <?php $posts_best = afdal_get_bests_exclude(10);if($posts_best->have_posts()) :?>
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-post mt-30">
                                   <h4>أحدث المقالات</h4>
                                   <ul>
                                    <?php while($posts_best->have_posts()) : $posts_best->the_post();?>
                                       <li>
                                            <a href="<?php the_permalink()?>">
                                                <div class="singel-post">
                                                   <div class="thum">
                                                       <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')?>" alt="<?php the_title()?>">
                                                   </div>
                                                   <div class="cont">
                                                       <h6><?php the_title()?></h6>
                                                       <span><?php the_time('j') ?> <?php the_time('M') ?> <?php the_time('Y') ?></span>
                                                   </div>
                                               </div> <!-- singel post -->
                                            </a>
                                       </li>
                                       <?php  endwhile; wp_reset_query();?>
                                   </ul>
                               </div> <!-- saidbar post -->
                           </div>
                            <?php endif?>
                       </div> <!-- row -->
                   </div> <!-- saidbar -->


               </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!-- Modal -->
<?php endwhile; endif; get_footer()?>

