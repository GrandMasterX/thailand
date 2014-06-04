<?php
	Yii::app()->clientScript->registerScript('categories-tree', "
	
		$('#categories-tree').on('change_state.jstree', function (event, data) {
			
			$('#categories').empty();
			
			$('#categories-tree').jstree('get_checked',null,true).each(function() {

				var id = $(this).data('id');
				
				if(id) {
					$('<input>', {
						type: 'hidden',
						name: 'Product[categories][]',
						value: id
					}).appendTo('#categories');
				}

			})
			
	    }).on('loaded.jstree', function (event, data) {
            //$(this).jstree('open_all');
        })  
		
		$('#catalog-tree').on('select_node.jstree', function (event, data) {
			var id = data.rslt.obj.data('id');
			if(id) {
				$('#catalog-id').val(id);
				$('#categories-tree').jstree('uncheck_all'); 
				$('#categories-tree').jstree('check_node', '#categories-tree-' + id); 
			}
			
	    })
    ");
?>

	<?php echo $form->labelEx($model, 'catalog_id');?>
	<?php echo $form->hiddenField($model, 'catalog_id', array('id' => 'catalog-id'));?>
	<?php echo $form->error($model, 'catalog_id');?>
	
	<?php $this->widget('ext.jstree.SJsTree', array(
        'id'=>'catalog-tree',
        'data'=>Catalog::asArray(),
        'options'=>array(
            'core'=>array(
                'initially_open'=>"catalog-tree-1",
            ),
            'ui'=>array(
                'initially_select'=>"catalog-tree-{$model->catalog_id}",
            ),
            'plugins'=>array('themes','html_data','ui'),
        ),
		'htmlOptions' =>array(
			'style' => 'margin-top: 20px;'
		)
    ));
    ?>

	<br><br>	

	<label>В каких ещё категориях показывать продукт</label>
	<?php $this->widget('modules.product.components.ProductCatalogTree', array(
        'id'=>'categories-tree',
        'data'=>Catalog::asArray(),
		'product' => $model,
        'options'=>array(
            'core'=>array(
                'initially_open'=>'categories-tree-1',
            ),
            'plugins'=>array('themes','html_data','ui', 'checkbox'),
        ),
		'htmlOptions' =>array(
			'style' => 'margin-top: 20px;'
		)
    ));
    ?>
	
<div id="categories">
	<?php
		foreach($model->categories as $categorie)
			echo CHtml::hiddenField('Product[categories][]', is_object($categorie) ? $categorie->id : $categorie);
	?>
</div>	

