<li class="">
    <a class="top_menu_item" href="javascript:;">
        <span>Login</span>
        <span class="ico"></span>
    </a>
    <!-- LOGIN -->
    <div class="popup_login">
        <div class="top"></div>
        <div class="block_login clearfix">
            <div class="social left">
                <h5>Sign In Using</h5>
                <ul class="clearfix">
                    <?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>
                </ul>
                <h5>New user?</h5>
                <a href="#">Sign up today!<span> It is free!</span></a>
            </div>
            <div class="form_block right">
                <div class="form">
                    <h5>Login with your email:</h5>
                    <form>
                        <div class="item">
                            <label>Email:</label>
                            <input class="enter_email" type="text" name="enter_email" placeholder="" value="">
                        </div>
                        <div class="item">
                            <label>Password:</label>
                            <input class="enter_pass" type="text" name="enter_pass" placeholder="" value="">
                        </div>

                        <div class="btn">
                            <input id="enter_sign" class="enter_sign" type="submit" value="LOGIN">
                            <a class="forgot" href="#">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN -->
</li>