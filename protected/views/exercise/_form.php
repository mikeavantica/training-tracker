<?php
/* @var $this ExerciseController */
/* @var $model Exercise */
/* @var $form BSActiveForm */
?>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading"> 
    <h3 class="panel-title"> Exercise </h3>
    </div>
    <div class="panel-body">
    


    <?php $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'exercise-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'name', array('span' => 5, 'maxlength' => 100)); ?>

    <div class="form-actions input-button">
        <?php echo BsHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'color' => BsHtml::BUTTON_COLOR_PRIMARY,
            'size' => BsHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget(); ?>


 </div>
</div>
</div>
</div>