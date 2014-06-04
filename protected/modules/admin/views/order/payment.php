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
		'name',
		'email',
		'phone',
	),
)); ?>

	<?php
		$view = $model->payment_id == OrderPayment::BEZNAL_NDS ? '_viev_order_nds' : '_viev_order';  
		$this->renderPartial($view, array('model'=>$model))
	?>

<br>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-form',
    'enableAjaxValidation' => false,
)); ?>

	<br>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->is_payment ? 'Снять оплату' : 'Оплатить',
		'htmlOptions' =>array(
			'name' => CHtml::activeName($model, 'is_payment'),
			'value' => $model->is_payment ? 0 : 1
		)
	)); ?>
			
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/order/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
