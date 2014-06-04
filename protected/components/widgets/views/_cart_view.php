<li>
	<a href="<?php echo Yii::app()->createUrl('product/default/view', array('alias'=>$data['alias'])) ?>"> 
		<?php
			if($data['preview']) {
				echo CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(74, 62, $data['preview'], array('method' => 'adaptiveResize')));
			}
		?>
        <h6><?php echo $data['title'] ?></h6>
        <span class="priceMini"><?php echo $data['quantity'] > 1 ? $data['quantity'] . 'x' : '';  ?>  <?php echo $data['price'] ?> грн.</span>
    </a>
</li>
