<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'review-form',
    'action' => $this->createUrl('review/create'),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
        'afterValidate'=>"js:function(form, data, hasError) {
			if(!hasError && data.html) {
				$('#review-list').prepend(data.html);
				$('input, textarea', form).val('');
			}
			return false;
        }",
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->hiddenField($model,'product_id',array('class'=>'span5','maxlength'=>60)); ?>
	
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>60)); ?>
	
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>60)); ?>
	
	<?php echo $form->textAreaRow($model,'description',array('class'=>'span8', 'rows'=>8)); ?>
	
	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'success',
		'label'=>$model->isNewRecord ? 'Добавить отзыв' : 'Редактировать',
	)); ?>
	
<?php $this->endWidget(); ?>

<div id="review-list">
	<?php
		foreach($product->reviews as $review) {
			$this->renderPartial('_view', array('model' => $review));
		}
	?>
</div>