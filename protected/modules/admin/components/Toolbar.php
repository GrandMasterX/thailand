<?php

class Toolbar extends CWidget
{
    public $model;

    public function run()
    {
		$this->render('toolbar', array(
			'model' => $this->model
        ));
    }
}
