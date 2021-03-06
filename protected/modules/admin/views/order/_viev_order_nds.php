    <?php $pdvSum = 0 ?>
	
	<h2>Заказ</h2>
	<table class="shop_table my_account_orders" style="width:100%" BORDER CELLPADDING=10 CELLSPACING=0 >
		<thead>
			<tr>
				<th class="order-number"><span class="nobr">№</span></th>
				<th class="order-date"><span class="nobr">Артикул</span></th>
				<th class="order-status"><span class="nobr">Товар</span></th>
				<th class="order-total"><span class="nobr">Кількість</span></th>
                <th class="order-total"><span class="nobr">Ціна без ПДВ</span></th>
                <th class="order-total"><span class="nobr">Сума без ПДВ</span></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($model->productArray as $number=>$product) : ?>
			<?php
				$pdv = $product['price'] - ($product['price']/6) * Yii::app()->config->get('factorNds');
				$pdvSum += $pdv * $product['quantity'];
			?>
			<tr class="order">
				<td class="order-number"><?php echo $number + 1 ?></td>
				<td class="order-date"><?php echo $product['code'] ?></td>
				<td class="order-status" style="text-align:left; white-space:nowrap;"><?php echo $product['title'] ?></td>
				<td class="order-total"><?php echo $product['quantity'] . ' ' . $product['unit'] ?></td>
				<td class="order-total">
					<span class="amount"><?php echo CText::number($pdv) ?></span> 		
				</td>
				<td class="order-total">
					<span class="amount"><?php echo CText::number($pdv * $product['quantity']) ?></span> 		
				</td>
			</tr>
			<?php
				if(is_array($product['calculator'])) {
					$values = $product['calculator']['values'];
					foreach($product['calculator']['attributes'] as $id=>$attribute)
					{
						$value = isset($values[$id]) ? $values[$id] : null;
						if($value) {
							echo '<tr class="order">';
							echo '<td class="order-number"></td>';
							echo '<td class="order-date"></td>';
							echo '<td class="order-status" style="text-align:left; white-space:nowrap;">' . $attribute['name'] . '</td>';
							echo '<td class="order-total">' . $product['quantity'] . '</td>';
								
							$price = $attribute['price'];
								
							if($attribute['type'] == Calculator::ATTRIBUTE_TYPE_INT)
								$price = $price * $value;
									
							if($attribute['type'] == Calculator::ATTRIBUTE_TYPE_FLOAT)
								$price = $price * $value;
									
							if($attribute['type'] == Calculator::ATTRIBUTE_TYPE_LIST)
								$price = $value;
								
							echo '<td class="order-total">' .
									'<span class="amount">' . $price . '</span> ' .		
								'</td>';	

							echo '<td class="order-total">' .
									'<span class="amount">' . $product['quantity'] * $price . '</span> ' .		
								'</td>';	

							echo '</tr>';	
						}
					}
				}
			?>
			<?php endforeach ?>
        </tbody>
	</table>
	<table class="orderResult" BORDER CELLPADDING=10 CELLSPACING=0>
		<tr>
			<td>Разом:</td> 
			<td><?php echo CText::number($pdvSum) ?></td> 
		</tr>
		<tr>
			<td>Сума ПДВ:</td> 
			<td><?php echo CText::number($model->sum - $pdvSum) ?></td> 
		</tr>
		<tr>
			<td>Усього з ПДВ:</td> 
			<td><?php echo CText::number($model->sum) ?></td> 
		</tr>
	</table>

	<div class="orderBlock">
	<ul>
		<li>Всього найменувань <?php echo count($model->productArray) ?>, на суму <?php echo $model->sum ?> грн.</li>
		<li><strong><?php echo CText::num2str($model->sum) ?></strong></li>
		<li>У т.ч. ПДВ: <strong><?php echo CText::num2str($model->sum - $pdvSum) ?></strong></li>
	</ul>
	</div>