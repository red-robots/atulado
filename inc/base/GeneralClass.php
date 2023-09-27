<?php

class GeneralClass{


	public function fields(){

		global $home_url,$google_analytics,$google_analytics_body,$social_networks, $title_page_stories;

		// $home_url              = get_option( 'home' );
		// $google_analytics      = get_field( 'google_analytics', 'option' );
		// $google_analytics_body = get_field( 'google_analytics_body', 'option' );
		// $social_networks       = get_field( 'social_networks', 'option' );
			$title_page_stories       = get_field( 'title_page_stories', 'option' );
	}

	public function openStructure( $id, $className ){

		global $title_page_stories;
	?>	

		<section class="interior-page <?php echo $className; ?>" id="<?php echo $id; ?>">
		    <div class="container">
		        <div class="row">
							<div class="col-md-12 content-page"> 

							<?php if(is_category('stories')) :

								$title_page_stories = get_field('title_page_stories','option');
								$trip_link = get_field('trip_link', 'option' );

								if( $trip_link ): 
										$trip_link_url = $trip_link['url'];
										$trip_link_title = $trip_link['title'];
										$trip_link_target = $trip_link['target'] ? $trip_link['target'] : '_self';
								endif;
								?>
								<div class="title-page-stories trip-button-stories">
									<h2><?php echo $title_page_stories; ?></h2>
								
									<?php if($trip_link):?>
										<a href="<?php echo $trip_link_url; ?>" target="<?php echo $trip_link_target; ?>" class="btn-stories btn-2"><?php echo $trip_link_title; ?></a>
									<?php endif;?>
								</div>

								<style type="text/css">
									.title-page-stories{
										display: flex;
										justify-content: flex-start;
										align-items: center;

										padding-bottom: 30px;
									}
									.title-page-stories h2{
										font-size: 18px !important;
										margin-bottom: 0;
										padding-right: 25px;
									}
									.title-page-stories a{
										font-size: 16px !important;
										font-family: 'Montserrat', sans-serif !important;
									}

									@media screen and (max-width: 782px){
										.title-page-stories {
												flex-wrap: wrap;
										}
										.title-page-stories h2{
												margin-bottom: 20px;
										}
									}

								</style>
							<?php endif; ?>
	<?php	            	

	}

	public function closeStructure(){
	?>	
		            </div>
		        </div>
		    </div>
		</section>	
	<?php		
	}	


}