<?php  $itemsE = get_field( 'itemsE', 'option' ); ?>

<section class="section-e">
	<div class="container">
		<?php if( $itemsE['title'] ): ?>
			<div class="container-text">
				<h2><?php echo $itemsE['title']; ?></h2>
				<?php echo $itemsE['text']; ?>  
			</div>
		<?php endif; ?>

		<?php
		$args=array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => 3,
			'tax_query'      => array(
						array(
								'taxonomy' => 'category',
								'field'    => 'slug',
								'terms'    => 'stories',
						)
				)
		);

		$the_query = new WP_Query( $args ); 

		if ( $the_query->have_posts() ) :		


		?>

		<div class="table-ipad row flex-lg-row justify-content-lg-between align-items-lg-start align-items-md-center justify-content-md-center flex-md-column justify-content-center ">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 

			if ( get_field( 'previewImage') ){
				$singleImage = get_field( 'previewImage')['sizes']['hd'];
			}	elseif ( has_post_thumbnail() ) {
				$singleImage = get_the_post_thumbnail_url();
			} else {
				$singleImage = get_template_directory_uri().'/assets/images/default.jpg';
			}
					
		?>

				<div class="col-lg-4 col-md-6 col-12 m-bottom item_post">
						<a href="<?php echo get_permalink(); ?>">
						<div class="single-post">
								<div class="top-post">
								<div class="title-post"><?php the_title();?></div>
								<div class="link-post">
										<figure class="plus-link"></figure>
								</div>
								</div>
								<div class="post-img">
								<figure style="background-image: url('<?php echo $singleImage; ?>');"></figure>
								</div>
						</div>
						</a>
				</div>
				<?php 
					endwhile;
					wp_reset_postdata();
			?>

		</div>
		 <?php 
			$button_1 = $itemsE['sec_btn'];
		 if( $button_1 ): 
            $link_url = $button_1['url'];
            $link_title = $button_1['title'];
            $link_target = $button_1['target'] ? $button_1['target'] : '_self';
        ?>
		<div class="btn-stories d-flex justify-content-center">		
            <a class="btn-1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
				</div>
        <?php endif; ?>				
	</div>
</section>

<?php endif; ?>