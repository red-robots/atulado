<?php

get_header();

get_template_part('/inc/base/interiorTop');
get_template_part('/inc/base/GeneralClass');

$structure = new GeneralClass();

$structure->openStructure('','search-page');

?> 
 
    <div class="content-search">

        <h1 class="search-title"> 
            <?php echo $wp_query->found_posts; ?>
            <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>" 
        </h1>

        <?php if ( have_posts() ): ?>

            <ul class="search-list-result">

                <?php while ( have_posts() ) { the_post(); ?>
                    <hr style="width: 100%;">
                    <li>
                        <h3>
                            <a href="<?php echo get_permalink(); ?>">
                                <?php the_title();  ?>
                            </a>
                        </h3>
                        <?php echo substr( get_the_excerpt(), 0,200).'...'; ?>

                      <div class="read-more">
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                      </div>
                    </li>
                <?php } ?>

            </ul>

            <hr style="width: 100%;">

            <?php paginate_links(); ?>

        <?php endif; ?>

    </div>

    <div class="pagination">

        <?php if ( $wp_query->max_num_pages > 1 ) : ?>
    			<?php echo paginate_links( array(
    				  'prev_text' => '<span><</span>',
    				  'next_text' => '<span>></span>'
    			)); ?>
      <?php endif; ?>

    </div>

<?php

$structure->closeStructure();

get_footer();

?>
