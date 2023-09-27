<?php if( have_rows( 'socialNetworks', 'option' ) ): ?>
    <ul class="social-network">
        <?php  
            while ( have_rows( 'socialNetworks', 'option') ) : the_row();
                $icon = get_sub_field( 'icon' );
                $url  = get_sub_field( 'url' );
        ?>
                <li>
                    <a href="<?php echo $url; ?>" target="_blank">
                        <?php if( $icon->class == 'fa-facebook' ): ?>
                            <i class="fab <?php echo $icon->class; ?>-f"></i>
                        <?php else: ?>
                            <i class="fab <?php echo $icon->class; ?>"></i>
                        <?php endif; ?>
                    </a>
                </li>
        <?php endwhile; ?>
    </ul> 
<?php endif; ?>