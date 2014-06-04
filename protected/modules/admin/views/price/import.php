<?php
	$this->breadcrumbs=array(
        'Импорт',
    );
?>

<h1>Импорт данных</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'import-form',
	'action' => $this->createUrl('import'),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-raw-images">
		<?php $this->widget('modules.file.components.FileUploadWidget', array(
			'model' => $model,
			'attribute' => 'file',
			'url' => array('/admin/price/uploadFile'),
			'ubHtmlOptions' => array('class' => 'btn btn-primary btn-small'),
			'uploadButtonText' => '<i class="icon-plus-sign icon-white"></i> Добавить файл',
		)); ?>
	</div>
	
	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Импорт',
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