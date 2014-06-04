<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'title',array('class'=>'span5 title-transliterate','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'alias',array('class'=>'span5 alias-transliterate','maxlength'=>512)); ?>

<?php echo $form->dropDownListRow($model, 'manufacturer_id', CHtml::listData(Manufacturer::model()->active()->findAll(), 'id', 'title'),
    array(
		'class' => 'span5',
		'empty' => 'Выберите производителя',
)); ?>

<?php echo $form->textFieldRow($model,'unit',array('class'=>'span5','maxlength'=>100)); ?>

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

<br>	

<?php echo $form->checkBoxRow($model, 'is_active'); ?>
