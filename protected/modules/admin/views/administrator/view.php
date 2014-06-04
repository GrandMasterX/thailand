<?php
$this->breadcrumbs=array(
	'Администраторы'=>array('admin'),
	"{$model->last_name} {$model->first_name}",
);
?>

<h1>Клиент: <?php echo "{$model->last_name} {$model->first_name}" ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'middle_name',
		'last_name',
		'email',
		'phone',
		'address',
	),
)); ?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/administrator/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/administrator/admin'),
	'label'=>'Отмена',
)); ?>
