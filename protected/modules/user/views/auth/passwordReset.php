<?php
	$this->pageTitle = 'Восстановление пароля';
	$this->title = 'Восстановление пароля';
	$this->breadcrumbs = array(
		'Восстановление пароля'
	);
?>

<div class="textEditor modal">
	<?php $this->renderPartial('modules.user.views.auth.forms._passwordReset', array(
		'model'=>$model
	)) ?>
</div>


