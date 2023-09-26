<?php 



function home_content_area_callback(){



	$wp_editor_settings = array( 



		'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), // note that spaces in this list seem to cause an issue



		'textarea_rows'=> 2



	);    



	if( isset( $_POST['afdal_save'] ) && !empty( $_POST['afdal_save']) ){



		foreach ($_POST as $key => $value) {



			if(in_array($key,[])){



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
				<h1 class="text-center site-title">Home Page Settings</h1>
			</header>
		</div>
		<br/>
		<div class="d-flex align-items-start p-0 m-0">
			<div class="nav flex-column nav-pills ms-3 col-sm-3 col-md-3 col-lg-3 rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">

				<button class="nav-link active" id="v-pills-firstsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-firstsection" type="button" role="tab" aria-controls="v-pills-firstsection" aria-selected="true">Search Section</button>
			</div>

			<div class="tab-content col-sm-9 col-md-9 col-lg-9 gray_back" id="v-pills-tabContent">
				<form class="form-horizontal form_back p-5 rounded" method="post" action="#">
				    <div class="tab-content" id="v-pills-tabContent">
				        <div class="tab-pane fade show active" id="v-pills-firstsection" role="tabpanel" aria-labelledby="v-pills-firstsection-tab">

							<div class="form-group">

							  	<label for="afdal_search_bg_img" class="col-sm-12 text-left  control-label text-white">Background Image Search Section</label>

							  	<div class="col-sm-12 text-left ">

							    	<input class="afdal_search_bg_img_url site_half" type="text" name="afdal_search_bg_img" size="60" value="<?= get_option('afdal_search_bg_img'); ?>">

							    	<a href="#" class="afdal_search_bg_img_upload btn btn-info">Choose</a>

							    	<?php if (!empty(get_option('afdal_search_bg_img'))): ?>

							    	<img class="img-fluid img-thumbnail w-50 mt-2 afdal_search_bg_img" src="<?= get_option('afdal_search_bg_img'); ?>" height="100" style="max-width:100%" />

							    	<?php endif ?>

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