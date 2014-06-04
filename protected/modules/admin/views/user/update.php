<?php
$this->breadcrumbs=array(
	'Клиенты'=>array('admin'),
	"{$model->last_name} {$model->first_name}"=>array('view','id'=>$model->id),
	'Редактировать',
);

?>

<h1>Редактировать: <?php echo "{$model->last_name} {$model->first_name}"; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>