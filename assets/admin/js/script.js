jQuery(document).ready(function($) {

    $('.afdal_header_logo_img_upload').click(function(e) {

        e.preventDefault();

        var custom_uploader = wp.media({

            title: 'Image Choose',

            button: {

                text: 'Upload Image'

            },

            multiple: false  // Set this to true to allow multiple files to be  selected

        })

        .on('select', function() {

            var attachment = custom_uploader.state().get('selection').first().toJSON();

            $('.afdal_header_logo_img').attr('src', attachment.url);

            $('.afdal_header_logo_img_url').val(attachment.url);

        })

        .open();

    });  



    $('.afdal_sticky_logo_img_upload').click(function(e) {

        e.preventDefault();

        var custom_uploader = wp.media({

            title: 'Image Choose',

            button: {

                text: 'Upload Image'

            },

            multiple: false  // Set this to true to allow multiple files to be  selected

        })

        .on('select', function() {

            var attachment = custom_uploader.state().get('selection').first().toJSON();

            $('.afdal_sticky_logo_img').attr('src', attachment.url);

            $('.afdal_sticky_logo_img_url').val(attachment.url);

        })

        .open();

    }); 



    $('.afdal_favicon_img_upload').click(function(e) {

        e.preventDefault();

        var custom_uploader = wp.media({

            title: 'Image Choose',

            button: {

                text: 'Upload Image'

            },

            multiple: false  // Set this to true to allow multiple files to be  selected

        })

        .on('select', function() {

            var attachment = custom_uploader.state().get('selection').first().toJSON();

            $('.afdal_favicon_img').attr('src', attachment.url);

            $('.afdal_favicon_img_url').val(attachment.url);

        })

        .open();

    }); 



    $('.afdal_footer_logo_img_upload').click(function(e) {

        e.preventDefault();

        var custom_uploader = wp.media({

            title: 'Image Choose',

            button: {

                text: 'Upload Image'

            },

            multiple: false  // Set this to true to allow multiple files to be  selected

        })

        .on('select', function() {

            var attachment = custom_uploader.state().get('selection').first().toJSON();

            $('.afdal_footer_logo_img').attr('src', attachment.url);

            $('.afdal_footer_logo_img_url').val(attachment.url);

        })

        .open();

    });

    $('.afdal_search_bg_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })

        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.afdal_search_bg_img').attr('src', attachment.url);
            $('.afdal_search_bg_img_url').val(attachment.url);
        })
        .open();
    }); 
    $('.about_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })

        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.about_img').attr('src', attachment.url);
            $('.about_img_url').val(attachment.url);
        })
        .open();
    }); 
    $('.mission_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })

        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.mission_img').attr('src', attachment.url);
            $('.mission_img_url').val(attachment.url);
        })
        .open();
    }); 
    $('.about_contact_img_upload').click(function(e) {
        e.preventDefault();
        var custom_uploader = wp.media({
            title: 'Image Choose',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be  selected
        })

        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.about_contact_img').attr('src', attachment.url);
            $('.about_contact_img_url').val(attachment.url);
        })
        .open();
    }); 
});

   