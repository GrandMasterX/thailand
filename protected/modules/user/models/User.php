<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $email
 * @property string $login
 * @property string $password
 * @property string $confirm_code
 * @property integer $status
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $role
 * @property string $create_time
 */
class User extends CActiveRecord
{
    const STATUS_NOT_CONFIRMED = 0;
    const STATUS_CONFIRMED = 1;

    const ROLE_GUEST = 'guest';           // "Гость"
	const ROLE_CLIENT = 'client';         // "Клиент"
    const ROLE_MANAGER = 'manager';       // "Менеджер"
    const ROLE_ADMIN = 'admin';           // "Администратор"
	
	const SCENARIO_REGISTER = 'register';
	const SCENARIO_ADMIN = 'admin';
	const SCENARIO_PASSWORD_RESET = 'password.reset';
	
	const SCENARIO_ADMIN_CREATE_USER = 'admin.create.user';
	const SCENARIO_ADMIN_UPDATE_USER = 'admin.update.user';
	const SCENARIO_ADMIN_PASSWORD_RESET_USER = 'admin.password.reset.user';
	
	public $password_repeat;
	public $password_new;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// Register
			array('email, password, password_repeat, role', 'required', 'on' => self::SCENARIO_REGISTER),
			array('password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают.', 'on' => self::SCENARIO_REGISTER),
			array('email', 'email', 'on' => self::SCENARIO_REGISTER),
			array('email', 'unique', 'message' => 'Пользователь с таким E-mail уже зарегистрирован.', 'on' => self::SCENARIO_REGISTER),
			
			//SCENARIO_PASSWORD_RESET
			array('password_new, password_repeat', 'required', 'on' => self::SCENARIO_PASSWORD_RESET),
			array('password_repeat', 'compare', 'compareAttribute' => 'password_new', 'message' => 'Пароли не совпадают.', 'on' => self::SCENARIO_PASSWORD_RESET),
		
			// SCENARIO_ADMIN_CREATE_USER
			array('email, password, password_repeat, role', 'required', 'on' => self::SCENARIO_ADMIN_CREATE_USER),
			array('password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают.', 'on' => self::SCENARIO_ADMIN_CREATE_USER),
			array('email', 'email', 'on' => self::SCENARIO_ADMIN_CREATE_USER),
			array('email', 'unique', 'message' => 'Пользователь с таким E-mail уже зарегистрирован.', 'on' => self::SCENARIO_ADMIN_CREATE_USER),
			array('role', 'in', 'range'=>array(self::ROLE_CLIENT, self::ROLE_MANAGER, self::ROLE_ADMIN), 'on' => self::SCENARIO_ADMIN_CREATE_USER),
			
			// SCENARIO_ADMIN_UPDATE_USER
			array('email, role', 'required', 'on' => self::SCENARIO_ADMIN_UPDATE_USER),
			array('email', 'email', 'on' => self::SCENARIO_ADMIN_UPDATE_USER),
			array('email', 'unique', 'message' => 'Пользователь с таким E-mail уже зарегистрирован.', 'on' => self::SCENARIO_ADMIN_UPDATE_USER),
			array('role', 'in', 'range'=>array(self::ROLE_CLIENT, self::ROLE_MANAGER, self::ROLE_ADMIN), 'on' => self::SCENARIO_ADMIN_UPDATE_USER),
			
			// SCENARIO_ADMIN_PASSWORD_RESET_USER
			array('email, password_new, password_repeat, role', 'required', 'on' => self::SCENARIO_ADMIN_PASSWORD_RESET_USER),
			array('password_repeat', 'compare', 'compareAttribute' => 'password_new', 'message' => 'Пароли не совпадают.', 'on' => self::SCENARIO_ADMIN_PASSWORD_RESET_USER),
			array('email', 'email', 'on' => self::SCENARIO_ADMIN_PASSWORD_RESET_USER),
			array('email', 'unique', 'message' => 'Пользователь с таким E-mail уже зарегистрирован.', 'on' => self::SCENARIO_ADMIN_PASSWORD_RESET_USER),
			array('role', 'in', 'range'=>array(self::ROLE_CLIENT, self::ROLE_MANAGER, self::ROLE_ADMIN), 'on' => self::SCENARIO_ADMIN_PASSWORD_RESET_USER),
		
			array('email, password, first_name, middle_name, last_name', 'length', 'max'=>255),
			array('login', 'length', 'max'=>60),
			array('phone', 'length', 'max'=>100),
			array('address, group_id', 'safe'),
			array('role', 'length', 'max'=>7),
			array('confirm_code', 'length', 'max'=>128),
			array('status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, group_id, email, login, password, first_name, middle_name, last_name, role, create_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'orders'=>array(self::HAS_MANY, 'Order', 'user_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
		);
	}
	
    public static function encrypt($value)
    {
        return md5($value);
    }

    public static function verify($value, $hash)
    {
        return $hash == md5($value);
    }
	
    protected function beforeSave()
    {
        if($this->isNewRecord)
            $this->create_time = new CDbExpression('NOW()');
			
        if($this->scenario == self::SCENARIO_REGISTER)
            $this->password = self::encrypt($this->password);
			
        if($this->scenario == self::SCENARIO_ADMIN_CREATE_USER)
            $this->password = self::encrypt($this->password);
			
        if($this->scenario == self::SCENARIO_ADMIN_PASSWORD_RESET_USER)
            $this->password = self::encrypt($this->password_new);
			

        return parent::beforeSave();
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'login' => 'Логин',
			'group_id' => 'Группа',
			'email' => 'E-mail',
			'password' => 'Пароль',
			'password_new' => 'Новый пароль',
			'password_repeat' => 'Подтвердите пароль',
			'phone' => 'Телефон',
			'address' => 'Адрес',
			'first_name' => 'Имя',
			'middle_name' => 'Отчество',
			'last_name' => 'Фамилия',
			'role' => 'Role',
			'create_time' => 'Create Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('group');

		$criteria->compare('id',$this->id,true);
		$criteria->compare('group_id',$this->group_id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new SearchDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
