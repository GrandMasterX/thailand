<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'action' => array('/user/auth/register'),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
	'htmlOptions' => array(
		'class' => 'register-form'
	)
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<label>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $model->getAttributeLabel('email'); ?>
		
	</label>
	<?php echo $form->error($model,'email'); ?>

	<label>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $model->getAttributeLabel('password'); ?>
		
	</label>
	<?php echo $form->error($model,'password'); ?>
	
	<label>
		<?php echo $form->passwordField($model,'password_repeat'); ?>
		<?php echo $model->getAttributeLabel('password_repeat'); ?>
		
	</label>
	<?php echo $form->error($model,'password_repeat'); ?>
	

	<div class="clear"></div>
	<input type="submit" class="button" name="login" value="Регистрация">

<?php $this->endWidget(); ?>
