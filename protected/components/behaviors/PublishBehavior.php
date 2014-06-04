<?php

class PublishBehavior extends CActiveRecordBehavior
{
    public $activeAttribute = 'is_active';

    public function active() {
        $alias = $this->owner->getTableAlias();
        $this->owner->getDbCriteria()->mergeWith(array(
            'condition'=>"{$alias}.{$this->activeAttribute}=1"
        ));

        return $this->owner;
    }
}
