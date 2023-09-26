<?php

    get_header();

    get_template_part('template-parts/breadcrumb');

?>

    <?php

    $tags = get_terms( array('taxonomy' => 'list_tag','hide_empty' => true,) );



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

<section id="blog-singel" class="pt-50 pb-70 gray-bg">

        <div class="container">

            <div class="row">

                <div class="col-lg-8">



                  <div class="blog-details mt-30">

                        <div class="blog-comment blog-posts">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="main-blog-title">

                                        <div class="title pb-10">

                                            <h3>

                                                <?php

                                                   $tax = $wp_query->get_queried_object();

                                                   echo ''. $tax->name . '';

                                                ?>

                                            </h3>

                                        </div> <!-- title -->

                                    </div>

                                </div>

                                <?php

                                $no_posts = get_option('posts_per_page');

                                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

                                $term_posts_list = afdal_get_cat_with_tax($no_posts, $term->term_id); if($term_posts_list->have_posts()) :

                                while($term_posts_list->have_posts()) : $term_posts_list->the_post(); $id = get_the_ID();

                                ?>

                                <div class="col-xl-6 col-md-6 col-sm-6">

                                    <div class="blog-details mt-30 mb-20">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="thum">

                                                     <img src="<?php echo get_the_post_thumbnail_url($id, 'post-size')?>" alt="<?php the_title() ?>">

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="cont">

                                                  <h3>

                                                    <a href="<?php the_permalink() ?>"><?php the_title()?></a>

                                                    </h3>

                                                    <ul>

                                                        <li><span><i class="fa fa-calendar"></i></span><span><?php the_time('j') ?> <?php the_time('M') ?> <?php the_time('Y') ?></span></li>

                                                    </ul>

                                                    <?=

                                                    wp_trim_words( get_the_content(), 10, '...' );

                                                    ?>



                                                    <?php if (!empty($facebook_share) && !empty($twitter_share) && !empty($instagram_share)): ?>

                                                    <ul class="share">

                                                        <li class="title">مشاركة :</li>

                                                        <li><a onClick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[url]=<?php echo $link; ?>&amp;&p[image][0]=<?php echo $image ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-facebook-f"></i></a></li>

                                                        <li><a  target="_parent" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo $link;?>"><i class="fa fa-twitter"></i></a></li>

                                                    </ul>

                                                    <?php endif ?>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php endwhile;  wp_reset_query();?>

                            </div> <!-- row -->

                            <div class="text-center load-more-products mt-4">



                                <nav class="page-pagination">



                                    <?php



                                        $args = array(



                                           'format'             => '?paged=%#%',



                                           'current'            => max( 1, get_query_var('paged') ),



                                           'total'              => $term_posts_list->max_num_pages,



                                           'show_all'           => false,



                                           'end_size'           => 1,



                                           'mid_size'           => 2,



                                           'prev_next'          => true,



                                           'next_text'          => '<i class="fa fa-angle-left"></i>',



                                           'prev_text'          => '<i class="fa fa-angle-right"></i>',



                                           'type'               => 'list',



                                          );



                                    ?>



                                    <?php echo paginate_links($args); ?>



                                </nav>



                            </div>

                            <?php endif?>

                        </div>

                    </div> <!-- blog comment -->

                </div> <!-- blog details -->

                <div class="col-lg-4">

                   <div class="saidbar">

                       <div class="row">

                           <div class="col-lg-12 col-md-6">

                               <div class="saidbar-search mt-30">

                                   <form action="#">

                                       <input type="text" placeholder="بحث">

                                       <button type="button"><i class="fa fa-search"></i></button>

                                   </form>

                               </div> <!-- saidbar search -->

                               <div class="categories mt-30">

                                   <h4>التصنيفات</h4>

                                   <ul>

                                       <?php foreach ($terms as $term) :  if( $term->slug == 'uncategorized' ){ continue; } ?>

                                        <li>

                                            <a href="<?=get_term_link( $term ) ?>">

                                                <?= $term->name;?>

                                            </a>

                                        </li>

                                       <?php endforeach; ?>

                                   </ul>

                               </div>



                               <div class="categories mt-30">

                                   <h4>الوسوم</h4>

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

                            <?php $posts_list = afdal_get_bests(10); if($posts_list->have_posts()) :?>

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

<?php get_footer()?>

