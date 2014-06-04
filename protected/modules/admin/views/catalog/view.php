<?php
$this->breadcrumbs=array(
	'Каталог'=>array('admin'),
	$model->title,
);
?>

<h1>Категория :<?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'label' => 'Иконка',
			'type' => 'raw',
			'value' => $model->icon ? CHtml::image(Yii::app()->baseUrl . $model->icon) : null
		),
		array(
			'label' => 'Изображение',
			'type' => 'raw',
			'value' => $model->image ? CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(48, 48, $model->image, array('method' => 'adaptiveResize'))) : null
		),
		'title',
		'alias',
		array(
			'label' => 'Опубликован',
			'type' => 'raw',
			'value' => $model->is_active ? 'Да' : 'Нет'
		),
	),
)); ?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/catalog/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/catalog/admin'),
	'label'=>'Отмена',
)); ?>
