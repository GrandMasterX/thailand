<?php

class AuthController extends Controller
{
    public function actionLogin()
    {
        $model=new LoginForm;

		$this->performAjaxValidation($model, 'login-form');

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()) {

                if(Yii::app()->user->checkAccess(User::ROLE_ADMIN))
                    $this->redirect(array('/admin'));
					
                if(Yii::app()->user->checkAccess(User::ROLE_MANAGER))
                    $this->redirect(array('/admin'));

                if(Yii::app()->user->checkAccess(User::ROLE_CLIENT))
                    $this->redirect(array('/user/default/index'));
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
	
	public function actionRegister()
	{
        $model=new User(User::SCENARIO_REGISTER);
		
		$this->performAjaxValidation($model, 'register-form');

        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
			$model->status = User::STATUS_NOT_CONFIRMED;
			$model->confirm_code = md5($model->email . microtime());
			$model->role = User::ROLE_CLIENT;
			
			$password = $model->password;
			
            if($model->save()) {
				
                $adminEmail = Yii::app()->config->get('adminEmail');
                $mailFrom = Yii::app()->config->get('mailFrom');
					
                //Отправляем сообщение пользователю о успешной регистрации
                @Yii::app()->getModule('mail')->send($model->email, $mailFrom, 'successRegister', array(
                    'siteNameLink' => CHtml::link(Yii::app()->config->get('siteName'), Yii::app()->createAbsoluteUrl(Yii::app()->homeUrl)),
					'username' => $model->email,
                    'password' => $password,
					'confirmLink'=>Yii::app()->createAbsoluteUrl('/user/auth/activation', array('code'=>$model->confirm_code))
                ));
					
                //Отправляем сообщение администратору о новом пользователе
                @Yii::app()->getModule('mail')->send($adminEmail, $mailFrom, 'successRegisterToAdmin', array(
                    'siteNameLink' => CHtml::link(Yii::app()->config->get('siteName'), Yii::app()->createAbsoluteUrl(Yii::app()->homeUrl)),
                    'password' => $password,
					'username' => $model->email,
                    'email'=>$model->email,
                ));
					
				Yii::app()->user->setFlash('success', 'На Ваш почтовый ящик отправлено письмо, в котором будет указан код для активации аккаунта!');
				$this->redirect(Yii::app()->homeUrl);
            }
        }
		
        $this->render('register',array('model'=>$model));
	}
	
	public function actionActivation($code)
	{
		$model = User::model()->findByAttributes(array(
			'confirm_code' => $code,
			'status' => User::STATUS_NOT_CONFIRMED
		));
		
		if($model) {
			$model->status = User::STATUS_CONFIRMED;
			$model->confirm_code = null;
			$model->update(array('status', 'confirm_code'));
			
			Yii::app()->user->setFlash('success', 'Спасибо, вы подтвердили свою регистрацию!');
		}
		
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionPasswordReset()
	{
        $model=new PasswordReset;

		$this->performAjaxValidation($model, 'password-reset-form');
		
        if(isset($_POST['PasswordReset']))
        {
            $model->attributes=$_POST['PasswordReset'];
			if($model->validate())
            {
				$user = $model->user;
                $user->confirm_code = md5($model->email . microtime());
                $user->update(array('confirm_code'));
				
                $adminEmail = Yii::app()->config->get('adminEmail');
                $mailFrom = Yii::app()->config->get('mailFrom');

                @Yii::app()->getModule('mail')->send($user->email, $mailFrom, 'passwordReset', array(
                    'siteNameLink' => CHtml::link(Yii::app()->config->get('siteName'), Yii::app()->createAbsoluteUrl(Yii::app()->homeUrl)),
					'confirmLink'=>Yii::app()->createAbsoluteUrl('/auth/passwordResetActivation', array('code'=>$user->confirm_code))
                ));
					
				Yii::app()->user->setFlash('success', 'На Ваш почтовый ящик отправлено письмо, в котором будет указан код для активации пароля!');
				$this->redirect(Yii::app()->homeUrl);
            }
		}

        $this->render('passwordReset', array(
            'model'=>$model
        ));
	}
	
	public function actionPasswordResetActivation($code)
	{
		$model = User::model()->findByAttributes(array(
			'confirm_code' => $code,
			'status' => User::STATUS_CONFIRMED
		));

        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'Запрашиваемая страница не существует.'));
			
		$model->setScenario(User::SCENARIO_PASSWORD_RESET);	
			
		$this->performAjaxValidation($model, 'user-form');	
		
		if(isset($_POST[get_class($model)]))
		{
			$model->attributes=$_POST[get_class($model)];
			$model->confirm_code = null;

			if($model->save())
            {
                Yii::app()->user->setFlash('success', 'Ваш пароль успешно изменён!');
                $this->redirect(Yii::app()->homeUrl);
            }
		}
		
        $this->render('password', array(
            'model'=>$model
        ));
	}
}
