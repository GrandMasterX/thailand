<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'config-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('config/create') : $this->createUrl('config/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'key',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textAreaRow($model,'value',array('class'=>'span5')); ?>
		
	<?php echo $form->textAreaRow($model,'description',array('class'=>'span5','maxlength'=>512)); ?>
	
	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/config/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
