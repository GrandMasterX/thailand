<?php

class LoggerBehavior extends CActiveRecordBehavior
{
    public $name;
    public $genus;
    public $linkExpression;
    public $titleExpression;
	public $roles = array(User::ROLE_ADMIN, User::ROLE_MANAGER);

    public function afterSave($event)
    {
        if($this->owner->isNewRecord) {
            $eventName = Yii::t('logger', 'n==0#Создан|n==1#Создана|n==2#Создано', $this->genus);
        } else {
            $eventName = Yii::t('logger', 'n==0#Обновлён|n==1#Обновлена|n==2#Обновлено', $this->genus);
        }

        $this->addLogger($eventName);
    }

    public function beforeDelete($event)
    {
        $eventName = Yii::t('logger', 'n==0#Удалён|n==1#Удалена|n==2#Удалено', $this->genus);
        $this->addLogger($eventName, false);
    }

    protected function addLogger($eventName, $addLink = true)
    {
        if(in_array(Yii::app()->user->role, $this->roles)) {
            $logger = new Logger;
            $logger->user_id = Yii::app()->user->id;

            $user = Yii::app()->user->name;

            if($addLink) {
                $link = $this->evaluateExpression($this->linkExpression, array('model'=>$this->owner));
                $logger->message = "{$eventName} {$this->name} {$link} <small>({$user})</small>";
            } else {
                $title = $this->evaluateExpression($this->titleExpression, array('model'=>$this->owner));
                $logger->message = "{$eventName} {$this->name} {$title} <small>({$user})</small>";
            }

            $logger->save();
        }
    }
}
