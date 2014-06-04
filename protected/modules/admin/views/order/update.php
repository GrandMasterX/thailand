<?php
$this->breadcrumbs=array(
	'Заказы'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Редактировать',
);

?>

<h1>Редактировать: #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>