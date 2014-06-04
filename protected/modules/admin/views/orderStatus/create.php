<?php
$this->breadcrumbs=array(
	'Статусы'=>array('admin'),
	'Создать',
);

?>

<h1>Создать статус заказа</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>