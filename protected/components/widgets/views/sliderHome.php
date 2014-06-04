    <div class="connected-carousels" id="slider-home">
        <div class="stage">
            <div class="carousel carousel-stage">
				<ul>
					<?php foreach($slider as $item) : ?>
					<li>
						<div class="wrapper">
							<a>
								<?php
									if($item['image'])
										echo CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(425, 341, $item['image'], array('method' => 'adaptiveResize')), $item['title']);
								?>
							</a>
							<div class="SliderContentBlock">
								<span class="podbor">Быстрый подбор:</span>
								<h3><a href="#"><?php echo $item['title'] ?></a></h3>
								<div class="filterText"><p><?php echo $item['description'] ?></p></div>
								<form method="post">
									<label>Укажите категорию<br />
										<div class="selectOhome">
											<?php echo CHtml::dropDownList('', null, CHtml::listData($item['childrens'], 'path', 'title'), array('class'=>'select selectHome categoryForm action')) ?>
										</div>
									</label>

									<span>Задайте диапазон цен:</span>
									<label>От
										<div class="selectOmhome">
											<?php echo CHtml::dropDownList('FilterForm[price_from]', null, Product::getPricesArray(), array('class'=>'select2 selectHome categoryPrice', 'empty' => 'Не важно')) ?>
										</div>
									</label>

									<label>До
										<div class="selectOmhome">
											<?php echo CHtml::dropDownList('FilterForm[price_to]', null, Product::getPricesArray(), array('class'=>'select3 selectHome categoryPrice', 'empty' => 'Не важно')) ?>
										</div>
									</label>

									<input type="submit" value="Показать">
								</form>
							</div>
						</div>
					</li>
					<?php endforeach ?>
				</ul>
			</div>

			<a href="#" class="prev prev-navigation"><span>&lsaquo;</span></a>
			<a href="#" class="next next-navigation"><span>&rsaquo;</span></a>
        </div>

        <div class="navigation">
            <div class="carousel carousel-navigation">
                <ul>
					<?php foreach($slider as $item) : ?>
						<li class="knob">
							<?php
								if($item['image'])
									echo CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(66, 54, $item['image'], array('method' => 'adaptiveResize')), $item['title']);
							?>
							<span><?php echo $item['title'] ?></span>
						</li>
					<?php endforeach ?>
                </ul>
            </div>
        </div>
	</div>


<script>
	$(function() {
		$('#slider-home').on('submit', 'form', function() {
			var form = $(this);
			var action = $('.action', form).val();
			form.attr('action', action);
		})
	})
</script>