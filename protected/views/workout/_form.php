<?php
/* @var $this WorkoutController */
/* @var $model Workout */
/* @var $form TbActiveForm */
?>

<div class="form">


    <?php $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'workout-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dateFieldControlGroup($model, 'date', array('span' => 3)); ?>

    <?php echo $form->textFieldControlGroup($model, 'name', array('span' => 3, 'maxlength' => 45)); ?>

    <?php echo $form->textFieldControlGroup($model, 'description', array('span' => 3, 'maxlength' => 150)); ?>
    <?php echo $form->label($model, 'workout_typeid'); ?>
    <?php echo $form->dropDownList($model, 'workout_typeid', CHtml::listData(WorkoutType::model()->findAll(), 'id', 'name')); //echo $form->textFieldControlGroup($model,'workout_typeid',array('span'=>5)); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'color' => BsHtml::BUTTON_COLOR_PRIMARY,
            'size' => BsHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->