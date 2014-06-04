<?php

class AliasBehavior extends CActiveRecordBehavior
{
    public $attribute = 'title';
    public $aliasAttribute = 'alias';

    protected function setAlias()
    {
        $owner = $this->owner;

        $title = $owner->{$this->attribute};
        $url = UrlTransliterate::cleanString($title);

		if($owner->isNewRecord) {
			$count = $owner::model()->count("{$this->aliasAttribute} LIKE '{$url}%'");
			if($count > 1)
				$url = "{$url}-{$count}";
		} else {
			$count = $owner::model()->count("{$this->aliasAttribute} LIKE '{$url}%' AND id <> :id", array(':id'=>$owner->id));
			if($count > 1)
				$url = "{$url}-{$count}";
		}
			
		$owner->{$this->aliasAttribute} = $url;
    }

    public function beforeValidate($event)
    {
        $this->setAlias();
    }

    public function findByAlias($alias)
    {
        $owner = $this->owner;
		return $owner::model()->findByAttributes(array($this->aliasAttribute => $alias));
    }
}
