<div class="span3" id="left">
    <?php $controller = Yii::app()->controller->id; ?>
    <?php $this->widget('zii.widgets.CMenu', array(
        'encodeLabel'=>false,
        'items'=>array(
            array(
                'label'=>'
						<i class="icon-remove icon-white"></i>
						<span class="link-title">Фильтры</span>
						<span class="fa arrow"></span>
					',
                'url' => 'javascript:;',
                'active' => in_array($controller, array('filter', 'filterAttribute')),
                'items'=>array(
                    array('label'=>'Фильтры', 'url'=>array('/admin/filter/admin')),
                    array('label'=>'Атрибуты фильтров', 'url'=>array('/admin/filterAttribute/admin')),
                )
            ),
            array(
                'label'=>'
						<i class="icon-gift icon-white"></i>
						<span class="link-title">Заказы</span>
						<span class="fa arrow"></span>
					',
                'url' => 'javascript:;',
                'active' => in_array($controller, array('order', 'orderStatus', 'orderPayment', 'orderDelivery')),
                'items'=>array(
                    array('label'=>'Заказы', 'url'=>array('/admin/order/admin')),
                    array('label'=>'Статусы', 'url'=>array('/admin/orderStatus/admin')),
                    array('label'=>'Методы оплаты', 'url'=>array('/admin/orderPayment/admin')),
                    array('label'=>'Типы доставки', 'url'=>array('/admin/orderDelivery/admin')),
                )
            ),
            array('label'=>'<i class="icon-th icon-white"></i> Калькулятор', 'url'=>array('/admin/calculator/admin')),
            array(
                'label'=>'
						<i class="icon-user icon-white"></i>
						<span class="link-title">Пользователи</span>
						<span class="fa arrow"></span>
					',
                'url' => 'javascript:;',
                'active' => in_array($controller, array('administrator', 'manager', 'user', 'group')),
                'items'=>array(
                    array('label'=>'Администраторы', 'url'=>'/admin/administrator/admin'),
                    array('label'=>'Менеджеры', 'url'=>'/admin/manager/admin'),
                    array('label'=>'Клиенты', 'url'=>'/admin/user/admin'),
                    array('label'=>'', 'url'=>'javascript:;', 'itemOptions' => array('class' => 'nav-divider')),
                    array('label'=>'Группы', 'url'=>'/admin/group/admin'),
                )
            ),
            array(
                'label'=>'
						<i class="icon-align-justify icon-white"></i>
						<span class="link-title">Контент</span>
						<span class="fa arrow"></span>
					',
                'url' => 'javascript:;',
                'active' => in_array($controller, array('news', 'page')),
                'items'=>array(
                    array('label'=>'Новости', 'url'=>'/admin/news/admin'),
                    array('label'=>'Страницы', 'url'=>'/admin/page/admin'),
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
            array(
                'label'=>'
						<i class="icon-cog icon-white"></i>
						<span class="link-title">Настройки</span>
						<span class="fa arrow"></span>
					',
                'url' => 'javascript:;',
                'active' => in_array($controller, array('mail', 'config')),
                'items'=>array(
                    array('label'=>'<i class="icon-envelope icon-white"></i> Почта (шаблоны)', 'url'=>'/admin/mail/admin'),
                    array('label'=>'<i class="icon-exclamation-sign icon-white"></i> Глобальные переменные', 'url'=>'/admin/config/admin'),
                    array('label'=>'Кэш', 'url'=>'/admin/cache/admin'),
                    array('label'=>'Стоп слова', 'url'=>'/admin/badword/admin'),
                )
            ),
        ),
        'htmlOptions' =>array(
            'id' => 'menu'
        )
    ));  ?>
</div>