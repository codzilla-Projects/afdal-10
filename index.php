<?php get_header(); ?>

    <!--====== SLIDER PART START ======-->



    <section class="search-area">

        <div class="container">

            <div id="slider-part-3" class="bg_cover"  data-source="background-image: url(<?= get_option('afdal_search_bg_img'); ?>)">

                <div class="row justify-content-center w-100">

                    <div class="col-lg-10">

                        <div class="slider-cont-3 text-center">

                            <div class="slider-search">

                                <?= do_shortcode('[asearch  image="false" source="list, item, page"]'); ?>

                            </div>

                        </div> <!-- slider cont3 -->

                    </div>

                </div> <!-- row -->

            </div>

        </div> <!-- container -->

    </section>



    <!--====== SLIDER PART ENDS ======-->



    <!--====== CATEGORY PART START ======-->

<?php

    $terms = get_terms( array('taxonomy' => 'list_category','hide_empty' => true,) );

?>

    <section dir="ltr" id="category-3" class="category-2-items pt-50 pb-25 ">

        <div class="container">

            <div class="category-slied">



                <?php foreach ($terms as $term) :

                  if( $term->slug == 'uncategorized' ){ continue; }

                  $category_id = $term->term_id;

                  $term_meta = get_option( "category_$category_id" );

                ?>

                    <div class="singel-items text-center">

                        <div class="items-image">

                            <img width="125" height="125" data-src="<?= $term_meta['image'];?>" alt="<?= $term->name;?>">

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



    <!--====== COURSE PART START ======-->

<?php $bests = afdal_get_bests(12); if($bests->have_posts()) :?>

    <section id="course-part" class="pt-25 pb-50">

        <div class="container">

            <div class="row">

                <div class="col-lg-6">

                    <div class="section-title pb-30">

                        <h2>أحدث المقالات </h2>

                    </div> <!-- section title -->

                </div>

            </div> <!-- row -->

            <div class="row mt-00">

                <?php while($bests->have_posts()) : $bests->the_post(); $news_id = get_the_ID();?>

                <div class="col-lg-4">

                    <div class="singel-course-2">

                        <div class="thum">

                            <div class="image">

                                <img width="370" height="210" data-src="<?php echo get_the_post_thumbnail_url($news_id, 'post-size')?>" alt="<?php the_title()?>">

                            </div>

                        </div>

                        <div class="cont">

                            <?php $posts_title = get_the_title($news_id); ?>

                            <a href="<?php the_permalink()?>"><h4><?=$posts_title?></h4></a>

                        </div>



                        <?php $comment_num = get_comments_number()?>

                       <div class="post-footer-bl d-sm-flex">

                            <ul class="post-author d-flex align-items-center">
                            <?php $news_cats = get_the_terms($news_id,'list_category');

                                    if(!empty($news_cats)) : foreach($news_cats as $news_cat): $term_link = get_term_link( $news_cat );
                                ?>
                                <li class="author">
                                    <a href="<?= esc_url( $term_link );?>"><?= $news_cat->name;?></a>
                                </li>
                                <?php break; endforeach; endif;?>
                                <li class="comment"><?php if ($comment_num == 0):?>لا توجد تعليقات<?php else: ?><?=$comment_num.' ' ?> تعليق <?php endif ?></li>

                            </ul>

                        </div>

                    </div> <!-- singel course -->

                </div>

                <?php endwhile; wp_reset_query();?>

            </div> <!-- course slied -->

        </div> <!-- container -->

    </section>

<?php endif?>

    <!--====== COURSE PART ENDS ======-->

<?php get_footer();?>

