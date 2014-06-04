<?php
$this->breadcrumbs=array(
	'Клиенты'=>array('admin'),
	'Создать',
);

?>

<h1>Создать клиента</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>