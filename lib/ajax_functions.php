<?php
add_action('wp_ajax_nopriv_last_post_comment',  'last_post_comment');
add_action('wp_ajax_last_post_comment','last_post_comment');

function last_post_comment(){
    if ( !wp_verify_nonce( $_REQUEST['nonce'], "afdal_nonce")) {
        exit("No naughty business please");
    }
    $post_id = trim(stripslashes(htmlspecialchars($_POST['post_id'])));

    $modal_title ='اخر 5 تعليقات ل '.get_the_title($post_id);
    $output = '';
    $args = array (
        'number'   => 5,
        'post_id'  => $post_id,
        'status'   => 'approve',
        'order'    => 'DESC'
    );
    $comments = get_comments( $args );

    if (!empty($comments)):
    $output .= '<div class="comments mt-5">';
/*        $output .= '<h4>'. comments_number('0 تعليق ', '1 تعليق ', '% تعليق '). '</h4>';
*/        $output .= '<ul class="comments-list">';
            foreach ($comments as $comment):
            $output .= '<li>
                <div class="comment-wrap">
                    <div class="avatar">'
                        . get_avatar( $comment->comment_author_email, 32 ).
                    '</div>
                    <div class="comment-content">
                        <div class="comment-meta">
                            <h5 class="name">'. $comment->comment_author . '</h5>
                            <span class="comment-time">'. $comment->comment_date. '</span>
                        </div>
                        <p>'.
                           $comment->comment_content .
                        '</p>
                    </div>
                </div>
            </li>';
           endforeach;
        $output .= '</ul>
    </div>';
    endif;

    $response = array(
      'type'  => 'success',
      'data'  => $output,
      'title' => $modal_title,
    );
    echo json_encode( $response );
    wp_die();
}

add_action("wp_ajax_add_user_vote", "add_user_vote");
add_action("wp_ajax_nopriv_add_user_vote", "add_user_vote");

function add_user_vote(){

    $post_id = $_POST['list_id'];

    if ( !wp_verify_nonce( $_REQUEST['nonce'], "afdal_nonce")) {
        exit("No naughty business please");
    }
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }
    $json     = file_get_contents("http://ipinfo.io/$ipaddress/geo");
    $json     = json_decode($json, true);
    $city     = $json['city'];
    global $wpdb;
    global $wp_queries, $charset_collate;

    $table_name = $wpdb->prefix . "user_votes";

    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$table_name} WHERE post_id = %d AND user_ip = %s ", $_REQUEST["list_id"],$ipaddress));
    if($count > 0){
        $result['type'] = "error";
        $result['msg'] = '<div class="p-3">لقد تم التصويت لهذه القائمة من قبل </div>';
    }else{
        $my_Query = $wpdb->insert($table_name,array(
            'post_id'          => $_REQUEST["list_id"],
            'user_ip'          => $ipaddress,
            'user_location'    => $city,
        ));

        $vote_count = get_post_meta($_REQUEST["post_id"], 'votes'.$_REQUEST["list_id"].'', true);
        $vote_count = ($vote_count == "") ? 0 : $vote_count;
        $new_vote_count = $vote_count + 1;
        $vote = update_post_meta($_REQUEST["post_id"], 'votes'.$_REQUEST["list_id"].'', intval($new_vote_count));

        $output = '';

        ob_start();
        $thebest_choose_post = get_post_meta( $post_id, 'afdal_list_posts', true );
        $posts_list = afdal_get_posts_single(10, $thebest_choose_post, 'votes'.$post_id);
        $post_number = $posts_list->post_count; if($posts_list->have_posts()) :
        if (!empty($posts_list)):
        while($posts_list->have_posts()) : $posts_list->the_post(); $id = get_the_ID();?>
        <div class="col-lg-12 post" data-post-id="<?= $id ?>">
            <div class="singel-event-list mt-30">
                <div class="post_number_count">
                    <div class="title-details">
                        <?=$post_number. '-';  ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php  the_title(); ?>

                        </a>
                    </div>
                </div>
                <div class="event-thum mt-10">
                    <img src="<?= the_post_thumbnail_url();?>" alt="<?php the_title();?>">
                </div>
                <div class="event-cont mt-10">
                    <?php the_content();
                    add_post_meta( $id, 'votes'.$post_id.'', true );
                    $votes = get_post_meta($id, 'votes'.$post_id.'', true);
                    $votes = ($votes == "") ? 0 : $votes;
                    ?>
                    <div class="post_btn_list text-center mt-20">
                        <span>
                            <a id="user_vote" class="user_vote" data-votes="<?= $votes;?>" data-post_id="<?= $id ?>" href="javascript:void(0)"> <i class="fa fa-heart"></i>
                                <div class="vote_counter" data-votes="<?= $votes;?>"><?= $votes; ?></div>
                                <div class="vote_number"></div>
                            </a>
                        </span>
                        <input type="hidden" value="<?= $id ?>" name="post_id" />
                        <span>
                            <a class="comment_post_quick_view" data-bs-target="#postcomments" data-id="<?= $id ?>" data-comments="<?= get_comments_number();?>" data-post-title="<?php the_title()?>" href="javascript:void(0)"><i class="fa fa-comment"></i>
                                <div id="comment_counter">
                                    <?= get_comments_number();?></div>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php $post_number--; endwhile; wp_reset_query();endif;
         endif;

        $output .= ob_get_contents();
        ob_end_clean();

        $result = array(
          'type' => 'success',
          'data' => $output,
          'vote_count' => $new_vote_count,
        );

    }
    $result = json_encode($result);
    echo $result;
    die();
}

add_action( 'wp_ajax_afdalgetposts', 'afdal_get_posts_ajax_callback' ); // wp_ajax_{action}
function afdal_get_posts_ajax_callback(){

    // we will pass post IDs and titles to this array
    $return = array();

    // you can use WP_Query, query_posts() or get_posts() here - it doesn't matter
    $search_results = new WP_Query( array(
        's'                    => $_GET['q'], // the search query
        'post_type'            => 'item',
        'post_status'          => 'publish', // if you don't want drafts to be returned
        'ignore_sticky_posts'  => 1,
        'posts_per_page'       => 50 // how much to show at once
    ) );
    if( $search_results->have_posts() ) :
        while( $search_results->have_posts() ) : $search_results->the_post();
            // shorten the title a little
            $title = ( mb_strlen( $search_results->post->post_title ) > 50 ) ? mb_substr( $search_results->post->post_title, 0, 49 ) . '...' : $search_results->post->post_title;
            $return[] = array( $search_results->post->ID, $title ); // array( Post ID, Post Title )
        endwhile;
    endif;
    echo json_encode( $return );
    die;
}


add_action('wp_ajax_nopriv_ten_posts',  'ten_posts');
add_action('wp_ajax_ten_posts','ten_posts');

function ten_posts(){
    if ( !wp_verify_nonce( $_REQUEST['nonce'], "afdal_nonce")) {
        exit("No naughty business please");
    }
    $output = '';
    $posts_list = afdal_get_posts_single(10, $thebest_choose_post, $votes);
    $post_number = $posts_list->post_count; if($posts_list->have_posts()) :
    if (!empty($posts_list)):
    while($posts_list->have_posts()) : $posts_list->the_post();
    $output .='<div class="col-lg-12 post">';
       $output .='<div class="singel-event-list mt-30">';
            $output .='<div class="post_number_count">';
                $output .='<div class="title-details">';
                    $output .= $post_number. '-';
                    $output .='<a href="'.the_permalink().'">';
                        the_title();
                    $output .='</a>';
                $output .='</div>';
            $output .='</div>';
           $output .='<div class="event-thum mt-10">';
               $output .='<img src="'.the_post_thumbnail_url().'" alt="'.the_title().'">';
           $output .='</div>';
           $output .='<div class="event-cont mt-10">';
                the_content();
                    add_post_meta( $post->ID, 'votes'.$_REQUEST["list_id"].'', true );
                    $votes = get_post_meta($post->ID, 'votes'.$_REQUEST["list_id"].'', true);
                    $votes = ($votes == "") ? 0 : $votes;
                $output .='<div class="post_btn_list text-center mt-20">';
                   $output .='<span>';
                        $output .='<a id="user_vote" class="user_vote" data-post_id="'.$post->ID.'" href="javascript:void(0)">    <i class="fa fa-heart"></i>  ';
                            $output .='<div id="vote_counter">'.$votes.'</div>';
                            $output .='<div id="vote_number"></div>';
                        $output .='</a>';
                    $output .='</span>';
                    $output .='<input type="hidden" value="'.$_REQUEST["list_id"].'" name="post_id"/>';
                    $output .='<span>';
                    $output .='<a class="comment_post_quick_view"  data-bs-target="#postcomments" data-id="'.$post->ID.'" data-comments="'.get_comments_number().'"  data-post-title="'.the_title().'" href="javascript:void(0)"><i class="fa fa-comment"></i> <div id="comment_counter">'.get_comments_number().'</div></a>';
                    $output .='</span>';
                $output .='</div>  ';
           $output .=' </div>';
        $output .='</div>';
    $output .='</div>';
    $output .=$post_number--; endwhile; wp_reset_query();endif;
    endif;

    $response = array(
      'type'  => 'success',
      'data'  => $output,
    );
    echo json_encode( $response );
    wp_die();
}
