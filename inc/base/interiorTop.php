<?php

if ( is_search() ){

   	if ( get_field( 'searchImage', 'option' ) ) {
      	$searchImage = get_field( 'searchImage', 'option' )['sizes']['hd'];
    } else {
        $searchImage = get_template_directory_uri() . '/assets/images/interior-banner.jpg';
    }

    $title = 'Search';

} elseif ( is_category() ){

   	if ( get_field( 'categoryImage', 'option' ) ) {
      	$categoryImage = get_field( 'categoryImage', 'option' )['sizes']['hd'];
    } else {
      	$categoryImage = get_template_directory_uri() . '/assets/images/interior-banner.jpg';
    } 

    $title = single_cat_title("", false);

} else {

   	if ( has_post_thumbnail() ) {
      	$singleImage = get_the_post_thumbnail_url();
    } elseif ( get_field( 'singleImage', 'option' ) ){
        $singleImage = get_field( 'singleImage', 'option' )['sizes']['hd'];
    } else {
      	$singleImage = get_template_directory_uri() . '/assets/images/interior-banner.jpg';
    }

    $title = get_the_title();

    if( get_post_type()=='unfiltered' ) {
        $unfilteredBlogID = 1104;
        $singleImage = get_the_post_thumbnail_url($unfilteredBlogID);
        $title = getPostTitle( $unfilteredBlogID );
    }

    
}

if ( isset( $searchImage ) ): ?>

	<section class="interior-banner" style="background-image: url('<?php echo $searchImage; ?>');">

<?php elseif ( isset ( $categoryImage ) ): ?> 

    <section class="interior-banner" style="background-image: url('<?php echo $categoryImage; ?>');">

<?php elseif ( isset( $archiveImage ) ): ?>

    <section class="interior-banner" style="background-image: url('<?php echo $archiveImage; ?>');">

<?php else: ?>

    <section class="interior-banner" style="background-image: url('<?php echo $singleImage; ?>');"> 

<?php endif; ?>

	    <div class="container">
        <?php if ( is_single() && 'post' == get_post_type() ):?>
       
        <?php else: ?> 
		   <div class="title-page">
		       <h1><?php echo $title; ?></h1>
		    </div>
        <?php endif; ?>
		</div>
	</section>

