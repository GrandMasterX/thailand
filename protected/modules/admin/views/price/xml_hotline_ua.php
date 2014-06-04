<?php echo '<?xml version="1.0" encoding="utf-8"?>' ?> 
<price>
	<date><?php echo date('Y-m-d H:i') ?></date>
	<firmName><?php echo $name ?></firmName>
	<rate><?php echo $rate ?></rate>
	<categories>
		<?php foreach($catalog as $category) : ?>
			<category>
				<id><?php echo $category['id'] ?></id>
				<name><?php echo $category['title'] ?></name>
				<?php if($category['parent_id']) : ?>
					<parentId><?php echo $category['parent_id'] ?></parentId>
				<?php endif ?>
			</category>
		<?php endforeach ?>
	</categories>
	<items>
		<?php foreach($products as $product) : ?>
			<item>
				<id><?php echo $product['id'] ?></id>
				<name><?php echo CHtml::encode($product['title']) ?></name>
				<categoryId><?php echo $product['catalog_id'] ?></categoryId>
				<code><?php echo $product['code'] ?></code>
				<priceRUAH><?php echo $product['price'] ?></priceRUAH>
				<url><?php echo Yii::app()->createAbsoluteUrl('product/default/view', array('alias' => $product['alias'])) ?></url>
				<image><?php echo Yii::app()->request->hostInfo . $product['preview'] ?></image>
				<description>
					<?php echo CHtml::encode($product['description']) ?>
				</description>
			</item>
		<?php endforeach ?>
	</items>
</price>
