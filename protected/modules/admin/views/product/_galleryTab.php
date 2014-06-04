<div class="form-raw-images">
	<?php $this->widget('modules.image.components.ImageCropWidget', array(
		'model' => $model,
		'attribute' => 'preview',
		'minWidth' => 490,
		'minHeight' => 410
	)); ?>
</div>

<hr class="clear" />

<div class="form-raw images">
	<?php $this->widget('modules.image.components.ImageCropMultipleWidget', array(
		'model' => $model,
		'minWidth' => 490,
		'minHeight' => 410
	)); ?>
	
</div>

