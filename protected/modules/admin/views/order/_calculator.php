<tr class="calculator" style="display: none">
	<td colspan="6">
		<table cellpadding="7">
			<thead>
				<tr>
					<td colspan="3">
						<h4><?php echo $calculator['title'] ?></h4>	
					</td>
				</tr>
				<tr>
					<td style="width: 260px">Поле</td>
					<td style="width: 100px">Значение</td>
					<td style="width: 100px">Цена</td>
				</tr>
			</thead>
			<tbody>
			<?php echo CHtml::hiddenField("Calculator[{$productId}][title]", $calculator['title']) ?>
            <?php echo CHtml::hiddenField("Calculator[{$productId}][attributes]", $calculator['attributesJSON']) ?>
			<?php foreach($calculator['attributes'] as $id=>$attribute) : ?>
			<?php $value = isset($calculator['values'][$id]) ? $calculator['values'][$id] : null ?>
				<tr>
					<td style="width: 660px" >
						<?php echo $attribute['name'] ?>
					</td>
					<td style="width: 100px">
					<?php
						switch($attribute['type'])	
						{
							case Calculator::ATTRIBUTE_TYPE_BOOL:
								echo CHtml::checkBox("Calculator[{$productId}][values][{$id}]", $value, array('data-price' => $attribute['price']));
								break;	
									
							case Calculator::ATTRIBUTE_TYPE_INT:
							case Calculator::ATTRIBUTE_TYPE_FLOAT:
								echo CHtml::numberField("Calculator[{$productId}][values][{$id}]", $value, array('class'=>'span2', 'style'=>'width: 150px;', 'data-price' => $attribute['price']));
								break;	
									
							case Calculator::ATTRIBUTE_TYPE_LIST:
								echo CHtml::dropDownList("Calculator[{$productId}][values][{$id}]", $value, CHtml::listData($attribute['list'], 'price', 'name'), array('class'=>'span2 select', 'empty'=>'---', 'style'=>'width: 150px;', 'data-price' => $attribute['price']));
								break;	
							}		
					?>
					</td>
					<td style="width: 100px"><?php echo $attribute['price'] ?></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</td>
</tr>	
		

