    <?php Yii::app()->clientScript->registerScript('add-list', "
	
		$('#type').on('change', function() {
			$(this).val() == '" . FilterAttribute::TYPE_LIST . "' ? $('#list-form').show() : $('#list-form').hide();
		})
	
		$('#list-button').on('click', function() {
			var title = $('#list-input').val();
			if(title == '')
				return false;
				
			$.post($(this).data('url'), {'AttributeListValue[title]' : title}, function(json) {
                if(json.success) {
                    $('#list-grid table').append(json.html);
                    $('#list-input').val('');
                }
			}, 'json')	
		
			return false;
		})	
		
		$('#list-grid').on('click', 'a.delete', function() {
			var link = $(this);
			$('#delete-list-button').attr('href', link.attr('href'));
			$('#delete-list-button').data('id', link.data('id'));
			
			$('#delete-list-modal').modal('show');
			return false;
		})
		
		$.fn.popover.defaults.placement = 'left';
		$.fn.popover.defaults.html = true;
		$.fn.popover.defaults.template = '<div class=\"popover popover-form\"><div class=\"arrow\"></div><h3 class=\"popover-title\"></h3><div class=\"popover-content\"></div></div>';
		
		$('#list-grid').on('click', 'a.cansel', function() {
			var link = $(this);
			$( link.data('id') ).popover('hide');
			return false;
		})
		
		$('#list-grid').on('click', 'a.save', function() {
			var link = $(this);
			var form = $( link.data('form') );
			var view = $( link.data('view') );
			
			$.post(form.attr('action'), form.serialize(), function(json) {
				if(json.success) {
					view.replaceWith(json.html);
					link.next().click();
				}
			}, 'json');
			
			return false;
		})
		
		$('#delete-list-button').on('click', function() {
			var link = $(this);
			$.post(link.attr('href'), function(json) {
                if(json.success) {
					$('#delete-list-modal').modal('hide');
					$(link.data('id')).remove();	
                }
			}, 'json')	
			return false;
		})
	
		", CClientScript::POS_READY);
	?>
	
<div id="list-form" style="<?php echo $model->type === Attribute::TYPE_LIST ? '' : 'display:none' ?>" >
	
	<hr class="clear" />

	<label>Добавить значение</label>
	<?php echo CHtml::textField('list', null, array('class' => 'span5', 'id' => 'list-input')) ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'button',
        'type'=>'primary',
        'label'=>'Добавить',
		'htmlOptions'=>array(
			'id' => 'list-button',
			'style' => 'margin: -10px 0 0 5px',
			'data-url' => $this->createUrl('/admin/attributeListValue/create')
		)
    )); ?>
	
	
	<div id="list-grid" class="grid-view" style="width: 660px;">
		<table class="items table table-striped">
		<?php
			foreach($model->listValues as $row) {
				$this->renderPartial('modules.admin.views.attributeListValue._view', array(
					'model' => $row
				));
			}
		?>
		</table>
	</div>	
</div>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array(
	'id'=>'delete-list-modal',
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
		'htmlOptions'=>array('id' => 'delete-list-button'),
	)); ?>
		
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'danger',
		'url' => '#',
		'label'=>'Отмена',
		'htmlOptions'=>array('data-dismiss'=>'modal'),
	)); ?>
</div>
 
<?php $this->endWidget(); ?>

	
