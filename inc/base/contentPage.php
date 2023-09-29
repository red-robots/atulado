<?php 
$obj = get_queried_object();
$post_password = ( isset($obj->post_password) && $obj->post_password ) ? $obj->post_password : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">

		<?php if( $post_password && !post_password_required() ) { ?>
			<?php if( is_singular() && get_post_type()=='unfiltered' ) { ?>
				<h1 class="entry-title"><?php echo getPostTitle( get_the_ID() ) ?></h1>
			<?php } ?>
		<?php } ?>

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
