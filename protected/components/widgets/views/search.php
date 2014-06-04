<div id="search" class="search">
	<form>
		<input id="search-input" type="text" placeholder="">
		<input type="submit" value="">
	</form>
    <div id="search-block" class="searchHideBlock"></div>
<div class="clear"></div>
</div>	

<script>
	$(function() {
		$.delay = (function(){
			var timer = 0;
			return function(callback, ms) {
				clearTimeout (timer);
				timer = setTimeout(callback, ms);
			};
		})();
		
		$('#search-input').on('keyup', function() {
			var input = $(this);
			$.delay(function() {
				if(input.val().length > 2)	{
					$.get('/search/index', {term: input.val()}, function(html) {
						$('#search-block').html(html);
					})	
				}
			}, 500)
		})
		
		$('#search form').on('submit', function() {
			return false;
		})
	})
</script>