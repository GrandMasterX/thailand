<?php foreach($menu as $row) : ?>
	<div class="nav-column">
		<h3><img src="<?php echo Yii::app()->baseUrl . $row['icon'] ?>"><?php echo $row['title'] ?></h3>
		<?php if(isset($row['childrens'])) : ?>
			<ul>
			<?php foreach($row['childrens'] as $children) : ?>
				<li><?php echo CHtml::link($children['title'], '/' . $children['path']) ?></li>
			<?php endforeach ?>
			</ul>
		<?php endif ?>
	</div>
<?php endforeach ?>
