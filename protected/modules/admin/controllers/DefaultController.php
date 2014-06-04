<?
class DefaultController extends Controller {

    public $layout = '/layouts/main';

    public function actionIndex() {
        $this->render('index');
    }

    public function actionCities() {

        $model = Content::model()->findAll();
        $this->render('cities',array('model'=>$model));
    }
}