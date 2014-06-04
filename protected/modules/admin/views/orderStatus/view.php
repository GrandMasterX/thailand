<?php
$this->breadcrumbs=array(
	'Статусы'=>array('admin'),
	$model->title,
);
?>

<h1>Статус :<?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
	),
)); ?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/orderStatus/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/orderStatus/admin'),
	'label'=>'Отмена',
)); ?>
