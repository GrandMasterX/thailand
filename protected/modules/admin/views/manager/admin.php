<?php
    $this->breadcrumbs=array(
        'Менеджеры'=>array('admin'),
        'Список',
    );
?>

<h1>Менеджеры</h1>

<?php $this->widget('modules.admin.components.Toolbar', array(
	'model'=>$model 
)) ?>

<div class="create-form" style="display: none">
<?php $this->renderPartial('_form',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'admin-grid',
	'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'=>'modules.admin.components.AdminCheckBoxColumn',
        ),	
		array(
			'header'=>'#',
			'name'=>'id',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
		array(
			'name'=>'last_name',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return CHtml::link("{$data->last_name} {$data->first_name}", array('/admin/manager/update', 'id'=>$data->id));
			}
		),
		'email',
		'phone',
		array(
			'class'=>'modules.admin.components.AdminButtonColumn',
		),
	),
)); ?>