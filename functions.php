<?php

/**
 * Elevation theme functions and definitions
 * @package elevation_theme
 */

/* -------------------------------------------------  */

/*	A custom WordPress nav walker class to fully
	implement the Twitter Bootstrap 4.0+ 
	navigation style.  
*/

require_once( 'wp_bootstrap_navwalker.php' );

/* -------------------------------------------------  */

/* Widgets for homepage and/or sidebars.  */

function register_sidebar_init() {

}

add_action('widgets_init', 'register_sidebar_init');

/* -------------------------------------------------  */


/* Separate all the content into diferents sections.  */

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page( array(
	    'page_title'  => 'Theme General Settings',
	    'menu_title'  => 'Edit Content',
	    'menu_slug'   => 'theme-general-settings',
	    'capability'  => 'edit_posts',
	    'redirect'    => true
	));

	acf_add_options_sub_page( array(
		'page_title' 	=> 'Theme Default Settings',
		'menu_title'	=> 'Default',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page( array(
		'page_title' 	=> 'Theme Social Networks Settings',
		'menu_title'	=> 'Social Networks',
		'parent_slug'	=> 'theme-general-settings',
	));	

	acf_add_options_sub_page( array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));	

	acf_add_options_sub_page( array(
		'page_title' 	=> 'Theme Home Settings',
		'menu_title'	=> 'Home',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page( array(
		'page_title' 	=> 'Theme Boxes Settings',
		'menu_title'	=> 'Boxes',
		'parent_slug'	=> 'theme-general-settings',
	));	

	acf_add_options_sub_page( array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

}

/* -------------------------------------------------  */

/* Different Images Resolutions. */

add_image_size( 'hd', 1920, 1080 );
add_image_size( 'lg', 900, 600 );
add_image_size( 'md', 600, 400 );

/* -------------------------------------------------  */

/* This feature enables plugins and themes to manage 
the document title tag. This should be used in place 
of wp_title() function. */

add_theme_support( 'title-tag' );

/* -------------------------------------------------  */	

/* Set up the WordPress core custom logo.  */

add_theme_support( 'custom-logo' );

/* -------------------------------------------------  */	

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

/* Set up the WordPress core post thumbnail. */

add_theme_support( 'post-thumbnails' );

/* -------------------------------------------------  */	

/* Register Menus for header and footer. */

function register_my_menus() {
	register_nav_menus(
	    array(
	    	'header-menu' => __( 'Header Menu' ),
	    	'footer-menu' => __( 'Footer Menu' ),
	    )
	);
}

add_action( 'init', 'register_my_menus' );

/* -------------------------------------------------  */

/* Add list class to ul items.  */

add_filter('wp_insert_post_data', 'my_add_ul_class_on_insert');

function my_add_ul_class_on_insert( $postarr ) {
	$postarr['post_content'] = str_replace('<ul>', '<ul class="list">', $postarr['post_content'] );
	return $postarr;
}

/* -------------------------------------------------  */

/* Limit post content. */	

function excerpt( $limit ) {

	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if ( count( $excerpt ) >= $limit ) {
    	array_pop( $excerpt );
    	$excerpt = implode( " ", $excerpt ) . '...';
  	} else {
    	$excerpt = implode( " ", $excerpt );
  	}

  	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

  	return $excerpt;
}

/* Excerpt String. */	

function excerpt_string( $string, $limit ) {
	
	$excerpt_string = explode( ' ', $string, $limit );

	if ( count( $excerpt_string ) >= $limit ) {
    	array_pop( $excerpt_string );
    	$excerpt_string = implode( " ", $excerpt_string ) . '...';
  	} else {
    	$excerpt_string = implode( " ", $excerpt_string );
  	} 

  	$excerpt_string = preg_replace( '`\[[^\]]*\]`', '', $excerpt_string );

	return $excerpt_string;
}

/* -------------------------------------------------  */

/* Limit any text content. */	

function limit_text($text, $limit) {

	if ( str_word_count( $text, 0 ) > $limit ) {
		$words = str_word_count( $text, 2 );
		$pos   = array_keys( $words );
		$text  = substr( $text, 0, $pos[$limit] ) . '...';
	}

  	return $text;
}

/* -------------------------------------------------  */

/* this array is for paginators . */

$args = array(
   'base'               => '%_%',
   'format'             => '?paged=%#%',
   'total'              => 1,
   'current'            => 0,
   'show_all'           => false,
   'end_size'           => 1,
   'mid_size'           => 2,
   'add_args'           => false,
   'add_fragment'       => '',
   'before_page_number' => '',
   'after_page_number'  => ''
); 

/* -------------------------------------------------  */

function disable_plugin_updates( $value ) {
	if ( isset($value) && is_object($value) ) {
		if ( isset( $value->response['ajax-search-pro/ajax-search-pro.php'] ) ) {
			unset( $value->response['ajax-search-pro/ajax-search-pro.php'] );
		}
	}
	return $value;
}

add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );

	/* Required Plugins */

require_once dirname( __FILE__ ) . '/inc/base/pluginActivation.php';

add_action( 'tgmpa_register', 'elevation_register_required_plugins' );

function elevation_register_required_plugins() {

	$plugins = array(

    array(
        'name'                  => 'AddToAny Share Buttons', 
        'slug'                  => 'add-to-any', 
        'source'                => get_template_directory() .'/inc/plugins/add-to-any.zip',
        'required'              => true, 
        'force_activation'      => true,
        'force_deactivation'    => false, 
        'external_url'          => '', 
    ),	

    array(
        'name'                  => 'Advanced Custom Fields PRO', 
        'slug'                  => 'advanced-custom-fields-pro', 
        'source'                => get_template_directory() .'/inc/plugins/advanced-custom-fields-pro.zip',
        'required'              => true, 
        'force_activation'      => true,
        'force_deactivation'    => false, 
        'external_url'          => '', 
    ),

    array(
        'name'                  => 'Custom Post Type UI', 
        'slug'                  => 'custom-post-type-ui', 
        'source'                => get_template_directory() .'/inc/plugins/custom-post-type-ui.zip',
        'required'              => true, 
        'force_activation'      => true,
        'force_deactivation'    => false, 
        'external_url'          => '', 
    ),

    array(
        'name'                  => 'Advanced Custom Fields: Font Awesome', 
        'slug'                  => 'advanced-custom-fields-font-awesome', 
        'source'                => get_template_directory() .'/inc/plugins/advanced-custom-fields-font-awesome.zip',
        'required'              => true, 
        'force_activation'      => true,
        'force_deactivation'    => false, 
        'external_url'          => '', 
    ),

    array(
        'name'                  => 'Smush', 
        'slug'                  => 'wp-smushit', 
        'source'                => get_template_directory() .'/inc/plugins/wp-smushit.zip',
        'required'              => true, 
        'force_activation'      => true,
        'force_deactivation'    => false, 
        'external_url'          => '', 
    ),

    array(
        'name'                  => 'Browser Update', 
        'slug'                  => 'wp-browser-update', 
        'source'                => get_template_directory() .'/inc/plugins/wp-browser-update.zip',
        'required'              => true, 
        'force_activation'      => true,
        'force_deactivation'    => false, 
        'external_url'          => '', 
    ),

    array(
        'name'                  => 'Search Exclude', 
        'slug'                  => 'search-exclude', 
        'source'                => get_template_directory() .'/inc/plugins/search-exclude.zip',
        'required'              => true, 
        'force_activation'      => true,
        'force_deactivation'    => false, 
        'external_url'          => '', 
    )            	        	        	        	        	        	        	        		

	);

	$config = array(
		'id'           => 'elevation',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',         

	);

	tgmpa( $plugins, $config );

}	

	/* -------------------------------------------------  */

  function theme_files(){
		wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.10.1/css/all.css');  
}
add_action( 'wp_enqueue_scripts', 'theme_files' );

/* Scripts Loader */	

function atuladoScripts() {

	wp_enqueue_script("jquery");

	wp_enqueue_style( 'atuladoBootstrapCss',
	'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');			

	wp_enqueue_style( 'atuladoStyle',
	get_template_directory_uri() . '/assets/css/style.css');

	wp_enqueue_style( 'atuladoFontAwesomeCss',
	get_template_directory_uri() . '/assets/css/all.min.css');

  wp_enqueue_style( 'atuladoCustomCss',
  get_template_directory_uri() . '/assets/css/custom.css');

	//wp_enqueue_script( 'kids4PeaceFontAwesomeJs','https://kit.fontawesome.com/2b6c4935bd.js', array( 'jquery' ), '', true);	
	// wp_enqueue_script( 'kids4PeaceFontAwesomeJs',get_template_directory_uri() . '/assets/js/all.min.js', array( 'jquery' ), '', true);	
	
	// wp_enqueue_script( 'atuladoJqueryMin',
	// 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js',
	// array( 'jquery' ), '', true);				

	wp_enqueue_script( 'atuladoJqueryMobile',
	get_template_directory_uri() . '/assets/js/jquery.mobile.custom.min.js',
	array( 'jquery' ), '', true);										

	wp_enqueue_script( 'atuladoBootstrapJquery',
	'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
	array( 'jquery' ), '', true);

	wp_enqueue_script( 'atuladoMainJs',
	get_template_directory_uri() . '/assets/js/main.js',
	array( 'jquery' ), '', true );		

	wp_enqueue_script( 'atuladoMainHeightBox',
	get_template_directory_uri() . '/assets/js/main-height-box.js',
	array( 'jquery' ), '', true );				

	wp_enqueue_script( 'atuladoMasonry',
	get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js',
	array( 'jquery' ), '', true );				

}

add_action( 'wp_enqueue_scripts', 'atuladoScripts' );

function add_query_vars_filter( $vars ) {
  $vars[] = "pg";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );


add_shortcode( 'blog_feeds', 'blog_feeds_func' );
function blog_feeds_func( $atts ) {
  $a = shortcode_atts( array(
    'perpage' => 10
  ), $atts );
  $perpage = (isset($a['perpage']) && $a['perpage']) ? $a['perpage'] : 10;
  $paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
  $args = array(
    'posts_per_page'=> $perpage,
    'post_type'   => 'post',
    'post_status' => 'publish',
    'paged'     => $paged
  );
  $output = '';
  ob_start();
  $blogs = new WP_Query($args);
  if ( $blogs->have_posts() ) { ?>
  <div class="blog-feeds">
    <div class="content-page">

      <div class="articles">
        <?php while ( $blogs->have_posts() ) : $blogs->the_post(); ?>
          <article class="article-<?php the_ID() ?> <?php echo ( get_the_post_thumbnail() ) ? 'has-image':'no-image'?> animated fadeIn">
            <div class="inner">
              <?php if ( get_the_post_thumbnail() ) { ?>
              <figure class="featimage" style="background-image:url('<?php echo get_the_post_thumbnail_url() ?>')">
                <?php the_post_thumbnail() ?>
              </figure> 
              <?php } else { ?>
              <figure class="noimage"></figure>
              <?php } ?>
              <div class="text">
                <h2><?php the_title() ?></h2>
                <div class="excerpt"><?php the_excerpt() ?></div>
                <div class="postlink">
                  <a href="<?php echo get_permalink() ?>">Learn More</a>
                </div>
              </div>
            </div>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>

      <?php  
      $total_pages = $blogs->max_num_pages;
      if ($total_pages > 1) {
      ?>
      <div class="loadmore">
          <a href="javascript:void(0)" class="loadmore-button" data-baseurl="<?php echo get_permalink(); ?>" data-totalpages="<?php echo $total_pages ?>" data-next="2">Load More</a>
      </div>
      <?php } ?>
    </div>
    <div id="hidden-content" style="display:none"></div>
  </div>
  <?php } 

  $output = ob_get_contents();
  ob_end_clean();

  return $output;
}



/* -------------------------------------------------  */