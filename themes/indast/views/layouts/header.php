<div id="header">
	<div class="topHeaderBlock">
		<div class="topMenu">
			<?php $this->widget('zii.widgets.CMenu', array(
				'items'=>array(
					array('label'=>'О компании', 'url'=>array('/o-kompanii'), 'active' => Yii::app()->request->url == '/o-kompanii'),
					array('label'=>'Дилерам', 'url'=>'/dileram', 'active' => Yii::app()->request->url == '/dileram'),
					array('label'=>'Контакты', 'url'=>'/site/contacts'),
					array('label'=>'Оплата', 'url'=>'/oplata', 'active' => Yii::app()->request->url == '/oplata'),
					array('label'=>'Гарантия и сервис', 'url'=>'/garantiya-i-servis', 'active' => Yii::app()->request->url == '/garantiya-i-servis'),
					array('label'=>'Новости', 'url'=>array('/news/default/index')),
				),
			)) ?>
		</div>

		<div class="phoneNumbers">
			<?php
				$phoneNumbers = Yii::app()->config->get('phoneNumbers');
				$phoneNumbers = explode(', ', $phoneNumbers);
			?>
			<ul>
				<?php foreach($phoneNumbers as $phone) : ?>
					<li><?php echo trim($phone) ?></li>
				<?php endforeach ?>	
			</ul>
		</div>
		
		<div id="callBack">
			<a href="#">Перезвоните мне</a>
			<div class="callBackBlock">
				<?php $this->renderPartial('application.views.site._callback', array(
					'model'=>new CallbackForm
				)) ?>
			</div>
		</div>
		
		<div class="phoneNumbers">
			<ul>
            <?php if(Yii::app()->user->isGuest) : ?>
                <li><a data-reveal-id="login-modal" class="login" href="<?php echo Yii::app()->createUrl('/user/auth/login') ?>">Войти</a></li>
				<li><a data-reveal-id="register-modal" class="register" href="<?php echo Yii::app()->createUrl('/user/auth/register') ?>">Зарегистрироваться</a>
            <?php else : ?>
                <li><a class="cabinet" href="<?php echo Yii::app()->user->cabinetUrl ?>">Личный кабинет</a></li>
				<li><a class="logout" href="<?php echo Yii::app()->createUrl('/user/auth/logout') ?>">Выйти</a>
            <?php endif ?>
			</ul>
		</div>
	</div>
	<div id="butHeaderBlock">
	 
		<a href="<?php echo Yii::app()->homeUrl ?>" id="logo">
			<img src="<?php echo Yii::app()->theme->baseUrl ?>/img/logo.png" width="159" height="25">
		</a>
	 
		<div class="baseMenuHeader">
			<ul class="nav">
				<li>
					<a>Каталог</a>
					<div>
						<?php $this->widget('widgets.CatalogMenuWidget') ?>
					</div>
				</li>
				<li class="<?php echo Yii::app()->request->url == '/montazh-kondicionerov' ? 'active' : '' ?>" >
					<a href="<?php echo Yii::app()->createUrl('/montazh-kondicionerov') ?>">Монтаж кондиционеров</a>
				</li>
				<li class="<?php echo Yii::app()->request->url == '/remont-domofonov' ? 'active' : '' ?>" >
					<a href="<?php echo Yii::app()->createUrl('/remont-domofonov') ?>">Ремонт домофонов</a>
				</li>
				<li class="<?php echo Yii::app()->request->url == '/ustanovka-videodomofonov' ? 'active' : '' ?>" >
					<a href="<?php echo Yii::app()->createUrl('/ustanovka-videodomofonov') ?>">Установка видеодомофонов</a>
				</li>
				<li class="<?php echo Yii::app()->request->url == '/action' ? 'active' : '' ?>" >
					<a href="<?php echo Yii::app()->createUrl('/action') ?>">Акция</a>
				</li>
			</ul>
			<?php $this->widget('widgets.SearchWidget') ?>
		</div>
	</div>
</div>