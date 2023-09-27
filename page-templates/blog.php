<?php

/*
Template Name: Unfiltered Blog
*/

get_header();

//get_template_part('/inc/base/interiorTop');
//get_template_part('/inc/base/GeneralClass');

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		//get_template_part( '/inc/base/contentPage' );
	endwhile;
endif;

?>
<?php 
get_footer();
