<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'filterAttribute-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('filterAttribute/create') : $this->createUrl('filterAttribute/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5 title_transliterate','maxlength'=>255)); ?>
	
	<?php echo $form->textFieldRow($model,'alias',array('class'=>'span5 alias_transliterate','maxlength'=>512)); ?>
	
    <?php echo $form->dropDownListRow($model, 'type', FilterAttribute::getList(),
        array(
			'id' => 'type',
			'class' => 'span5',
			'empty' => 'Выберите тип',
    )); ?>

	<?php $this->renderPartial('_listValues', array('model'=>$model)) ?> 

	<?php echo $form->checkBoxRow($model, 'is_active'); ?>

	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/filterAttribute/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
