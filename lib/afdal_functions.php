<?php
function afdal_get_posts($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(

        'post_type'       => 'item',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );

}

function afdal_get_bests($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(

        'post_type'       => 'list',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );

}

function afdal_get_bests_exclude($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(

        'post_type'       => 'list',

        'post_status'     => 'publish',
        'post__not_in'    => array(get_the_ID()),
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );

}

function afdal_get_bests_related($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(

        'post_type'       => 'list',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,

        'orderby'         => 'date',

        'meta_query' => array(
            array(
                'key'     => 'afdal_list_posts',
                'value'   => get_the_ID(),
                'compare' =>'LIKE',
            )
        ),

        'order'           => 'ASC'

    );

    return $posts = new WP_Query( $args );

}

function afdal_get_posts_single($no, $posts_in, $votes_meta_key){

    $args = array(

        'post_type'       => 'item',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'meta_query' => array(
            "relation" => "or",
            'custom_field_value' => array(
                'key' => $votes_meta_key,
            ),
            'custom_field' => array(
                'key' => $votes_meta_key,
                'compare' => 'NOT EXISTS',
            ),
        ),
        'orderby' => array(
            'custom_field' => 'DESC',
            'date'         => 'DESC'
        ),

        'order'           => 'ASC',

        'post__in'        => $posts_in,
    );
 $posts = new WP_Query( $args );
 return $posts;

}

function afdal_get_list_view($no){

    $args = array(

        'post_type'       => 'list',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'meta_key'        => 'post_views_count',

        'orderby'         => 'meta_value_num',

        'order'           => 'DESC',
    );
 $posts = new WP_Query( $args );
 return $posts;

}

function afdal_get_cat_with_tax($no,$term_id){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'list',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'list_category',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    );
    return $posts = new WP_Query( $args );
}

function afdal_get_cat_with_tag($no,$term_id){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'list',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'list_tag',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    );
    return $posts = new WP_Query( $args );
}
function afdal_search_results($no){
    $args = array(
        'post_type'       => array('list','item'),
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );
}

function mySearchFilter($articleQuery) {
    if ($articleQuery->is_search ) {
        $articleQuery->set('post_type', array('list','item') );
    };
    return $articleQuery;
};

add_filter('pre_get_posts','mySearchFilter');
