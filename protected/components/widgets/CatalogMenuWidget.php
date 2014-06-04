<?php
class CatalogMenuWidget extends CWidget
{
    public $cache = true;
	private $cacheKey;

	public function init()
	{
		parent::init();
		$this->cacheKey = Catalog::CACHE_MENU_KEY;
	}
	
	public function run()
	{
		if($this->cache) {
			$render = Yii::app()->cache->get($this->cacheKey);
			if($render === false) {
				$render = $this->renderMenu();
				Yii::app()->cache->set($this->cacheKey, $render, 24 * 3600);
			}
			echo $render;
		} else {
			echo $this->renderMenu();
		}
	}

    protected function renderMenu()
    {
		$menu = array();	
		
        $list=Yii::app()->db->createCommand()
            ->select(array(
				't.id as id',
				't.title as title',
				't.icon as icon',
				'(SELECT IF(p.id = 1, NULL, p.id) FROM catalog as p WHERE p.lft < t.lft AND p.rgt > t.rgt ORDER BY p.rgt ASC LIMIT 1) as parent_id',
                '(
                    SELECT GROUP_CONCAT(p.alias ORDER BY p.lft SEPARATOR "/")
                    FROM catalog p
                    WHERE
                        (p.lft <= t.lft) AND
                        (p.rgt >= t.rgt) AND
                        (p.lft > 1) AND
						(p.level > 1 AND p.level < 4)
                ) AS path',
			))
			->from('catalog t')
			->where('t.level BETWEEN 2 AND 3')
			->order('t.lft ASC')
			->queryAll();
			
		foreach($list as $row)
		{
			if($row['parent_id'] == null) 
			{
				$menu[ $row['id'] ] = array(
					'title' => $row['title'],
					'icon' => $row['icon'],
				);
			} else {
				$menu[ $row['parent_id'] ]['childrens'][ $row['id'] ] = array(
					'title' => $row['title'],
					'path' => $row['path'],
				);
			}
		}
		
        return $this->render('catalogMenu', array(
			'menu' => $menu
        ), true);
    }
	
	
	
}
