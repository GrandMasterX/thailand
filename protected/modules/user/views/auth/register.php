<?php
	$this->pageTitle = 'Регистрация';
	$this->title = 'Регистрация';
	$this->breadcrumbs = array(
		'Регистрация'
	);
?>

<div class="textEditor modal">
	<?php $this->renderPartial('modules.user.views.auth.forms._register', array(
		'model'=>$model
	)) ?>
</div>

