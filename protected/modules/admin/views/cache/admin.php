<?php
    $this->breadcrumbs=array(
        'Кэш',
    );
?>

<h1>Кэш</h1>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/cache/clear'),
	'label'=>'Очистить кэш',
)); ?>


