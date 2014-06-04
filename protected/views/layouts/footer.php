<footer class="clearfix">
    <div class="wrap">
        <div class="footer_info">
            <div class="cells">
                <div class="cell">
                    <h1>Popular Trips!</h1>
                    <ul>
                        <li><a href="#">Bangkok-Chiang Mai</a></li>
                        <li><a href="#">Bangkok-Pukhet</a></li>
                        <li><a href="#">Bangkok-Koh Chang</a></li>
                        <li><a href="#">Chiang Mai-Bangkok</a></li>
                    </ul>
                </div>
                <div class="cell">
                    <h1>Join us!</h1>
                    <p>Want to sell your tickets online to the ever expanding online audience in Southeast Asia. Get our free bus management software and get your seats online!</p>
                    <div class="btn">
                        <button type="button" class="join_us">JOIN US!</button>
                    </div>
                </div>
                <div class="cell last">
                    <h1>Get in touch!</h1>
                    <p class="number">+66 (0)8-8282-0173</p>
                    <div class="social clearfix">
                        <a class="fb" href="#"></a>
                        <a class="tw" href="#"></a>
                        <a class="gl" href="#"></a>
                    </div>
                    <div class="links clearfix">
                        <a href="#">About</a>
                        <a href="#">Blog</a>
                        <a href="#">Policy</a>
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                    <p class="copy">© Copyright by Tickets Co. Ltd. All Rights reserved.</p>
                </div>
            </div>
        </div>
        <div class="markets clearfix">
            <div class="item_ico cards1 left">
                <h6>We accept Credit Cards:</h6>
                <ul class="clearfix">
                    <li><a class="card_1" href="#"></a></li>
                    <li><a class="card_2" href="#"></a></li>
                    <li><a class="card_3" href="#"></a></li>
                </ul>
            </div>
            <div class="item_ico cards2 left">
                <h6>Bank transfer:</h6>
                <ul class="clearfix">
                    <li><a class="card_4" href="#"></a></li>
                    <li><a class="card_5" href="#"></a></li>
                    <li><a class="card_6" href="#"></a></li>
                    <li><a class="card_7" href="#"></a></li>
                    <li><a class="card_8" href="#"></a></li>
                    <li><a class="card_9" href="#"></a></li>
                    <li><a class="card_10" href="#"></a></li>
                </ul>
            </div>
            <div class="item_ico mark left">
                <ul class="clearfix">
                    <li><a class="app_store" href="#"></a></li>
                    <li><a class="play_market" href="#"></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="static/js/plugins.js"></script>
<script src="static/js/main.js"></script>
<script src="static/js/wSelect.js"></script>
<script type="text/javascript" src="static/js/jquery.autocomplete.js"></script>
<script>
    $(document).ready(function() {
        $('.menu_cont a').click(function() {
            var _num = $(this).data('num');
            $('.menu_cont a').removeClass('active');
            $(this).addClass('active');

            $('div[id^="tab_"]').hide();
            $('#tab_' + _num).show();
            return false;
        });

        $('.nav_menu .first li').click(function(e) {
            var _target = e.target;
            if (!$(_target).parent().is('a.top_menu_item')) {
                return;
            }
            if ($(this).hasClass('active')) {
                $('.nav_menu .first li').removeClass('active');
            } else {
                $('.nav_menu .first li').removeClass('active');
                $(this).addClass('active');
            }
        });

        $('.transport_type').click(function(e){
            var _target = e.target;
            if (!$(_target).is('.transport_type')) {
                return;
            }
            $(this).parent().toggleClass('active');
        });

        $.fn.wSelect.defaults.changeWidth = false;
        $('select:not(".transport_details")').wSelect();
    });
</script>
<script>
    //                  $(document).ready(function() {
    //                        $('.tab_menu a').click(function() {
    //                              var _num = $(this).data('num');
    //                              $('.tab_menu a').removeClass('active');
    //                              $(this).addClass('active');
    //
    //                              $('[id^="tab_"]').hide();
    //                              $('#tab_' + _num).show();
    //                              return false;
    //                        });
    //
    //                        $.fn.wSelect.defaults.changeWidth = false;
    //                        $('select:not(".transport_details")').wSelect();
    //                  });
</script>
<script>
    $(document).ready(function() {
        $("#tab_1_from, #tab_1_to").autocomplete({
            lookup: [
                'Da Nang, Viet Nam',
                'Dalat, Viet Nam',
                'Daman, India',
                'Dambula, Sri Lanka',
                'Daparizo, India',
                'Dapaputa, Viet Nam'
            ],
            delimiter: /(,)\s*/,
            minChars: 2
        });
    });
</script>
