<?php

Yii::import('zii.widgets.grid.CDataColumn');

class ActiveGridColumn extends CDataColumn
{
    public function init()
    {
		$this->header = 'Опубликован';
        $this->name = 'is_active';
        $this->type = 'raw';
        $this->value = function($data, $roe) {
            return $data->is_active ? '<strong>Да</strong>' : 'Нет';
        };
		$this->htmlOptions = array('style'=>'width: 100px; text-align: center;');
		$this->filter = array(0=>'Нет', 1=>'Да');

        parent::init();
    }
}