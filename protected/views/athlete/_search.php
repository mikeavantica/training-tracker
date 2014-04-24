<?php
/* @var $this AthleteController */
/* @var $model Athlete */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php

    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get'
    ));
    ?>

    <?php //echo $form->textFieldControlGroup($model,'id',array('span'=>3)); ?>

    <?php echo $form->textFieldControlGroup($model, 'first_name', array('span' => 3, 'maxlength' => 45)); ?>

    <?php echo $form->textFieldControlGroup($model, 'last_name', array('span' => 3, 'maxlength' => 45)); ?>
    <?php echo $form->label($model, 'email'); ?>
    <?php echo $form->emailField($model, 'email', array('span' => 3, 'maxlength' => 150)); ?>

    <?php echo $form->textFieldControlGroup($model, 'height', array('span' => 3, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldControlGroup($model, 'weight', array('span' => 3, 'maxlength' => 10)); ?>

    <?php echo $form->label($model, 'sex_typeid'); ?>
    <?php echo $form->dropDownList($model, 'sex_typeid', array('1' => 'Male', '2' => 'Female')); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search', array('color' => BsHtml::BUTTON_COLOR_PRIMARY,)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- search-form -->