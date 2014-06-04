<?php
$this->breadcrumbs=array(
	'Типы доставки'=>array('admin'),
	'Создать',
);

?>

<h1>Создать типы доставки</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>