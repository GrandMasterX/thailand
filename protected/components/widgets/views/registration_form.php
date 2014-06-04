<? $form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'register-form',
        'enableClientValidation'=>true,
        'enableAjaxValidation'=>true,
        'action'=> Yii::app()->urlManager->createUrl('site/register'),
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'validateOnType' => true,
            'afterValidate'=>'js:$.yii.fix.ajaxSubmit.afterValidate'
        ),
    )
);
?>
    <div class="item">
        <label>Enter your email:</label>
        <?php echo $form->textField($model,'email',array('placeholder'=>'name','class'=>'enter_email')); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>
    <div class="item">
        <label>Password:</label>
        <?php echo $form->textField($model,'password',array('placeholder'=>'password','class'=>'enter_pass')); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>
    <div class="btn">
        <?php echo CHtml::submitButton('sign up',array('class'=>'sign','value'=>'sign up','id'=>'sign')); ?>
    </div>
<? $this->endWidget(); ?>
