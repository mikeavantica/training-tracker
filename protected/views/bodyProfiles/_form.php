<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'body-profiles-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'body_part__name',array('span'=>3,'maxlength'=>45)); ?>

            <?php echo $form->textFieldControlGroup($model,'weight',array('span'=>3,'maxlength'=>10)); ?>

            <?php echo $form->textFieldControlGroup($model,'height',array('span'=>3,'maxlength'=>10)); ?>

            <?php  echo $form->label($model,'sex_typeid'); ?>
            <?php echo $form->dropDownList($model,'sex_typeid',array('1'=>'Male','2'=>'Female')); ?> 

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->