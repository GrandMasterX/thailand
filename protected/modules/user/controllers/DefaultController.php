<?php

class DefaultController extends Controller
{
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
                'roles'=>array(User::ROLE_CLIENT),
			),
            array('allow',
                'actions'=>array('login'),
                'users'=>array('*'),
            ),
			array('deny',
				'users'=>array('*'),
                'deniedCallback' => function() {
                    Yii::app()->controller->redirect('/user/auth/login');
                }
			),
		);
	}

	public function actionIndex()
	{
		$model = Yii::app()->user->model;
		
		$dataProvider = new CActiveDataProvider(Order::model()->byWebUser(), array(
			'criteria'=>array(
				'with' => array('status', 'productsCount'),
				'together'=>true,
			),
			'sort' => array(
				'defaultOrder' => 't.id DESC'
			),
		));
		
		$this->render('index', array(
			'model' => $model,
			'dataProvider' => $dataProvider
		));
	}
	
	public function actionOrder($id)
	{
        $model = Order::model()->findByPk($id);

        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'Запрашиваемая страница не существует.'));
			
        if ($model->user_id != Yii::app()->user->id)
            throw new CHttpException(404, Yii::t('app', 'Запрашиваемая страница не существует.'));
		
		$view = $model->payment_id == OrderPayment::BEZNAL_NDS ? 'order_nds' : 'order';  
		
		$this->render($view, array(
			'model' => $model,
		));
	}
	

	public function actionUpdate()
	{
		$model = Yii::app()->user->model;
		$model->scenario = Yii::app()->request->getParam('scenario', User::SCENARIO_ADMIN_UPDATE_USER);

		$this->performAjaxValidation($model, 'user-form');

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save()) {
				Yii::app()->user->setFlash('success', 'Данные успешно сохранены.');
			}
		}
	
		$this->render('update', array(
			'model' => $model
		));
	}
}