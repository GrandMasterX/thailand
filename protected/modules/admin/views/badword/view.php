<?php
$this->breadcrumbs=array(
	'Стоп слова'=>array('admin'),
	$model->word,
);
?>

<h1>Стоп слово: <?php echo $model->word; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'word',
	),
)); ?>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/badword/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/badword/admin'),
	'label'=>'Отмена',
)); ?>
