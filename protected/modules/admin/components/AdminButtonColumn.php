<?php

Yii::import('bootstrap.widgets.TbButtonColumn');

class AdminButtonColumn extends TbButtonColumn
{
    public function init()
    {
	    Yii::app()->clientScript->registerScript("widgets-{$this->id}", "
			$('#delete-button').on('click', function() {
				$('#{$this->grid->id}').yiiGridView('update', {
					type: 'POST',
					url: $(this).attr('href'),
					success: function(data) {
						$('#delete-modal').modal('hide');
						$('#{$this->grid->id}').yiiGridView('update');
					},
				});
				return false;
			})
			
			$('#size').on('change', function() {
				var size = $(this).val();
				window.location.search = 'size=' + size;
				return false;
			})
	    ");
		
		$this->deleteConfirmation = false;
		
		$this->header = 'Выводить по';

        $this->buttons = array(
            'view'=>array(
                'icon' => 'search white',
                'options' => array('class'=>'btn btn-info btn-small')
            ),
            'update'=>array(
                'icon' => 'pencil white',
                'options' => array('class'=>'btn btn-primary btn-small')
            ),
            'delete'=>array(
                'icon' => 'remove white',
                'options' => array(
                    'class'=>'btn btn-danger btn-small',
                    'data-id' => 12
                ),
				'click' => "js:function() {
					var link = $(this);
					$('#delete-button').attr('href', link.attr('href'));
					$('#delete-modal').modal('show');
					return false;
				}"
            ),
        );

        $this->htmlOptions = array(
            'style'=>'width: 120px'
        );

        parent::init();
    }
	
	protected function renderFilterCellContent()
	{
		echo CHtml::dropDownList('size', Yii::app()->request->getParam('size', 10), array(10=>10, 50=>50, 100=>100), array('class'=>'span2', 'id' => 'size'));
	}
}