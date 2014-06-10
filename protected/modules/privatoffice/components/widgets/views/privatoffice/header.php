<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>'Личный кабинет',
    'fluid' => true,
    'brandUrl'=>'/privatoffice',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Настройки', 'icon'=>'cog white', 'items'=>array(
                    array('label'=>'Почта', 'url'=>'#', 'items'=>array(
                        array('label'=>'Добавить шаблон', 'icon' => 'plus-sign', 'url'=>'#'),
                    )),
                )),
            ),
        ),
    ),
)); ?>