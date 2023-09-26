<?php

/************************
** create Custom Taxonomies for portfolio post type
************************/
add_action( 'init', 'afdal_custom_tax', 0 );
function afdal_custom_tax()
{
    $my_taxonomies = array(
        array(
          'labels' => array(
            'name' => _x( 'Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Category', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Categories','codzilla' ),
            'popular_items' => __( 'Popular Categories' ,'codzilla'),
            'all_items' => __( 'All Categories' ),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Category' ),
            'update_item' => __( 'Update Category' ),
            'add_new_item' => __( 'Add New Category' ),
            'new_item_name' => __( 'New Category' ),
            'separate_items_with_commas' => __( 'Separate Categories with commas' ),
            'add_or_remove_items' => __( 'Add or remove Category' ),
            'choose_from_most_used' => __( 'Choose from the most used Categories' ),
            'menu_name' => __( 'Categories' ),
          ),
          'tax_name' => 'list_category',
          'post_types' =>  array('list'),
          'slug' => 'list-category'
        ),
        array(
          'labels' => array(
            'name' => _x( 'Tag', 'taxonomy general name' ),
            'singular_name' => _x( 'Category', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Tag','codzilla' ),
            'popular_items' => __( 'Popular Tag' ,'codzilla'),
            'all_items' => __( 'All Tag' ),
            'parent_item' => __('Parent'),
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Category' ),
            'update_item' => __( 'Update Category' ),
            'add_new_item' => __( 'Add New Category' ),
            'new_item_name' => __( 'New Category' ),
            'separate_items_with_commas' => __( 'Separate Tag with commas' ),
            'add_or_remove_items' => __( 'Add or remove Category' ),
            'choose_from_most_used' => __( 'Choose from the most used Tag' ),
            'menu_name' => __( 'Tag' ),
          ),
          'tax_name' => 'list_tag',
          'post_types' =>  array('list','item'),
          'slug' => 'list-tag'
        ),
    );

  // Add new taxonomy, NOT hierarchical (like tags)
    foreach ($my_taxonomies as $tax) {
      register_taxonomy($tax['tax_name'],$tax['post_types'],array(
        'hierarchical' => true,
        'labels' => $tax['labels'],
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => $tax['slug'] ),
      ));
    }
}
// Add Upload fields to "create Taxonomy" form
function afdal_list_category_brand_add_meta_field($term)
{

    // put the term ID into a variable
    $t_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option("category_$t_id"); ?>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="_brand_image"><?php _e('Home Page Image', 'afdal'); ?></label></th>
        <td>
            <?php
            $brandimage = esc_attr($term_meta['image']) ? esc_attr($term_meta['image']) : '';
            ?>
            <input type="text" name="brand_image[image]" id="brand_image[image]" class="brand-image" value="<?php echo $brandimage; ?>">
            <input class="upload_image_button button" name="_brand_image" id="_brand_image" type="button" value="Select/Upload Image" />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td style="height: 150px;">
            <style>
                div.img-wrap img {
                    width: 150px;
                }
            </style>
            <?php if (!empty($brandimage)) :?>
            <div class="img-wrap">
                <img src="<?php echo $brandimage; ?>" id="brand-img">
            </div>
            <?php endif ?>
            <script>
                jQuery(document).ready(function() {
                    jQuery('#_brand_image').click(function() {
                        wp.media.editor.send.attachment = function(props, attachment) {
                            jQuery('#brand-img').attr("src", attachment.url)
                            jQuery('.brand-image').val(attachment.url)
                        }
                        wp.media.editor.open(this);
                        return false;
                    });
                });
            </script>
        </td>
    </tr>
<?php
}
add_action('list_category_add_form_fields', 'afdal_list_category_brand_add_meta_field', 10, 2);
// Add Upload fields to "Edit Taxonomy" form
function afdal_list_category_brand_edit_meta_field($term)
{

    // put the term ID into a variable
    $t_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option("category_$t_id"); ?>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="_brand_image"><?php _e('Home Page Image', 'afdal'); ?></label></th>
        <td>
            <?php
            $brandimage = esc_attr($term_meta['image']) ? esc_attr($term_meta['image']) : '';
            ?>
            <input type="text" name="brand_image[image]" id="brand_image[image]" class="brand-image" value="<?php echo $brandimage; ?>">
            <input class="upload_image_button button" name="_brand_image" id="_brand_image" type="button" value="Select/Upload Image" />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td style="height: 150px;">
            <style>
                div.img-wrap img {
                    width: 150px;
                }
            </style>
            <?php if (!empty($brandimage)) :?>
            <div class="img-wrap">
                <img src="<?php echo $brandimage; ?>" id="brand-img">
            </div>
            <?php endif ?>
            <script>
                jQuery(document).ready(function() {
                    jQuery('#_brand_image').click(function() {
                        wp.media.editor.send.attachment = function(props, attachment) {
                            jQuery('#brand-img').attr("src", attachment.url)
                            jQuery('.brand-image').val(attachment.url)
                        }
                        wp.media.editor.open(this);
                        return false;
                    });
                });
            </script>
        </td>
    </tr>
<?php
}
add_action('list_category_edit_form_fields', 'afdal_list_category_brand_edit_meta_field', 10, 2);

// Save Taxonomy Image fields callback function.
function save_list_category_brand_custom_meta($term_id)
{
    if (isset($_POST['brand_image'])) {
        $t_id = $term_id;
        $term_meta = get_option("category_$t_id");
        $cat_keys = array_keys($_POST['brand_image']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['brand_image'][$key])) {
                $term_meta[$key] = $_POST['brand_image'][$key];
            }
        }
        // Save the option array.
        update_option("category_$t_id", $term_meta);
    }
}
add_action('edited_list_category', 'save_list_category_brand_custom_meta', 10, 2);
add_action('create_list_category', 'save_list_category_brand_custom_meta', 10, 2);
