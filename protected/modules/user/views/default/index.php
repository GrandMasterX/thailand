<?php
	$this->pageTitle = 'Личный кабинет';
	$this->title = 'Личный кабинет';
	$this->breadcrumbs = array(
		'Личный кабинет'
	);
?>	
	
	<?php $this->widget('widgets.CartWidget'); ?>		
	
	
<div id="content">
	<div class="kabinetPage">
		<p class="myaccount_user">
			Добрый день, <strong><?php echo "{$model->last_name} {$model->first_name}" ?></strong>. Здесь можно посмотреть ваши последние заказы, а также редактировать <a href="<?php echo $this->createUrl('update') ?>">личные данные</a>.
		</p>

		<h2>Последние заказы</h2>
		
		<table class="shop_table my_account_orders">
			<thead>
				<tr>
					<th class="order-number"><span class="nobr">Заказ</span></th>
					<th class="order-date"><span class="nobr">Дата</span></th>
					<th class="order-status"><span class="nobr">Статус</span></th>
					<th class="order-total"><span class="nobr">Итого</span></th>
					<th class="order-total"><span class="nobr">Одобрено менеджером</span></th>
					<th class="order-actions">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$data=$dataProvider->getData();
				foreach($data as $i=>$item) {
					$this->renderPartial('_order', array('data' => $item));
				}
			?>		
			</tbody>
		</table>
		<?php $this->widget('CLinkPager', array(
			'pages' => $dataProvider->pagination,
		)) ?>		
	</div>
	<div class="clear"></div>
</div>	
