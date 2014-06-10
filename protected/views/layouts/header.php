<header>
    <?php if(Yii::app()->user->hasFlash('registration_ok')): ?>

        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('registration_ok'); ?>
        </div>

    <?php endif; ?>
    <div class="menu clearfix">
        <div class="nav clearfix">
            <div class="contact left">contact us: <span>+66 (0)8-8282-0173</span></div>
            <div class="nav_menu right">
                <ul class="first clearfix">
                    <li>
                        <a class="thb top_menu_item" href="javascript:;">
                            <span>THB ฿</span>
                            <span class="ico"></span>
                        </a>
                    </li>
                    <li class="en">
                        <a class="en top_menu_item" href="javascript:;">
                            <span>EN</span>
                            <span class="ico"></span>
                        </a>
                    </li>

                    <? if(Yii::app()->user->isGuest != 0){?>
                        <li>
                            <a class="top_menu_item" href="javascript:;">
                                <span>Register</span>
                                <span class="ico"></span>
                            </a>
                            <!-- REGISTRATION -->
                            <div class="popup_reg">
                                <div class="top"></div>
                                <div class="block_reg">
                                    <div class="title back">
                                        <a href="#" class="back"><span>←</span>&nbsp;&nbsp;Back</a>
                                    </div>
                                    <div class="form">

                                        <h5>Register</h5>
                                        <?php $this->widget('widgets.RegistrationWidget'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- END REGISTRATION -->
                        </li>

                        <? $this->renderPartial('/layouts/social');?>
                    <?} else {
                        $this->renderPartial('/layouts/logged_social');
                    }?>
                </ul>
            </div>
        </div>
        <div class="logo">
            <div class="wrap clearfix">
                <a class="left" href="#"></a>
                <div class="text right">
                    <p>We search and compare prices from 546 bus<br> companies, 182 airlines, 129 trains...</p>
                </div>
            </div>
        </div>
    </div>
</header>