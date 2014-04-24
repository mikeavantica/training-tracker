<?php
    /* @var $this UserController */
    /* @var $model User */
    /* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

        <?php echo $form->textFieldControlGroup($model,'id'); ?>
        <?php echo $form->textFieldControlGroup($model,'username',array('maxlength'=>128)); ?>
            <?php echo $form->textFieldControlGroup($model,'email',array('maxlength'=>128)); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
