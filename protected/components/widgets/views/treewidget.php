<div class="span8">
    <div class="row">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Добавить',
			'type'=>'primary',
			'icon' => 'plus-sign white',
			'htmlOptions' =>array(
				'class' => 'create-button pull-left'
			)
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
			'icon'=>'white refresh',
			'label'=>'Обновить',
			'htmlOptions'=>array(
				'id'=>'reload',
				'class'=>'pull-left',
				'style'=>'margin-left: 20px;'
			)
		)); ?>
    </div>
    <div class="row">
        <div class="well" style="margin-top: 20px" class="row" id="<?php echo $this->jstree_container_ID;?>"></div>
    </div>
</div>