<?php

$itemsD = get_field( 'itemsD', 'option' ); 

if ( $itemsD['title'] ):

    if ( $itemsD['image'] ) {
        $image = $itemsD['image']['sizes']['hd'];
    }else{
        $image = get_template_directory_uri().'/assets/images/img-d.jpg';
    }    

?>

<section class="section-d">
  <div class="container">
    <div class="row align-items-start">
      <div class="col-lg-6 left-side-d">
      <?php if( $itemsD['title'] ): ?>
        <h2><?php echo $itemsD['title']; ?></h2>
      <?php endif; ?>
        <div class="hr-70w"></div>
        <?php echo $itemsD['text']; ?> 
      </div>
      <div class="col-lg-6 right-side-d">
        <figure class="img-partner">
          <img src="<?php echo $image; ?>" alt="">
        </figure>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>