<?php

/*
Template Name: Programs
*/

get_header();

get_template_part('/inc/base/interiorTop');
get_template_part('/inc/base/GeneralClass');

$structure = new GeneralClass();

$structure->openStructure('s1','programs-page');

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( '/inc/base/contentPage' );
	endwhile;
endif;

?>

<div class="filter-wrap mb-5 mt-5">
    <div class="metadata-filter">
		<?php echo do_shortcode('[mdf_search_form id="139"]'); ?>                        
    </div>
    <div class="ajax-filter">
		<?php echo do_shortcode('[wpdreams_ajaxsearchpro id=1]'); ?>                          
    </div>
</div>

<?php 

echo do_shortcode('[mdf_results_by_ajax shortcode="mdf_custom template=any/my_posts post_type=locations orderby=date order=desc page=1 per_page=6" pagination=b]');

$structure->closeStructure();

get_footer();

?>