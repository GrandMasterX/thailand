<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'group-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('group/create') : $this->createUrl('group/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'discount',array('class'=>'span2','maxlength'=>60)); ?>
	
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
		'url' => array('/admin/group/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
