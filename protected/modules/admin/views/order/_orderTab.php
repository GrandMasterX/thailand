<h4>Список товаров</h4>
<div id="product-individual">
	<button class="btn btn-primary" type="button" id="product-add">Добавить товар</button>
	<button class="btn btn-success" type="button" id="refresh"><i class="icon-white icon-refresh"></i>Пересчитать</button>
	<table id="product-list" style="margin-top: 10px;">
		<thead>
			<tr>
				<td style="width: 260px">Товар</td>
				<td style="width: 100px">Количество</td>
				<td style="width: 100px">Цена</td>
				<td style="width: 100px">Установка</td>
				<td style="width: 100px">Скидка (%)</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($model->productArray as $product) : ?>
				<tr class="item">
					<td>
						<input type="text" class="span2 product" style="width: 260px" value="<?php echo $product['title'] . ' (' . $product['code'] . ')' ?>" >
						<input type="hidden" class="id" name="Product[ids][]" value="<?php echo $product['id'] ?>">
					</td>
					<td>
						<input type="text" class="span2 quantity" name="Product[quantitys][]" style="width: 100px;" value="<?php echo $product['quantity'] ?>">
					</td>
					<td>
						<input type="text" class="span2 price" name="Product[prices][]" style="width: 100px;" readonly value="<?php echo $product['price'] ?>">
					</td>
					<td>
						<input type="text" class="span2 installation" name="Product[installations][]" style="width: 100px;" readonly  value="0">
					</td>
					<td>
						<input type="text" class="span2 discount" name="Product[discounts][]" style="width: 100px;"  value="<?php echo $product['discount'] ?>">
					</td>
					<td>
						<a class="delete btn btn-danger btn-small" style="margin: -10px 0 0 5px;"><i class="icon-remove icon-white"></i></a>
						<?php if($product['calculator']) : ?>
							<a class="calculator-link btn btn-primary btn-small" style="margin: -10px 0 0 5px;"><i class="icon-white icon-th"></i></a>
						<?php endif ?>
					</td>
					<?php
						if(!empty($product['calculator'])) {
							$this->renderPartial('_calculator', array('productId' => $product['id'],'calculator' => $product['calculator']));
						}
					?>
				</tr>
			<?php endforeach ?>
			<tr class="item">
				<td>
					<input type="text" class="span2 product" style="width: 260px">
					<input type="hidden" class="id" name="Product[ids][]">
				</td>
				<td>
					<input type="text" class="span2 quantity" name="Product[quantitys][]" style="width: 100px;">
				</td>
				<td>
					<input type="text" class="span2 price" name="Product[prices][]" style="width: 100px;" readonly>
				</td>
				<td>
					<input type="text" class="span2 installation" name="Product[installations][]" style="width: 100px;" readonly  value="0">
				</td>
				<td>
					<input type="text" class="span2 discount" name="Product[discounts][]" style="width: 100px;" value="">
				</td>
				<td>
					<a class="delete btn btn-danger btn-small" style="margin: -10px 0 0 5px;"><i class="icon-remove icon-white"></i></a>
				</td>
			</tr>
		</tbody>
	</table>
	<div style="margin-top: 10px;">
		<div style="margin-top: 10px;">
			<label>
				<input type="text" id="discount" class="span2" name="Order[discount]" style="width: 100px;" value="<?php echo $model->discount ?>">
				Скидка на весь заказ (%)
			</label>
			<label>
				<input type="text" id="sum" class="span2 price" style="width: 100px" value="<?php echo $model->sum ?>" readonly>
				Общая сумма заказа (гр)
			</label>
		</div>
	</div>
	<div id="product-template" style="position: absolute; top: -9999px; left: -9999px;">
		<table>
			<tr class="item">
				<td>
					<input type="text" class="span2 product" style="width: 260px">
					<input type="hidden" class="id" name="Product[ids][]">
				</td>
				<td>
					<input type="text" class="span2 quantity" name="Product[quantitys][]" style="width: 100px;">
				</td>
				<td>
					<input type="text" class="span2 price" name="Product[prices][]" style="width: 100px;" readonly>
				</td>
				<td>
					<input type="text" class="span2 installation" name="Product[installations][]" style="width: 100px;" readonly  value="0">
				</td>
				<td>
					<input type="text" class="span2 discount" name="Product[discounts][]" style="width: 100px;" value="">
				</td>
				<td>
					<a class="delete btn btn-danger btn-small" style="margin: -10px 0 0 5px;"><i class="icon-remove icon-white"></i></a>
				</td>
			</tr>
		</table>
	</div>
</div>

<script>
	$(function() {
		var autocomplete = {
			init: function() {
				$('.product').autocomplete({
					minLength: 2,
					select: function(event, ui) {
						var parent = $(this).parent().parent();
						
						$.getJSON('/admin/order/getProduct', {id: ui.item.id}, function(json) {
							
							$('.id', parent).val(json.id);
							$('.price', parent).val(json.price);
							$('.quantity', parent).val(1);
							$('.installation', parent).val(0);
							$('.discount', parent).val(0);
							
							if(json.calculator) {
								$('td:last', parent).append('<a class="calculator-link btn btn-primary btn-small" style="margin: -10px 0 0 5px;"><i class="icon-white icon-th"></i></a>');
								$(json.calculator).insertAfter(parent);
								
							}
							$('#refresh').click();
						})
						
						
					},
					source: '/admin/order/getProducts'
				});		
			}
		}
		
		autocomplete.init();
		
		
		
		$('#product-list').on('change keyup', '.calculator', function() {
			var tr = $(this);
			var price = 0;
			
			$('input:checkbox:checked, input[type=number]', tr).each(function() {
				price += $(this).val() * $(this).data('price');
			})
			
			$('select', tr).each(function() {
				var value = $(this).val(); 
				if(value)
					price += parseInt(value);
			})
			
			$('.installation', tr.prev()).val(price);
		})
	
		$('#product-add').on('click', function() {
			var html = $('#product-template table').html();
			$('#product-list').append(html);
			autocomplete.init();
			return false;
		})
		
		$('#product-list').on('click', 'a.delete', function() {
			$(this).parent().parent().remove();
			$('#refresh').click();
			return false;
		})
		
		$('#product-list').on('click', 'a.calculator-link', function() {
			var tr = $(this).parent().parent().next();
			tr.toggle('normal');
			return false;
		})
		
		$('#product-list').on('change', '.select', function() {
			var select = $(this);
			select.parent().next().text( select.val() );
		})	
		
		$('#refresh').on('click', function() {
			
			var sum = 0;
			$('#product-list tr.item').each(function() {
				var quantity = parseInt( $(this).find('.quantity').val() );
				var price = parseInt( $(this).find('.price').val() );
				var installation = parseInt( $(this).find('.installation').val() );
				var discount = parseInt( $(this).find('.discount').val() );
				
				if(price)
					sum += quantity * (price + installation) * ( 100 - discount ) / 100;
			})
			
			var discount = parseInt( $('#discount').val() );
			if(discount)
				sum = sum * ( 100 - discount ) / 100;
				
				
			
			if(sum)
				$('#sum').val(parseInt(sum));
			
			return false;
		})
		
		$('#product-list .calculator').change();
		$('#refresh').click();
	})
</script>
