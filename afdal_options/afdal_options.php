<?php 



function main_content_area_callback(){



	$wp_editor_settings = array( 



		'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), // note that spaces in this list seem to cause an issue



		'textarea_rows'=> 2



	);    



	if( isset( $_POST['afdal_save'] ) && !empty( $_POST['afdal_save']) ){



		foreach ($_POST as $key => $value) {



			if(in_array($key,['footer_content'])){



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

						<h1 class="text-center site-title">General Settings</h1>

					</header>

				</div>

					<br/>

				<div class="d-flex align-items-start p-0 m-0">

					<div class="nav flex-column nav-pills ms-3 col-sm-3 col-md-3 col-lg-3 rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">

						<button class="nav-link active" id="v-pills-firstsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-firstsection" type="button" role="tab" aria-controls="v-pills-firstsection" aria-selected="true">Logos</button>

						<button class="nav-link" id="v-pills-sixthsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sixthsection" type="button" role="tab" aria-controls="v-pills-sixthsection" aria-selected="false">Colors</button>

						<button class="nav-link" id="v-pills-seventhsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-seventhsection" type="button" role="tab" aria-controls="v-pills-seventhsection" aria-selected="false">Fonts</button>

						<button class="nav-link" id="v-pills-secondsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-secondsection" type="button" role="tab" aria-controls="v-pills-secondsection" aria-selected="false">Contact</button>

						<button class="nav-link" id="v-pills-thirdsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-thirdsection" type="button" role="tab" aria-controls="v-pills-thirdsection" aria-selected="false">Social Media</button>

						<button class="nav-link" id="v-pills-fourthsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fourthsection" type="button" role="tab" aria-controls="v-pills-fourthsection" aria-selected="false">Footer</button>

					</div>

					<div class="tab-content col-sm-9 col-md-9 col-lg-9 gray_back" id="v-pills-tabContent">

						<form class="form-horizontal form_back p-5 rounded" method="post" action="#">



						    <div class="tab-content" id="v-pills-tabContent">



						        <div class="tab-pane fade show active" id="v-pills-firstsection" role="tabpanel" aria-labelledby="v-pills-firstsection-tab">



									<div class="form-group">

									  	<label for="afdal_header_logo_img" class="col-sm-12 text-left  control-label text-white">Header Logo</label>

									  	<div class="col-sm-12 text-left ">

									    	<input class="afdal_header_logo_img_url site_half" type="text" name="afdal_header_logo_img" size="60" value="<?= get_option('afdal_header_logo_img'); ?>">

									    	<a href="#" class="afdal_header_logo_img_upload btn btn-info">Choose</a>

									    	<?php if (!empty(get_option('afdal_header_logo_img'))): ?>

									    	<img class="img-fluid img-thumbnail w-50 mt-2 afdal_header_logo_img" src="<?= get_option('afdal_header_logo_img'); ?>" height="100" style="max-width:100%" />

									    	<?php endif ?>

									  	</div>

									</div>



									<div class="form-group">

									  	<label for="afdal_sticky_logo_img" class="col-sm-12 text-left  control-label text-white">Sticky Logo</label>

									  	<div class="col-sm-12 text-left ">

									    	<input class="afdal_sticky_logo_img_url site_half" type="text" name="afdal_sticky_logo_img" size="60" value="<?= get_option('afdal_sticky_logo_img'); ?>">

									    	<a href="#" class="afdal_sticky_logo_img_upload btn btn-info">Choose</a>

									    	<?php if (!empty(get_option('afdal_sticky_logo_img'))): ?>

									    	<img class="img-fluid img-thumbnail w-50 mt-2 afdal_sticky_logo_img" src="<?= get_option('afdal_sticky_logo_img'); ?>" height="100" style="max-width:100%" />

									    	<?php endif ?>

									  	</div>

									</div>



									<div class="form-group">

									  	<label for="afdal_favicon_img" class="col-sm-12 text-left  control-label text-white">Favicon Logo</label>

									  	<div class="col-sm-12 text-left ">

									    	<input class="afdal_favicon_img_url site_half" type="text" name="afdal_favicon_img" size="60" value="<?= get_option('afdal_favicon_img'); ?>">

									    	<a href="#" class="afdal_favicon_img_upload btn btn-info">Choose</a>

									    	<?php if (!empty(get_option('afdal_favicon_img'))): ?>

									    	<img class="img-fluid img-thumbnail w-50 mt-2 afdal_favicon_img" src="<?= get_option('afdal_favicon_img'); ?>" height="100" style="max-width:100%" />

									    	<?php endif ?>

									  	</div>

									</div>

						        </div>

						        <div class="tab-pane fade" id="v-pills-sixthsection" role="tabpanel" aria-labelledby="v-pills-sixthsection-tab">



									<div class="form-group">

										<label for="afdal_primaryColor" class="col-sm-12 text-left  control-label text-white">Primary Color</label>

										<div class="col-sm-12 text-left d-flex align-items-center justify-content-start">

											<input type="color" class="form-control afdal-color" id="afdal_primaryColor" name="afdal_primaryColor" value="<?= get_option('afdal_primaryColor'); ?>">

											<div class="text-white ms-2"><?= get_option('afdal_primaryColor'); ?></div>



										</div>

									</div>	



									<div class="form-group">

										<label for="afdal_secondaryColor" class="col-sm-12 text-left  control-label text-white">Secondary Color</label>

										<div class="col-sm-12 text-left d-flex align-items-center justify-content-start">

											<input type="color" class="form-control afdal-color" id="afdal_secondaryColor" name="afdal_secondaryColor" value="<?= get_option('afdal_secondaryColor'); ?>">

											<div class="text-white ms-2"><?= get_option('afdal_secondaryColor'); ?></div>

										</div>

									</div>



									<div class="form-group">

										<label for="afdal_thirdColor" class="col-sm-12 text-left  control-label text-white">Third Color</label>

										<div class="col-sm-12 text-left d-flex align-items-center justify-content-start">

											<input type="color" class="form-control afdal-color" id="afdal_thirdColor" name="afdal_thirdColor" value="<?= get_option('afdal_thirdColor'); ?>">

											<div class="text-white ms-2"><?= get_option('afdal_thirdColor'); ?></div>

										</div>

									</div>



							    </div>



							    <div class="tab-pane fade" id="v-pills-seventhsection" role="tabpanel" aria-labelledby="v-pills-seventhsection-tab">

							    	<div class="form-group">



										<label for="afdal_font_url" class="col-sm-12 text-left  control-label text-white">Google Font Url</label>



										<div class="col-sm-12 text-left ">



											<input type="text" class="form-control" id="afdal_font_url" name="afdal_font_url" value="<?= get_option('afdal_font_url'); ?>">



										</div>



									</div>



									<div class="form-group">



										<label for="afdal_font_name" class="col-sm-12 text-left  control-label text-white">Google Font Name</label>



										<div class="col-sm-12 text-left ">



											<input type="text" class="form-control" id="afdal_font_name" name="afdal_font_name" value="<?= get_option('afdal_font_name'); ?>">



										</div>



									</div>



							    </div>



						        <div class="tab-pane fade" id="v-pills-secondsection" role="tabpanel" aria-labelledby="v-pills-secondsection-tab">



									<div class="form-group">

										<label for="afdal_phone" class="col-sm-12 text-left  control-label text-white">Phone Number</label>

										<div class="col-sm-12 text-left ">

											<input type="text" class="form-control" id="afdal_phone" name="afdal_phone" value="<?= get_option('afdal_phone'); ?>">

										</div>

									</div>	



									<div class="form-group">

										<label for="afdal_email" class="col-sm-12 text-left  control-label text-white">E-mali Address</label>

										<div class="col-sm-12 text-left ">

											<input type="email" class="form-control text-left" id="afdal_email" name="afdal_email" value="<?= get_option('afdal_email'); ?>">

										</div>

									</div>



									<div class="form-group">

										<label for="afdal_location" class="col-sm-12 text-left  control-label text-white">Location</label>

										<div class="col-sm-12 text-left ">

											<input type="text" class="form-control text-left" id="afdal_location" name="afdal_location" value="<?= get_option('afdal_location'); ?>">

										</div>

									</div>



									<div class="form-group">

										<label for="afdal_map" class="col-sm-12 text-left  control-label text-white">Google Map</label>

										<div class="col-sm-12 text-left ">

											<input type="text" class="form-control text-left" id="afdal_map" name="afdal_map" value="<?= get_option('afdal_map'); ?>">

										</div>

									</div>



							    </div>	      



								<div class="tab-pane fade" id="v-pills-thirdsection" role="tabpanel" aria-labelledby="v-pills-thirdsection-tab">



									<div class="form-group">



										<label for="afdal_fb" class="col-sm-12 text-left  control-label text-white">Facebook</label>



										<div class="col-sm-12 text-left ">



											<input type="text" class="form-control" id="afdal_fb" name="afdal_fb" value="<?= get_option('afdal_fb'); ?>">



										</div>



									</div>



									<div class="form-group">



										<label for="afdal_twitter" class="col-sm-12 text-left  control-label text-white">Twitter</label>



										<div class="col-sm-12 text-left ">



											<input type="text" class="form-control" id="afdal_twitter" name="afdal_twitter" value="<?= get_option('afdal_twitter'); ?>">



										</div>



									</div>



									<div class="form-group">



										<label for="afdal_youtube" class="col-sm-12 text-left  control-label text-white">Youtube</label>



										<div class="col-sm-12 text-left ">



											<input type="text" class="form-control" id="afdal_youtube" name="afdal_youtube" value="<?= get_option('afdal_youtube'); ?>">



										</div>



									</div>



									<div class="form-group">



										<label for="afdal_insta" class="col-sm-12 text-left  control-label text-white">Instagram</label>



										<div class="col-sm-12 text-left ">



											<input type="text" class="form-control" id="afdal_insta" name="afdal_insta" value="<?= get_option('afdal_insta'); ?>">



										</div>



									</div>



									<div class="form-group">



										<label for="afdal_linkedin" class="col-sm-12 text-left  control-label text-white">Linked In</label>



										<div class="col-sm-12 text-left ">



											<input type="text" class="form-control" id="afdal_linkedin" name="afdal_linkedin" value="<?= get_option('afdal_linkedin'); ?>">



										</div>



									</div>



									<div class="form-group">



										<label for="afdal_whatsapp" class="col-sm-12 text-left  control-label text-white">Whats App</label>



										<div class="col-sm-12 text-left ">



											<input type="text" class="form-control" id="afdal_whatsapp" name="afdal_whatsapp" value="<?= get_option('afdal_whatsapp'); ?>">



										</div>



									</div>



								</div>

								<div class="tab-pane fade show" id="v-pills-fourthsection" role="tabpanel" aria-labelledby="v-pills-fourthsection-tab">



									<div class="form-group">

									  	<label for="afdal_footer_logo_img" class="col-sm-12 text-left  control-label text-white">Footer Logo</label>

									  	<div class="col-sm-12 text-left ">

									    	<input class="afdal_footer_logo_img_url site_half" type="text" name="afdal_footer_logo_img" size="60" value="<?= get_option('afdal_footer_logo_img'); ?>">

									    	<a href="#" class="afdal_footer_logo_img_upload btn btn-info">Choose</a>

									    	<?php if (!empty(get_option('afdal_footer_logo_img'))): ?>

									    	<img class="img-fluid img-thumbnail w-50 mt-2 afdal_footer_logo_img bg-dark" src="<?= get_option('afdal_footer_logo_img'); ?>" height="100" style="max-width:100%" />

									    	<?php endif ?>

									  	</div>

									</div>



									<div class="form-group text-left">

										<label for="footer_content" class="col-sm-6 control-label text-white">Footer Content</label>

										<div class="col-sm-12">

			                				<?php wp_editor( get_option('footer_content'), 'footer_content',  array('textarea_rows'=>5,'textarea_name'=> 'footer_content', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'footer_content','class'=>'form-control',) );  ?>

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