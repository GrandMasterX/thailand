<?php
/**
 * Controller is the customized base admin module controller class.
 * All admin module controller classes for this application should extend from this base class.
 */
class AdminController extends Controller
{
    public $layout = '/layouts/main';

    public $pageTitle = 'Администрирование';
    public $defaultAction = 'admin';

    public function filters()
    {
        return array(
            'accessControl'
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'users'=>array('@'),
            ),
            /*array('allow',
                'actions'=>array('login'),
                'users'=>array('*'),
            ),
            array('deny',
                'users'=>array('*'),
                'deniedCallback' => function() {
                        Yii::app()->controller->redirect('/admin/auth/login');
                    }
            ),*/
        );
    }
	
    public function init()
    {
        parent::init();

        if(Yii::app()->getRequest()->getIsAjaxRequest()) {
			Yii::app()->clientscript->scriptMap['jquery.js'] = false;  
			Yii::app()->clientscript->scriptMap['jquery.min.js'] = false;
			
			$this->layout = '//layouts/ajax';
		}
    }
	
}