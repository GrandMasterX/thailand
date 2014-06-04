<?php
	$this->breadcrumbs=array(
        'Экспорт',
    );
?>

<h1>Экспорт данных</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'export-price-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>
	
    <?php echo $form->dropDownListRow($model, 'currency', ExportPriceForm::getCurrencyListData(),
        array(
			'class' => 'span5',
			'empty' => 'Выберите валюту',
    )); ?>
	
    <?php echo $form->textFieldRow($model,'rate',array('class'=>'span5','maxlength'=>255)); ?>
	
    <?php echo $form->dropDownListRow($model, 'format', ExportPriceForm::getFormatListData(),
        array(
			'class' => 'span5',
			'empty' => 'Выберите формат',
    )); ?>
	
	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Экспорт',
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>

