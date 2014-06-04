<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'manufacturer-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('manufacturer/create') : $this->createUrl('manufacturer/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>60)); ?>
	
	<?php $this->widget('modules.image.components.ImageCropWidget', array(
		'model' => $model,
		'attribute' => 'logo',
		'minHeight' => 426,
		'minWidth' => 531
	)); ?>
	
	<?php echo $form->labelEx($model,'description'); ?>
	<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
		'model'=>$model,
		'attribute'=>'description',
		'uiColor'=>'#FFFFFF',
		'filebrowserImageUploadUrl' => '/admin/default/imageUpload',
		'ckeConfig' => array(
			'extraAllowedContent' => 'span'
		)
	)); ?>
	
	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/manufacturer/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
