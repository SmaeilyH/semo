jQuery(document).ready(function(){					
 
	 jQuery('.element').bind('mouseover', function() {
//        jQuery(this).addClass('active');
        jQuery(this).find('img').stop().each(function() {
          jQuery(this).animate({
            'opacity': 1
          }, 200);
      	});
     });
	 
	  jQuery('.element').bind('mouseout', function() {
//        jQuery(this).removeClass('active');
       jQuery(this).find('img').stop().each(function() {
          jQuery(this).animate({
            'opacity': 0.4
          }, 200);
      	});
     });
	  

      jQuery('.element').bind('mouseenter', function() {
        jQuery(this).find('.title').stop().each(function() {
          jQuery(this).animate({
            'margin-left': 35,
			 'opacity': 1
          }, 250);
      	});
        jQuery(this).find('.subtitle').stop().each(function() {
		  jQuery(this).animate({
			 'opacity': 1
          }, 0);
		  jQuery(this).delay(150).animate({
            'margin-left': 35
          }, 250);
        });
      });

      jQuery('.element').bind('mouseleave', function() {
        jQuery(this).find('.title').stop().each(function() {
          jQuery(this).animate({
            'opacity': 0,
			 'margin-left': -500
          }, 400);
      	});
        jQuery(this).find('.subtitle').stop().each(function() {
          jQuery(this).animate({
            'opacity': 0,
			 'margin-left': 600
          }, 400);
        });
      });


    
});