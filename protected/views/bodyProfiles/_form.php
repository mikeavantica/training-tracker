<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */
/* @var $form BSActiveForm */
?>



    <?php $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'body-profiles-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading"> 
    <h3 class="panel-title"> Body Profiles </h3>
    </div>
    <div class="panel-body">
    
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'body_part_name', array('span' => 3, 'maxlength' => 45)); ?>

    <?php echo $form->textFieldControlGroup($model, 'weight_male', array('span' => 3, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldControlGroup($model, 'height_male', array('span' => 3, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldControlGroup($model, 'weight_female', array('span' => 3, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldControlGroup($model, 'height_female', array('span' => 3, 'maxlength' => 10)); ?>

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