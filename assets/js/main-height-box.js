var jQ = jQuery.noConflict();

jQ(document).ready(function(){

  (function($){
    function fixButtonHeights() {
      var heights = new Array();
          
      // Loop to get all element heights
      jQ('.sec-height').each(function() { 
        // Need to let sizes be whatever they want so no overflow on resize
        jQ(this).css('min-height', '0');
        jQ(this).css('max-height', 'none');
        jQ(this).css('height', 'auto');

        // Then add size (no units) to array
        heights.push(jQ(this).height());
      });

      // Find max height of all elements
      var max = Math.max.apply( Math, heights );

      // Set all heights to max height
      jQ('.sec-height').each(function() {
        jQ(this).css('height', max + 'px');
              // Note: IF box-sizing is border-box, would need to manually add border and padding to height (or tallest element will overflow by amount of vertical border + vertical padding)
      }); 
    }

    jQ(window).load(function() {
      // Fix heights on page load
      fixButtonHeights();

      // Fix heights on window resize
      jQ(window).resize(function() {
        // Needs to be a timeout function so it doesn't fire every ms of resize
        setTimeout(function() {
          fixButtonHeights();
        }, 120);
      });
    });
  })(jQuery);

});