<?php
$this->breadcrumbs=array(
	'Глобальные переменные'=>array('admin'),
	'Создать',
);

?>

<h1>Создать переменную</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>