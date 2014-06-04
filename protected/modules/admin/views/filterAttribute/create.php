<?php
$this->breadcrumbs=array(
	'Список атрибутов'=>array('admin'),
	'Создать',
);

?>

<h1>Создать атрибут</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>