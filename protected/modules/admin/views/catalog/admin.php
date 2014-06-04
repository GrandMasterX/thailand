<?php
    Yii::app()->clientScript->registerScript('create', "
        $('.create-button, .cancel-button').on('click', function(){
            $('.create-form').slideToggle('slow', function() {
				$(this).is(':visible') ? $('.create-button').html('<i class=\"icon-arrow-up icon-white\"></i> Скрыть') : $('.create-button').html('<i class=\"icon-plus-sign icon-white\"></i> Добавить');
			});
            return false;
        });
    ", CClientScript::POS_READY);
	
    Yii::app()->clientScript->registerScript('catalog-tree', "
	
		$.fn.popover.defaults.html = true;
	
		$('#catalog-tree').on('move_node.jstree', function (event, data) {
			data.rslt.o.each(function (i) {
				$.ajax({
					async : false,
					type: 'GET',
					url: '/admin/catalog/moveNode',
					data : {
						'id' : $(this).data('id'),
						'ref' : data.rslt.cr === -1 ? 1 : data.rslt.np.data('id'),
						'position' : data.rslt.cp + i
					}
				});
			});
	    }).on('loaded.jstree', function (event, data) {
            $(this).jstree('open_all');
        })  
		
		$('body').on('click', '.popover a.delete', function () {
			var link = $(this);
			$('#delete-button').attr('href', link.attr('href'));
			$('#delete-modal').modal('show');
			return false;
		});		

		$('body').on('click', '.popover a.view, .popover a.update', function () {
			location.href = $(this).attr('href');
		});		
    ");

    $this->breadcrumbs=array(
        'Каталог'=>array('admin'),
        'Дерево',
    );
?>

<h1>Каталог товаров</h1>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Добавить',
	'type'=>'primary',
	'icon' => 'plus-sign white',
	'htmlOptions' =>array(
		'class' => 'create-button'
	)
)); ?>

<div class="create-form" style="display: none">
<?php $this->renderPartial('_form',array(
	'model'=>new Catalog,
)); ?>
</div>

    <?php $this->widget('CatalogTree', array(
        'id'=>'catalog-tree',
        'data'=>Catalog::asArrayByProductCount(),
        'options'=>array(
            'core'=>array(
                'initially_open'=>'catalog-tree-1',
            ),
            'plugins'=>array('themes','html_data','ui', 'dnd'),
            'crrm' => array(
					'move' => array('check_move' => 'js: function(m){
						if (this._get_parent(m.r) == -1) return false;
						return true;
					}')
				),
        ),
		'htmlOptions' =>array(
			'style' => 'margin-top: 20px;'
		)
    ));
    ?>
	

<?php $this->beginWidget('bootstrap.widgets.TbModal', array(
	'id'=>'delete-modal',
)); ?>
 
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h4>Подтвердите действие</h4>
	</div>
	 
	<div class="modal-body">
		<p>Вы действительно хотите удалить данный элемент ?</p>
	</div>
	 
	<div class="modal-footer">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'primary',
			'url' => '#',
			'label'=>'Удалить',
			'htmlOptions'=>array('id' => 'delete-button'),
		)); ?>
			
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'type'=>'danger',
			'url' => '#',
			'label'=>'Отмена',
			'htmlOptions'=>array('data-dismiss'=>'modal'),
		)); ?>
	</div>
	 
<?php $this->endWidget(); ?>

