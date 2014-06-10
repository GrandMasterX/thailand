<?php
	$this->pageTitle = 'Авторизация';
	$this->title = 'Авторизация';
	$this->breadcrumbs = array(
		'Авторизация'
	);
?>

<div class="textEditor modal">
	<?php $this->renderPartial('modules.user.views.auth.forms._login', array(
		'model'=>$model
	)) ?>
</div>
