<?php

get_header();

get_template_part('/inc/base/interiorTop');
get_template_part('/inc/base/GeneralClass');

$structure = new GeneralClass();

$structure->openStructure('','single-page');

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_the_title();
		get_template_part( '/inc/base/contentPage' );

		// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	//comments_template();

	endwhile;
endif;

$structure->closeStructure();

get_footer();

?>