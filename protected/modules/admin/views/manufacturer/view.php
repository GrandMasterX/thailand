<?php
$this->breadcrumbs=array(
	'Производители'=>array('admin'),
	$model->title,
);
?>

<h1>Производитель: <?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		array(
			'name' => 'logo',
			'type' => 'raw',
			'value' => $model->logo ? CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(48, 48, $model->logo, array('method' => 'adaptiveResize'))) : null
		),
	),
)); ?>

<div>
	<?php echo $model->description ?>
</div>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/manufacturer/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/manufacturer/admin'),
	'label'=>'Отмена',
)); ?>
