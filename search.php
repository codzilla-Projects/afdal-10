<?php
    get_header();
    get_template_part('template-parts/breadcrumb');
    if ( have_posts() ) :
?>
<section id="course-part" class="pt-50 pb-50 search">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-30">
                    <h2>نتائج البحث عن :  <?php echo $_GET['s']; ?></h2>
                </div>
            </div>
        </div>
        <div class="row mt-00">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-lg-4">
                <div class="singel-course-2">
                    <div class="thum">
                        <div class="image">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-size')?>" alt="<?php the_title()?>">
                        </div>
                    </div>
                    <div class="cont">
                        <a href="<?php the_permalink()?>">
                            <h4>
                            <?php the_title();?>
                            </h4>
                        </a>
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
                       'total'              => $wp_query->max_num_pages,
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
<?php endif; ?>
<?php get_footer(); ?>
