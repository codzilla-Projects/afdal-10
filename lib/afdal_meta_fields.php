<?php
/*********************************
Add Meta Box To Best
**********************************/
function afdal_add_data_metabox() {
    add_meta_box( "best_extra_side_data", "Additional Data" , "afdal_list_data_callback", array('list'), "side" );
}
add_action( 'add_meta_boxes', 'afdal_add_data_metabox' );

/* Display the post meta box. */
function afdal_list_data_callback( $object, $box ) {

    $post_advertisement_1    = esc_attr( get_post_meta( $object->ID, 'post_advertisement_1', true ) );
    $post_advertisement_2    = esc_attr( get_post_meta( $object->ID, 'post_advertisement_2', true ) );
    $post_advertisement_3    = esc_attr( get_post_meta( $object->ID, 'post_advertisement_3', true ) );
    $post_advertisement_4    = esc_attr( get_post_meta( $object->ID, 'post_advertisement_4', true ) );
    $post_advertisement_5    = esc_attr( get_post_meta( $object->ID, 'post_advertisement_5', true ) );
    $post_advertisement_6    = esc_attr( get_post_meta( $object->ID, 'post_advertisement_6', true ) );
    $post_advertisement_7    = esc_attr( get_post_meta( $object->ID, 'post_advertisement_7', true ) );
    $post_advertisement_8    = esc_attr( get_post_meta( $object->ID, 'post_advertisement_8', true ) );
    $post_advertisement_9    = esc_attr( get_post_meta( $object->ID, 'post_advertisement_9', true ) );
    $post_advertisement_10   = esc_attr( get_post_meta( $object->ID, 'post_advertisement_10', true ) );

?>
<?php
    $html = '';
    $appended_posts = get_post_meta( $object->ID, 'afdal_list_posts',true );
    $html .= '
    <div class="form-group row mb-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <label  class="text-dark text-left" for="thebest_choose_posts">
                        '._e('Choose Posts: ','afdal').'
                    </label>
                </div>
                <div class="col-sm-12 text-left multiSelect_field">
                    <select id="afdal_list_posts" name="afdal_list_posts[]" multiple class="js-example-basic-multiple">';
                    if( $appended_posts ) {
                        foreach( $appended_posts as $post_id ) {
                            $title = get_the_title( $post_id );
                            $title = ( mb_strlen( $title ) > 50 ) ? mb_substr( $title, 0, 49 ) . '...' : $title;
                            $html .=  '<option value="' . $post_id . '" selected="selected">' . $title . '</option>';
                        }
                    }
                    $html .= '
                    </select>
                </div>
            </div>
        </div>
    </div>
    ';
    echo $html;
?>

<div class="form-group row ">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label  class="text-dark text-right" for="post_advertisement_1"><?php _e(' كود الاعلان الأول : ','afdal'); ?></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <textarea class="form-control" name="post_advertisement_1" id="exampleFormControlTextarea1" rows="3"><?=$post_advertisement_1; ?></textarea>
            </div>
        </div>
    </div>
</div>

<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label  class="text-dark text-right" for="post_advertisement_2"><?php _e(' كود الاعلان الثانى : ','afdal'); ?></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <textarea class="form-control" name="post_advertisement_2" id="exampleFormControlTextarea1" rows="3"><?=$post_advertisement_2; ?></textarea>
            </div>
        </div>
    </div>
</div>


<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label  class="text-dark text-right" for="post_advertisement_3"><?php _e(' كود الاعلان الثالث : ','afdal'); ?></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <textarea class="form-control" name="post_advertisement_3" id="exampleFormControlTextarea1" rows="3"><?=$post_advertisement_3; ?></textarea>
            </div>
        </div>
    </div>
</div>


<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label  class="text-dark text-right" for="post_advertisement_4"><?php _e(' كود الاعلان الرابع : ','afdal'); ?></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <textarea class="form-control" name="post_advertisement_4" id="exampleFormControlTextarea1" rows="3"><?=$post_advertisement_4; ?></textarea>
            </div>
        </div>
    </div>
</div>


<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label  class="text-dark text-right" for="post_advertisement_5"><?php _e(' كود الاعلان الخامس : ','afdal'); ?></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <textarea class="form-control" name="post_advertisement_5" id="exampleFormControlTextarea1" rows="3"><?=$post_advertisement_5; ?></textarea>
            </div>
        </div>
    </div>
</div>


<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label  class="text-dark text-right" for="post_advertisement_6"><?php _e(' كود الاعلان السادس : ','afdal'); ?></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <textarea class="form-control" name="post_advertisement_6" id="exampleFormControlTextarea1" rows="3"><?=$post_advertisement_6; ?></textarea>
            </div>
        </div>
    </div>
</div>


<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label  class="text-dark text-right" for="post_advertisement_7"><?php _e(' كود الاعلان السابع : ','afdal'); ?></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <textarea class="form-control" name="post_advertisement_7" id="exampleFormControlTextarea1" rows="3"><?=$post_advertisement_7; ?></textarea>
            </div>
        </div>
    </div>
</div>


<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label  class="text-dark text-right" for="post_advertisement_8"><?php _e(' كود الاعلان الثامن : ','afdal'); ?></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <textarea class="form-control" name="post_advertisement_8" id="exampleFormControlTextarea1" rows="3"><?=$post_advertisement_8; ?></textarea>
            </div>
        </div>
    </div>
</div>


<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label  class="text-dark text-right" for="post_advertisement_9"><?php _e(' كود الاعلان التاسع : ','afdal'); ?></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <textarea class="form-control" name="post_advertisement_9" id="exampleFormControlTextarea1" rows="3"><?=$post_advertisement_9; ?></textarea>
            </div>
        </div>
    </div>
</div>


<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label  class="text-dark text-right" for="post_advertisement_10"><?php _e(' كود الاعلان العاشر : ','afdal'); ?></label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <textarea class="form-control" name="post_advertisement_10" id="exampleFormControlTextarea1" rows="3"><?=$post_advertisement_10; ?></textarea>
            </div>
        </div>
    </div>
</div>


<?php
}

add_action( 'save_post', 'afdal_save_custom_meta', 10, 2 );
function afdal_save_custom_meta($post_id){
//var_dump($_POST);die();
    $keys = ['afdal_list_posts','post_advertisement_1','post_advertisement_2','post_advertisement_3','post_advertisement_4','post_advertisement_5','post_advertisement_6','post_advertisement_7','post_advertisement_8','post_advertisement_9','post_advertisement_10'];

    foreach ($keys as $key) {

       if( isset($_POST[$key]) ){
            update_post_meta($post_id, $key, $_POST[$key]);
        }
        else
            if ($_POST[$key] === '')  {
               delete_post_meta($post_id,$key);

            }elseif (in_array($key, ['afdal_list_posts']) && !$_POST[$key]){
                delete_post_meta($post_id,$key);
            }
    }
//    $afdal_list_posts = get_post_meta( $post_id, 'afdal_list_posts', true );
//    foreach($afdal_list_posts as $afdal_list_post){
//        add_post_meta( $afdal_list_post, 'votes'.$post_id.'',0,true );
//    }

}


function wp_category_fields($term) {

    $custom_title        = get_term_meta($term->term_id, 'custom_title', true);
    ?>
    <tr class="form-field">
        <th valign="top" scope="row"><label for="term_fields[color_code]"><?php _e('Title'); ?></label></th>
        <td>
            <input type="text" size="40" value="<?=esc_attr($custom_title); ?>" id="term_fields[custom_title]" name="term_fields[custom_title]"><br/>
            <span class="description"><?php _e('Please enter Title Description Category Posts'); ?></span>
        </td>
    </tr>
    <?php
}

// Add the fields, using our callback function
// if you have other taxonomy name, replace category with the name of your taxonomy. ex: book_add_form_fields, book_edit_form_fields
add_action('category_add_form_fields', 'wp_category_fields', 10, 2);
add_action('category_edit_form_fields', 'wp_category_fields', 10, 2);

function wp_save_category_fields($term_id) {
    if (!isset($_POST['term_fields'])) {
        return;
    }

    foreach ($_POST['term_fields'] as $key => $value) {
        update_term_meta($term_id, $key, sanitize_text_field($value));
    }
}

// Save the fields values, using our callback function
// if you have other taxonomy name, replace category with the name of your taxonomy. ex: edited_book, create_book
add_action('edited_category', 'wp_save_category_fields', 10, 2);
add_action('create_category', 'wp_save_category_fields', 10, 2);

/*==============================================================*/

add_action( 'admin_menu', 'afdal_metabox_for_list' );
add_action( 'save_post', 'afdal_save_metaboxdata', 10, 2 );
