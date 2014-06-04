<?php
class MobileTopNewBlockWidget extends CWidget
{
    const CACHE_KEY = 'MobileTopNewBlockWidget.CACHE_KEY';

    public $cache = false;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        /*if($this->cache) {
            $render = Yii::app()->cache->get(self::CACHE_KEY);
            if($render === false) {
                $render = $this->renderBlock();
                Yii::app()->cache->set(self::CACHE_KEY, $render, 24 * 3600);
            }
            echo $render;
        } else {*/
            echo $this->renderBlock();
        //}
    }

    protected function renderBlock()
    {
        $newProductDataProvider = new CActiveDataProvider(Product::model()->active(), array(
            'criteria'=>array(
                'with'=>array('catalog'),
                'limit' => 20,
                'order' => 'create_time DESC'
            ),
            'pagination' => false
        ));

        $topProductDataProvider = new CActiveDataProvider(Product::model()->active(), array(
            'criteria'=>array(
                'with'=>array('catalog'),
                'limit' => 20,
                'order' => 'sale_count DESC'
            ),
            'pagination' => false
        ));

        return $this->render('top_new_products_mobile', array(
            'newProductDataProvider' => $newProductDataProvider,
            'topProductDataProvider' => $topProductDataProvider,
        ), true);
    }



}