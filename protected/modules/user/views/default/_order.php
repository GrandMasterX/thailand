<tr class="order">
	<td class="order-number">
		<?php echo CHtml::link("#{$data->id}", array('/user/default/order', 'id' => $data->id)) ?>
	</td>
	<td class="order-date">
		<time><?php echo Yii::app()->dateFormatter->format("dd MMMM yyyy", $data->create_time); ?></time>
	</td>
	<td class="order-status" style="text-align:left; white-space:nowrap;">
		<?php echo $data->status ? $data->status->title : null; ?>
	</td>
	<td class="order-total">
		<span class="amount"><?php echo CText::number($data->sum) ?>&nbsp;грн.</span> для <?php echo $data->productsCount ?> позиции					
	</td>
	<td class="order-total">
		<span class="amount"><?php echo $data->is_moderation ? 'Одобрен' : 'Ещё нет' ?>
	</td>
	<td class="order-actions">
		<?php echo CHtml::link('Просмотр', array('/user/default/order', 'id' => $data->id), array('class' => 'button view')) ?>
	</td>
</tr>
