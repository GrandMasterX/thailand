<li class="bond-slide">
   	<div class="ListProdHome">
       	<div class="ListProd">
			<a href="<?php echo Yii::app()->createUrl('product/default/view', array('alias'=>$data->alias)) ?>"> 
           		<div class="article">Код: <span><?php echo $data->code ?></span></div>
				<?php
					if($data->preview) {
						echo CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(166, 142, $data->preview, array('method' => 'adaptiveResize')), null, array('height'=>142));
					}
				?>
           		<h3><?php echo $data->title ?></h3>
           		<span class="price"><?php echo $data->price ?> грн.</span>
           		<h4>Подробнее о товаре</h4>
            </a>
			<a class="buy" href="<?php echo Yii::app()->createUrl('product/cart/add', array('id'=>$data->id)) ?>">Купить</a>
        </div> 
        <div class="Category">
           	<span>Категория:</span>
            <p><?php echo $data->catalog ? $data->catalog->title : null ?></p>
        </div>
        <div class="clear"></div>
 	</div>   
</li>
