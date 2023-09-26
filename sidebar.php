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
                            <a href="<?=get_term_link( $term )?>"><?= $term->name;?>
                                <span><?=$term->count?></span>
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
            <?php
            if ( is_single() && 'post' == get_post_type() ) :
            $posts_list = afdal_get_bests_related(10); if($posts_list->have_posts()) : $post_related_id = get_the_ID();
            ?>
            <div class="col-lg-12 col-md-6">
               <div class="saidbar-post mt-30">
                   <h4>مقالات ذات صله </h4>
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
                                <i class="fa fa-heart"></i>
                                <span>
                                    <?php $post_vote = get_post_meta($post_id, 'votes'.get_the_ID().'', true); ?>
                                    <?=$post_vote;?>
                                </span>
                            </div>
                        </li>

                       <?php  endwhile; wp_reset_query();?>
                    </ul>
                </div> <!-- saidbar post -->
            </div>
            <?php endif; endif?>
        </div> <!-- row -->
    </div> <!-- saidbar -->
</div>
