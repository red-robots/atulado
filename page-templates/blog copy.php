<?php

/*
Template Name: Unfiltered Blog
*/

get_header();

$obj = get_queried_object();
$post_password = ( isset($obj->post_password) && $obj->post_password ) ? $obj->post_password : '';

//get_template_part('/inc/base/interiorTop');
//get_template_part('/inc/base/GeneralClass');

if ( have_posts() ) : ?>
	<?php  while ( have_posts() ) : the_post(); ?>
		
    <?php if ( get_the_post_thumbnail_url() ) { ?>
    <section class="interior-banner blog-hero" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
      <div class="container"><div class="title-page"><h1><?php the_title() ?></h1></div></div>
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

  <?php  
  $perpage = ( get_option('posts_per_page') ) ? get_option('posts_per_page') : 10;
  $paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;

  $perpage = 3;
  $args = array(
    'posts_per_page'=> $perpage,
    'post_type'   => 'post',
    'post_status' => 'publish',
    'paged'     => $paged
  );
  $blogs = new WP_Query($args);
  if ( $blogs->have_posts() ) { ?>
  <section class="blog-feeds">
    <div class="container">
      <div class="row">
        <div class="col-md-12 content-page">

          <div class="articles">
            <?php while ( $blogs->have_posts() ) : $blogs->the_post(); ?>
              <article class="article-<?php the_ID() ?> <?php echo ( get_the_post_thumbnail() ) ? 'has-image':'no-image'?> animated fadeIn">
                <div class="inner">
                  <?php if ( get_the_post_thumbnail() ) { ?>
                  <figure class="featimage" style="background-image:url('<?php echo get_the_post_thumbnail_url() ?>')">
                    <?php the_post_thumbnail() ?>
                  </figure> 
                  <?php } else { ?>
                  <figure class="noimage"></figure>
                  <?php } ?>
                  <div class="text">
                    <h2><?php the_title() ?></h2>
                    <div class="excerpt"><?php the_excerpt() ?></div>
                    <div class="postlink">
                      <a href="<?php echo get_permalink() ?>">Learn More</a>
                    </div>
                  </div>
                </div>
              </article>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>

          <?php  
          $total_pages = $blogs->max_num_pages;
          if ($total_pages > 1) {
          ?>
          <div class="loadmore">
              <a href="javascript:void(0)" class="loadmore-button" data-baseurl="<?php echo get_permalink(); ?>" data-totalpages="<?php echo $total_pages ?>" data-next="2">Load More</a>
          </div>
          <?php } ?>
        </div>

        <div id="hidden-content" style="display:none"></div>
      </div>
    </div>
  </section>
  <?php } ?>


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

<?php endif; 
get_footer();
