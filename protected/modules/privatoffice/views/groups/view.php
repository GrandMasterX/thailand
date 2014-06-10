<?php
$this->breadcrumbs=array(
	'Почта (шаблоны)'=>array('admin'),
	$model->id,
);
?>

<h1>Шаблон: <?php echo $model->name; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
	),
)); ?>


<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/privatoffice/groups/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/privatoffice/groups/all'),
	'label'=>'Отмена',
)); ?>
