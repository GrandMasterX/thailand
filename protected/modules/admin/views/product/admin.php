<?php
    $this->breadcrumbs=array(
        'Товары'=>array('admin'),
        'Список',
    );
?>

<h1>Список товаров</h1>

<?php $this->widget('modules.admin.components.Toolbar', array(
	'model'=>$model 
)) ?>

<div class="create-form" style="display: none">
<?php $this->renderPartial('_form',array(
	'model'=>$model,
	'filter'=>new FilterAdminForm,
	'attributeGroup' => new AttributeGroupAdminForm
)); ?>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'admin-grid',
	'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'afterAjaxUpdate'=>"js:function(id, data) {
		var id = $('#catalog-filter-id').val();
		$('#catalog-filter').jstree({
			'core':{
				'initially_open':'catalog-filter-1'
			},
			ui:{
				'initially_select': 'catalog-filter-' + id
			}, 
			'plugins':['themes','html_data','ui']});
	}",
	'columns'=>array(
		array(
			'class'=>'modules.admin.components.AdminCheckBoxColumn',
        ),	
		array(
			'name' => 'preview',
			'type' => 'raw',
			'value'=>function($data, $roe) {
				return $data->preview ? CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(48, 48, $data->preview, array('method' => 'adaptiveResize'))) : null;
			},
			'filter' => false,
			'htmlOptions' => array(
				'style' => 'width: 50px'
			)
		),
		array(
			'name'=>'code',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return CHtml::link($data->code, array('/admin/product/update', 'id'=>$data->id));
			},
			'htmlOptions' => array(
				'style' => 'width: 70px'
			)
		),
		array(
			'name'=>'title',
			'htmlOptions' => array(
				'style' => 'width: 350px'
			)
		),
		array(
			'name'=>'price',
			'htmlOptions' => array(
				'style' => 'width: 100px'
			)
		),
		array(
			'header'=>'Акция',
			'name'=>'is_action',
			'type' => 'raw',
			'value'=>function($data, $roe) {
				return $data->is_action ? '<strong>Да</strong>' : 'Нет';
			},
			'htmlOptions' => array('style'=>'width: 100px; text-align: center;'),
			'filter'=>array(0=>'Нет', 1=>'Да'),
		),
		array(
			'name'=>'manufacturer_id',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return $data->manufacturer ? $data->manufacturer->title : null;
			},
			'filter'=>CHtml::listData(Yii::app()->db->createCommand()->select('id, title')->from('manufacturer')->order('title')->queryAll(), 'id', 'title'),
		),
		array(
			'name'=>'catalog_id',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return $data->catalog ? $data->catalog->title : null;
			},
			'filter'=>$this->renderPartial('_catalog_filter', array('model'=>$model), true),
		),
		array(
            'class'=>'modules.admin.components.ActiveGridColumn',
		),
		array(
			'class'=>'modules.admin.components.AdminProductButtonColumn',
		),
	),
)); ?>