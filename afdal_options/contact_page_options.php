<?php 
function contact_content_area_callback(){
	$wp_editor_settings = array( 
        'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), 
        'textarea_rows'=> 5,
        'drag_drop_upload'=> true,
        'wpautop' => false,
        'media_buttons'=> true,
        'class'=>'form-control'
    );    
	if( isset( $_POST['afdal_save'] ) && !empty( $_POST['afdal_save']) ){
		foreach ($_POST as $key => $value) {
			if(in_array($key,['contact_form'])){
				$value = stripcslashes($value);
			}				
			update_option( $key, $value);
		}
	}
?>
<div class="container-fluid text-left padding-right-4">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 bg-gray mt-3 mb-3 rounded">
			<!-- Top Navigation -->
			<header class="codrops-header">
				<h1 class="text-center site-title">Contact Page Settings</h1>
			</header>
		</div>
		<br/>
		<div class="d-flex align-items-center p-0 m-0">
			<div class="col-sm-12 col-md-12 col-lg-12" id="v-pills-tabContent">
				<form class="form-horizontal form_back no-margin-left p-5 rounded" method="post" action="#">
					<div class="form-group text-start">
                        <label for="contact_form" class="control-label text-white">
                            <?php _e('Contact Form 7 Shortcode','afdal10') ?>
                        </label>
                        <div class="col-sm-12">
                            <?php wp_editor( get_option( 'contact_form' ), 'contact_form',  $wp_editor_settings);  ?>
                        </div>
                    </div>

					<div class="form-group">
						<div class="col-sm-12">
							<input type="submit" class="btn btn-default btn-block btn-lg w-100 mt-3 site_save_route" name="afdal_save" value="Save Settings">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div><!-- /container -->
<?php
}