<?php
    get_header(); 
    get_template_part('template-parts/breadcrumb'); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); $page_id = get_the_ID();?>
    <!-- Story Section -->
    <section class="story-section">
        <div class="container">
            <div class="row clearfix">
                <!-- Content Column -->
                <div class="content-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="text">
                            <?php the_content();?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <!-- End Story Section -->
<?php endwhile;endif; ?>
<?php get_footer();?>