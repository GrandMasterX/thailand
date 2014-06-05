<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <link rel="stylesheet" type="text/css" href="/themes/admin/css/styles.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/themes/admin/css/main_old.css">
    <link rel="stylesheet" type="text/css" href="/themes/admin/css/main.css">
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/yii.css">

    <script type="text/javascript" src="/static/js/jquery.js"></script>
    <script type="text/javascript" src="/static/js/jquery.yiiactiveform.js"></script>
    <script type="text/javascript" src="/static/js/jquery.ba-bbq.min.js"></script>
    <script type="text/javascript" src="/static/js/editMe.min.js"></script>
    <style>.cke{visibility:hidden;}</style>
    <script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/themes/admin/js/jquery.transliterate.js"></script>
    <script type="text/javascript" src="/static/js/ru.js"></script>
    <script type="text/javascript" src="/static/js/config.js"></script>
    <script type="text/javascript" src="/themes/admin/js/scripts.js"></script>

    <script type="text/javascript" src="/themes/admin/js/styles.js"></script>
    <style id="cke_ui_color" type="text/css"></style>
</head>

<body>
<input type="hidden" id="formlang" value="ru">
    <?php $this->widget('widgets.HeaderAdminWidget'); ?>

<div class="container-fluid">
    <div class="row-fluid">
        <?php $this->widget('widgets.LeftBlockAdminWidget'); ?>
        <div class="span9" style="margin-left: 300px;">
            <? echo $content;?>
        </div>
    </div>
</div>
</body>


</html>