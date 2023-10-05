<?php

$footerItems = get_field( 'footerItems', 'option' );        
$homeUrl = get_option( 'home' );
$logo    = get_template_directory_uri() . '/assets/images/logo-footer.png';

get_template_part( 'inc/home/sectionF' );
?>
    

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
<?php if($instagram_feed['main_title']) : ?>
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
      <p><?php echo $footerItems['copyright']; ?> <div class="elevationweb"> <a href="https://www.elevationweb.org/" target="_blank" title="Nonprofit web design">Nonprofit web design </a> by <a href="https://www.elevationweb.org/our-work/" target="_blank" title="Elevation Web">Elevation Web.</a></div></p>
    </div>      
  </div>
</div>
</footer>
<?php wp_footer(); ?> 

<div class="protectDisplayTitle" style="display:none"><?php echo get_field('unfiltered_display_title','option') ?></div>    
<div class="protectText" style="display:none"><?php echo get_field('unfiltered_protect_text','option') ?></div>

<?php
$protectTitle = get_field('unfiltered_display_title','option');
$protectImage = get_field('unfiltered_display_image','option');
$protectImgUrl = ( isset($protectImage['url']) && $protectImage['url'] ) ? $protectImage['url'] : '';
?>
<?php if($protectImgUrl) { ?>
<style>
body.single-unfiltered.has-password-protect .interior-banner {
background-image:url('<?php echo  $protectImgUrl?>')!important;
}
</style>
<?php } ?>
<script>
  var protectPageImage = '<?php echo  $protectImgUrl?>';
  jQuery(document).ready(function($){
    if( $('.post-password-form').length ) {
      $('body').addClass('has-password-protect');
      $('.protectText').insertBefore('.post-password-form');
      $('.protectText').show();
      $('.post-password-form').parents('.content-page').addClass('protect-page');
      $('.post-password-form p').first().hide();

      if( $('body.single-unfiltered').length ) {

        if( $('.interior-banner').length ) {
          if(protectPageImage) {
            $('body.single-unfiltered .interior-banner').css('background-image','url('+protectPageImage+')');
          }
        }

        <?php if($protectTitle) { ?>
          $('.interior-banner .title-page h1').html('<?php echo  $protectTitle?>');
          $('.interior-banner .title-page h1').show();
        <?php } ?>

      }
    } else {

      if( $('body.single-unfiltered').length ) {
        if( $('.interior-banner .title-page h1').length ) {
          $('.interior-banner .title-page h1').show();
        }
      }

    }

    if( $('body').hasClass('single-unfiltered') ) {
      if( $('.entry-content .wp-block-columns .wp-block-column').length ) {
        var countColumn = $('.entry-content .wp-block-columns .wp-block-column').length;
        $('.entry-content .wp-block-columns .wp-block-column').each(function(){
          if( $(this).find('.wp-block-image').length ) {
            $(this).parents('.wp-block-columns').addClass('has-featured-image');
          }
        });
      }
    }


  });
</script>
</body>
</html>