<?php
$this->breadcrumbs=array(
    'Почта (шаблоны)'=>array('admin'),
    'Список',
);
?>

    <h1>Мои шаблоны</h1>

<?php $this->widget('modules.privatoffice.components.Toolbar', array(
    'model'=>$model
)) ?>

    <div class="create-form" style="display: none">
        <?php $this->renderPartial('_form',array(
            'model'=>$model,
        )); ?>
    </div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'templates-grid',
    'type'=>'striped',
    'filter'=>$model,
    'dataProvider'=>$model->search(),
    'columns'=>array(
        array(
            'class'=>'modules.privatoffice.components.AdminCheckBoxColumn',
        ),
        array(
            'header'=>'#',
            'name'=>'id',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
        array(
            'name'=>'name',
            'type'=>'raw',
            'value'=>function($data, $roe) {
                    return CHtml::link($data->name, array('/privatoffice/templates/update', 'id'=>$data->id));
                }
        ),
        'id',
        array(
            'class'=>'modules.privatoffice.components.AdminButtonColumn',
        ),
    ),
)); ?>