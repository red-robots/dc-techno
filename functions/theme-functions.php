<?php
// This theme uses wp_nav_menu() in one location.

register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );
register_nav_menu( 'sitemap', __( 'Sitemap Menu', 'twentytwelve' ) );
	
// This theme uses a custom image size for featured images, displayed on "standard" posts.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
add_image_size('homelogo', 300, 9999);
add_image_size('homepic', 500, 218, array('center','center'));

/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 a {
  	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
  	background-size: 327px 67px;
  	width: 327px;
  	height: 67px;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
	return the_permalink();
}
add_filter('login_headerurl','loginpage_custom_link');

/*-------------------------------------
	Favicon.
---------------------------------------*/
function mytheme_favicon() { 
 echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >'; 
} 
add_action('wp_head', 'mytheme_favicon');

/*-------------------------------------
	Product Excerpt.
---------------------------------------*/
function get_product_excerpt($count){
  // whatever you want to append on the end of the last word
  $words = '...';
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = wp_trim_words($excerpt, $count, $words);
  return $excerpt;
}
function edit_admin_menus() {
    global $menu;
     
    $menu[5][0] = 'Blog'; // Change Posts to Recipes
}
add_action( 'admin_menu', 'edit_admin_menus' );

/* Adds an Options page to your Dashboard */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}