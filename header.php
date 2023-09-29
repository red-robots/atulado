<!DOCTYPE html>
<html lang="en">
<head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MLS4EJ9E9Y"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MLS4EJ9E9Y');
</script>


    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>
        <?php

        if( is_front_page() ):
            bloginfo( 'name' ); 
        else:
            echo wp_title( '' );
        endif;

        ?>   
    </title>

    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <![endif]-->

    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,900&display=swap" rel="stylesheet"> 

    <?php 

    wp_head();
    $homeUrl         = get_option( 'home' );    
    $googleAnalytics = get_field( 'googleAnalytics', 'option' );
    $headerItems    = get_field( 'headerItems', 'option' );             
    $customLogoId    = get_theme_mod( 'custom_logo' );

    if( $customLogoId ) {
        $logo = wp_get_attachment_image_src( $customLogoId , 'full' );
        $logo = $logo[0];
    } else {
        $logo = get_template_directory_uri() . '/assets/images/logo.png';
    }

    echo $googleAnalytics;
    ?> 
</head>

<body <?php body_class(); ?>>

    <div id="wptime-plugin-preloader"></div>

    <header class="header fixed-top"> 
  <section class="search-section">
    <div class="container">
      <div class="search">
         <form method="get" id="searchform" class="searchform" action="\">
            <div>
             <label class="screen-reader-text" for="s">Search for:</label>
             <input type="text" value="" name="s" id="s">
             <input type="submit" id="searchsubmit" value="Search">
            </div>
         </form>
      </div>
    </div>
  </section>
  <section class="header-navigation">
   <!-- Menu Navigation -->
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo $homeUrl; ?>">
            <img src="<?php echo $logo; ?>" alt="logo" class="navbar-brand-desktop">
            <img src="https://www.atuladoministries.org/wp-content/uploads/2023/08/logo-footer.png" alt="logo fixed" class="navbar-brand-fixed">
          </a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#NavDropdown" aria-controls="NavDropdown" aria-expanded="false" aria-label="Toggle navigation">            
          </button>
        </div>
        <div class="col-right d-flex flex-row">          
          <div class="collapse navbar-collapse" id="NavDropdown">
             <?php get_template_part( 'inc/base/mainMenu' ); ?>
          </div> <!-- collapse navbar-collapse -->
          <div class="header-toolbar d-flex justify-content-end align-items-center">
            <button id="open-search"><i class="fas fa-search"></i></button> 
            <ul class="top-menu">
              <li class="menu-item btn-give"><a target="_blank" href="<?php echo $headerItems[ 'url' ]; ?>"><?php echo $headerItems[ 'label' ]; ?></a></li>
            </ul>
          </div>
        </div>
      </nav> 
    </div> <!-- container -->
  </section>
</header>

