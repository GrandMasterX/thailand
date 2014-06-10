<div id="contentImages"></div>
<div id="content">
    <div id="contentHead">
        <h1>Восстановление пароля</h1>
		<?php $this->widget('SiteBreadcrumbs', array(
			'links'=>array(
				'Восстановление пароля'
			),
		)); ?>		
    </div>

    <div id="napolnStran">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			'enableAjaxValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				'validateOnChange' => false,
			),
		)); ?>

		<div class="form-raw">
			<?php echo $form->labelEx($model,'password_new'); ?>
			<?php echo $form->passwordField($model,'password_new', array('style'=>'width: 300px;')); ?>
			<?php echo $form->error($model,'password_new', array('style'=>'clear: left;')); ?>
		</div>
		
		<div class="form-raw">
			<?php echo $form->label($model,'password_repeat'); ?>
			<?php echo $form->passwordField($model,'password_repeat', array('style'=>'width: 300px;')); ?>
			<?php echo $form->error($model,'password_repeat', array('style'=>'clear: left;')); ?>
		</div>

		<div class="form-raw submit">
			<a href="#" id="user-form-submit" class="enter"></a>
		</div>

		<?php $this->endWidget(); ?>

		<script>
			$(function() {
				$('#user-form-submit').on('click', function() {
					$('#user-form').submit();
					return false;
				})
			})
		</script>
    </div>
</div>
</div>
