<div class="login">
	<?php /** @var $form TbActiveForm */
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'admin-login-form',
		'enableAjaxValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			'validateOnChange' => false,
		),
	)); ?>

	<div class="form-raw">
		<?php echo $form->textFieldRow($model,'username',array('class'=>'span4','maxlength'=>255, 'autofocus'=>'autofocus')); ?>
	</div>

	<div class="form-raw">
		<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span4','maxlength'=>255)); ?>
	</div>

	<div class="form-raw">
		<?php echo $form->checkBoxRow($model,'rememberMe'); ?>
	</div>

	<div class="form-raw">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon' => 'icon-ok-sign icon-white',
			'label'=> 'Войти'
		)); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>
