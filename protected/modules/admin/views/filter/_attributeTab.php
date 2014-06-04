<div id="list-form">
	
	<label>Добавить атрибут</label>
	
<div id="form-typeAttribute">

    <?php echo CHtml::dropDownList('attribute_id', 'attribute_id', FilterAttribute::getListData(),
        array(
			'id' => 'attribute_id',
            'class' => 'span5',
            'empty' => 'Выберите атрибут'
    )); ?>
	
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'button',
        'type'=>'primary',
        'label'=>'Добавить',
		'htmlOptions'=>array(
			'id' => 'list-button',
			'style' => 'margin: -10px 0 0 5px',
		)
    )); ?>
</div>
	
	<div id="list-grid" class="grid-view" style="width: 660px;">
		<table class="items table table-striped">
			<tbody>
				<?php foreach($model->myAttributes as $attribute) : ?>
				<tr>
					<td>
						<?php echo $attribute->title ?>
                        <?php echo CHtml::hiddenField('Filter[myAttributes][]', $attribute->id) ?>
                    </td>
					<td style="width: 80px">
						<a class="delete btn btn-danger btn-small" rel="tooltip" data-original-title="Удалить"><i class="icon-remove icon-white"></i></a>	
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>	
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

<script>
	$(function() {
		$('#list-button').on('click', function() {
			
			var select = $('#attribute_id');
			var option = {
				text: $('option:selected', select).text(),
				value: select.val()
			}
			
			if(option.value == '') return false;
			
			var html = '<tr>' +
							'<td>' +
								option.text +
								'<input type="hidden" name="Filter[myAttributes][]" value="' + option.value + '">' +
							'</td>' +
							'<td style="width: 80px">' +
								'<a class="delete btn btn-danger btn-small" rel="tooltip" data-original-title="Удалить"><i class="icon-remove icon-white"></i></a>' +
							'</td>' +
						'</tr>';	
						
			$('#list-grid table tbody').append(html);
			
			return false;
		})	
		
		$('#list-grid').on('click', 'a.delete', function() {
			$(this).parent().parent().remove();
			return false;
		})
		
	
	})
</script>

	
