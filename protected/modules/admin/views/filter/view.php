<?php
$this->breadcrumbs=array(
	'Фильтры'=>array('admin'),
	$model->title,
);
?>

<h1>Фильтр: <?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		array(
			'label' => 'Опубликован',
			'type' => 'raw',
			'value' => $model->is_active ? 'Да' : 'Нет'
		),
	),
)); ?>

<label><strong>Атрибуты</strong></label>
<ol>
    <?php foreach($model->myAttributes as $attribute) : ?>
        <li><?php echo $attribute->title ?> </li>
    <?php endforeach ?>
</ol>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/filter/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/filter/admin'),
	'label'=>'Отмена',
)); ?>
