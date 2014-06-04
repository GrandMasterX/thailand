<?php
$this->breadcrumbs=array(
	'Менеджеры'=>array('admin'),
	'Создать',
);

?>

<h1>Создать менеджера</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>