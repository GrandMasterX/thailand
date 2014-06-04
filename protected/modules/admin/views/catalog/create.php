<?php
$this->breadcrumbs=array(
	'Каталог'=>array('admin'),
	'Создать',
);

?>

<h1>Создать категорию</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>