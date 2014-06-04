<tr id="list-view-<?php echo $model->id ?>">
	<td>
		<?php echo $model->title ?> 
		<?php echo CHtml::hiddenField('list[]', $model->id) ?>
	</td>
	<td style="width: 80px">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'link',
			'type'=>'primary',
			'size'=>'small', 
			'icon' => 'pencil white',
			'htmlOptions'=>array(
				'id'=>"update-{$model->id}",
				'class'=>'update',
				'data-content'=>$this->renderPartial('modules.admin.views.attributeList._form', array('model'=>$model), true),
				'rel'=>'popover',
			),
		)); ?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'link',
			'type'=>'danger',
			'size'=>'small', 
			'icon'=>'remove white',
			'url'=>array('/admin/attributeList/delete', 'id'=>$model->id),
			'htmlOptions' => array(
				'class'=>'delete',
				'data-id'=>"#list-view-{$model->id}",
				'rel'=>'tooltip',
				'title'=>'Удалить'
			)
		)); ?>
	</td>
</tr>
