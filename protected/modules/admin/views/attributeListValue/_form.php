<div>
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>"form-{$model->id}",
		'action' => array('/admin/attributeListValue/update', 'id'=>$model->id),
		'enableAjaxValidation' => false,
		'htmlOptions' => array(
			'style'=>'margin: 5px 0 5px 0;'
		),
	)); ?>
	
	<?php echo $form->textFieldRow($model,'title',array('label'=>false, 'class'=>'span5', 'style'=>'width: 470px; margin: 0;')); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'link',
		'type'=>'primary',
		'size'=>'small', 
		'icon'=>'ok white',
		'htmlOptions' => array(
			'class'=>'save',
			'style'=>'margin-left: 5px;',
			'rel'=>'tooltip',
			'title'=>'Сохранить',
			'data-form'=>"#form-{$model->id}",
			'data-view'=>"#list-view-{$model->id}",
		)
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'link',
		'size'=>'small', 
		'icon'=>'remove',
		'htmlOptions' => array(
			'class'=>'cansel',
			'rel'=>'tooltip',
			'title'=>'Отмена',
			'data-id'=>"#update-{$model->id}"
		)
	)); ?>
	
	<?php $this->endWidget(); ?>
</div>	
