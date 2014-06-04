<?php
$this->breadcrumbs=array(
	'Заказы'=>array('admin'),
	'Создать',
);

?>

<h1>Создать заказ</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>