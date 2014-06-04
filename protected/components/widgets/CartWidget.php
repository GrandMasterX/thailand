<?php
class CartWidget extends CWidget
{
	public function init()
	{
		parent::init();
	}
	
	public function run()
	{
        $this->render('cart', array(
			'dataProvider' => Yii::app()->cart->dataProvider
		));
	}
}