<?php

class Registration extends CActiveRecord {


    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return array(
            array('email, password', 'safe'),
        );
    }

    public function findByEmail($email)
    {
        return self::model()->findByAttributes(array('email' => $email));
    }

} 