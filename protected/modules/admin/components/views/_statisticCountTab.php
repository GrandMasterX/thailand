<div>
	<?php echo CHtml::dropDownList('year', $year, OrderStatistics::getYears(), array('id' => 'statistics-count-select', 'class'=>'span2')) ?>
</div>

<h4>Общие количество заказов <span id="year-count"><?php echo $year ?></span> г.</h4>
<?php $this->widget('ext.morris.MorrisChartWidget', array(
    'id'      => 'orderStatisticsCount',
    'options' => array(
        'chartType' => 'Line',
		'data'      => $data,
        'xkey'      => 'month',
        'ykeys'     => array('count'),
        'labels'    => array('Количество заказов'),
		'parseTime' => false,
    ),
)); ?>
