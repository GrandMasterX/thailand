<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'action' => array('/user/auth/login'),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
	'htmlOptions' => array(
		'class' => 'login-form'
	)
)); ?>

	<label><?php echo $form->textField($model,'login'); ?>E-mail</label>
	<?php echo $form->error($model,'login'); ?>
	
	<label><?php echo $form->passwordField($model,'password'); ?>Пароль</label>
	<?php echo $form->error($model,'password'); ?>
	
	<div class="clear"></div>
	<p>
		<input type="submit" class="button" name="login" value="Авторизация">
		<a class="lost_password" href="<?php echo Yii::app()->createUrl('/auth/passwordReset') ?>">Потеряли пароль?</a>
	</p>

<?php $this->endWidget(); ?>