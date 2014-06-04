<?php
    $this->breadcrumbs=array(
        'Калькуляторы'=>array('admin'),
        'Список',
    );
?>

<h1>Калькуляторы</h1>

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
			'name'=>'title',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return CHtml::link($data->title, array('/admin/calculator/update', 'id'=>$data->id));
			}
		),
		array(
			'name'=>'catalog_id',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return $data->catalog ? $data->catalog->title : null;
			}
		),
		array(
            'class'=>'modules.admin.components.ActiveGridColumn',
		),
		array(
			'class'=>'modules.admin.components.AdminButtonColumn',
		),
	),
)); ?>