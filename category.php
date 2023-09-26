<?php
    get_header();
    get_template_part('template-parts/breadcrumb');
    echo"eSSAM";
?>
    <?php
    $terms = get_terms( array('taxonomy' => 'list_tag','hide_empty' => true,) );
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
                            <span><?=$term->count;?> <?php if ($term->count < 3): ?> مقالة  <?php else: ?> مقالات  <?php endif ?></span>
                        </a>
                    </div>
                </div> <!-- singel items -->
            <?php endforeach; ?>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<section id="blog-singel" class="pt-50 pb-70 gray-bg essam">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                  <div class="blog-details mt-30">
                        <div class="blog-comment blog-posts">
                            <div class="main-blog-title">
                               <div class="title pb-10">
                                   <h3>
                                    <?php
                                        $id = get_queried_object_id();
                                        echo get_term_meta($id, 'custom_title', true);
                                    ?>
                                    </h3>
                               </div> <!-- title -->
                            </div>
                            <?php
                            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                            $queried_object = get_queried_object();
                            $term_id = $queried_object->term_id;
                            $posts_cat = afdal_get_cat_with_tax(10, $term_id); $number = $wp_query->post_count; if($posts_cat->have_posts()) :
                            ?>
                            <div class="row">
                                <?php while($posts_cat->have_posts()) : $posts_cat->the_post();?>
                                  <div class="col-lg-12">
                                   <div class="singel-event-list mt-30">
                                       <div class="post_number_count"><?=$number?></div>
                                       <div class="event-thum mt-10">
                                           <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-size')?>" alt="">
                                       </div>
                                       <div class="event-cont mt-10">
                                            <a href="<?php the_permalink()?>"><h4><?php the_title()?></h4></a>
                                            <?php the_content()?>
                                            <?php
                                                $votes = get_post_meta($post->ID, "votes", true);
                                                $votes = ($votes == "") ? 0 : $votes;
                                            ?>
                                            <div class="post_btn_list text-center mt-20">
                                               <span>
                                                    <a class="user_vote" data-post_id="<?=$post->ID?>" href="javascript:void(0)">    <i class="fa fa-heart"></i>
                                                        <div id="vote_counter"><?=$votes?></div>
                                                        <div id="vote_number"></div>
                                                    </a>
                                                </span>
                                                <input type="hidden" value="<?=$post_id?>" name="post_id"/>
                                                <span>
                                                <?php $comments_num = get_comments_number(); ?>
                                                <a class="comment_post_quick_view "  data-bs-target="#postcomments" data-id="<?=$post->ID?>" data-comments="<?= $comments_num ?>"  data-post-title="<?php the_title()?>" href="javascript:void(0)"><i class="fa fa-comment"></i> <?= $comments_num;?></a></span>
                                               <span><a href="#"><i class="fa fa-angle-double-left"></i></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $number--; endwhile;?>
                            </div> <!-- row -->
                             <div class="text-center load-more-products mt-4">

                                <nav class="page-pagination">

                                    <?php

                                        $args = array(

                                           'format'             => '?paged=%#%',

                                           'current'            => max( 1, get_query_var('paged') ),

                                           'total'              => $posts_cat->max_num_pages,

                                           'show_all'           => false,

                                           'end_size'           => 1,

                                           'mid_size'           => 2,

                                           'prev_next'          => true,

                                           'next_text'          => '<i class="fa fa-angle-right"></i>',

                                           'prev_text'          => '<i class="fa fa-angle-left"></i>',

                                           'type'               => 'list',

                                          );

                                    ?>

                                    <?php echo paginate_links($args); ?>

                                </nav>

                            </div>
                            <?php wp_reset_query(); endif?>
                        </div> <!-- blog comment -->
                    </div> <!-- cont -->
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
                                       <?php foreach ($terms as $term) : ?>
                                       <li><a href="<?=get_term_link( $term ) ?>"><?= $term->name;?></a></li>
                                       <?php endforeach; ?>
                                   </ul>
                               </div>
                           </div> <!-- categories -->
                            <?php $posts_list = afdal_get_posts(-1); if($posts_list->have_posts()) :?>
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-post mt-30">
                                   <h4>أحدث المقالات</h4>
                                   <ul>
                                    <?php while($posts_list->have_posts()) : $posts_list->the_post();?>
                                       <li>
                                            <a href="<?php the_permalink()?>">
                                                <div class="singel-post">
                                                   <div class="thum">
                                                       <img src="<?php get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')?>" alt="<?php the_title()?>">
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
