<?php
class UrlManager extends CUrlManager
{
	private function getRules()
	{
		$rules=Yii::app()->cache->get(Catalog::CACHE_KEY_RULES);
		if($rules === false)
		{
			$rules = require(dirname(__FILE__).'/../config/rules.php');
			$rules = CMap::mergeArray(Yii::app()->getModule('catalog')->getRules(), $rules);
		
			Yii::app()->cache->set(Catalog::CACHE_KEY_RULES, $rules, 3600);
		}
		
		return $rules;
	}

	protected function processRules()
	{
		$this->rules = $this->getRules();
		return parent::processRules();
	}
}

?>
