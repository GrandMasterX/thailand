<?php echo '<?xml version="1.0" encoding="utf-8"?>' ?> 
<price date="<?php echo date('Y-m-d H:i') ?>">
	<name><?php echo $name ?></name>
	<currency id="<?php echo $currency ?>" rate="<?php echo $rate ?>"/>
	<catalog>
		<?php foreach($catalog as $category) : ?>
			<category id="<?php echo $category['id'] ?>" <?php if($category['parent_id']) echo 'parentID="' . $category['parent_id'] . '"'; ?>  ><?php echo $category['title'] ?></category>
		<?php endforeach ?>
	</catalog>
	<items>
		<?php foreach($products as $product) : ?>
			<item id="<?php echo $product['id'] ?>">
				<name><?php echo $product['title'] ?></name>
				<categoryId><?php echo $product['catalog_id'] ?></categoryId>
				<price><?php echo $product['price'] ?></price>
				<url><?php echo Yii::app()->createAbsoluteUrl('product/default/view', array('alias' => $product['alias'])) ?></url>
				<image><?php echo Yii::app()->request->hostInfo . $product['preview'] ?></image>
				<description>
					<?php echo $product['description'] ?>
				</description>
			</item>
		<?php endforeach ?>
	</items>
</price>
