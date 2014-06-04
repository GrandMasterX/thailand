<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.transliterate.js') ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/scripts.js') ?>
</head>

<body>

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
                array('label'=>'Магазин', 'icon'=>'shopping-cart white', 'items'=>array( 
                    array('label'=>'Категории', 'url'=>'/admin/catalog/admin', 'items'=>array(
						array('label'=>'Добавить категорию', 'icon' => 'plus-sign', 'url'=>'/admin/catalog/create'),
					)), 
                    array('label'=>'Товары', 'url'=>'/admin/product/admin', 'items'=>array(
						array('label'=>'Добавить товар', 'icon' => 'plus-sign', 'url'=>'/admin/product/create'),
					)),
                    array('label'=>'Заказы', 'url'=>'/admin/order/admin', 'items'=>array(
						array('label'=>'Добавить заказ', 'icon' => 'plus-sign', 'url'=>'/admin/order/create'),
					)),
                )),
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
        '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
			'encodeLabel'=>false,
            'items'=>array(
				array('label'=>'<span class="badge badge-warning">' . ProductReview::getNewCount() . '</span>', 'url'=>'/admin/moderation/admin', 'linkOptions' => array('rel'=>'tooltip', 'title'=>'Новые отзывы', 'data-placement'=>'bottom')),
                array('label'=>'Сайт', 'url'=>Yii::app()->homeUrl, 'linkOptions'=>array('target'=>'_blank')),
                array('label'=>Yii::app()->user->name, 'icon'=>'user white', 'items'=>array(
					array(
						'label'=>'Профиль',
						'url'=>Yii::app()->user->checkAccess(User::ROLE_ADMIN)
							? array('/admin/administrator/update', 'id' => Yii::app()->user->id)
							: array('/admin/manager/update', 'id' => Yii::app()->user->id),
						),
                    array('label'=>'Выход', 'url'=>'/admin/auth/logout'),
                )),
            ),
        ),
    ),
)); ?>

<div class="container-fluid">
    <div class="row-fluid ">
        <div class="span3" id="left">
		<?php $controller = Yii::app()->controller->id; ?>
		<?php $this->widget('zii.widgets.CMenu', array(
			'encodeLabel'=>false,
            'items'=>array(
                array(
					'label'=>'
						<i class="icon-shopping-cart icon-white"></i>
						<span class="link-title">Магазин</span> 
						<span class="fa arrow"></span> 
					',
					'url' => 'javascript:;',
					'active' => in_array($controller, array('catalog', 'manufacturer', 'product', 'attributeGroup', 'attribute')),
					'items'=>array( 
						array('label'=>'Категории', 'url'=>array('/admin/catalog/admin')), 
						array('label'=>'Товары', 'url'=>array('/admin/product/admin')),
						array('label'=>'Производители', 'url'=>array('/admin/manufacturer/admin')),
						array('label'=>'Группы атрибутов', 'url'=>array('/admin/attributeGroup/admin')),
						array('label'=>'Атрибуты товаров', 'url'=>array('/admin/attribute/admin')),
					)
				),
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
						<i class="icon-barcode icon-white"></i>
						<span class="link-title">Прайс</span> 
						<span class="fa arrow"></span> 
					',
					'url' => 'javascript:;',
					'active' => in_array($controller, array('price')),
					'items'=>array( 
						array('label'=>'<i class="icon-arrow-up icon-white"></i> Импорт', 'url'=>array('/admin/price/import')),
						array('label'=>'<i class="icon-arrow-down icon-white"></i> Экспорт', 'url'=>array('/admin/price/export')),
					)
				),
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

	<div class="span9" id="content">
	
	<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true,
        'fade'=>true,
    )); ?>	
	
	<?php if(isset($this->breadcrumbs)):?>
        <div class="row-fluid">
          	<div class="navbar">
                <div class="navbar-inner" style="height: 40px;">
					<div style="float: left; margin: 8px 10px 0 0;"><i class="icon-chevron-left hide-sidebar"><a href="#" title="Скрыть меню" rel="tooltip">&nbsp;</a></i><i class="icon-chevron-right show-sidebar" style="display:none;"><a href="#" title="Показать меню" rel="tooltip">&nbsp;</a></i></div>
					<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
						'homeLink' => CHtml::link('Главная', '/admin'), 
						'links'=>$this->breadcrumbs,
					)); ?>
                </div>
            </div>
        </div>
	<?php endif ?>
	

	<?php echo $content; ?>

	<div class="clear"></div>
	
	</div>
</div>	
</div>		

	<div id="footer">
	</div><!-- footer -->



</body>
</html>
