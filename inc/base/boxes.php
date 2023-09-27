<?php if ( have_rows( 'itemsBoxes', 'option' ) ): ?>

    <section class="sidebar-interior-page pt-5 pb-5">
        <div class="container">
            <div class="row sideber-width">
                <?php

                    if ( is_archive() && !is_category() ){
                        $pageTitle = str_replace( "Archives: ", "", get_the_archive_title() );
                    }elseif ( is_category() ){
                        $pageTitle = single_cat_title( "", false ); 
                    }else{
                        $pageTitle = get_the_title();
                    }

                    $c = 0;

                    while ( have_rows( 'itemsBoxes', 'option' ) ) : the_row();

                        if ( get_sub_field( 'image' ) ) {
                            $image = get_sub_field( 'image' )['sizes']['md'];
                        } else {
                            $image = get_stylesheet_directory_uri() . '/assets/images/default.svg';
                        }

                        $title = get_sub_field( 'title' );
                        $text = get_sub_field( 'text' );
                        $label = get_sub_field( 'label' );
                        $url   = get_sub_field( 'url' );

                        if ( ($c < 3) && ( $pageTitle != $title ) ):
                ?>

                            <div class="col-12 col-lg-4">
                                <div class="single-box green text-center bg-cer bg-overlay mb-5 mb-lg-0" style="background-image:url('<?php echo $image; ?>');">
                                    <a class="p-0" href="<?php echo $url; ?>">

                                        <span class="info-wrap">
                                            <h3><?php echo $title; ?></h3>
                                        </span>

                                        <span class="hover-wrap">
                                            <p><?php echo $text; ?></p>
                                            <?php if( $label ): ?>
                                                <span class="link">
                                                    <span class="btn-1"><?php echo $label; ?></span>
                                                </span>
                                            <?php endif; ?>
                                        </span>
                                        
                                    </a>
                                </div>
                            </div>

                            <?php $c++ ?>

                        <?php endif; ?>              
                <?php endwhile; ?>
            </div>
        </div>
    </section>

<?php endif; ?> 