<?php

get_header();

get_template_part('/inc/base/interiorTop');
get_template_part('/inc/base/GeneralClass');

$structure = new GeneralClass();

$structure->openStructure('','index-page');

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( '/inc/base/contentPage' );
	endwhile;
endif;

$structure->closeStructure();

get_footer();

?>