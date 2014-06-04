<?php
$this->breadcrumbs=array(
	'Глобальные переменные'=>array('admin'),
	$model->key,
);
?>

<h1>Переменная :<?php echo $model->key; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'key',
		'value',
		'description',
	),
)); ?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/config/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/config/admin'),
	'label'=>'Отмена',
)); ?>
