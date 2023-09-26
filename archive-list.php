<?php
    /**
    ** Template Name: List Template
    **/
get_header();
get_template_part('template-parts/breadcrumb');

$terms = get_terms( array('taxonomy' => 'list_category','hide_empty' => true,) );

$no_posts = get_option('posts_per_page');

$bests = afdal_get_bests($no_posts); if($bests->have_posts()) :?>
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
    <section id="course-part" class="pt-50 pb-50">
        <div class="container">
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
                                <li class="author"><?php the_author()?></li>
                                <li class="comment"><?php if ($comment_num == 0):?>لا توجد تعليقات<?php else: ?><?=$comment_num.' ' ?> تعليق <?php endif ?></li>
                            </ul>
                        </div>
                    </div> <!-- singel course -->
                </div>
                <?php endwhile; wp_reset_query();?>
            </div> <!-- course slied -->
            <div class="text-center load-more-products mt-4">
                    <nav class="page-pagination">
                    <?php
                        $args = array(
                           'format'             => '?paged=%#%',
                           'current'            => max( 1, get_query_var('paged') ),
                           'total'              => $bests->max_num_pages,
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
        </div> <!-- container -->
    </section>
<?php endif;  get_footer()?>
