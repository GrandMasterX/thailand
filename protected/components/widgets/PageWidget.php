<?php
class PageWidget extends CWidget
{
	public $alias;
	public $seo = true;
	
	private $model;
	
	public function init()
	{
        $this->model = Page::model()->active()->findByAttributes(array(
            'alias' => $this->alias
        ));

        if($this->model === null)
            throw new CHttpException(404, Yii::t('app', 'Запрашиваемая страница не существует.'));
	
		parent::init();
	}
	
	public function run()
	{
		if($this->seo)
		{
			$this->controller->pageTitle = $this->model->pageTitle;
			Yii::app()->clientScript->registerMetaTag($this->model->meta_description, 'description');
			Yii::app()->clientScript->registerMetaTag($this->model->meta_keywords, 'keywords');
		}
		
		echo $this->model->content;
	}
}