<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'news-form',
    'action' => ($model->isNewRecord) ? $this->createUrl('news/create') : $this->createUrl('news/update', array('id' => $model->id)),
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
				'label' => 'Параметры',
				'content' => $this->renderPartial('_basicTab', array('form' => $form, 'model' => $model), true),
				'active'=>true
			), 
			array(
				'label' => 'SEO',
				'content' => $this->renderPartial('_seoTab', array('form' => $form, 'model' => $model), true),
				'active'=>false
			) 
		)	
	)) ?>	

	<hr class="clear" />
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
	)); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => array('/admin/news/admin'),
		'label'=>'Отмена',
		'htmlOptions' =>array(
			'class' => 'cancel-button'
		)
	)); ?>

<?php $this->endWidget(); ?>
