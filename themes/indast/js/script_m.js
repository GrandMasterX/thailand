	$("#menu a").click(function(){
		$("#overflow").css("height","100%");
		$(".m-main-s-vup").hide();
		$("body").css('overflow','hidden');
		});
		
		$("#overflow").click(function(){
			$("#overflow").css("height","0%");
			$("#user_menu").hide();
			$("body").css('overflow','auto;');
			});
			
			
$( document ).ready(function() {

		$("#popLink").addClass("active")
		
		$("#popLink").click(function(){
			$("#popBlock").show()
			$("#newBlock").hide()
			$("#popLink").addClass("active")
			$("#newLink").removeClass("active")
			});
			
		$("#newLink").click(function(){
			$("#newBlock").show()
			$("#popBlock").hide()
			$("#newLink").addClass("active")
			$("#popLink").removeClass("active")
			});
});
		
			
$( document ).ready(function() {	

	$('#searcCatalog').hide();

 $(function() {
  $('#searcCatalogLink').click(function() {
   if( $("#searcCatalog").is(":hidden") ) {
    $("#searcCatalog").slideDown();
   }
   else
   {
    $("#searcCatalog").slideUp();
   }
   });
  });


});


$(document).ready(function() {   
    $('a[name=modal]').click(function(e) {
    e.preventDefault();
    var id = $(this).attr('href');
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();
    $('#mask').css({'width':maskWidth,'height':maskHeight});
    $('#mask').fadeIn(1000); 
    $('#mask').fadeTo("slow",0.8); 
    var winH = $(window).height();
    var winW = $(window).width();
    $(id).css('top',  winH/2-$(id).height()/2);
    $(id).css('left', winW/2-$(id).width()/2);
    $(id).fadeIn(2000); 
    });
    $('.window .close').click(function (e) { 
    e.preventDefault();
    $('#mask, .window').hide();
    }); 
    $('#mask').click(function () {
    $(this).hide();
    $('.window').hide();
    }); 
   });  