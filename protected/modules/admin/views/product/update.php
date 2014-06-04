<?php
$this->breadcrumbs=array(
	'Товары'=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	'Редактировать',
);

?>

<h1>Редактировать: <?php echo $model->title; ?></h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model, 'filter' => $filter, 'attributeGroup' => $attributeGroup)); ?>
</div>