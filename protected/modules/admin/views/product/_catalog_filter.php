<a id="catalog-filter-link" >Категория</a>
<div id="catalog-filter-block" >	
	<?php $this->widget('ext.jstree.SJsTree', array(
        'id'=>'catalog-filter',
        'data'=>Catalog::asArray(),
        'options'=>array(
            'core'=>array(
                'initially_open'=>"catalog-filter-1",
            ),
            'plugins'=>array('themes','html_data','ui'),
        ),
    ));
    ?>
</div>	

<?php echo Chtml::activeHiddenField($model, 'catalog_id', array('id' => 'catalog-filter-id'));?>

<script>
	$(function() {
		$('#catalog-filter-link').on('click', function() {
			$('#catalog-filter-block').slideToggle();
			return false;
		})
		
		$('#catalog-filter').on('select_node.jstree', function (event, data) {
			var id = data.rslt.obj.data('id');
			var oldId = $('#catalog-filter-id').val();
			
			var title = $('a:first', data.rslt.obj).text();
			$('#catalog-filter-link').text(title);
			
			if(id != oldId) {
				$('#catalog-filter-id').val(id).change();
			}
	    })
	})
</script>

