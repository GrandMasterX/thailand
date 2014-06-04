<div class="item">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$data,
	'type'=>'bordered', 
	'attributes'=>array(
		array(
			'name' => 'product_id',
			'type' => 'raw',
			'value' => function($data) {
				$product = $data->product;
				return CHtml::link($product->title, array('/admin/product/update', 'id'=>$product->id), array('target'=>'_blank'));
			} 
		),
		'description',
		'name',
		'email',
		array(
			'name' => 'create_time',
			'value' => Yii::app()->dateFormatter->format("dd MMMM yyyy hh:mm:ss", $data->create_time)
		),
		array(
			'label' => $data->is_active 
				? CHtml::link('<i class="icon-remove-sign icon-white"></i> Снять</a>', array('/admin/review/moderation', 'id'=>$data->id), array('class' => 'moderation btn btn-info'))
				: CHtml::link('<i class="icon-ok-circle icon-white"></i> Опубликовать</a>', array('/admin/review/moderation', 'id'=>$data->id), array('class' => 'moderation btn btn-info')),
			'type' => 'raw',
			'value' => CHtml::link('<i class="icon-remove icon-white"></i> Удалить отзыв</a>', array('/admin/review/delete', 'id'=>$data->id), array('class' => 'remove btn btn-danger'))
		),
	),
)); ?>
</div>
