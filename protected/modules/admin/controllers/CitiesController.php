<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.06.14
 * Time: 11:40
 */

class Cities extends Controller{
    public function actionIndex() {

        $model = Content::model()->findAll();
        $this->render('cities',array('model'=>$model));
    }

    public function actionAdd() {
        $this->render('index');
    }
} 