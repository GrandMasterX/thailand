<?php

class User extends CActiveRecord {

    public  $password_repeat;
    public  $password_check;
    private $password_old;
    private $_id;
    private $_name;
    private $_email;
    private $_model;
    private $fname;
    private $lname;
    private $acc_status;
    private $_isAuthenticated = false;
    private $_state = array();
    public  $unhashed_password;
    public  $auth_role;
    const ROLE_ADMIN = 'admin@admin';
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
            array('password, email', 'required', 'on' => 'registration'),
            array('email', 'email', 'on' => 'registration'),
            array('email', 'unique', 'message' => "Email address already exists", 'on' => 'registration'),
            array('password', 'length', 'max' => 128, 'min' => 4, 'message' => "Incorrect password (minimal length 4 symbols)", 'on' => 'registration'),
            array('id, firstName, lastName, email, password', 'safe'),
        );
    }

    public function findByEmail($email)
    {
        return self::model()->findByAttributes(array('email' => $email));
    }

    public static function t($str = '', $params = array())
    {
        return Yii::t('user', $str, $params);
    }

    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;
        //$criteria->with = array('group');

        $criteria->compare('id',$this->id,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('firstName',$this->firstName,true);
        $criteria->compare('middleName',$this->middleName,true);
        $criteria->compare('lastName',$this->lastName,true);
        $criteria->compare('role',$this->role,true);
        //$criteria->compare('create_time',$this->create_time,true);

        return new SearchDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
} 