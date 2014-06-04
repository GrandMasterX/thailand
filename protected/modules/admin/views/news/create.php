<?php
$this->breadcrumbs=array(
	'Новости'=>array('admin'),
	'Создать',
);

?>

<h1>Создать новость</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>