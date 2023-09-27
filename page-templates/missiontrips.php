<?php
/*
Template Name: Mission Trip
*/
?>


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

?>

<?php

  $footerItems = get_field( 'footerItems', 'option' );        
  $homeUrl = get_option( 'home' );
  $logo    = get_template_directory_uri() . '/assets/images/logo-footer.png';

  //get_template_part( 'inc/home/sectionF' );
?>
<?php 
 
 $itemsForm = get_field( 'itemsForm', 'option' );
 
 if( $itemsForm ):
 
 ?>
 
 <section class="sign-up-form">
	 <?php if( $itemsForm[ 'image' ]['sizes']['hd'] ): ?>
	   <figure class="bg-image-newsletter" style="background-image: url('<?php echo $itemsForm[ 'image' ]['sizes']['hd']; ?>');"></figure>
   <?php endif; ?>	
   <div class="container">
   <div class="box-container-form row flex-lg-row flex-md-column-reverse flex-column-reverse">
	   <div class="col-lg-6 col-md-12 col-12">
				 <?php echo do_shortcode( $itemsForm[ 'shortcode' ] ); ?>
	   </div>
	   <div class="col-lg-6 col-md-12 col-12">
		 <div class="newsletter-message">
		   <?php echo $itemsForm[ 'text' ]; ?>
		 </div>
	   </div>
	 </div>
   </div> 
 </section> 
 
 <?php endif; ?>

 <?php
$home_id         = 'option'; 

//$itemsF = get_field( 'itemsF', 'option'); 

?>

<?php if( have_rows( 'itemsM') ): ?>

<section class="section-f get-started">
  <div class="container">

  <?php while( have_rows( 'itemsM') ): the_row(); 
      $title = get_sub_field('title');
    ?>
      <h2><?php echo $title; ?></h2>

  <?php if( have_rows('ItemsM1') ): ?>

          <div class="row justify-content-center align-items-center">      

          <?php while( have_rows('ItemsM1') ): the_row(); 
              // vars
              $icon = get_sub_field('icon');
              $text = get_sub_field('text');
          ?>

            <div class="col-lg-5 item-join d-flex justify-content-center align-items-center">          
              <?php if( $icon ): ?>
              <figure class="icon" style="background-image: url('<?php echo $icon; ?>');"></figure>
              <?php endif; ?>
              <div class="info-item">
                <span><?php echo $text; ?></span>
              </div>
            </div>           

        
         <?php endwhile; ?>

      </div>

  <?php endif; ?>
 
  <?php endwhile; ?>
  
    </div>
  </section>

<?php endif; ?>


<footer class="footer">
  <div class="container">
		<?php
			
			$instagram_feed = get_field( 'instagram_feed', 'option' ); 

		  if( $instagram_feed ): 

		    $amount = 3;
		    $instagram_user_id      = $instagram_feed[ 'instagram_id' ];
		    $instagram_access_token = $instagram_feed[ 'instagram_access_token' ];       
		    $instagram_client_id    = $instagram_feed[ 'instagram_client_id' ]; 
		  
		      // setting all the necessary to get instagram feeds.
		  
		      $elevation_count_feed   = 3; // how many feed want to load
		      $elevation_requestURL   = 'https://api.instagram.com/v1/users/self/media/recent?access_token='.$instagram_access_token.'&count='.$amount;
		      $ch  = curl_init();
		  
		      // Now we are ready to actually get all the instagram feeds.
		  
		      curl_setopt_array($ch, array(        
		          CURLOPT_URL => $elevation_requestURL,
		          CURLOPT_HEADER  => false,
		          CURLOPT_RETURNTRANSFER => 1
		      ));
		      $json_response = curl_exec($ch);
		      curl_close($ch);
		  
		      // All feeds are contain into this variable.
		  
		      $insta_feeds = json_decode($json_response, true);  


		  ?>

    <div class="footer-social-feed">
      <div class="header-social-feed">
        <h3><?php echo $instagram_feed['main_title']; ?></h3>
        <a href="https://www.instagram.com/<?php echo $instagram_user_id;?>/" class="profile-instagram" target="_blank">@<?php echo $instagram_user_id; ?></a>
      </div>
      
      <div class="grid-container"> 
        <?php if($insta_feeds['data']): ?>

          <?php for ( $i=0; $i<sizeof($insta_feeds['data']) ; $i++ ): ?>

          <?php $date = $insta_feeds['data'][$i]['created_time']; ?> 

          <div class="grid-item size-box-1"> <!-- start single_feed -->
            <div class="single_feed instagram" data-sort-by="instagram" data-category="instagram">
              <a rel="nofollow" href="<?php echo $insta_feeds['data'][$i]['link']; ?>" target="_blank">
                <div class="image_feed">
                  <figure class="img_feed" style="background-image: url('<?php echo $insta_feeds['data'][$i]['images']['standard_resolution']['url']; ?>')"></figure>
                </div>
                <div class="body_feed">
                  <div class="text_feed">
                    <?php echo wp_trim_words($insta_feeds['data'][$i]['caption']['text'],10); ?>
                  </div>
                  <div class="footer_feed">         
                    <span class="date-elapsed"><?php echo date('j M', $date); ?></span>
                    <div class="icon_feed">
                      <i class="fab fa-instagram"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>        
          </div><!-- end single_feed -->
          
          <?php endfor; ?>

        <?php endif; ?>  

        </div>
      </div>
    
    <?php endif; ?> 




    <div class="footer-top"> 
      <div class="row justify-content-between align-items-center justify-content-md-center">
        <div class="col-lg-3 col-md-8 col-12">         
          <figure class="logo-footer" style="background-image: url('<?php echo $logo; ?>');"></figure>       
        </div>
        <?php if ( $footerItems ): ?>
            <div class="col-lg-7 col-md-5 col-12 footer-top-left d-flex align-items-center justify-content-lg-end justify-content-md-between justify-content-center flex-wrap flex-md-nowrap">
            <div class="item-info">
            <h4>Contact Us</h4>
                <?php echo $footerItems['info']; ?>
            </div>          
            </div>
        <?php endif; ?>
        <div class="col-lg-2 col-md-5 col-12 social-footer">
          <h4>Follow Us</h4>
          <?php get_template_part( 'inc/base/socialNetworks' ); ?> 
        </div>        
      </div>     
    </div>
    <div class="footer-bottom">
      <div class="copy-r">
        <p><?php echo $footerItems['copyright']; ?> <div class="elevationweb"> <a href="http://www.elevationweb.org/" target="_blank" title="Nonprofit web design">Nonprofit web design </a> by <a href="http://www.elevationweb.org/our-work/" target="_blank" title="Elevation Web">Elevation Web.</a></div></p>
      </div>      
    </div>
  </div>
</footer>
        <?php
        wp_footer();
        ?>       
    </body>
</html>