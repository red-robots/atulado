<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php 
			if ( is_single() && 'post' == get_post_type() ){
			  echo '<div class="title-page"><h2>' . get_the_title() . '</h2></div>';
			}else{
			}
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __('Pages:','pages'),
				'after'  => '</div>',
			));
		?>
	</div>
	<div class="edit-post">
		<?php
			edit_post_link( __('Edit','pages'),'<span class="edit-link">','</span>' );
		?>
	</div>
</article>
