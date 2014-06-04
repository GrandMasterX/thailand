(function($) {
    // This is the connector function.
    // It connects one item from the navigation carousel to one item from the
    // stage carousel.
    // The default behaviour is, to connect items with the same index from both
    // carousels. This might _not_ work with circular carousels!
    var connector = function(itemNavigation, carouselStage) {
        return carouselStage.jcarousel('items').eq(itemNavigation.index());
    };
	
	var progress = {};
	
    $(function() {
        // Setup the carousels. Adjust the options for both carousels here.
        var carouselStage      = $('.carousel-stage').jcarousel({
			wrap: 'circular',
		}).css({'margin-left' : -275});
		
        var carouselNavigation = $('.carousel-navigation').jcarousel();

        // We loop through the items of the navigation carousel and set it up
        // as a control for an item from the stage carousel.
        carouselNavigation.jcarousel('items').each(function() {
            var item = $(this);

            // This is where we actually connect to items.
            var target = connector(item, carouselStage);
			
            item
                .on('jcarouselcontrol:active', function() {
				
                    carouselNavigation.jcarousel('scrollIntoView', this);
                    item.addClass('active');
					
					item.parent().find('canvas').css("opacity","1");
					
					
					$('.SliderContentBlock', target).show();
					
					target.find('img').css({float: 'left'});
					target.next().find('img').css({float: 'left'});
					target.prev().find('img').css({float: 'right'});
					
					if(progress.animate) {
						progress.animate.finish();
						$('.knob').val(0).trigger('change');
					}
						
						
					progress.animate = $({value: 0}).animate({value: 100}, {
						duration: 3000,
						step: function() {
							item.val(this.value).trigger('change');	
						}
					});
                })
                .on('jcarouselcontrol:inactive', function() {
                    item.removeClass('active');
					
					item.parent().find('canvas').css("opacity","0");
					
					var block = $('.SliderContentBlock', target);
					block.hide();
					target.width(725);
					
                })
                .jcarouselControl({
                    target: target,
                    carousel: carouselStage
                });
        });
		
		$('.knob').knob({
			readOnly: true,
			linecap: 'round',
			width: 75,
			thickness : 0.12,
			bgColor: '#ffffff'
		});
		
		carouselStage
			.jcarouselAutoscroll({
				interval: 3000,
				target: '+=1',
				autostart: true
			}).on('mouseenter', 'li', function() {
				
				if(progress.animate) {
					progress.animate.finish();
				}
				
				carouselStage.jcarouselAutoscroll('stop');
				
			}).on('mouseleave', 'li', function() {
			
				$('li.active', carouselNavigation).trigger('jcarouselcontrol:active');	
			
				carouselStage.jcarouselAutoscroll('start');
			});			
			
		carouselStage.jcarousel('scroll', '+=1');	
		$('li:eq(1)', carouselNavigation).trigger('jcarouselcontrol:active');	

		
		
        // Setup controls for the navigation carousel
        $('.prev-navigation')
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
			.jcarouselControl({
                target: '-=1'
            });

        $('.next-navigation')
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });
			
    });
	
	
})(jQuery);



var par = $("#slider-home li.active").parent();




