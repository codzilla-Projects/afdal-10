<section id="page-banner" class="pt-20 pb-20 bg_cover" data-overlay="10" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php bloginfo('url')?>">الرئيسية</a></li>
                            <?php if ( is_single() && 'list' == get_post_type() ) : ?>
                             <?php $terms = wp_get_post_terms( get_the_ID(), 'list_category' );
                            foreach ( $terms as $term ){
                                // this gets the parent of the current post taxonomy
                                $list_category = $term; ?>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo afdal_BlogUrl.'/list_category/'.$list_category->slug;?>"><?= $list_category->name;?></a>
                                </li>
                            <?php break; }?>
                            <?php elseif ( is_single() && 'post' == get_post_type() ):?>
                            <li class="breadcrumb-item"><a href="<?php bloginfo('url') ?>/القوائم/">القوائم</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">العنصر</a></li>
                            <?php elseif (is_tax( 'list_category' )): ?>
                            <li class="breadcrumb-item"><a href="<?php bloginfo('url') ?>/القوائم/">القوائم</a></li>
                            <?php endif?>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php
                                    global $page, $paged, $post;
                                    if (is_tax()) {
                                        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                                        $term_title = $term->name;
                                        echo "$term_title ";
                                    }
                                    elseif ( is_404() )
                                    {
                                      echo __('Page Not Found','mcg');
                                    }elseif (is_archive()){
                                        get_the_archive_title();
                                    }
                                    else
                                    {
                                        wp_title( '', true, 'right' );
                                    }
                                ?>
                            </li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
