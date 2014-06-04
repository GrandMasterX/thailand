<h4>Последнии заказы</h4>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'admin-grid',
	'type'=>'bordered',
	'template'=>"{items}",
	'dataProvider'=>$orderDataProvider,
	'columns'=>array(
		array(
			'class'=>'modules.admin.components.AdminCheckBoxColumn',
        ),	
		array(
			'header'=>'#',
			'name'=>'id',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
		array(
			'name'=>'name',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				$label = $data->user_id ? "{$data->name} <i class='icon-user'></i>" : $data->name;
				return $data->is_moderation
					? $label
					: CHtml::link($label, array('/admin/order/update', 'id'=>$data->id));
			}
		),
		'email',
		'phone',
		array(
			'name'=>'status_id',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return $data->status ? $data->status->title : null;
			},
		),
		'sum',
		array(
			'name'=>'is_payment',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return $data->is_payment ? 'Да' : 'Нет';
			},
		),
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return Yii::app()->dateFormatter->format("dd MMMM yyyy", $data->create_time);
			}
		),
	),
)); ?>