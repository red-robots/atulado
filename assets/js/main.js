var jQ = jQuery.noConflict();

jQ(document).ready(function(){
  if (typeof foo !== 'undefined') {
    // Now we know that foo is defined, we are good to go.
  }
  /*START function Same height boxes--------------------*/ 
   function sameheight1($object){
      var Box1 = 0;
        jQ($object).each(function(){  
          if(jQ(this).height() > Box1){  
            Box1 = jQ(this).height();  
          }
      });    
      jQ($object).height(Box1);
    }
  // sameheight1("#");
    function sameheight2($object1, $object2){
      var Box2 = 0;
      jQ($object1).each(function(){  
        if(jQ(this).height() > Box2){  
          Box2 = jQ(this).height();  
        }
      });    
      jQ($object2).height(Box2);
    }
  // sameheight2("#1", "#2" );

/*END function Same height boxes--------------------*/ 
/*Start function Slider Wrap into Item----------------------------*/

  function itemswrap($path, $number, $wrap){
     var divgallry = jQ($path);
    for(var i = 0; i < divgallry.length; i+=$number) {
      divgallry.slice(i, i+$number).wrapAll($wrap);
    }    
  }
  function itemsunwrap($path){
    jQ($path).unwrap();
  }

/*END function Slider Wrap into Item----------------------------*/
/*Start function Slider Bullets Wrap----------------------------*/

  function bulletsWrap($sliderID){
    var indicatorsProduct= jQ($sliderID + " .carousel-item").size();  
    var row = jQ('<li data-target="'+$sliderID+'"></li>');
    
    for (var i=0; i<indicatorsProduct; i++) {
        jQ($sliderID + ' .carousel-indicators').append(row.clone());
    }
    var counterProduct=-1;
    jQ($sliderID + " .carousel-indicators li").each(function(){
    counterProduct++;
        var self=jQ(this);
        self.attr('data-slide-to', counterProduct);
    });  

    jQ($sliderID + " .carousel-indicators li").first().addClass('active');
  }

/*END function Slider Bullets Wrap----------------------------*/
 

//*START Slider Touchable--------------------*/

   jQ("#home-slider").swiperight(function() {  
      jQ(this).carousel('prev');  
    });  
   jQ("#home-slider").swipeleft(function() {  
      jQ(this).carousel('next');  
   }); 

/*Start Home Slider Wrap into Item----------------------------*/
  jQ('#home-slider .carousel-item').first().addClass('active');
/* End Slider Jquery*/

 jQ("#carouselTestimonials").swiperight(function() {  
    jQ(this).carousel('prev');  
  });  
 jQ("#carouselTestimonials").swipeleft(function() {  
    jQ(this).carousel('next');  
 }); 

 jQ("#carouselEvents").swiperight(function() {  
    jQ(this).carousel('prev');  
  });  
 jQ("#carouselEvents").swipeleft(function() {  
    jQ(this).carousel('next');  
 }); 

//sameheight1('.col-item');

/*********************
      VIDEO JS
 ********************
  jQ("button.btn-video").click(function () {
   var theModal1 = jQ(this).data("target"),
    videoSRC1 = jQ(this).attr("data-video"),
    videoSRCauto1 = videoSRC1 + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
    jQ(theModal1 + ' iframe').attr('src', videoSRCauto1);
    jQ(theModal1 + ' button.close, #myVideoModal').click(function () {
      jQ(theModal1 + ' iframe').attr('src', videoSRC1);
    });      
  });

/*********************
      VIDEO JS
 *********************/

jQ('.stacked#sc_our_team .sc_team_member .sc_team_member_left .sc_team_member_jobtitle').each(function () {  
  var memberJob = jQ(this).clone();
  jQ(this).parent().parent().find('.sc_team_member_right').prepend(memberJob);
  jQ(this).remove();
});

jQ('.stacked#sc_our_team .sc_team_member .sc_team_member_left .sc_team_member_name').each(function () {
  var memberName = jQ(this).clone(); 
  jQ(this).parent().parent().find('.sc_team_member_right').prepend(memberName);
  jQ(this).remove();
});
/*-------- Start Media Queries ----------*/

if (jQ(window).width() > 991.98) {
jQ('.grid-container').masonry({
  // options
  itemSelector: '.grid-item',
  gutter: 0,
  isFitWidth: true,
  
});

} else {
  
/*********************
  Soical Feed Initialize 
***************************/
jQ('.grid-container').masonry({
  // options
  itemSelector: '.grid-item',
  gutter: 0,
  isFitWidth: true,
  
});

} /*END else*/


/*START Search--------------------*/    
  jQ('.search #searchform #s').attr('placeholder', 'Search here...');
  jQ('#open-search').click(function() {
    jQ('.search-section').slideToggle('400');
     setTimeout(function(){
      jQ('#s').focus();
    },500);
  });  
/*END Search--------------------*/

//*START carousels Touchable--------------------*/

itemswrap("#custom-slider-2 .single-box", 1, '<div class="carousel-item"></div>');
itemswrap("#custom-slider-3 .single-box", 1, '<div class="carousel-item"></div>');
itemswrap("#custom-slider-4 .single-box", 1, '<div class="carousel-item"></div>');

jQ("#custom-slider-2 .carousel-item").first().addClass('active');
jQ("#custom-slider-3 .carousel-item").first().addClass('active');
jQ("#custom-slider-4 .carousel-item").first().addClass('active');

bulletsWrap("#custom-slider-4");

jQ('#custom-slider-2, #custom-slider-3, #custom-slider-4').carousel({
  interval: false
});

var checkH = false;
jQ("#custom-slider-4,#custom-slider-2,#custom-slider-3").mouseenter(function(){
    checkH = true;
}).mouseleave(function(){
    checkH = false;
});

setInterval(function(){
  //console.log(checkH);
  if(checkH == false){
    jQ('#custom-slider-4 a.carousel-control-next').click();
  }
},5000);

jQ('#custom-slider-4 .carousel-control-prev').click(function(event) {
  event.stopPropagation();
  jQ(".carousel").promise().done(function() {
    jQ('#custom-slider-2').carousel('prev');
    jQ('#custom-slider-3').carousel('prev');
    jQ('#custom-slider-4').carousel('prev');
  });
});
jQ('#custom-slider-4 .carousel-control-next').click(function(event) {
  event.stopPropagation();
  jQ(".carousel").promise().done(function() {
    jQ('#custom-slider-2').carousel('next');
    jQ('#custom-slider-3').carousel('next');
    jQ('#custom-slider-4').carousel('next');
  });
});

jQ('#custom-slider-4 .carousel-indicators li').click(function(event) {
  event.stopPropagation();
  var indicatorNumber = jQ(this).attr('data-slide-to');
  jQ('#custom-slider-2').carousel(parseInt(indicatorNumber));
  jQ('#custom-slider-3').carousel(parseInt(indicatorNumber));
  jQ('#custom-slider-4').carousel(parseInt(indicatorNumber));
});


jQ("body").keyup(function(e) {
  e.stopPropagation();
  if (e.keyCode == 37) { // left
    jQ('#custom-slider-4 a.left').trigger('click');
  } else if (e.keyCode == 39) { // right
    jQ('#custom-slider-4 a.right').trigger('click');
  }
}); 


/*START Resize--------------------*/

 function myOrientResizeFunction(){
    
  // if (jQ(window).width() >= 1200){
  // }
  // if (jQ(window).width() <= 1200){
  // }

  if (jQ(window).width() < 991) {
    setTimeout(function() {
      jQ('header.header .header-toolbar').insertAfter('#NavDropdown ul.navbar-nav');
      
      // var $headerHeight = jQ('header.fixed-top');
      //   jQ('body').css('padding-top',$headerHeight.height()+'px');
      
      var $wpAdminBar = jQ('#wpadminbar');
      if ($wpAdminBar.length) {
        jQ('header.fixed-top').css('top',$wpAdminBar.height()+'px');
        jQ('.sc_our_team_panel').css('top',$wpAdminBar.height()+'px');        
      }
      
    },500);
  }  
  
  // Extra large devices (large desktops, 1200px and up)
  if (jQ(window).width() >= 991){
    
    setTimeout(function() {
      jQ('body').css('padding-top', 0 + 'px');

      jQ('#NavDropdown .header-toolbar').appendTo('.col-right');
        
        // var $headerHeight = jQ('header.header');
        // jQ('body.team_member-template-default').css('padding-top',$headerHeight.height()+'px');
        
        var $wpAdminBar = jQ('#wpadminbar');
        if ($wpAdminBar.length) {
          jQ('header.header').css('top',$wpAdminBar.height()+'px');
          jQ('.sc_our_team_panel').css('top',$wpAdminBar.height()+'px');
          
        }        
      },500)

    /*START header desktop------------------------------------------------*/
      jQ(".dropdown-btn").unbind();
      jQ('.dropdown, .dropdown-menu').unbind();
      jQ('.dropdown-btn').remove();

    /*START Dropdown Main Menu Animation--------------------*/
      jQ('.dropdown, .dropdown-menu').hover(function(){
          jQ(this).children('.dropdown-menu').stop(true, false).slideDown("fast").addClass('display_dropdown');
      }, function(){
          jQ(this).children('.dropdown-menu').stop(true, false).slideUp("fast").removeClass('display_dropdown');
      });
      jQ(".dropdown-btn").click(function(){
          jQ(this).next().slideToggle("fast");
      });
    /*END Dropdown Main Menu Animation--------------------*/

    /*START Fixed Header--------------------*/
    jQ(window).bind('scroll', function () {
        if (jQ(window).scrollTop() > 162) {
          jQ('body').addClass('fixed');         
        }
        else {
          jQ('body').removeClass('fixed');
        }
    });
    /*END Fixed Header--------------------*/

      sameheight1('.section-e .item_post .single-post .top-post');

    }else{
   
     /*START header mobile-------------------------------------------------------------------------------------*/

        /*START Include Dropdown Button--------------------*/
            jQ('.dropdown-btn').remove();
            var itemBtn = '<button  class="dropdown-toggle dropdown-btn"><span class="fas fa-caret-right"></span></button>';
          
            jQ( 'header .nav .dropdown > a').after(itemBtn);
        /*END Include Dropdown Button--------------------*/

        /*START Dropdown Main Menu Animation--------------------*/
            jQ(".dropdown-btn").unbind();
            jQ('.dropdown, .dropdown-menu').unbind();

            jQ(".dropdown-btn").click(function(){
                jQ(this).find('.fas').toggleClass('open');
                jQ(this).next().slideToggle();
            });
        /*END Dropdown Main Menu Animation--------------------*/

        /*START Dropdown Main Menu Animation--------------------*/
        jQ('header  .nav .dropdown .dropdown-menu').css('display','none');

          jQ(".dropdown, .dropdown-menu .dropdown").unbind();

          jQ(".navbar-header button.navbar-toggle").click(function(event) {
              event.preventDefault();
              jQ(".dropdown-menu").slideUp("400");
          
          });
        /*END Dropdown Main Menu Animation--------------------*/

      /*START Fixed Header--------------------*/
        jQ(window).bind('scroll', function () {
            if (jQ(window).scrollTop() > 112) {
                jQ('body').addClass('fixed');
                jQ('.fix-social').fadeIn('slow');
            }
            else {
                jQ('body,.fix-social').removeClass('fixed');
                jQ('.fix-social').fadeOut('fast');
             }
        });

      /*END Fixed Header--------------------*/
      /*END header mobile-------------------------------------------------------------------------------------------*/
   
    } 
    // Large devices (desktops, 992px and up)
    if (jQ(window).width() > 992){

    } else{      
      
    }
    // Medium devices (tablets, 768px and up)
    if (jQ(window).width() < 768){
    
      sameheight1('.multiple-slider #custom-slider-4 .single-box');

      setTimeout(function(){ 
      },2300);

    } else {

    }
    if (jQ(window).width() > 576){

    }
    else {
       setTimeout(function(){
         
        sameheight1('.multiple-slider #custom-slider-4 .single-box');

      },2300);

    }
 

  } myOrientResizeFunction();


  jQ(window).bind('resize', function(e){
    if (window.RT) clearTimeout(window.RT);
    window.RT = setTimeout(function(){
       // this.location.reload(false); /* false to get page from cache */
        myOrientResizeFunction();
    }, 0);
  }); 

  jQ(window).resize(function(){
   myOrientResizeFunction();
  });

  
});
 
/*FUNCTION SLOW ANIMATION ANCHOR LINKS-------------------------------*/  
// ===== Scroll to Top ==== 
/*
  jQ(window).scroll(function() {
      if (jQ(this).scrollTop() >= 600) {     // If page is scrolled more than 50px
        jQ('#return-to-top').fadeIn('slow');    // Fade in the arrow
      } else {
        jQ('#return-to-top').fadeOut('fast');   // Else fade out the arrow
      }
  });

  jQ(function() {
    jQ('#return-to-top').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

        var target = jQ(this.hash);
        target = target.length ? target : jQ('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          jQ('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });*/
