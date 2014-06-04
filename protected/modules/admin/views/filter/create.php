<?php
$this->breadcrumbs=array(
	'Фильтры'=>array('admin'),
	'Создать',
);

?>

<h1>Создать фильтр</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>