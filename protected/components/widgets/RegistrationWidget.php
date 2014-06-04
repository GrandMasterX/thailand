<?php
class RegistrationWidget extends CWidget
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
        $model = new User('registration');
        return $this->render('registration_form', array('model'=>$model),true);
    }


}