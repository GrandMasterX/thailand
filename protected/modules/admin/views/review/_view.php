<div class="item">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'type'=>'bordered', 
	'attributes'=>array(
		'name',
		'email',
		'description',
		array(
			'name' => 'create_time',
			'value' => Yii::app()->dateFormatter->format("dd MMMM yyyy hh:mm:ss", $model->create_time)
		),
		array(
			'label' => $model->is_active 
				? CHtml::link('<i class="icon-remove-sign icon-white"></i> Снять</a>', array('/admin/review/moderation', 'id'=>$model->id), array('class' => 'moderation btn btn-info'))
				: CHtml::link('<i class="icon-ok-circle icon-white"></i> Опубликовать</a>', array('/admin/review/moderation', 'id'=>$model->id), array('class' => 'moderation btn btn-info')),
			'type' => 'raw',
			'value' => CHtml::link('<i class="icon-remove icon-white"></i> Удалить отзыв</a>', array('/admin/review/delete', 'id'=>$model->id), array('class' => 'remove btn btn-danger'))
		),
	),
)); ?>
</div>
