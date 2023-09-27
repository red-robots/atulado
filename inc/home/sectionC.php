<?php 
	$itemsC = get_field( 'itemsC', 'option' );
	if ( $itemsC ):
?>
		<section class="section-c">
			<div class="container">
				<div class="multiple-slider">
					<div class="row">
						<div class="col-12 col-lg-7 left-side-c">
							<div class="image-sliders">

								<div id="custom-slider-2" class="carousel carousel-sync slide carousel-fade" data-ride="carousel">
									<div class="carousel-inner">

										<?php if( have_rows('itemsC','option') ): ?>
											<?php $flag = false; ?>
											<?php  while ( have_rows('itemsC','option') ) : the_row();
													
													$image = get_sub_field('image');
										?>

														<?php if($flag): ?> 
														<div class="single-box">
																<div class="bg-img" style="background-image:url('<?php echo $image; ?>');"></div>
														</div>
													<?php else: ?>
															<?php $image_1 = $image; ?>
															<?php $flag = true; ?>
													<?php endif; ?>

											<?php endwhile; ?>   
										<?php endif; ?> 

										<div class="single-box">
												<div class="bg-img" style="background-image:url('<?php echo $image_1; ?>');"></div>
										</div>                                

									</div>
								</div>
								<div id="custom-slider-3" class="carousel carousel-sync slide carousel-fade" data-ride="carousel">
									<div class="carousel-inner">
										<?php if( have_rows('itemsC','option') ): ?>
											<?php  while ( have_rows('itemsC','option') ) : the_row();
													
													$image = get_sub_field('image');
										?>
														<div class="single-box">
																<div class="bg-img" style="background-image:url('<?php echo $image; ?>');"></div>
														</div>

											<?php endwhile; ?>   
										<?php endif; ?> 
									</div>
								</div>

						</div>

					</div> <!-- col-12 col-lg-7 left-side-c -->
					
					<div class="col-12 col-lg-5 right-side-c">
						<div id="custom-slider-4" class="carousel carousel-sync slide" data-ride="carousel">
								<div class="container bullets">
										<ol class="carousel-indicators"></ol>
								</div>
								<div class="carousel-inner">
										<?php if( have_rows('itemsC','option') ): ?>
											<?php  while ( have_rows('itemsC','option') ) : the_row();
													
													$text = get_sub_field('text');
										?>
													<div class="single-box">
															<?php echo $text; ?>
													</div>

											<?php endwhile; ?>   
										<?php endif; ?>

								</div>
								 <div class="controls-carousel">
			              <a class="carousel-control-prev left" role="button" data-slide="prev">
			                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			                <span class="sr-only">Previous</span>
			              </a>
			              <a class="carousel-control-next right" role="button" data-slide="next">
			                <span class="carousel-control-next-icon" aria-hidden="true"></span>
			                <span class="sr-only">Next</span>
			              </a>
            		</div>
						</div>
					</div>

					</div> <!-- row -->
				</div>									
			</div>
		</section>
<?php endif; ?>