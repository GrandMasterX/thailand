<li class="bond-slide" style="display: block; float: left;">
    <a href="<?php echo Yii::app()->createUrl('mobile/default/mview', array('alias'=>$data->alias)) ?>">
        <div class="article">Код: <span><? echo $data->id;?></span></div>
        <?
            if($data->preview) {
                echo CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(99, 116, $data->preview, array('method' => 'adaptiveResize')), null, array('height'=>99));
            }
        ?>
        <h3><?php echo $data->title ?></h3>
        <span class="price"><?php echo $data->price; ?> грн.</span>
    </a>
    <div class="clear"></div>
</li>