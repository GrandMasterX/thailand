<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('user/create') : $this->createUrl('user/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'middle_name',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5')); ?>
	
	<?php echo $form->textAreaRow($model,'address',array('class'=>'span5')); ?>
	
	<?php echo $form->dropDownListRow($model, 'group_id', CHtml::listData(Group::model()->active()->findAll(), 'id', 'title'),
		array(
			'class' => 'span5',
			'empty' => 'Выберите группу',
	)); ?>
	
	<hr class="clear" />
	
	<?php if(!$model->isNewRecord) : ?>
		<a id="password-new-link" class="cancel-button btn btn-danger" href="#password-new" data-scenario='{"admin": "<?php echo User::SCENARIO_ADMIN_UPDATE_USER ?>", "reset": "<?php echo User::SCENARIO_ADMIN_PASSWORD_RESET_USER ?>"}' >Сменить пароль</a>
		
		<div id="password-new" style="display: none; margin-top: 10px">
			<?php echo $form->passwordFieldRow($model,'password_new',array('class'=>'span5')); ?>
			
			<?php echo $form->passwordFieldRow($model,'password_repeat',array('class'=>'span5')); ?>
			
			<?php echo CHtml::hiddenField('scenario', User::SCENARIO_ADMIN_UPDATE_USER, array('id'=>'scenario')) ?>
		</div>
	<?php else : ?>
		<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5')); ?>
		
		<?php echo $form->passwordFieldRow($model,'password_repeat',array('class'=>'span5')); ?>
	<?php endif ?>
	
	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/user/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>

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