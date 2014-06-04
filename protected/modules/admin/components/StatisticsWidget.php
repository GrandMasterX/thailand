<?php
class StatisticsWidget extends CWidget
{
	public $year;
	protected $_data;
	protected $_orderDataProvider;

	public function init()
	{
		if(empty($this->year))
			$this->year = date('Y');
			
		$this->_data = OrderStatistics::getData($this->year);	
		
		$this->_orderDataProvider = new CActiveDataProvider('Order', array(
			'criteria'=>array(
				'with' => array('status', 'user'),
				'limit' => 10,
			),
			'sort' => array(
				'defaultOrder' => 't.id DESC'
			)
		));
		
		parent::init();
	}
	
	public function run()
	{
		$this->render('statistics', array(
			'year' => $this->year,
			'data' => $this->_data,
			'orderDataProvider' => $this->_orderDataProvider,
		));
	}
}