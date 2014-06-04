<?php

    Yii::app()->clientScript->registerScript('errors', "
		$.fn.popover.defaults.html = true;
    ");


	$this->breadcrumbs=array(
        'Импорт',
    );
?>

<h1>Ошибки импорта</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'error-grid',
	'type'=>'striped',
	'dataProvider'=>$model->errorDataProvider,
	'columns'=>$model->getColumns()
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/price/import'),
	'label'=>'Отмена',
)); ?>
