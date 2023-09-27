<?php
 
$itemsB = get_field( 'itemsB', 'option' ); 

if ( $itemsB['text'] ):

    if ( $itemsB['image'] ) {
        $image = $itemsB['image']['sizes']['hd'];
    }else{
        $image = get_template_directory_uri().'/assets/images/welcome.png';
    } 

?>

<section class="section-b">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-6 col-md-12 col-12">
        <div class="welcome-box text-left">
        <?php if( $itemsB['title'] ): ?>
            <h2><?php echo $itemsB['title']; ?></h2>
        <?php endif; ?>
        <?php echo $itemsB['text']; ?>  
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-12">
        <figure class="image-welcome" style="">
            <img src="<?php echo $image; ?>" alt="">
        </figure>
      </div>
    </div> 
  </div>
</section>
<?php endif; ?>
