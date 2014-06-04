<?php
    Yii::app()->clientScript->registerScript('attribute', "
	
		$('#attribute-group-id').on('change', function() {
			var id = $(this).val();
			if(id) {
				$.get('/admin/attributeGroup/getForm', {id: id}, function(html) {
					$('#attribute-groups').html(html);	
					$('.date').datepicker({
						language: 'ru',
						format: 'yyyy-mm-dd'
					});
				})
			} else {
				$('#attribute-groups').html('');	
			}
		})
		
		$('#individual-attribute-add').on('click', function() {
			
			var html = $('#individual-attribute-template table').html();
			$('#attribute-list').append(html);
			return false;
			
		})
		
		$('#attribute-list').on('click', 'a.delete', function() {
			$(this).parent().parent().remove();
			return false;
		})
		
		
		
    ", CClientScript::POS_READY);
?>


<h4>Атрибуты фильтра</h4>
<div id="attribute-filter">
	<?php $filter->render($form) ?> 
</div>

<hr class="clear" />

<h4>Группы атрибутов</h4>
<?php echo $form->dropDownListRow($model, 'attribute_group_id', CHtml::listData(AttributeGroup::model()->active()->findAll(), 'id', 'title'),
    array(
		'id' => 'attribute-group-id',
		'class' => 'span5',
		'empty' => 'Выберите группу атрибутов',
)); ?>
<div id="attribute-groups">
	<?php $attributeGroup->render($form) ?> 
</div>

<hr class="clear" />

<h4>Индивидуальные атрибуты</h4>
<div id="attribute-individual">
	<table id="attribute-list">
		<thead>
			<tr>
				<td style="width: 260px">Название</td>
				<td style="width: 260px">Значение</td>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($model->individual_attribute)) : ?>
				<?php foreach($model->individual_attribute as $name=>$value) : ?>
					<tr>
						<td>
							<input type="text" class="span2" name="Product[individual_attribute][names][]" value="<?php echo $name ?>" style="width: 260px">
						</td>
						<td>
							<input type="text" class="span2" name="Product[individual_attribute][values][]" value="<?php echo $value ?>" style="width: 260px;">
						</td>
						<td>
							<a class="delete btn btn-danger btn-small" rel="tooltip" data-original-title="Удалить" style="margin: -10px 0 0 5px;"><i class="icon-remove icon-white"></i></a>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
	<button class="btn btn-primary" type="button" id="individual-attribute-add">Добавить</button>
	<div id="individual-attribute-template" style="position: absolute; top: -9999px; left: -9999px;">
		<table>
			<tr>
				<td>
					<input type="text" class="span2" name="Product[individual_attribute][names][]" style="width: 260px">
				</td>
				<td>
					<input type="text" class="span2" name="Product[individual_attribute][values][]" style="width: 260px;">
				</td>
				<td>
					<a class="delete btn btn-danger btn-small" rel="tooltip" data-original-title="Удалить" style="margin: -10px 0 0 5px;"><i class="icon-remove icon-white"></i></a>
				</td>
			</tr>
		</table>
	</div>
</div>





