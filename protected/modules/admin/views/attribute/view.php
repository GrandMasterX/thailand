<?php
$this->breadcrumbs=array(
	'Список атрибутов'=>array('admin'),
	$model->title,
);
?>

<h1>Атрибут: <?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
        array(
            'name' => 'type',
            'value' => Attribute::labelOfType($model->type)
        ),
		'alias',
		array(
			'label' => 'Опубликован',
			'type' => 'raw',
			'value' => $model->is_active ? 'Да' : 'Нет'
		),
	),
)); ?>

<?php if($model->type == Attribute::TYPE_LIST) : ?>
    <label><strong>Значения</strong></label>
    <ol>
        <?php foreach($model->listValues as $row) : ?>
            <li><?php echo $row->title ?></li>
        <?php endforeach ?>
    </ol>
<?php endif ?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/attribute/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/attribute/admin'),
	'label'=>'Отмена',
)); ?>
