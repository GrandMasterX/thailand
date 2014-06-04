<div id="homeLinkProd">
	<a id="newProd" href="javascript://">Новые поступления</a>
	<a id="topProd" href="javascript://">Популярные товары</a>
</div>

<div id="product-new" class="productBlock">
   	<div id="catalog">
    	<div class="bond-hover">
			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$newProductDataProvider,
				'itemView'=>'_product',
				'itemsTagName'=>'ul',
				'itemsCssClass'=>'cbp-rfgrid bond-box',
				'template' => '{items}',
				'htmlOptions' => array(
					'class' => 'bond-wrapper'
				)
			)); ?>
		</div>
	</div>
</div>

<div id="product-top" class="productBlock">
   	<div id="catalog">
    	<div class="bond-hover">
			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$topProductDataProvider,
				'itemView'=>'_product',
				'itemsTagName'=>'ul',
				'itemsCssClass'=>'cbp-rfgrid bond-box',
				'template' => '{items}',
				'htmlOptions' => array(
					'class' => 'bond-wrapper'
				)
			)); ?>
		</div>
	</div>
</div>