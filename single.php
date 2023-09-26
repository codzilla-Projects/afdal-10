<?php  get_header();
get_template_part('template-parts/breadcrumb');
if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID();
    $thebest_choose_post   = get_post_meta( $post_id, 'thebest_choose_posts', true );
    $posts_advertisements  = get_post_meta( $post_id, 'posts_advertisements', true );
?>
    <!--====== CATEGORY PART START ======-->
<?php
    $terms = get_terms( array('taxonomy' => 'list_category','hide_empty' => true,) );
?>
    <section dir="ltr" id="category-4" class="category-2-items afdal_cats pt-40 pb-40 ">
        <div class="container">
            <div class="category-slied">

                <?php foreach ($terms as $term) : if( $term->slug == 'uncategorized' ){ continue; } ?>
                    <div class="singel-items text-center">
                        <div class="items-bg">
                        </div>
                        <div class="items-cont">
                            <a href="<?=get_term_link( $term ) ?>">
                                <h5><?= $term->name;?></h5>
                            </a>
                        </div>
                    </div> <!-- singel items -->
                <?php endforeach; ?>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CATEGORY PART ENDS ======-->

    <section id="blog-single" class="pt-50 pb-50 gray-bg blog-single">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-details mt-30">
                        <div class="thum">
                             <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-size')?>" alt="<?php the_title() ?>">
                        </div>
                        <div class="cont">
                          <h3><?php the_title()?></h3>
                          <ul>
                               <li><span><i class="fa fa-calendar"></i></span><span><?php the_time('j') ?> <?php the_time('M') ?> <?php the_time('Y') ?></span></li>
                               <li><span><i class="fa fa-user"></i><?php the_author(); ?></span></li>

                           </ul>
                           <div class="event-cont mt-10">
                                <?php the_content()?>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($posts_advertisements)) :?>
                    <div class="advertisement mt-20">
                        <?=$posts_advertisements?>
                    </div>
                    <?php endif ?>
                    <?php $posts_list = afdal_get_bests_related(10); if($posts_list->have_posts()) : $post_related_id = get_the_ID();

                            ?>
                    <div class="row list_related">
                        <div class="col-lg-12 col-md-6">
                            <div class="title">
                                <h3>القوائم التى ظهر بها هذا العنصر</h3>
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
                                        <div class="total-votes">
                                            <span>تم التصويت</span>
                                            <i class="fa fa-heart"></i>
                                            <span>
                                                <?php $post_vote = get_post_meta($post_id, 'votes'.get_the_ID().'', true); ?>
                                                <?=$post_vote;?> صوت
                                            </span>
                                        </div>
                                    </li>

                                    <?php  endwhile; wp_reset_query();?>
                                </ul>
                            </div> <!-- saidbar post -->
                        </div>
                    </div>
                    <?php endif?>
                    <div class="blog-comment pt-15">

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
                </div>
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
                           </div> <!-- categories -->
                            <?php $posts_list = afdal_get_bests_exclude(10); if($posts_list->have_posts()) :?>
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-post mt-30">
                                   <h4>أحدث المقالات</h4>
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
                            <?php endif?>

                       </div> <!-- row -->
                   </div> <!-- saidbar -->
                </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>

<?php endwhile; endif; get_footer()?>
