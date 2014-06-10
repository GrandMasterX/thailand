<?php

class SiteController extends Bus {

    public $layout = 'main';
	/**
	 * Declares class-based actions.
	 */
    public function actions()
    {
        return array(
            'oauth' => array(
                // the list of additional properties of this action is below
                'class'=>'ext.hoauth.HOAuthAction',
                // Yii alias for your user's model, or simply class name, when it already on yii's import path
                // default value of this property is: User
                'model' => 'User',
                // map model attributes to attributes of user's social profile
                // model attribute => profile attribute
                // the list of avaible attributes is below
                'attributes' => array(
                    'email' => 'email',
                    'fname' => 'firstName',
                    'lname' => 'lastName',
                    'gender' => 'genderShort',
                    'birthday' => 'birthDate',
                    // you can also specify additional values,
                    // that will be applied to your model (eg. account activation status)
                    'acc_status' => 1,
                ),
            ),
        );
    }

    public function actionIndex() {
        //$form = $this->actionCreateSession();
        $registration = new UserRegistration();
        $this->render('index', array(/*'form' => $form,*/ 'registration' => $registration ));
    }

    public function actionRegister() {
        if(isset($_POST['User'])) {
            $model = new User('registration');
            $model->attributes = $_POST['User'];
            if($model->validate() && $model->save()) {
                Yii::app()->user->setFlash('registration_ok','Thank you for registration! Check your email and for now you could log in');
                $adminEmail = Yii::app()->config->get('adminEmail');
                $mailFrom = Yii::app()->config->get('mailFrom');

                //Отправляем сообщение пользователю о успешной регистрации
                @Yii::app()->getModule('mail')->send($model->email, $mailFrom, 'successRegister', array(
                    'siteNameLink' => CHtml::link(Yii::app()->config->get('siteName'), Yii::app()->createAbsoluteUrl(Yii::app()->homeUrl)),
                    'username' => $model->email,
                    'password' => $model->password,
                    'confirmLink'=>Yii::app()->createAbsoluteUrl('/user/auth/activation', array('code'=>$model->confirm_code))
                ));
                Yii::app()->request->redirect(Yii::app()->user->returnUrl);
            }
        }
    }

    public function actionContacts() {
        $this->render('contacts');
    }

    public function actionReservation() {
        $this->render('reservation');
    }

    public function actionContent($alias) {
        $model = Content::model()->findByAttributes(array('alias'=>$alias));
        $form = $this->actionCreateSession();
        $this->render('index',array('model'=>$model,'form'=>$form));
    }

	/**
	 * This is the action to handle external exceptions.
	 */

    public function actionGetCities() {
        $results = Yii::app()->db->createCommand()
            ->select('id, cid, country, city')
            ->from('cities_ru')
            ->where(array('or', 'city like '."'".$_POST['term'].'%'."'", 'country like '."'".$_POST['term'].'%'."'"))
            ->order('city asc')
            ->queryAll();
        foreach($results as $res) {
            if($res['country']!='')
                $data[] = array('label' => ($res['city'].', '. $res['country']), 'id' => $res['cid']);
            else
                $data[0] = array('label' => $res['city'], 'id' => $res['cid']);
        }

        $tpl = $this->renderPartial('list', array(
            'data' => $data,
        ), true);

        echo json_encode($tpl);
    }

	public function actionError()
	{
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error',array('data' =>$error));
        }
	}

    public function actionLogin() {
        if (!isset($_GET['provider']))
        {
            $this->redirect('/site/index');
            return;
        }

        try
        {
            Yii::import('ext.components.HybridAuthIdentity');
            $haComp = new HybridAuthIdentity();
            if (!$haComp->validateProviderName($_GET['provider']))
                throw new CHttpException ('500', 'Invalid Action. Please try again.');

            $haComp->adapter = $haComp->hybridAuth->authenticate($_GET['provider']);
            $haComp->userProfile = $haComp->adapter->getUserProfile();
            $haComp->login();  //further action based on successful login or re-direct user to the required url
        }
        catch (Exception $e)
        {
            //process error message as required or as mentioned in the HybridAuth 'Simple Sign-in script' documentation
            $this->redirect('/site/index');
            return;
        }
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->user->returnUrl);
    }

    public function actionSocialLogin()
    {
        Yii::import('ext.components.HybridAuthIdentity');
        $path = Yii::getPathOfAlias('ext.hoauth');
        require_once $path . '\\hybridauth\\social.php';
    }

}
