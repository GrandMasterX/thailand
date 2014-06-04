<div id="cartWidget">

	<a href="#" class="opanLink"></a>
	
	<div id="scrollbar-cart">
        <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
        <div class="viewport">
            <div class="overview">
				<?php $this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_cart_view',
					'itemsTagName'=>'ul',
					'template' => '{items}',
					'emptyText' => '<div class="emptyText">Корзина пуста</div>',
					'htmlOptions' => array(
						'id' => 'cart-list'
					),
				)); ?>
				<div class="cart-info" style="<?php echo $dataProvider->totalItemCount ? '' : 'display:none' ?>">Товаров: <span id="cart-info-count"><?php echo Yii::app()->cart->count() ?></span> Итого: <span id="cart-info-sum"><?php echo Yii::app()->cart->sum() ?></span></div>
			</div>	
		</div>	
	</div>	
 
	<div class="clear"></div>
 
	<a href="<?php echo Yii::app()->createUrl('product/cart/index') ?>" class="OnCart">В корзину</a>
	<a href="#" id="order-link" class="oformit">Оформить</a>
</div>

