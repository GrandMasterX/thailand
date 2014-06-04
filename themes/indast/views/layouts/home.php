<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo Yii::app()->theme->baseUrl ?>/img/favicon.png">
        <link rel="SHORTCUT ICON" href="<?php echo Yii::app()->theme->baseUrl ?>/img/favicon.png">

        <title><?php echo $this->pageTitle ?></title>

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/style.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/slider.css" >
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/selectbox.css" >
		
		
		<?php
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/script.js', CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/ForHomeScript.js', CClientScript::POS_END);
		?>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.selectbox.min.js"></script>
        
    </head>
    <body>
    <div id="fullpage">
	<div class="section" id="section0">
		<div class="main">
				<div id="wrap">
					<?php $this->renderPartial('//layouts/header') ?>
					<div id="content">
						<?php $this->widget('widgets.CartWidget'); ?>
						<?php $this->widget('widgets.SliderHomeWidget'); ?>		
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
				<div id="ProdBloc">
					<?php $this->widget('widgets.ProductBlockWidget'); ?>	
				</div>
				
				<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.knob.js"></script>	
				<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.jcarousel.min.js"></script>
				<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/bond.js"></script>
				<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/slider.js"></script>
				
				<script>
					
						
						$('.bond-hover').bond();
						
						$('#ProdBloc').on('click', 'a.buy', function() {
							var link = $(this);
							$.getJSON(link.attr('href'), function(json) {
								if(json.success) {
									$('#cart-list ul').html(json.html);
									$('#scrollbar-cart').data('plugin_tinyscrollbar').update('bottom');
									$('#cartWidget').animate({right: "0px"}, 700).delay(2000).animate({right: "-290px"}, 400);
								}
							})
							
							return false;
						}) 
			
				</script>						
				
				<?php $this->renderPartial('//layouts/modal') ?>
			
</div></div>
	<div class="section " id="section1">
    
<div id="seoBlock">
    <div class="text2">
    <p>Диаграммы в основном состоят из геометрических объектов точек, линийфигур различной формы и цвета и вспомогательных элементов осей координат условных обозначений, заголовков и т. п.). Также диаграммы делятся на плоскостные (двумерные) и пространственные (трёхмерные или объёмные). Сравнение и сопоставление геометрических объектов на диаграммах может происходить по различным измерениям: по площади фигуры или её высоте по местонахождению точек, по их густоте, по интенсивности цвета и т. д. Кроме того, данные могут быть представлены в прямоугольной или полярной системе Диаграммы-линии или графики — это тип диаграмм, на которых полученные данные изображаются в виде точек соединённых прямыми линиямиТочки могут быть как видимыми, так и невидимыми (ломаные линии). Также могут изображаться точки без линий (точечные диаграммы). Для построения диаграмм-линий применяют прямоугольную систему координат. Обычно по оси абсцисс откладывается время (годы, месяцы и т. д.), а по оси ординат — размеры изображаемых явлений или процессов. На осях наносят масштабы.<br /><br />
Диаграммы-линии целесообразно применять тогда, когда число размеров (уровней) в ряду велико. Кроме того, такие диаграммы удобно использовать, если требуется изобразить характер или общую тенденцию развития явления или явлений. Линии удобны и при изображении нескольких динамических рядов для их сравнения, когда требуется сравнение темпов роста. На одной диаграмме такого типа не рекомендуется помещать более трёх-четырёх кривых. Их большое количество может усложнить чертёж, и линейная диаграмма может потерять наглядность.</p>
    </div>
</div></div>
		</div>
    </body>
</html>
