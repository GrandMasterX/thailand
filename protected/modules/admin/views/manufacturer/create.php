<?php
$this->breadcrumbs=array(
	'Производители'=>array('admin'),
	'Создать',
);

?>

<h1>Создать производителя</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>