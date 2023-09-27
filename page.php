<?php

get_header();

get_template_part('/inc/base/interiorTop');
get_template_part('/inc/base/GeneralClass');

$structure = new GeneralClass();

$structure->openStructure('','');?>

<!-- <h1 class="sub-title"><?php the_title(); ?></h1> -->
<?php

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( '/inc/base/contentPage' );
	endwhile;
endif;

$structure->closeStructure();

get_footer();

?>