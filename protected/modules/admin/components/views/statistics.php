<?php $this->widget('bootstrap.widgets.TbTabs', array(
	'type'=>'tabs',
		'events'=>array(
		'shown'=>"js:function(event) {
			orderStatisticsSum.redraw();
			orderStatisticsCount.redraw();
		}",
	),
	'tabs'=>array(
		array(
			'label' => 'Последнии заказы',
			'content' => $this->controller->renderPartial('modules.admin.components.views._statisticOrderTab', array('orderDataProvider' => $orderDataProvider), true),
			'active'=>true
		), 
		array(
			'label' => 'Общая сумма заказов',
			'content' => $this->controller->renderPartial('modules.admin.components.views._statisticSumTab', array('data' => $data, 'year' => $year), true),
			'active'=>false
		), 
		array(
			'label' => 'Общие количество заказов',
			'content' => $this->controller->renderPartial('modules.admin.components.views._statisticCountTab', array('data' => $data, 'year' => $year), true),
			'active'=>false
		) 
	)	
)) ?>	

<script>
	$(function() {
		$('#statistics-sum-select').on('change', function() {
			$.getJSON('/admin/statistics/getOrderData', {year: $(this).val()}, function(json) {
				orderStatisticsSum.setData(json.data);
				$('#year-sum').text(json.year);
			})
		})

		$('#statistics-count-select').on('change', function() {
			$.getJSON('/admin/statistics/getOrderData', {year: $(this).val()}, function(json) {
				orderStatisticsCount.setData(json.data);
				$('#year-count').text(json.year);
			})
		})
	})
</script>
