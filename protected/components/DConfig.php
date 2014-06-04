<?php

class DConfig extends CApplicationComponent
{
    public $cache = 0;
    private $_data;

    public function init()
    {
        $this->_data = Yii::app()->cache->get(Config::CACHE_KEY);

        if($this->_data === false) {
		
			$list=Yii::app()->db->createCommand()
				->select(array(
					'c.key',
					'c.value',
				))
				->from('config c')
				->queryAll();
				
			foreach($list as $row)
			{
				$this->_data[ $row['key'] ]	= $row['value'];
			}
			
            Yii::app()->cache->set(Config::CACHE_KEY, $this->_data, $this->cache);
        }

        parent::init();
    }

    public function get($key)
    {
		return isset($this->_data[$key]) ? $this->_data[$key] : null;
    }
}