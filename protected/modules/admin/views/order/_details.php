		<h2>Выдаткова накладна №<?php echo $model->id ?></h2>
		<table class="orderTable" BORDER CELLPADDING=10 CELLSPACING=0>
			<tr>
				<td>Постачальник:</td> 
				<td><?php echo Yii::app()->config->get('provider.title') ?>
					<span><?php echo Yii::app()->config->get('provider.details') ?></span>
				</td> 
			</tr>
			<tr>
				<td>Покупець:</td> 
				<td><?php echo $model->name ?>
					<span>Тел.: <?php echo $model->phone ?></span>
				</td> 
			</tr>
			<tr>
				<td>Договір:</td> 
				<td><span>Основной договор</span></td> 
			</tr>
		</table>
