<?php
class SearchWidget extends CWidget
{
	public function init()
	{
		parent::init();
	}
	
	public function run()
	{
        $this->render('search');
	}
}