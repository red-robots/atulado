<?php

get_header();

get_template_part('/inc/base/interiorTop');
get_template_part('/inc/base/GeneralClass');

$structure = new GeneralClass();

$structure->openStructure('','category-page');

?> 
	<div class="blog-widget">

		<div class="filter-category filter-wrap">

		    <?php 
				echo do_shortcode( '[wd_asp id=2]' );
		 		$terms = get_terms( 'category', array(
					'hide_empty' => 0,
				));
			?>

			<select id="blog-categories">
		        <?php
					foreach ( $terms as $term ):
		 				if ( $term->parent !== 0 ):
		 					$slug = site_url().'/category/blog/'.$term->slug.'/';
		 				else:
		 					$slug = site_url().'/category/'.$term->slug.'/';
		 				endif;
		    	?>
						<option value="<?php echo $slug; ?>"><?php echo $term->name; ?></option>
		    	<?php endforeach; ?>
			</select>

		    <script>

	     	var xQ = jQuery.noConflict();
					xQ(document).ready(function(){
						var currentUrl = window.location.href;
						xQ('#blog-categories').val(currentUrl);
						xQ('#blog-categories').change(function(){
							var blogValue = xQ(this).val();
							window.location.replace(blogValue);
						});
					});

		    </script>

		</div>

		<?php if ( have_posts() ): ?>

				<div class="interior-category">	

					<?php

					while( have_posts() ):the_post();					

						 if ( get_field( 'previewImage') ){
					        $image = get_field( 'previewImage')['sizes']['hd'];					    						
						} else {
							$image = get_template_directory_uri().'/assets/images/default.jpg';
						}

					?>

							<div class="row align-items-center single-blog-post">
								<div class="col-12 col-lg-4 side-left">
								<a href="<?php echo get_permalink(); ?>"><div class="image-post-thumb" style="background-image: url('<?php echo $image; ?>');"></div></a>
								</div>
								<div class="col-12 col-lg-8 side-right">
									<div class="info-single-category">
									<a href="<?php echo get_permalink(); ?>"><h4 class="title-post"><?php the_title(); ?></h4></a>
											<p><?php echo wp_trim_words( get_the_content(), 60, '...' ); ?></p>
										<a href="<?php echo get_permalink(); ?>" class="btn-2 blue">Learn more</a>
										</div>
									</div>
								</div>

					<?php endwhile; ?>
			

			<div class="pagination">
				<?php if ( $wp_query->max_num_pages > 1 ) : ?>
					<?php the_posts_pagination(array( 'mid_size' => 2, 'screen_reader_text' => __( ' ', 'textdomain' ),) ); ?>
				<?php endif; ?>	
			</div>

		</div>


		<?php endif; ?>

	</div>						

<?php

$structure->closeStructure();

get_footer();

?>