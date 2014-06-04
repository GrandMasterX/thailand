<?php
    Yii::app()->clientScript->registerScript('create', "
        $('.create-button, .cancel-button').on('click', function(){
            $('.create-form').slideToggle('slow', function() {
				$(this).is(':visible') ? $('.create-button').html('<i class=\"icon-arrow-up icon-white\"></i> Скрыть') : $('.create-button').html('<i class=\"icon-plus-sign icon-white\"></i> Добавить');
			});
            return false;
        });
		
		$('#toolbar').on('click', '.publish-button, .un-publish-button, .remove-button', function() {
		
			if($('#admin-grid input:checkbox:checked').length == 0)
				return false;
		
			$('#admin-grid').yiiGridView('update', {
				type: 'POST',
				data: $('#admin-grid input:checkbox:checked').serialize(),
				url: $(this).attr('href'),
				success: function(data) {
					$('#admin-grid').yiiGridView('update');
				},
			});
			return false;			
			
		})
		
    ", CClientScript::POS_READY);
?>

<div id="toolbar">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'Добавить',
		'type'=>'primary',
		'icon' => 'plus-sign white',
		'htmlOptions' =>array(
			'class' => 'create-button'
		)
	)); ?>

	<?php if(isset($model->PublishBehavior)) : ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Опубликовать',
			'type'=>'info',
			'url'=> Yii::app()->createUrl('/admin/toolbar/publish', array('modelName' => get_class($model))),
			'icon' => 'ok-circle white',
			'htmlOptions' =>array(
				'class' => 'publish-button'
			)
		)); ?>

		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Снять с публикации',
			'type'=>'info',
			'url'=> Yii::app()->createUrl('/admin/toolbar/unPublish', array('modelName' => get_class($model))),
			'icon' => 'remove-sign white',
			'htmlOptions' =>array(
				'class' => 'un-publish-button'
			)
		)); ?>
	<?php endif ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'Удалить',
		'type'=>'danger',
        'url'=> Yii::app()->createUrl('/admin/toolbar/delete', array('modelName' => get_class($model))),
		'icon' => 'remove white',
		'htmlOptions' =>array(
			'class' => 'remove-button'
		)
	)); ?>
</div>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array(
	'id'=>'delete-modal',
)); ?>
 
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h4>Подтвердите действие</h4>
	</div>
	 
	<div class="modal-body">
		<p>Вы действительно хотите удалить данный элемент ?</p>
	</div>
	 
	<div class="modal-footer">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'url' => '#',
			'label'=>'Удалить',
			'htmlOptions'=>array('id' => 'delete-button'),
		)); ?>
			
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'danger',
			'url' => '#',
			'label'=>'Отмена',
			'htmlOptions'=>array('data-dismiss'=>'modal'),
		)); ?>
	</div>
	 
<?php $this->endWidget(); ?>

