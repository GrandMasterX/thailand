	<?php echo $form->dropDownListRow($model, 'status_id', CHtml::listData(OrderStatus::model()->active()->findAll(), 'id', 'title'),
        array(
			'class' => 'span5',
			'empty' => 'Выберите статус',
    )); ?>
	
	<?php echo $form->labelEx($model,'user_id') ?>
	<?php
		if(!$model->isNewRecord && $model->user) {
			$model->user_label = "{$model->user->first_name} {$model->user->last_name} ({$model->user->email})";
		}
	?>
	<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'model'=>$model,
		'attribute'=>'user_label',
		'source'=>'/admin/user/getUsers',
		'options'=>array(
			'minLength'=>'2',
			'select'=>"js:function(event, ui) {
				$('#user-id').val(ui.item.id);
				$('#user-name').val(ui.item.name);
				$('#user-email').val(ui.item.email);
				$('#user-phone').val(ui.item.phone);
				$('#user-address').val(ui.item.address);
			}"
		),
		'htmlOptions'=>array(
			'class'=>'span5'
		),
	));	?>
    <?php echo $form->hiddenField($model,'user_id', array('id' => 'user-id'))  ?>
	
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>60, 'id' => 'user-name')); ?>
	
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>60, 'id' => 'user-email')); ?>
	
	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>60, 'id' => 'user-phone')); ?>
	
    <?php echo $form->dropDownListRow($model, 'delivery_id', CHtml::listData(OrderDelivery::model()->active()->findAll(), 'id', 'title'),
        array(
			'class' => 'span5',
			'empty' => 'Выберите тип доставки',
    )); ?>
	
    <?php echo $form->dropDownListRow($model, 'payment_id', CHtml::listData(OrderPayment::model()->active()->findAll(), 'id', 'title'),
        array(
			'class' => 'span5',
			'empty' => 'Метод оплаты',
    )); ?>

	<?php echo $form->textAreaRow($model,'address',array('class'=>'span5', 'id' => 'user-address')); ?>
	
	<?php echo $form->textAreaRow($model,'description',array('class'=>'span5')); ?>
	
	<?php echo $form->labelEx($model,'create_time')  ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		'model'=>$model,
		'attribute'=>'create_time',
		'language'=>'ru',
		'options'=>array(
			'showAnim'=>'fold',
			'dateFormat'=>'yy-mm-dd',
		),
		'htmlOptions'=>array(
			'class'=>'span5'
		),
	));	?>
	
	<?php echo $form->checkBoxRow($model, 'is_payment'); ?>
	
	<?php echo $form->checkBoxRow($model, 'is_moderation'); ?>