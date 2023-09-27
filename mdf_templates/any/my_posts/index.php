<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php global $mdf_loop; ?>

<style type="text/css">

    .acf-map {
      width: 100%;
      height: 400px;
      border: none;
      margin: 0px 0 25px;
    }

    .acf-map img {
       max-width: inherit !important;
    }

</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe-kn7C7H3T5hLtc_XA5UqNJ_2XLqANg8"></script>


<script type="text/javascript">
    (function($) {

    /*
    *  new_map
    *
    *  This function will render a Google Map onto the selected jQuery element
    *
    *  @type  function
    *  @date  8/11/2013
    *  @since 4.3.0
    *
    *  @param $el (jQuery element)
    *  @return  n/a
    */

    function new_map( $el ) {
      
      // var
      var $markers = $el.find('.marker');
      
      
      // vars
      var args = {
        zoom    : 16,
        center    : new google.maps.LatLng(0, 0),
        mapTypeId : google.maps.MapTypeId.ROADMAP
      };
      
      
      // create map           
      var map = new google.maps.Map( $el[0], args);
      
      
      // add a markers reference
      map.markers = [];
      
      
      // add markers
      $markers.each(function(){
        
          add_marker( $(this), map );
        
      });
      
      
      // center map
      center_map( map );
      
      
      // return
      return map;
      
    }

    /*
    *  add_marker
    *
    *  This function will add a marker to the selected Google Map
    *
    *  @type  function
    *  @date  8/11/2013
    *  @since 4.3.0
    *
    *  @param $marker (jQuery element)
    *  @param map (Google Map object)
    *  @return  n/a
    */

    function add_marker( $marker, map ) {

      // var
      var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

      // create marker
      var marker = new google.maps.Marker({
        position  : latlng,
        icon: '<?php echo get_template_directory_uri();?>/assets/images/marker.png',
        map     : map
      });

      // add to array
      map.markers.push( marker );

      // if marker contains HTML, add it to an infoWindow
      if( $marker.html() )
      {
        // create info window
        var infowindow = new google.maps.InfoWindow({
          content   : $marker.html()
        });

        // show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function() {

          infowindow.open( map, marker );

        });
      }

    }

    /*
    *  center_map
    *
    *  This function will center the map, showing all markers attached to this map
    *
    *  @type  function
    *  @date  8/11/2013
    *  @since 4.3.0
    *
    *  @param map (Google Map object)
    *  @return  n/a
    */

    function center_map( map ) {

      // vars
      var bounds = new google.maps.LatLngBounds();

      // loop through all markers and create bounds
      $.each( map.markers, function( i, marker ){

        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

        bounds.extend( latlng );

      });

      // only 1 marker?
      if( map.markers.length == 1 )
      {
        // set center of map
          map.setCenter( bounds.getCenter() );
          map.setZoom( 16 );
      }
      else
      {
        // fit to bounds
        map.fitBounds( bounds );
      }

    }

    /*
    *  document ready
    *
    *  This function will render each map when the document is ready (page has loaded)
    *
    *  @type  function
    *  @date  8/11/2013
    *  @since 5.0.0
    *
    *  @param n/a
    *  @return  n/a
    */
    // global var
    var map = null;

    jQuery(document).ready(function(){

      jQuery('.acf-map').each(function(){

        // create map
        map = new_map( jQuery(this) );

      });

    });

    })(jQuery);
</script>

<?php if($mdf_loop->have_posts()): ?>

    <div class="acf-map">
        <div class="map-wrap mb-5">
            <?php while ($mdf_loop->have_posts()) : $mdf_loop->the_post();?>

                <?php $location = get_field('address'); ?>  

                  <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                    <h4><a href="<?php echo get_the_permalink();?>"><?php the_title(); ?></a></h4>
                    <?php if($location): ?>
                      <p class="address"><?php echo $location['address']; ?></p>
                    <?php endif; ?>
                  </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>

<?php endif; ?>

<div class="filter-results">
    <div class="row">
            <?php if($mdf_loop->have_posts()): ?>
            <?php  while ($mdf_loop->have_posts()) : $mdf_loop->the_post();?> 

                <?php 
                  $title = get_the_title();
                  $subtitle = get_field('subtitle'); 
                  $location = get_field('address'); 
                  $phone = get_field('phone'); 
                  $email = get_field('email');
                  $moreInfo = get_field('moreInfo');
                  $time = get_field('time'); 
                  $website = get_field('website'); 
                ?> 
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-box">
                            <a href="<?php echo $website; ?>">

                                <?php if($title): ?>
                                    <h5 class="title"><?php echo $title; ?></h5>
                                <?php endif; ?>

                                <?php if($subtitle): ?>
                                    <span class="sub-title"><?php echo $subtitle; ?></span>
                                <?php endif; ?>

                                <?php if($location['address']): ?>
                                    <address><?php echo $location['address']; ?></address>
                                <?php endif; ?>

                                <?php if($phone): ?>
                                    <p><?php echo $phone; ?></p>
                                <?php endif; ?>

                                <?php if($email): ?>
                                    <p><?php echo $email; ?></p>
                                <?php endif; ?>

                                <?php if($moreInfo): ?>
                                    <span class="frequency"><?php echo $moreInfo; ?></span>
                                <?php endif; ?>

                                <?php if($time): ?>
                                    <time><?php echo $time; ?> </time>
                                <?php endif; ?>

                                <span class="link">
                                    <span class="btn-external">
                                        <span>Website</span> <i class="fa fa-link"></i>
                                    </span>
                                </span>

                            </a>
                        </div> 
                    </div>

            <?php endwhile; ?>
          <?php endif; ?>        
    </div>
</div>