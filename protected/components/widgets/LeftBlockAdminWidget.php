<?php
class LeftBlockAdminWidget extends CWidget
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
        return $this->render('admin/left_block', array(), true);
    }



}