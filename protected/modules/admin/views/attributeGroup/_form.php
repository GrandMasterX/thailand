<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'attributeGroup-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('attributeGroup/create') : $this->createUrl('attributeGroup/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textAreaRow($model,'description',array('class'=>'span5','maxlength'=>512)); ?>
	
    <?php $this->renderPartial('_attributeTab', array('form' => $form, 'model' => $model)) ?>
	
	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/attributeGroup/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
