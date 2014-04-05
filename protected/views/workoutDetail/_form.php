<?php
/* @var $this WorkoutDetailController */
/* @var $model WorkoutDetail */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'workout-detail-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'measure_weight',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'measure_height',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'measure_calories',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'measure_assist',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'total_reps',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'total_time',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'workoutid',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'exerciseid',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->