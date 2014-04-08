<?php
/* @var $this RecordDataController */
/* @var $model RecordData */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'record-data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'weight',array('span'=>3,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'height',array('span'=>3,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'calories',array('span'=>3,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'assist',array('span'=>3,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'reps',array('span'=>3)); ?>

            <?php echo $form->timeField($model,'time',array('span'=>3)); ?>
              <?php  echo $form->label($model,'athleteid'); ?>
            <?php echo  $form->dropDownList($model, 'athleteid', CHtml::listData(Athlete::model()->findAll(), 'id', 'first_name')); ?>

            <?php //echo $form->textFieldControlGroup($model,'athleteid',array('span'=>3)); ?>
              <?php  echo $form->label($model,'workout_detailid'); ?>
            <?php echo  $form->dropDownList($model, 'workout_detailid', CHtml::listData(WorkoutDetail::model()->findAll(), 'id', 'workoutid')); ?>
            <?php //echo $form->textFieldControlGroup($model,'workout_detailid',array('span'=>3)); ?>

             <?php echo $form->dateFieldControlGroup($model,'date',array('span'=>3)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->