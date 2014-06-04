<?php
    $this->breadcrumbs=array(
        'Модерация'=>array('admin'),
        'Новые отзывы',
    );
?>

<h1>Новые отзывы</h1>

<?php $this->widget('bootstrap.widgets.TbListView', array(
	'id' => 'review',
	'dataProvider' => $dataProvider,
	'itemView' => '_view'
)) ?> 

<?php
	Yii::app()->db->createCommand()->update('product_review', array('is_view'=>1));
	Yii::app()->cache->delete(ProductReview::CACHE_NEW_COUNT_KEY);
?>

<script>
	$(function() {
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



