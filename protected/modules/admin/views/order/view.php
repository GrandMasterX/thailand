<?php
$this->breadcrumbs=array(
	'Заказы'=>array('admin'),
	$model->id,
);
?>

<h1>Заказ: #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name' => 'status_id',
			'value' => function($data) {
				return $data->status ? $data->status->title : null;
			}
		),
		array(
			'name' => 'payment_id',
			'value' => function($data) {
				return $data->payment ? $data->payment->title : null;
			}
		),
		'name',
		'email',
		'phone',
		array(
			'name' => 'delivery_id',
			'value' => function($data) {
				return $data->delivery ? $data->delivery->title : null;
			}
		),
		'address',
		'description',
		'sum',
		array(
			'name' => 'is_moderation',
			'value' => function($data) {
				return $data->is_moderation ? 'Да' : 'Нет';
			}
		),
		array(
			'name' => 'is_payment',
			'value' => function($data) {
				return $data->is_payment ? 'Да' : 'Нет';
			}
		),
		array(
			'name' => 'create_time',
			'value' => function($data) {
				return Yii::app()->dateFormatter->format("dd MMMM yyyy", $data->create_time);
			}
		),
	),
)); ?>

	<?php
		$view = $model->payment_id == OrderPayment::BEZNAL_NDS ? '_viev_order_nds' : '_viev_order';  
		$this->renderPartial($view, array('model'=>$model))
	?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/order/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/order/admin'),
	'label'=>'Отмена',
)); ?>
