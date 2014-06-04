<?php
$this->breadcrumbs=array(
	'Товары'=>array('admin'),
	$model->title,
);
?>

<h1>Товар: <?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		array(
			'name' => 'manufacturer_id',
			'value' => $model->manufacturer ? $model->manufacturer->title : null
		),
		array(
			'name' => 'preview',
			'type' => 'raw',
			'value' => $model->preview ? CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(48, 48, $model->preview, array('method' => 'adaptiveResize'))) : null
		),
		array(
			'label' => 'Галерея',
			'type' => 'raw',
			'value' => function($data) {
				$html = array();
				foreach($data->images as $image)
					$html[] = CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(48, 48, $image->url, array('method' => 'adaptiveResize')), null, array('style' => 'margin-right: 8px;'));
					
				return implode('', $html);	
			}
		),
		'title',
		'alias',
		'price',
		array(
			'name' => 'is_stock',
			'value' => $model->is_stock ? 'Да' : 'Нет'
		),
		'sale_count',
		array(
			'label'=>'title',
			'name'=>'page_title'
		),
		array(
			'label'=>'description',
			'name'=>'meta_description'
		),
		array(
			'label'=>'keywords',
			'name'=>'meta_keywords'
		),
		array(
			'name' => 'update_time',
			'value' => Yii::app()->dateFormatter->format("dd MMMM yyyy", $model->update_time)
		),
		array(
			'name' => 'create_time',
			'value' => Yii::app()->dateFormatter->format("dd MMMM yyyy", $model->create_time)
		),
		array(
			'label' => 'Опубликован',
			'value' => $model->is_active ? 'Да' : 'Нет'
		),
	),
)); ?>

<div>
	<?php echo $model->description ?>
</div>

<br>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'primary',
	'url' => array('/admin/product/update', 'id' => $model->id),
	'icon' => 'pencil white',
	'label'=>'Редактировать',
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'success',
	'url' => array('/admin/product/clone', 'id' => $model->id),
	'icon' => 'adjust white',
	'label'=>'Клонировать',
)); ?>
	
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'type'=>'danger',
	'url' => array('/admin/product/admin'),
	'label'=>'Отмена',
)); ?>
