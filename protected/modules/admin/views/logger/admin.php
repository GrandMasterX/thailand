<?php
    $this->breadcrumbs=array(
        'Последняя активность в системе'=>array('admin'),
        'Список',
    );
?>

<h1>Последняя активность в системе</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'admin-grid',
	'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header'=>'#',
			'name'=>'id',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
		array(
			'name'=>'create_time',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return Yii::app()->dateFormatter->format("dd MMMM yyyy HH:mm", $data->create_time);
			},
		),
		array(
			'name'=>'user_id',
			'type'=>'raw',
			'value'=>function($data, $roe) {
				return $data->message;
			},
			'filter' => CHtml::listData(Yii::app()->db->createCommand()
				->select('id, login')
				->from('user')
				->where('role=:admin OR role=:manager', array(
                    ':admin' => User::ROLE_ADMIN,
                    ':manager' => User::ROLE_MANAGER,
				))
				->queryAll(), 'id', 'login')
		),
	),
)); ?>
