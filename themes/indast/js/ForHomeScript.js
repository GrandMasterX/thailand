
$( document ).ready(function() {	
 $(function() {
  $('#newProd').click(function() {
		if($("#product-top").hasClass("hilite")){
				$("#product-top").removeClass("hilite")
				$('#topProd').removeClass("activeLink")
			}
	   if( $("#product-new").hasClass("hilite") ) {
		$("#product-new").removeClass("hilite")
		$('#newProd').removeClass("activeLink")
		$('html, body').stop().animate({'scrollTop': $('#section0').offset().top },450);
		$("#ProdBloc").css('bottom','0');
	   }
	   else
	   {
		$("#product-new").addClass("hilite")
		$('#newProd').addClass("activeLink")
	   }
	   });
	  });
});

$( document ).ready(function() {	
 $(function() {
  $('#topProd').click(function() {
	  if($("#product-new").hasClass("hilite")){
				$("#product-new").removeClass("hilite")
				$('#newProd').removeClass("activeLink")
			}
	   if( $("#product-top").hasClass("hilite") ) {
		$("#product-top").removeClass("hilite")
		$('#topProd').removeClass("activeLink")
		$('html, body').stop().animate({'scrollTop': $('#section0').offset().top },450);
		$("#ProdBloc").css('bottom','0');
	   }
	   else
	   {
		$("#product-top").addClass("hilite")
		$('#topProd').addClass("activeLink")
		
	   }
	   });
	  });
});

var HeightSection1 = $("#section1").height();
$(document).mousewheel(function(e, delta) 
{	if($("#product-top").hasClass("hilite")) return false;
	if($("#product-new").hasClass("hilite")) return false;
	if($('html, body').is(':animated'))return false;
	
	
 if(delta > 0){
  $('html, body').stop().animate({'scrollTop': $('#section0').offset().top },600);
  $("#ProdBloc").css('bottom','0');
  $("#ProdBloc").hide();
   setTimeout(function() {
  	$("#ProdBloc").fadeIn()
    $("#footer span").css("color","#727272");
   	$("#footer a").css("color","#727272");
   }, 600);
   $("#footer span").css("color","#727272");
   $("#footer a").css("color","#727272");
 }
 else
 {
  $('html, body').stop().animate({'scrollTop': $('#section1').offset().top },1100);
  $("#ProdBloc").css('bottom',HeightSection1+'px');
   $("#ProdBloc").hide();
   setTimeout(function() {
   	$("#ProdBloc").fadeIn();
   
   }, 600);
   $("#footer span").css("color","#fff");
   $("#footer a").css("color","#fff");
 }
});
$( document ).ready(function() {	
	var HeightBody = $("body").height();
	$("body").css('overflow','hidden');
	$("#section0").css('height',HeightBody+'px');
});

$("#homeLinkProd a").click(function(){
var curPos=$(document).scrollTop();
var height=$("body").height();
var scrollTime=(height-curPos)/1.73;
$("body,html").animate({"scrollTop":height},scrollTime);
});







		(function($) { 
		$(function() {

			$('.selectHome').selectbox();
			$('.categoryPrice').selectbox();
			$('.selectHome3').selectbox();
		})
		})(jQuery)
