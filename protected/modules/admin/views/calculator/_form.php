	<?php Yii::app()->clientScript->registerScript('catalog-tree', "
		$('#catalog-tree').on('select_node.jstree', function (event, data) {
			var id = data.rslt.obj.data('id');
			$('#catalog-id').val(id);
	    })  
	");
	?>    


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'calculator-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('calculator/create') : $this->createUrl('calculator/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
		'beforeValidate'=>"js:function(form, data, hasError) {
		
			var data = [];
			$('#attribute-list tr.attribute').each(function() {
			
				var tr = $(this);
				var list = [];
				tr.nextAll('.list').each(function() {
					var tr = $(this);
					list.push({
						name: $('input.name', tr).val(),
						price: $('input.price', tr).val(),
					})
				})
				
				data.push({
					name: $('input.name', tr).val(),
					type: $('select.type', tr).val(),
					price: $('input.price', tr).val(),
					list: list
				})
			})
			
			$('#individual-attributes').val( JSON.stringify(data) );
		
            return true;
        }",
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>60)); ?>
	
	<?php echo $this->renderPartial('_attributes', array('form'=>$form, 'model'=>$model))  ?>
	
	<br><br>
	
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
		'url' => array('/admin/calculator/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
