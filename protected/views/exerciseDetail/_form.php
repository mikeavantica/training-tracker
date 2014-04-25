<?php
/* @var $this ExerciseDetailController */
/* @var $model ExerciseDetail */
/* @var $form BSActiveForm */
?>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading"> 
    <h3 class="panel-title"> Exercise Details </h3>
    </div>
    <div class="panel-body">

    <?php

    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'exercise-detail-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false
    ));
    ?>

    <p class="help-block">
        Fields with <span class="required">*</span> are required.
    </p>

    <?php echo $form->errorSummary($model); ?>
    <div class="form-group">
    <?php echo $form->label($model, 'body_profilesId'); ?>
    <?php echo $form->dropDownList($model, 'body_profilesId', CHtml::listData(BodyProfiles::model()->findAll(), 'Id', 'body_part_name')); ?>
    </div>
    <div class="form-group">     
    <?php echo $form->label($model, 'exerciseid'); ?>
    <?php echo $form->dropDownList($model, 'exerciseid', CHtml::listData(Exercise::model()->findAll(), 'id', 'name')); ?>
     </div>
    <?php echo $form->textFieldControlGroup($model, 'attr1', array('span' => 5, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldControlGroup($model, 'attr2', array('span' => 5, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldControlGroup($model, 'attr3', array('span' => 5, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldControlGroup($model, 'attr4', array('span' => 5, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldControlGroup($model, 'attr5', array('span' => 5, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldControlGroup($model, 'attr6', array('span' => 5, 'maxlength' => 10)); ?>

    <?php echo $form->textFieldControlGroup($model, 'attr7', array('span' => 5, 'maxlength' => 10)); ?>




    <div class="form-actions input-button">
        <?php

        echo BsHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'color' => BsHtml::BUTTON_COLOR_PRIMARY,
            'size' => BsHtml::BUTTON_SIZE_LARGE
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

 </div>
</div>
</div>
</div>