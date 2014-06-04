<?php
    Yii::app()->clientScript->registerScript('attribute', "
	
		$('#attribute-add').on('click', function() {
			
			var html = $('#attribute-template table').html();
			$('#attribute-list').append(html);
			return false;
			
		})
		
		$('#attribute').on('change', '.type', function() {
		
			var tr = $(this).parent().parent();
		
			if( $(this).val() == 'list' && !tr.next().hasClass('list-btn')) {
				var html = $('#attribute-template-list-btn table tbody').html();
				$(html).insertAfter(tr);
			} else {
				tr.nextAll('.list').remove();
			}
		})
		
		
		$('#attribute-list').on('click', '.list-btn-add', function() {
			var tr = $(this).parent().parent();
			var html = $('#attribute-template-list table tbody').html();
			var last = tr.nextAll('.list').length ? tr.nextAll('.list:last') : tr;
			$(html).insertAfter(last);
			return false;
		})
		
		$('#attribute-list').on('click', 'a.delete', function() {
			var tr = $(this).parent().parent();
			tr.nextAll('.list').remove();
			tr.remove();
			return false;
		})
		
		$('#attribute-list').on('click', 'a.delete-list', function() {
			var tr = $(this).parent().parent();
			tr.remove();
			return false;
		})
		
    ", CClientScript::POS_READY);
?>

<h4>Атрибуты</h4>
<div id="attribute">
	<table id="attribute-list">
		<thead>
			<tr>
				<td style="width: 460px">Название</td>
				<td style="width: 160px">Тип</td>
				<td style="width: 100px">Цена</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($model->attributeArray as $attribute) : ?>
				<tr class="attribute">
					<td>
						<input type="text" class="span2 name" name="name" value="<?php echo $attribute['name'] ?>" style="width: 460px">
					</td>
					<td>
						<?php echo CHtml::dropDownList('type', $attribute['type'], Calculator::getAttributeList(), array('class'=>'span2 type', 'style'=>'width: 160px')) ?>	
					</td>
					<td>
						<input type="text" class="span2 price" name="price" value="<?php echo $attribute['price'] ?>" style="width: 100px">
					</td>
					<td>
						<a class="delete btn btn-danger btn-small" rel="tooltip" style="margin: -10px 0 0 5px;"><i class="icon-remove icon-white"></i></a>
					</td>
				</tr>
				<?php if($attribute['type'] == Calculator::ATTRIBUTE_TYPE_LIST) : ?>
					<?php if(isset($attribute['list'][0])) : ?>
						<tr class="list list-btn">
							<td>
								<button class="btn btn-primary list-btn-add" type="button" style="margin: -10px 0 0 370px;;">Добавить</button>
							</td>
							<td>
								<input type="text" class="span2 name" name="name" value="<?php echo $attribute['list'][0]['name'] ?>" style="width: 160px">
							</td>
							<td>
								<input type="text" class="span2 price" name="price" value="<?php echo $attribute['list'][0]['price'] ?>" style="width: 100px">
							</td>
							<td>
							</td>
						</tr>
					<?php unset($attribute['list'][0]) ?>	
					<?php endif ?>
					<?php foreach($attribute['list'] as $list) : ?>
						<tr class="list">
							<td>
							</td>
							<td>
								<input type="text" class="span2 name" name="name" value="<?php echo $list['name'] ?>" style="width: 160px">
							</td>
							<td>
								<input type="text" class="span2 price" name="price" value="<?php echo $list['price'] ?>" style="width: 100px">
							</td>
							<td>
								<a class="delete-list btn btn-danger btn-small" rel="tooltip" style="margin: -10px 0 0 5px;"><i class="icon-remove icon-white"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			<?php endforeach ?>
		</tbody>
	</table>
	<button class="btn btn-primary" type="button" id="attribute-add">Добавить</button>
	<div id="attribute-template" style="position: absolute; top: -9999px; left: -9999px;">
		<table>
			<tr class="attribute">
				<td>
					<input type="text" class="span2 name" name="name" style="width: 460px">
				</td>
				<td>
					<?php echo CHtml::dropDownList('type', null, Calculator::getAttributeList(), array('class'=>'span2 type', 'style'=>'width: 160px')) ?>	
				</td>
				<td>
					<input type="text" class="span2 price" name="price" style="width: 100px">
				</td>
				<td>
					<a class="delete btn btn-danger btn-small" rel="tooltip" style="margin: -10px 0 0 5px;"><i class="icon-remove icon-white"></i></a>
				</td>
			</tr>
		</table>
	</div>
	<div id="attribute-template-list-btn" style="position: absolute; top: -9999px; left: -9999px;">
		<table>
			<tr class="list list-btn">
				<td>
					<button class="btn btn-primary list-btn-add" type="button" style="margin: -10px 0 0 370px;;">Добавить</button>
				</td>
				<td>
					<input type="text" class="span2 name" name="name" style="width: 160px">
				</td>
				<td>
					<input type="text" class="span2 price" name="price" style="width: 100px">
				</td>
				<td>
				</td>
			</tr>
		</table>
	</div>
	<div id="attribute-template-list" style="position: absolute; top: -9999px; left: -9999px;">
		<table>
			<tr class="list">
				<td>
				</td>
				<td>
					<input type="text" class="span2 name" name="name" style="width: 160px">
				</td>
				<td>
					<input type="text" class="span2 price" name="price" style="width: 100px">
				</td>
				<td>
					<a class="delete-list btn btn-danger btn-small" rel="tooltip" style="margin: -10px 0 0 5px;"><i class="icon-remove icon-white"></i></a>
				</td>
			</tr>
		</table>
	</div>
</div>

<input id="individual-attributes" type="hidden" name="Calculator[individual_attributes]" >
