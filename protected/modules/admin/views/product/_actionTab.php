<?php
	if($model->is_action) {
		$model->action_old_price = $model->price_old;
		$model->action_new_price = $model->price;
		if($model->price_old)	
			$model->action_interest = number_format(100 - ($model->price/$model->price_old * 100), 2);
		
	} else {
		$model->action_old_price = $model->price;
		$model->action_new_price = $model->price;
		$model->action_interest = null;
	}
	
?>

<?php echo $form->checkBoxRow($model, 'is_action', array('id'=>'action-is')); ?>

<div id="action-blok" style="<?php echo $model->is_action ? 'display:blok' : 'display:none' ?>">
	<?php echo $form->textFieldRow($model,'action_old_price',array('class'=>'span2','maxlength'=>15, 'id'=>'action-old-price')); ?>

	<?php echo $form->textFieldRow($model,'action_interest',array('class'=>'span2','maxlength'=>15, 'id'=>'action-interest')); ?>

	<?php echo $form->textFieldRow($model,'action_new_price',array('class'=>'span2','maxlength'=>15, 'id'=>'action-new-price')); ?>
	
	<?php echo $form->labelEx($model,'action_start')  ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>'action_start',
		'language'=>'ru',
		'options'=>array(
			'showAnim'=>'fold',
			'dateFormat'=>'yy-mm-dd',
		),
		'htmlOptions'=>array(
			'class'=>'span2'
		),
	));	?>


	<?php echo $form->labelEx($model,'action_end')  ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>'action_end',
		'language'=>'ru',
		'options'=>array(
			'showAnim'=>'fold',
			'dateFormat'=>'yy-mm-dd',
		),
		'htmlOptions'=>array(
			'class'=>'span2'
		),
	));	?>
	
</div>

<script>
	$(function() {
		$('#action-is').on('click', function() {
			$('#action-blok').toggle( $(this).val() );	
		})
		
		$('#action-interest').on('keyup', function() {
			var interest = 100 - $(this).val();
			var oldPrice = $('#action-old-price').val();
			$('#action-new-price').val( oldPrice * interest / 100 );
		})
		
		$('#action-new-price').on('keyup', function() {
			var interest = 100 - $(this).val();
			var oldPrice = $('#action-old-price').val();
			var newPrice = $('#action-new-price').val();
			
			$('#action-interest').val( parseInt(100 - (newPrice / oldPrice * 100)) );
		})
		
	})
</script>