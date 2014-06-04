<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.tinyscrollbar.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery.reveal.js"></script>

<div id="login-modal" class="reveal-modal modal">
	<a class="close-reveal-modal">&#215;</a>
	<h1>Авторизация</h1>
	<?php $this->renderPartial('modules.user.views.auth.forms._login', array(
		'model'=>new LoginForm
	)) ?>
</div>

<div id="register-modal" class="reveal-modal modal">
	<a class="close-reveal-modal">&#215;</a>
	<h1>Регистрация</h1>
	<?php $this->renderPartial('modules.user.views.auth.forms._register', array(
		'model'=>new User(User::SCENARIO_REGISTER)
	)) ?>
</div>

<div id="order-modal" class="reveal-modal modal">
	<a class="close-reveal-modal">&#215;</a>
    <h1>Оформление заказа</h1>
	<?php $this->renderPartial('modules.order.views.default._form', array(
		'model'=>Order::modelWithUser()
	)) ?>
</div>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div id="success-modal" class="reveal-modal modal">
		<a class="close-reveal-modal">&#215;</a>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
	<script>
		$(function() {
			$('#success-modal').reveal();
		})
	</script>
<?php endif; ?>


<div id="info-modal" class="reveal-modal modal">
	<a class="close-reveal-modal">&#215;</a>
	<div class="info-content"></div>	
</div>


<script>
	$.message = {
		show: function(text) {
			$('#info-modal .info-content').text(text);
			$('#info-modal').reveal();
		},
		hide: function() {
			$('#info-modal').trigger('reveal:close');
		}
	}
	
	$(function() {
		$(document).on('click', '#order-link', function() {
			$.getJSON('/order/default/getData', function(json) {
				
				$('#order-tab').html(json.html);
				$('#scrollbar-order').data('plugin_tinyscrollbar').update();
				$('#order-modal').reveal();	
			})
			return false;
		})
		
		$('#scrollbar-description, #scrollbar-review').tinyscrollbar({ thumbSize: 40 });
		$('#scrollbar-cart').tinyscrollbar({ thumbSize: 56 });
		$('#scrollbar-order').tinyscrollbar({ thumbSize: 27, wheelSpeed:5 });
	})
</script>		