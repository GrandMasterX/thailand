<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'catalog-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('catalog/create') : $this->createUrl('catalog/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5 title-transliterate','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'alias',array('class'=>'span5 alias-transliterate','maxlength'=>512)); ?>
	
	<?php echo $form->textAreaRow($model,'description',array('class'=>'span5')); ?>
	
	<?php $this->widget('modules.image.components.ImageCropWidget', array(
		'model' => $model,
		'attribute' => 'icon',
		'minHeight' => 35,
		'minWidth' => 35
	)); ?>
	
	<?php $this->widget('modules.image.components.ImageCropWidget', array(
		'model' => $model,
		'attribute' => 'image',
		'minHeight' => 426,
		'minWidth' => 531
	)); ?>

	<?php Yii::app()->clientScript->registerScript('parent-tree', "
		$('#parent-tree').on('select_node.jstree', function (event, data) {
			var id = data.rslt.obj.data('id');
			$('#parent-id').val(id);
	    }).on('loaded.jstree', function (event, data) {
            $(this).jstree('open_all');
        })  
	");
	
	if(!$model->isNewRecord) {
		$parent = $model->parent()->find();
		$model->parent_id = $parent ? $parent->id : 0;
	}
	?>    

	<?php echo $form->labelEx($model, 'parent_id');?>
	<?php echo $form->hiddenField($model, 'parent_id', array('id' => 'parent-id'));?>
	<?php echo $form->error($model, 'parent_id');?>
		
	<?php  $this->widget('ext.jstree.SJsTree', array(
        'id'=>'parent-tree',
        'data'=>Catalog::asArray(),
        'options'=>array(
            'core'=>array(
                'initially_open'=>"parent-tree-1",
            ),
            'ui'=>array(
                'initially_select'=>"catalog-tree-{$model->parent_id}",
            ),
            'plugins'=>array('themes','html_data','ui'),
        ),
		'htmlOptions' =>array(
			'style' => 'margin-top: 20px;'
		)
    ));
    ?>
	
	<br>
	
	<?php echo $form->checkBoxRow($model, 'is_active'); ?>	
	
	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/catalog/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>
	
<?php $this->endWidget(); ?>
