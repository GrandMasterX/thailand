<?php
class LeftBlockPrivatOfficeWidget extends CWidget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        echo $this->renderBlock();
    }

    protected function renderBlock()
    {
        return $this->render('privatoffice/left_block', array(), true);
    }



}