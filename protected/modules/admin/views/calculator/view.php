<?php
$this->breadcrumbs=array(
	'Калькуляторы'=>array('admin'),
	$model->title,
);
?>

<h1>Калькулятор: <?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		array(
			'name'=>'catalog_id',
			'value'=>$model->catalog ? $model->catalog->title : null
		),
	),
)); ?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/calculator/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/calculator/admin'),
	'label'=>'Отмена',
)); ?>
