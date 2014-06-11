<?php
class Groups extends CActiveRecord {

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'groups';
    }

    public function rules()
    {
        return array(
            array('id, title, user_id', 'safe'),
        );
    }

    public function scopes()
    {
        return array(
            'owner' => array(
                'condition' => 'user_id = :user_id and user_id = 0',
                'params' => array(
                    ':user_id' => Yii::app()->user->id
                )
            ),
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('user_id', array(Yii::app()->user->id,0), true,'OR');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getName() {
        return $this->title;
    }

    protected function beforeSave(){
        if(parent::beforeSave()){

            if(!$this->user_id)
                $this->user_id = Yii::app()->user->id;
        }
        return true;
    }

    public function attributeLabels()
    {
        return array(
            'id' => '#',
            'name' => 'Название',
            'subject' => 'Тема',
            //'template' => 'Шаблон',
        );
    }
    /*
    public function behaviors()
    {
        return array(
            'LoggerBehavior' => array(
                'class' => 'behaviors.LoggerBehavior',
                'name' => 'Шаблон',
                'linkExpression' => function($model) {
                        return CHtml::link($model->name, array('/privatoffice/templates/view', 'id' => $model->id));
                    },
                'titleExpression' => function($model) {
                        return $model->name;
                    },
            ),
        );
    }*/
}