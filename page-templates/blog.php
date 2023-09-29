<?php

/*
Template Name: Unfiltered Blog
*/

get_header();
global $post;
$obj = get_queried_object();
$post_password = ( isset($obj->post_password) && $obj->post_password ) ? $obj->post_password : '';
$protectImage = get_field('unfiltered_display_image','option');

//get_template_part('/inc/base/interiorTop');
//get_template_part('/inc/base/GeneralClass');

if ( have_posts() ) : ?>
	<?php  while ( have_posts() ) : the_post(); ?>
		
    <?php if( $post_password && !post_password_required() ) { ?>
      <?php if ( get_the_post_thumbnail_url() ) { ?>
      <section class="interior-banner blog-hero" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
        <div class="container"><div class="title-page"><h1><?php echo getPostTitle( get_the_ID() ); ?></h1></div></div>
      </section>
      <?php } ?>
    <?php } else { ?>

      <?php if($protectImage) { ?>
        <section class="interior-banner blog-hero" style="background-image:url('<?php echo $protectImage['url']; ?>');">
      <?php } else { ?>
        <section class="interior-banner blog-hero" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
      <?php } ?>
      
        <div class="container"><div class="title-page"><h1><?php echo getPostTitle( get_the_ID() ); ?></h1></div></div>
      </section>
    <?php } ?>

    <section class="interior-page" id="post-<?php the_ID() ?>">
      <div class="container">
        <div class="row">
          <div class="col-md-12 content-page">
            <?php the_content() ?>
          </div>
        </div>
      </div>
    </section>

	<?php endwhile; ?>

<script>
  jQuery(document).ready(function($){
    $(document).on('click', '.loadmore-button', function(e){
      e.preventDefault();
      var baseUrl = $(this).attr('data-baseurl');
      var totalpage = $(this).attr('data-totalpages');
      var nextpage = $(this).attr('data-next');
      var loadUrl = baseUrl + '?pg=' + nextpage;
      $('#hidden-content').load(loadUrl + ' .articles', function(){
        if( $('#hidden-content article').length ) {
          var nextcontent = $('#hidden-content .articles').html();
          $('.content-page .articles').append(nextcontent);
          var next = parseInt(nextpage) + 1;
          $('.loadmore-button').attr('data-next',next);
          if(next>totalpage) {
            $('.loadmore-button').remove();
          }
        }
      });
    });
  });
</script>

<?php endif; ?>

<?php get_footer();
