<?php

class WebUser extends CWebUser {
    private $_model = null;

    public function getRole() {
        if($user = $this->getModel()){
            return $user->role;
        }
    }

    public function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = User::model()->findByPk($this->id);
        }
        return $this->_model;
    }
	
    public function getCabinetUrl()
    {
        if(Yii::app()->user->checkAccess(User::ROLE_ADMIN))
            return Yii::app()->createUrl('/admin');

        if(Yii::app()->user->checkAccess(User::ROLE_MANAGER))
            return Yii::app()->createUrl('/admin');

        if(Yii::app()->user->checkAccess(User::ROLE_CLIENT))
            return Yii::app()->createUrl('/user/default/index');
    }
}
