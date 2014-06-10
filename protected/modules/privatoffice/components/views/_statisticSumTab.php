<div>
	<?php echo CHtml::dropDownList('year', $year, OrderStatistics::getYears(), array('id' => 'statistics-sum-select', 'class'=>'span2')) ?>
</div>

<h4>Общая сумма заказов <span id="year-sum"><?php echo $year ?></span> г.</h4>
<?php $this->widget('ext.morris.MorrisChartWidget', array(
    'id'      => 'orderStatisticsSum',
    'options' => array(
        'chartType' => 'Line',
		'data'      => $data,
        'xkey'      => 'month',
        'ykeys'     => array('sum'),
        'labels'    => array('Сумма'),
		'parseTime' => false,
    ),
)); ?>
