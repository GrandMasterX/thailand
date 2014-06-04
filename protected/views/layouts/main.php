<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>HOME</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="static/css/normalize.min.css">
    <link rel="stylesheet" href="static/css/home_page.css">
    <link rel="stylesheet" href="static/css/header_footer.css">

    <link rel="stylesheet" href="static/css/wSelect.css">
    <link rel="stylesheet" href="static/css/autocomplete.css">
    <link rel="stylesheet" href="static/css/checkbox.css">

    <script src="/static/js/jquery.js"></script>
    <script src="static/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
    <body>
        <?php $this->renderPartial('/layouts/header');?>
        <div class="container">
            <div class="wrap">
                <? echo $content;?>
            </div>
        </div>
        <?php $this->renderPartial('/layouts/footer');?>
    </body>


</html>