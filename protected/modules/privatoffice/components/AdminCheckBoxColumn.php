<?php

class AdminCheckBoxColumn extends CCheckBoxColumn
{
    public function init()
    {
		$this->value = function($data, $row) {
			return $data->primaryKey;
		};
		
		$this->selectableRows = 10;

        $this->checkBoxHtmlOptions = array(
            'name' => 'ids[]'
        );

        parent::init();
    }
}