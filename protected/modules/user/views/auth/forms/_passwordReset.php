<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'password-reset-form',
    'action' => array('/user/auth/passwordReset'),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<label>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $model->getAttributeLabel('email'); ?>
		
	</label>
	<?php echo $form->error($model,'email'); ?>
	
	<div class="clear"></div>
	<input type="submit" class="button" name="login" value="Отправить">

<?php $this->endWidget(); ?>

