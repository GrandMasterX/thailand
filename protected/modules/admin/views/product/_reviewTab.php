<div id="review">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'success',
		'icon'=>'white upload',
		'url' => array('/admin/review/admin', 'id' => $model->id),
		'label'=>'Загрузить все отзывы',
		'htmlOptions' => array(
			'id'=>'review-upload'
		)
	)); ?>
</div>	
	
<script>
	$(function() {
		$('#review-upload').on('click', function() {
		
			$.get($(this).attr('href'), function(html) {
				$('#review').html(html);
			})
			
			return false;
		})
		
		
		$('#review').on('click', '.remove', function() {
			
			var link = $(this);
			$.getJSON(link.attr('href'), function(json) {
				if(json.success) {
					link.closest('div.item').remove();
				}	 
			})
			
			return false;
		}) 
		
		$('#review').on('click', '.moderation', function() {
			
			var link = $(this);
			$.getJSON(link.attr('href'), function(json) {
				if(json.html) {
					link.closest('div.item').html(json.html);
				}	 
			})
			
			return false;
		}) 
		
	})
</script>	

