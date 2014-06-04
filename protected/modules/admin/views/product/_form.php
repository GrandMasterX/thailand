<?php Yii::app()->clientScript->registerPackage('bootstrap.datepicker'); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'product-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('product/create') : $this->createUrl('product/update', array('id' => $model->id)),
    'enableAjaxValidation' => false,
)); ?>

	<?php echo $form->errorSummary(array($model, $filter)); ?>
	
	<?php echo CHtml::hiddenField('catalog', $model->catalog_id, array('id'=>'catalog-old-id')) ?>
	
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs',
		'events'=>array(
			'shown'=>"js:function(event) {
				var type = $(event.target).attr('data-type');
				if(type == 'attribute') {
					var id = $('#catalog-id').val();
					var old_id = $('#catalog-old-id').val();
					if(old_id != id) {
						$.get('/admin/filter/getForm', {id: id}, function(html) {
							$('#attribute-filter').html(html);	
							$('.date').datepicker({
								language: 'ru',
								format: 'yyyy-mm-dd'
							});
						})
					}
				}
			}",
		),
		'tabs'=>array(
			array(
				'label' => 'Параметры',
				'linkOptions'=>array('data-type'=>'basic'),
				'content' => $this->renderPartial('_basicTab', array('form' => $form, 'model' => $model), true),
				'active'=>!$filter->hasErrors()
			), 
			array(
				'label' => 'Категория',
				'linkOptions'=>array('data-type'=>'catalog'),
				'content' => $this->renderPartial('_catalogTab', array('form' => $form, 'model' => $model), true),
				'active'=>false
			), 
			array(
				'label' => 'Атрибуты',
				'linkOptions'=>array('data-type'=>'attribute'),
				'content' => $this->renderPartial('_attributeTab', array('form' => $form, 'model' => $model, 'filter' => $filter, 'attributeGroup' => $attributeGroup), true),
				'active'=>$filter->hasErrors()
			),
			array(
				'label' => 'Галерея',
				'linkOptions'=>array('data-type'=>'gallery'),
				'content' => $this->renderPartial('_galleryTab', array('form' => $form, 'model' => $model), true),
				'active'=>false
			), 
			array(
				'label' => 'Акция',
				'linkOptions'=>array('data-type'=>'action'),
				'content' => $this->renderPartial('_actionTab', array('form' => $form, 'model' => $model), true),
				'active'=>false
			), 
			array(
				'label' => 'SEO',
				'linkOptions'=>array('data-type'=>'seo'),
				'content' => $this->renderPartial('_seoTab', array('form' => $form, 'model' => $model), true),
				'active'=>false
			), 
			array(
				'label' => 'Отзывы',
				'linkOptions'=>array('data-type'=>'review'),
				'content' => $this->renderPartial('_reviewTab', array('form' => $form, 'model' => $model), true),
				'visible' => !$model->isNewRecord,
				'active'=>false
			) 
		)	
	)) ?>	

	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/product/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
