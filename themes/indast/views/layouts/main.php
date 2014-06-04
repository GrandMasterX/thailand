<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo Yii::app()->theme->baseUrl ?>/img/favicon.png">
        <link rel="SHORTCUT ICON" href="<?php echo Yii::app()->theme->baseUrl ?>/img/favicon.png">

        <title><?php echo $this->pageTitle ?></title>

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/style.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/website.css" media="screen"/>
		
		<?php
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/script.js', CClientScript::POS_END);
		?>
    </head>
    <body class="catalog">
        <div id="wrap">
            <?php $this->renderPartial('//layouts/header') ?>
			<div id="content">
				<div class="titlePage">
					<h1><?php echo $this->title ?></h1>
				</div>

				<?php $this->widget('SiteBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
				)); ?>		
				
				<?php echo $content ?>
			</div>	
        </div>
		<div id="footerBg">
			<div id="footer">
				<div id="footerLeftBlock">
					<span>© 2014. Все права защищены</span>
					<span>Разработано в <a href="http://www.seo-design.kiev.ua/">Seo-Design</a></span>
				</div>
			</div>
		</div>
		<?php $this->renderPartial('//layouts/modal') ?>
    </body>
</html>
