$(function() {
	$('#cartWidget .opanLink').on('click', function(e) {
		var cart = $('#cartWidget');
		var click = true;
		if(cart.css('right') == '-290px') {
			cart.animate({right: "0px"}, 700);
			$(document).on('click.cart', function(e) {
				if(!click && $(e.target).closest(cart).length == 0) {
					cart.animate({right: "-290px"}, 400);	
					$(document).off('click.cart');
				}
				click = false;
			})
		} else {
			cart.animate({right: "-290px"}, 400);	
		}
		e.preventDefault();
	})
	$('#callBack a').on('click', function(e) {
		var blok = $('#callBack .callBackBlock');
		var click = true;
		if(blok.is(':hidden')) {
			blok.show();
			$(document).on('click.callBack', function(e) {
				if(!click && $(e.target).closest(blok).length == 0) {
					blok.hide();	
					$(document).off('click.callBack');
				}
				click = false;
			})
		}
		e.preventDefault();
	})
})


function reselect(element, addclass) {
	$(element).each(function() {
		var select = this;
		addclass = typeof(addclass) != 'undefined' ? addclass : '';
		$(select).wrap('<div class="sel_wrap ' + addclass + '"/>');
		var sel_options = '';
		var selected_option = false;
		$(select).children('option').each(function() {
			if($(this).is(':selected')){
				selected_option = $(this).index();
			}
			sel_options = sel_options + '<div class="sel_option" value="' + $(this).val() + '">' + $(this).html() + '</div>';
		});
		var sel_imul = '<div class="sel_imul">\
					<div class="sel_selected">\
						<div class="selected-text">' + $(select).children('option').eq(selected_option).html() + '</div>\
						<div class="sel_arraw"></div>\
					</div>\
					<div class="sel_options">' + sel_options + '</div>\
				</div>';
		$(select).before(sel_imul);
	})
}

reselect('.selectO', 'sec overf');
reselect('.selectOm', 'sec overf');
$('.sel_imul').on('click', function() {
    $('.sel_imul').removeClass('act');
    $(this).addClass('act');
    if ($(this).children('.sel_options').is(':visible')) {
        $('.sel_options').hide();
    }
    else {
        $('.sel_options').hide();
        $(this).children('.sel_options').show();
    }
});

$('.sel_option').on('click', function() {
    var tektext = $(this).html();
    $(this).parent('.sel_options').parent('.sel_imul').children('.sel_selected').children('.selected-text').html(tektext);
    $(this).parent('.sel_options').children('.sel_option').removeClass('sel_ed');
    $(this).addClass('sel_ed');
    var tekval = $(this).attr('value');
    tekval = typeof(tekval) != 'undefined' ? tekval : tektext;
	var select = $(this).parent('.sel_options').parent('.sel_imul').parent('.sel_wrap').children('select');
	select.children('option').removeAttr('selected').each(function() {
        if ($(this).val() == tekval) {
            $(this).attr('selected', 'select');
        }
    });
	select.change();
});
var selenter = false;
$('.sel_imul').on('mouseenter', function() {
    selenter = true;
});
$('.sel_imul').on('mouseleave', function() {
    selenter = false;
});
$(document).click(function() {
    if (!selenter) {  
        $('.sel_options').hide();
        $('.sel_imul').removeClass('act');
    }
});




$( document ).ready(function() {
	
	$(".tooltip1").hide();
	
	$(".quantity").click(function(){
		
			$(".tooltip1").show("slow");
			setTimeout(function() {
				$(".tooltip1").hide("slow");
					}, 2800);
		
		})
	
	
	
});


$( document ).ready(function() {


	$(".reviewsForm").hide()
	$(".reviewsText").hide()
	$("#characteristicsLink").addClass('activeLin')
	
	$("#reviewsLink").click(function(){
		$("#reviewsLink").addClass('activeLin')
		$("#characteristicsLink").removeClass('activeLin')
		$(".characteristicsBlock ul").hide()
		   setTimeout(function() {
				
				$(".reviewsForm").slideDown()
				$(".reviewsText").slideDown()
   
   			}, 800);
		
		});
		
	$("#characteristicsLink").click(function(){
		$("#characteristicsLink").addClass('activeLin')
		$("#reviewsLink").removeClass('activeLin')
		$(".reviewsForm").hide()
		$(".reviewsText").hide()
			 setTimeout(function() {
				$(".characteristicsBlock ul").slideDown()
			}, 800);
		
		});

	
	
	
	
});