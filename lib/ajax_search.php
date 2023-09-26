<?php

/*
*Ajax search by redpishi.com
*/
add_shortcode( 'asearch', 'asearch_func' );
function asearch_func( $atts ) {
    $atts = shortcode_atts( array(
        'source' => 'page,item,list',
        'image' => 'true'
    ), $atts, 'asearch' );
static $asearch_first_call = 1;
$source = $atts["source"];
$image = $atts["image"];
$sForam = '<div class="search_bar">
    <form class="asearch" id="asearch'.$asearch_first_call.'" action="'.home_url('/').'" method="get" autocomplete="off">
        <input type="text" name="s" value="'.get_search_query().'"  placeholder="إبحث فى الموقع..." id="keyword" class="input_search" onkeyup="searchFetch(this)"><button id="mybtn"><i class="fa fa-search"></i></button>
    </form><div class="search_result" id="datafetch" style="display: none;">
        <ul>
            <li>من  فضلك انتظر ....</li>
        </ul>
    </div></div>';
$java = '<script>
function searchFetch(e) {
var datafetch = e.parentElement.nextSibling
if (e.value.trim().length > 0) { datafetch.style.display = "block"; } else { datafetch.style.display = "none"; }
const searchForm = e.parentElement;
e.nextSibling.value = "Please wait..."
var formdata'.$asearch_first_call.' = new FormData(searchForm);
formdata'.$asearch_first_call.'.append("source", "'.$source.'")
formdata'.$asearch_first_call.'.append("image", "'.$image.'")
formdata'.$asearch_first_call.'.append("action", "asearch")
AjaxAsearch(formdata'.$asearch_first_call.',e)
}
async function AjaxAsearch(formdata,e) {
  const url = "'.admin_url("admin-ajax.php").'?action=asearch";
  const response = await fetch(url, {
      method: "POST",
      body: formdata,
  });
  const data = await response.text();
if (data){  e.parentElement.nextSibling.innerHTML = data}else  {
e.parentElement.nextSibling.innerHTML = `<ul class="not-found"><li><a href="#">عذرا ، لم يتم العثور على شيء</a></li></ul>`
}}
document.addEventListener("click", function(e) { if (document.activeElement.classList.contains("input_search") == false ) { [...document.querySelectorAll("div.search_result")].forEach(e => e.style.display = "none") } else {if  (e.target.value.trim().length > 0) { e.target.parentElement.nextSibling.style.display = "block"}} })
</script>';
if ( $asearch_first_call == 1 ){
     $asearch_first_call++;
     return "{$sForam}{$java}"; } elseif  ( $asearch_first_call > 1 ) {
        $asearch_first_call++;
        return "{$sForam}"; }}

add_action('wp_ajax_asearch' , 'asearch');
add_action('wp_ajax_nopriv_asearch','asearch');
function asearch(){
    $the_query = new WP_Query( array( 'posts_per_page' => 10, 's' => esc_attr( $_POST['s'] ), 'post_type' =>  explode(",", esc_attr( $_POST['source'] )))  );
    if( $the_query->have_posts() ) :
        echo '<ul class="row">';
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
            <li class="col-md-6 col-sm-12">
                <a href="<?php echo esc_url( post_permalink() ); ?>">
                    <span><?php the_title();?> </span>
                    <img src="<?php the_post_thumbnail_url('thumbnail'); ?>">
                </a>
            </li>
        <?php endwhile;
       echo '</ul>';
        wp_reset_postdata();
    endif;
    die();
}


/*
***************************************
*/

/*
*Ajax search by redpishi.com
*/
add_shortcode( 'single_asearch', 'single_asearch_func' );
function single_asearch_func( $atts ) {
    $atts = shortcode_atts( array(
        'source' => 'page,item,list',
        'image' => 'true'
    ), $atts, 'single_asearch' );
static $single_asearch_first_call = 1;
$source = $atts["source"];
$image = $atts["image"];
$sForam = '<div class="search_bar">
    <form class="single_asearch" id="single_asearch'.$single_asearch_first_call.'" action="'.home_url('/').'" method="get" autocomplete="off">
        <input type="text" name="s" value="'.get_search_query().'" placeholder="إبحث فى الموقع..." id="keyword" class="input_search" onkeyup="searchFetch(this)"><button id="mybtn"><i class="fa fa-search"></i></button>
    </form><div class="search_result search_result_single" id="datafetch" style="display: none;">
        <ul>
            <li>من  فضلك انتظر ....</li>
        </ul>
    </div></div>';
$java = '<script>
function searchFetch(e) {
var datafetch = e.parentElement.nextSibling
if (e.value.trim().length > 0) { datafetch.style.display = "block"; } else { datafetch.style.display = "none"; }
const searchForm = e.parentElement;
e.nextSibling.value = "Please wait..."
var formdata'.$single_asearch_first_call.' = new FormData(searchForm);
formdata'.$single_asearch_first_call.'.append("source", "'.$source.'")
formdata'.$single_asearch_first_call.'.append("image", "'.$image.'")
formdata'.$single_asearch_first_call.'.append("action", "single_asearch")
Ajaxsingle_Asearch(formdata'.$single_asearch_first_call.',e)
}
async function Ajaxsingle_Asearch(formdata,e) {
  const url = "'.admin_url("admin-ajax.php").'?action=single_asearch";
  const response = await fetch(url, {
      method: "POST",
      body: formdata,
  });
  const data = await response.text();
if (data){  e.parentElement.nextSibling.innerHTML = data}else  {
e.parentElement.nextSibling.innerHTML = `<ul class="not-found"><li><a href="#">عذرا ، لم يتم العثور على شيء</a></li></ul>`
}}
document.addEventListener("click", function(e) { if (document.activeElement.classList.contains("input_search") == false ) { [...document.querySelectorAll("div.search_result")].forEach(e => e.style.display = "none") } else {if  (e.target.value.trim().length > 0) { e.target.parentElement.nextSibling.style.display = "block"}} })
</script>';
if ( $single_asearch_first_call == 1 ){
     $single_asearch_first_call++;
     return "{$sForam}{$java}"; } elseif  ( $single_asearch_first_call > 1 ) {
        $single_asearch_first_call++;
        return "{$sForam}"; }}

add_action('wp_ajax_single_asearch' , 'single_asearch');
add_action('wp_ajax_nopriv_single_asearch','single_asearch');
function single_asearch(){
    $the_query = new WP_Query( array( 'posts_per_page' => 10, 's' => esc_attr( $_POST['s'] ), 'post_type' =>  explode(",", esc_attr( $_POST['source'] )))  );
    if( $the_query->have_posts() ) :
        echo '<ul class="row">';
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
            <li class="col-md-12">
                <a href="<?php echo esc_url( post_permalink() ); ?>">
                    <span><?php the_title();?> </span>
                    <img src="<?php the_post_thumbnail_url('thumbnail'); ?>">
                </a>
            </li>
        <?php endwhile;
       echo '</ul>';
        wp_reset_postdata();
    endif;
    die();
}
