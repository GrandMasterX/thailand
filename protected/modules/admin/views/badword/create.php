<?php
$this->breadcrumbs=array(
	'Стоп слова'=>array('admin'),
	'Создать',
);

?>

<h1>Создать стоп слово</h1>

<div class="create-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>