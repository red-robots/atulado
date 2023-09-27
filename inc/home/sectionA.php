<?php if( have_rows( 'itemsA', 'option' ) ): ?>

    <section class="section-a slider-widget">
        <div class="slider-a">
            <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel" data-interval="7000">
                <div class="container bullets">
                    <ol class="carousel-indicators"></ol>
                </div>
                <div class="carousel-inner">
                    <?php

                    $c = 0;
                    while ( have_rows( 'itemsA', 'option' ) ) : the_row();

                        if( get_sub_field( 'image' ) ) {
                            $image = get_sub_field( 'image' )['sizes']['hd'];
                        } else {
                            $image = get_template_directory_uri().'/assets/images/slider.jpg';
                        } 

                        $video = get_sub_field( 'video' );
                        $title = get_sub_field( 'title' );
                        $text  = get_sub_field( 'text' );
                        //$label = get_sub_field( 'label' );
                        //$url   = get_sub_field( 'url' );
                        //$label2 = get_sub_field( 'label2' );
                        //$url2   = get_sub_field( 'url2' );
                        $button_1 = get_sub_field('button_1');
                        $button_2 = get_sub_field('button_2');


                    ?>
                        <div class="carousel-item">
                            <div class="slider-box">  
                                <video id="home-video" class="embed-responsive-item" autoplay="" loop=""  muted="">
                                    <source src="<?php echo $video; ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>        
                                <figure class="bg-img" style="background-image:url('<?php echo $image; ?>');"></figure>
                                <div class="container">
                                    <div class="slider-caption">
                                        <?php if ( $title ): ?>
                                            <h2><?php echo $title; ?></h2>
                                        <?php endif; ?>
                                        <?php if ( $text ): ?>
                                            <?php echo $text; ?>
                                        <?php endif; ?>
                                        <?php if( $button_1 ): 
                                            $link_url = $button_1['url'];
                                            $link_title = $button_1['title'];
                                            $link_target = $button_1['target'] ? $button_1['target'] : '_self';
                                        ?>
                                            <a class="btn-1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                        <?php endif; ?>
                                        <?php if( $button_2 ): 
                                            $link_url = $button_2['url'];
                                            $link_title = $button_2['title'];
                                            $link_target = $button_2['target'] ? $button_2['target'] : '_self';
                                        ?>
                                            <a class="btn-3" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                        <?php endif; ?>                                       
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $c++;
                    endwhile;
                    ?>
                </div>
                <?php if ( $c > 1 ): ?>
                    <a class="carousel-control-prev" href="#home-slider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#home-slider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                 <?php endif; ?>
            </div>
        </div> 
    </section>
    
<?php endif; ?>