<?php
$this->breadcrumbs=array(
	'Калькуляторы'=>array('admin'),
	'Создать',
);

?>

<h1>Создать калькулятор</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>