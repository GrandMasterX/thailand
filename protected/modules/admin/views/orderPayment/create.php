<?php
$this->breadcrumbs=array(
	'Методы оплаты'=>array('admin'),
	'Создать',
);

?>

<h1>Создать метод оплаты</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>