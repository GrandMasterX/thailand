<?php
$this->breadcrumbs=array(
	'Стоп слова'=>array('admin'),
	$model->word=>array('view','id'=>$model->id),
	'Редактировать',
);

?>

<h1>Редактировать: <?php echo $model->word; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>