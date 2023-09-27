<?php
    wp_nav_menu( array(
          'menu'       => 'main-menu',
          'depth'      => 3,
          'container'  => false,
          'menu_class' => 'nav navbar-nav',
          'walker'     => new wp_bootstrap_navwalker()
        )
    );
?> 