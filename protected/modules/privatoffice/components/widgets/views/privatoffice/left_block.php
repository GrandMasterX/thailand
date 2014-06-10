<div class="span3" id="left">
    <?php $controller = Yii::app()->controller->id; ?>
    <?php $this->widget('zii.widgets.CMenu', array(
        'encodeLabel'=>false,
        'items'=>array(
            array(
                'label'=>'
						<i class="icon-user icon-white"></i>
						<span class="link-title">Мои шаблоны</span>
						<span class="fa arrow"></span>
					',
                'url' => 'javascript:;',
                'active' => in_array($controller, array('templates', 'manager', 'user', 'group')),
                'items'=>array(
                    array('label'=>'Все шаблоны', 'url'=>'/privatoffice/templates/all'),
                )
            ),
            array(
                'label'=>'
						<i class="icon-user icon-white"></i>
						<span class="link-title">Мои группы</span>
						<span class="fa arrow"></span>
					',
                'url' => 'javascript:;',
                'active' => in_array($controller, array('groups', 'manager', 'user', 'group')),
                'items'=>array(
                    array('label'=>'Все группы', 'url'=>'/privatoffice/groups/all'),
                )
            ),
            array(
                'label'=>'
						<i class="icon-signal icon-white"></i>
						<span class="link-title">Статистика</span>
						<span class="fa arrow"></span>
					',
                'url' => 'javascript:;',
                'active' => in_array($controller, array('logger')),
                'items'=>array(
                    array('label'=>'Активность в системе', 'url'=>'/admin/logger/admin'),
                    array('label'=>'Продажи', 'url'=>'#'),
                )
            ),
        ),
        'htmlOptions' =>array(
            'id' => 'menu'
        )
    ));  ?>
</div>