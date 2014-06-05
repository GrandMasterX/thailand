<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>'Панель администратора',
    'fluid' => true,
    'brandUrl'=>'/admin',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Пользователи', 'icon'=>'user white', 'items'=>array(
                    array('label'=>'Менеджеры', 'url'=>'/admin/manager/admin', 'items'=>array(
                        array('label'=>'Добавить менеджера', 'icon' => 'plus-sign', 'url'=>'/admin/manager/create'),
                    )),
                    array('label'=>'Клиенты', 'url'=>'/admin/user/admin', 'items'=>array(
                        array('label'=>'Добавить клиента', 'icon' => 'plus-sign', 'url'=>'/admin/user/create'),
                    )),
                )),
                array('label'=>'Контент', 'icon'=>'align-justify white', 'items'=>array(
                    array('label'=>'Новости', 'url'=>'/admin/news/admin', 'items'=>array(
                        array('label'=>'Добавить новость', 'icon' => 'plus-sign', 'url'=>'/admin/news/create'),
                    )),
                )),
                array('label'=>'Настройки', 'icon'=>'cog white', 'items'=>array(
                    array('label'=>'Почта', 'url'=>'#', 'items'=>array(
                        array('label'=>'Добавить шаблон', 'icon' => 'plus-sign', 'url'=>'#'),
                    )),
                )),
            ),
        ),
    ),
)); ?>