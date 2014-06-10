<?php
class PrivatofficeModule extends CWebModule
{
    public $layout='main';

    protected function init()
    {
        parent::init();

        Yii::app()->theme = 'privatoffice';

        $this->setImport(array(
            'privatoffice.models.*',
            'privatoffice.components.*',
        ));

        Yii::app()->configure(array(
            'components'=>array(
                'errorHandler'=>array(
                    'errorAction'=>'privatoffice/default/error',
                ),
            ),
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        //var_dump(Yii::app()->controller->id);die;
        if(parent::beforeControllerAction($controller, $action))
        {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }
}