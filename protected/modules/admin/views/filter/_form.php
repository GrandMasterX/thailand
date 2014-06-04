<?php
	Yii::app()->clientScript->registerScript('catalog-tree', "
		$('#catalog-tree').on('select_node.jstree', function (event, data) {
			var id = data.rslt.obj.data('id');
			$('#catalog-id').val(id);
	    }).on('loaded.jstree', function (event, data) {
            //$(this).jstree('open_all');
        })  
	"); 
?>	


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'filter-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('filter/create') : $this->createUrl('filter/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php $this->renderPartial('_attributeTab', array('form' => $form, 'model' => $model)) ?>
	
	
	<?php echo $form->labelEx($model, 'catalog_id');?>
	<?php echo $form->hiddenField($model, 'catalog_id', array('id' => 'catalog-id'));?>
	<?php echo $form->error($model, 'catalog_id');?>
	
	<?php  $this->widget('ext.jstree.SJsTree', array(
        'id'=>'catalog-tree',
        'data'=>Catalog::asArray(),
        'options'=>array(
            'core'=>array(
                'initially_open'=>"catalog-tree-1",
            ),
            'ui'=>array(
                'initially_select'=>"catalog-tree-{$model->catalog_id}",
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
		'url' => array('/admin/filter/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
