<?php
	$data=$dataProvider->getData();
	foreach($data as $i=>$item) {
		$this->renderPartial('widgets.views._cart_view', array('data' => $item));
	}
?>
