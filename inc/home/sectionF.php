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

<?php if( have_rows( 'itemsF', $home_id ) ): ?>

<section class="section-f get-started">
  <div class="container">

  <?php while( have_rows( 'itemsF', $home_id ) ): the_row(); 
      $title = get_sub_field('title');
    ?>
      <h2><?php echo $title; ?></h2>

  <?php if( have_rows('itemsF1') ): ?>

          <div class="row justify-content-center align-items-center">      

          <?php while( have_rows('itemsF1') ): the_row(); 
              // vars
              $icon = get_sub_field('icon');
              $text = get_sub_field('text');
          ?>

            <div class="col-lg-5 item-join d-flex justify-content-center align-items-center">          
              <?php if( $icon ): ?>
              <figure class="icon" style="background-image: url('<?php echo $icon; ?>');"></figure>
              <?php endif; ?>
              <div class="info-item">
                <span><?php echo $text; ?> </span>
              </div>
            </div>           

        
         <?php endwhile; ?>

      </div>

  <?php endif; ?>
 
  <?php endwhile; ?>
  
    </div>
  </section>

<?php endif; ?>
