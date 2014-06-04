<?php
    $this->breadcrumbs=array(
        'Заказы'=>array('admin'),
        'Список',
    );
?>

<h1>Заказы</h1>

<?php $this->widget('modules.admin.components.Toolbar', array(
	'model'=>$model 
)) ?>

<div class="create-form" style="display: none">
<?php $this->renderPartial('_form',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'admin-grid',
	'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
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
			'filter' => CHtml::listData(OrderStatus::model()->active()->findAll(), 'id', 'title')
		),
		'sum',
		array(
			'name'=>'is_payment',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return $data->is_payment ? 'Да' : 'Нет';
			},
			'filter' => array(0=>'Нет', 1=>'Да')
		),
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return Yii::app()->dateFormatter->format("dd MMMM yyyy", $data->create_time);
			}
		),
		array(
			'class'=>'modules.admin.components.AdminOrderButtonColumn',
		),
	),
)); ?>