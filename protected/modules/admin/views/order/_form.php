<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'order-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('order/create') : $this->createUrl('order/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs',
		'tabs'=>array(
			array(
				'label' => 'Пользователь',
				'content' => $this->renderPartial('_userTab', array('form' => $form, 'model' => $model), true),
				'active'=>true
			), 
			array(
				'label' => 'Заказ',
				'content' => $this->renderPartial('_orderTab', array('form' => $form, 'model' => $model), true),
				'active'=>false
			) 
		)	
	)) ?>	
	
	<hr class="clear" />
	
	<?php 
		if(!$model->is_moderation)
		{
			$this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
			)); 
		}
	?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/order/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
