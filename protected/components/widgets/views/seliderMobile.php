<div class="wrap" id="sections">
    <nav class="m-main" role="navigation">
        <ul class="m-main-l" id="sections_list">
            <li class="m-main-i">
                <?php foreach($slider as $key=>$val) : ?>
                <div class="m-main-s">
                    <a href="javascript://" class="m-main-i-title" onclick="$('.hideShowBlock<?echo $key;?>').slideToggle('normal');return false;">
                        <span><?php echo $slider[$key]['title']; ?></span>
                    </a>
                </div>
                <div class="m-main-s-vup hideShowBlock<?echo $key;?>" style="display: none;">
                    <ul>
                        <? foreach($slider[$key]['childrens'] as $k=>$v):?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('mobile/default/cview', array('alias'=>$slider[$key]['childrens'][$k]['alias'])) ?>">
                                    <? echo $slider[$key]['childrens'][$k]['title'];?>
                                </a>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </li>
        </ul>
    </nav>
</div>