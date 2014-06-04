<?php

Yii::import('zii.widgets.CBreadcrumbs');

class SiteBreadcrumbs extends CBreadcrumbs
{
    public $separator = '';
    public $htmlOptions = array(
        'class' => 'brench'
    );
}