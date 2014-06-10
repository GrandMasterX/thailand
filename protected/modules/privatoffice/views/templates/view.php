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
		'firstName',
		'lastName',
		'middleName',
	),
)); ?>


<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/privatoffice/templates/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/mail/admin'),
	'label'=>'Отмена',
)); ?>
