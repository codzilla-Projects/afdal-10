<?php 
function about_content_area_callback(){
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
			if(in_array($key,['about_content','mission_content','about_contact_content'])){
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
				<h1 class="text-center site-title">About Page Settings</h1>
			</header>
		</div>
		<br/>
		<div class="d-flex align-items-start p-0 m-0">
			<div class="nav flex-column nav-pills ms-3 col-sm-3 col-md-3 col-lg-3 rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<button class="nav-link active" id="v-pills-firstsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-firstsection" type="button" role="tab" aria-controls="v-pills-firstsection" aria-selected="true">First Section</button>
				<button class="nav-link" id="v-pills-secondsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-secondsection" type="button" role="tab" aria-controls="v-pills-secondsection" aria-selected="false">Second Section</button>
				<button class="nav-link" id="v-pills-thirdsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-thirdsection" type="button" role="tab" aria-controls="v-pills-thirdsection" aria-selected="false">Third Section</button>
			</div>
			<div class="tab-content col-sm-9 col-md-9 col-lg-9 gray_back" id="v-pills-tabContent">
				<form class="form-horizontal form_back p-5 rounded" method="post" action="#">
				    <div class="tab-content" id="v-pills-tabContent">
				        <div class="tab-pane fade show active" id="v-pills-firstsection" role="tabpanel" aria-labelledby="v-pills-firstsection-tab">
				        	<div class="form-group">

								<label for="about_title" class="col-sm-12 text-left  control-label text-white"><?php _e('About Title','afdal10') ?></label>

								<div class="col-sm-12 text-left ">

									<input type="text" class="form-control" id="about_title" name="about_title" value="<?= get_option('about_title'); ?>">

								</div>

							</div>
							<div class="form-group text-start">
                                <label for="about_content" class="control-label text-white">
                                    <?php _e('About Content','afdal10') ?>
                                </label>
                                <div class="col-sm-12">
                                    <?php wp_editor( get_option( 'about_content' ), 'about_content',  $wp_editor_settings);  ?>
                                </div>
                            </div>

							<div class="form-group">

							  	<label for="about_img" class="col-sm-12 text-left  control-label text-white"><?php _e('About Image','afdal10') ?></label>

							  	<div class="col-sm-12 text-left ">

							    	<input class="about_img_url site_half" type="text" name="about_img" size="60" value="<?= get_option('about_img'); ?>">

							    	<a href="#" class="about_img_upload btn btn-info">Choose</a>

							    	<?php if (!empty(get_option('about_img'))): ?>

							    	<img class="img-fluid img-thumbnail w-50 mt-2 about_img" src="<?= get_option('about_img'); ?>" height="100" style="max-width:100%" />

							    	<?php endif ?>

							  	</div>

							</div>
				        </div>
				        <div class="tab-pane fade" id="v-pills-secondsection" role="tabpanel" aria-labelledby="v-pills-secondsection-tab">
				        	<div class="form-group">

								<label for="mission_title" class="col-sm-12 text-left  control-label text-white"><?php _e('Mission Title','afdal10') ?></label>

								<div class="col-sm-12 text-left ">

									<input type="text" class="form-control" id="mission_title" name="mission_title" value="<?= get_option('mission_title'); ?>">

								</div>

							</div>
							<div class="form-group text-start">
                                <label for="mission_content" class="control-label text-white">
                                    <?php _e('Mission Content','afdal10') ?>
                                </label>
                                <div class="col-sm-12">
                                    <?php wp_editor( get_option( 'mission_content' ), 'mission_content',  $wp_editor_settings);  ?>
                                </div>
                            </div>

							<div class="form-group">

							  	<label for="mission_img" class="col-sm-12 text-left  control-label text-white"><?php _e('Mission Image','afdal10') ?></label>

							  	<div class="col-sm-12 text-left ">

							    	<input class="mission_img_url site_half" type="text" name="mission_img" size="60" value="<?= get_option('mission_img'); ?>">

							    	<a href="#" class="mission_img_upload btn btn-info">Choose</a>

							    	<?php if (!empty(get_option('mission_img'))): ?>

							    	<img class="img-fluid img-thumbnail w-50 mt-2 mission_img" src="<?= get_option('mission_img'); ?>" height="100" style="max-width:100%" />

							    	<?php endif ?>

							  	</div>

							</div>
					    </div>	      
						<div class="tab-pane fade" id="v-pills-thirdsection" role="tabpanel" aria-labelledby="v-pills-thirdsection-tab">
				        	<div class="form-group">

								<label for="about_contact_title" class="col-sm-12 text-left  control-label text-white"><?php _e('About Contact Title','afdal10') ?></label>

								<div class="col-sm-12 text-left ">

									<input type="text" class="form-control" id="about_contact_title" name="about_contact_title" value="<?= get_option('about_contact_title'); ?>">

								</div>

							</div>
							<div class="form-group text-start">
                                <label for="about_contact_content" class="control-label text-white">
                                    <?php _e('About Contact Content','afdal10') ?>
                                </label>
                                <div class="col-sm-12">
                                    <?php wp_editor( get_option( 'about_contact_content' ), 'about_contact_content',  $wp_editor_settings);  ?>
                                </div>
                            </div>

							<div class="form-group">

							  	<label for="about_contact_img" class="col-sm-12 text-left  control-label text-white"><?php _e('About Contact Background Image','afdal10') ?></label>

							  	<div class="col-sm-12 text-left ">

							    	<input class="about_contact_img_url site_half" type="text" name="about_contact_img" size="60" value="<?= get_option('about_contact_img'); ?>">

							    	<a href="#" class="about_contact_img_upload btn btn-info">Choose</a>

							    	<?php if (!empty(get_option('about_contact_img'))): ?>

							    	<img class="img-fluid img-thumbnail w-50 mt-2 about_contact_img" src="<?= get_option('about_contact_img'); ?>" height="100" style="max-width:100%" />

							    	<?php endif ?>

							  	</div>

							</div>

							<div class="form-group">

								<label for="about_contact_btn_txt" class="col-sm-12 text-left  control-label text-white"><?php _e('About Contact Button Text','afdal10') ?></label>

								<div class="col-sm-12 text-left ">

									<input type="text" class="form-control" id="about_contact_btn_txt" name="about_contact_btn_txt" value="<?= get_option('about_contact_btn_txt'); ?>">

								</div>

							</div>

							<div class="form-group">

								<label for="about_contact_btn_url" class="col-sm-12 text-left  control-label text-white"><?php _e('About Contact Button URL','afdal10') ?></label>

								<div class="col-sm-12 text-left ">

									<input type="text" class="form-control" id="about_contact_btn_url" name="about_contact_btn_url" value="<?= get_option('about_contact_btn_url'); ?>">

								</div>

							</div>
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