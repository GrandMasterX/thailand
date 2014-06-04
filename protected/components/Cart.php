<?php

class Cart extends CApplicationComponent
{
	
	private $_data = array();

    public function init()
    {
		//$this->clear();
		if(isset(Yii::app()->session['cart'])) {
			$this->_data = Yii::app()->session['cart'];
		} else {
			Yii::app()->session['cart'] = array();
		}
		
        parent::init();
    }
	
	public function getIsEmpty()
	{
		return empty($this->_data);
	}
	
	public function clear()
	{
		$this->_data = array();
		$this->saveState();
	}
	
	public function setCalculator(Product $model, $values)
	{
		if($this->hasProduct($model)) {
			$this->_data[$model->id]['calculator']['values'] = $values;
			
			$calculator = $this->_data[$model->id]['calculator'];
			$calculatorPrice = 0;
			
			$values = $calculator['values'];
			foreach($calculator['attributes'] as $id=>$attribute)
			{
				$value = isset($values[$id]) ? $values[$id] : 0;
				switch($attribute['type'])	
				{
					case Calculator::ATTRIBUTE_TYPE_BOOL:
						$calculatorPrice += $value * $attribute['price'];
						break;	
							
					case Calculator::ATTRIBUTE_TYPE_INT:
					case Calculator::ATTRIBUTE_TYPE_FLOAT:
						$calculatorPrice += (int)$value * $attribute['price'];
						break;	
							
					case Calculator::ATTRIBUTE_TYPE_LIST:
						$calculatorPrice += (int)$value;
						break;	
				}		
			}
			
			$this->_data[$model->id]['calculatorPrice'] = $calculatorPrice;
			$this->saveState();
		}
	}
	
	public function addProduct(Product $model, $quantity = 1)
	{
		if($this->hasProduct($model)) {
			$this->_data[$model->id]['quantity'] += $quantity; 
		} else {
		
			$calculator = Calculator::model()->active()->find('catalog_id = :catalog_id', array(':catalog_id'=>$model->catalog_id));
			$calculatorArray = null;
			if($calculator) {
				$calculatorArray = array(
					'title' => $calculator->title,
					'attributes' => $calculator->attributeArray,
					'values' => array()
				);	
			}
		
			$this->_data[$model->id] = array(
				'id' => $model->id,
				'code' => $model->code,
				'title' => $model->title,
				'alias' => $model->alias,
				'price' => $model->price,
				'preview' => $model->preview,
				'unit' => $model->unit,
				'quantity' => $quantity,
				'calculatorPrice' => 0,
				'calculator' => $calculatorArray
			);
		}
		$this->saveState();
	}
	
	public function deleteProduct(Product $model)
	{
		unset($this->_data[$model->id]);
		$this->saveState();
	}
	
	public function hasProduct(Product $model)
	{
		return isset($this->_data[$model->id]);
	}
	
	public function setQuantity(Product $model, $quantity = 1)
	{
		if($this->hasProduct($model)) {
			$this->_data[$model->id]['quantity'] = $quantity; 
			$this->saveState();
		}
	}
	
	protected function saveState()
	{
		Yii::app()->session['cart'] = $this->_data;
	}
	
	public function getDataProvider()
	{
		return new CArrayDataProvider($this->_data, array(
			'pagination'=>false
		));
	}
	
	public function render()
	{
		return Yii::app()->controller->renderPartial('widgets.views._cart_ajax', array(
			'dataProvider' => $this->dataProvider
		), true);
	}
	
	public function count()
	{
		return count($this->_data);
	}
	
	public function sum()
	{
		$sum = 0;
		foreach($this->_data as $product)
		{
			$sum += $product['quantity'] * ($product['price'] + $product['calculatorPrice']);
		}
		
		return $sum;
	}
}