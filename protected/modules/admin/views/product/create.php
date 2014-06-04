<?php
$this->breadcrumbs=array(
	'Товары'=>array('admin'),
	'Создать',
);

?>

<h1>Создать товар</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model, 'filter' => $filter, 'attributeGroup' => $attributeGroup)); ?>
</div>