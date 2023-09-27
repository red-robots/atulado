<?php

get_header();

get_template_part('/inc/base/interiorTop');
get_template_part('/inc/base/GeneralClass');

$structure = new GeneralClass();

$structure->openStructure('','404-page');

?> 
	<div class="fourerror">
		<i class="fa fa-exclamation-circle"></i>
		<h3>404</h3>
		<h4>whoops, our bad..</h4>
		<p>Sorry, the page you were looking for doesn't exist.  Try searching for your content in the box below, or click to go back to the <a href ="/">HOME</a> page.</p>
		<div class="search">
			<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div>
					<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
					<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
				</div>
			</form>
		</div> 
	</div>

<?php

$structure->closeStructure();

get_footer();

?>