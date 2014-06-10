<?php
	$this->pageTitle = 'Редактировать личные данные';
	$this->title = 'Редактировать личные данные';
	$this->breadcrumbs = array(
		'Личный кабинет' => array('/user/default/index'),
		'Редактировать личные данные'
	);
?>	
	
	<?php $this->widget('widgets.CartWidget'); ?>		
	
	
    <div id="content">
		<div class="kabinetPage">
			<div class="col-1">
				<h2>Редактировать личные данные</h2>
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'user-form',
					'enableAjaxValidation' => true,
					'clientOptions' => array(
						'validateOnSubmit' => true,
						'validateOnChange' => false,
					),
				)); ?>
				
				<p class="form-row">
					<?php echo $form->labelEx($model, 'first_name') ?>
					<?php echo $form->textField($model,'first_name'); ?>
					<?php echo $form->error($model,'first_name'); ?>
				</p>
				
				<p class="form-row">
					<?php echo $form->labelEx($model, 'last_name') ?>
					<?php echo $form->textField($model,'last_name'); ?>
					<?php echo $form->error($model,'last_name'); ?>
				</p>
				
				<p class="form-row">
					<?php echo $form->labelEx($model, 'middle_name') ?>
					<?php echo $form->textField($model,'middle_name'); ?>
					<?php echo $form->error($model,'middle_name'); ?>
				</p>
				
				<p class="form-row">
					<?php echo $form->labelEx($model, 'email') ?>
					<?php echo $form->emailField($model,'email'); ?>
					<?php echo $form->error($model,'email'); ?>
				</p>
				
				<p class="form-row">
					<?php echo $form->labelEx($model, 'phone') ?>
					<?php echo $form->telField($model,'phone'); ?>
					<?php echo $form->error($model,'phone'); ?>
				</p>
				
				<p class="form-row">
					<?php echo $form->labelEx($model, 'address') ?>
					<?php echo $form->textArea($model,'address'); ?>
					<?php echo $form->error($model,'address'); ?>
				</p>

				<div class="clear"></div>
				<div>	
				<a id="password-new-link" class="cancel-button btn btn-danger" href="#password-new" data-scenario='{"admin": "<?php echo User::SCENARIO_ADMIN_UPDATE_USER ?>", "reset": "<?php echo User::SCENARIO_ADMIN_PASSWORD_RESET_USER ?>"}' >Сменить пароль</a>
				
				<div id="password-new" style="display: none; margin-top: 10px">
					<p class="form-row">
						<?php echo $form->labelEx($model, 'password_new') ?>
						<?php echo $form->passwordField($model,'password_new'); ?>
						<?php echo $form->error($model,'password_new'); ?>
					</p>
					
					<p class="form-row">
						<?php echo $form->labelEx($model, 'password_repeat') ?>
						<?php echo $form->passwordField($model,'password_repeat'); ?>
						<?php echo $form->error($model,'password_repeat'); ?>
					</p>
					
					<?php echo CHtml::hiddenField('scenario', User::SCENARIO_ADMIN_UPDATE_USER, array('id'=>'scenario')) ?>
				</div>
				</div>
				
					
                <div class="clear"></div>
                <p>
                    <input type="submit" class="button"name="save_address" value="Сохранить">
                    <input type="hidden" name="action" value="edit_address">
                </p>
					
				<?php $this->endWidget(); ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	
<script>
	$(function() {
		$('#password-new-link').on('click', function() {
			var link = $(this);
			var scenario = link.data('scenario');
			
			var block = $( link.attr('href') );
			
			if(block.is(':visible')) {
				block.slideUp();
				$('#scenario').val(scenario.admin);
			} else {
				block.slideDown();
				$('#scenario').val(scenario.reset);
			}
			
			return false;
		})
	})
</script>	
