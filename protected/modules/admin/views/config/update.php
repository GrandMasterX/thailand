<?php
$this->breadcrumbs=array(
	'Глобальные переменные'=>array('admin'),
	$model->key=>array('view','id'=>$model->id),
	'Редактировать',
);

?>

<h1>Редактировать: <?php echo $model->key; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>