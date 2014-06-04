<?php
$this->breadcrumbs=array(
	'Почта (шаблоны)'=>array('admin'),
	$model->name,
);
?>

<h1>Шаблон: <?php echo $model->name; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'subject',
	),
)); ?>

<?php echo $model->template ?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/mail/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/mail/admin'),
	'label'=>'Отмена',
)); ?>
