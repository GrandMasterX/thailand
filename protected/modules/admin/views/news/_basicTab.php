<?php echo $form->textFieldRow($model,'title',array('class'=>'span5 title-transliterate','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'alias',array('class'=>'span5 alias-transliterate','maxlength'=>512)); ?>

<?php $this->widget('modules.image.components.ImageCropWidget', array(
	'model' => $model,
	'attribute' => 'image',
	'minWidth' => 400,
	'minHeight' => 321,
)); ?>

<?php echo $form->labelEx($model,'content'); ?>
<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
    'model'=>$model,
    'attribute'=>'content',
	'uiColor'=>'#FFFFFF',
	'filebrowserImageUploadUrl' => '/admin/default/imageUpload',
	'ckeConfig' => array(
		'extraAllowedContent' => 'span'
	)
)); ?>

<br>
<?php echo $form->checkBoxRow($model, 'is_active'); ?>
