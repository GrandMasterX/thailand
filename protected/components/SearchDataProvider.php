<?php

class SearchDataProvider extends CActiveDataProvider
{
	public function __construct($modelClass,$config=array())
	{
		if(!isset($config['pagination'])) 
		{
			$config['pagination'] = array(
				'pageSize' => Yii::app()->request->getParam('size', 10)
			);
		}
		
		parent::__construct($modelClass,$config);	
	}
}  
