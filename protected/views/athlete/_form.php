<?php
/* @var $this AthleteController */
/* @var $model Athlete */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php
				
$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
						'id' => 'athlete-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation' => false 
				) );
				?>

    <p class="help-block">
		Fields with <span class="required">*</span> are required.
	</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'first_name',array('span'=>3,'maxlength'=>45)); ?>

            <?php echo $form->textFieldControlGroup($model,'last_name',array('span'=>3,'maxlength'=>45)); ?>

            <?php echo $form->emailFieldControlGroup($model, 'email'); ?>
            <div class="row">
            <?php echo $form->label($model,'height'); ?>
            <?php $this->widget ( 'CMaskedTextField', array (
														'model' => $model,
														'attribute' => 'height',
														'mask' => '999.99',
														'htmlOptions' => array (
																'size' => 6
														) 
												) );//echo $form->numberField($model,'height',array('span'=>2,'maxlength'=>10)); ?>
            </div>
	<div class="row">
            <?php echo $form->label($model,'weight'); ?>
            <?php $this->widget ( 'CMaskedTextField', array (
														'model' => $model,
														'attribute' => 'weight',
														'mask' => '999.99',
														'htmlOptions' => array (
																'size' => 6 
														) 
												) ); // echo $form->numberField($model,'weight',array('span'=>2,'maxlength'=>10,'decimals'=>2));
																								?>
            </div>

            <?php  echo $form->label($model,'sex_typeid'); ?>
            <?php echo $form->dropDownList($model,'sex_typeid',array('1'=>'Male','2'=>'Female')); ?> 

        <div class="form-actions">
        <?php
								
echo TbHtml::submitButton ( $model->isNewRecord ? 'Create' : 'Save', array (
										'color' => TbHtml::BUTTON_COLOR_PRIMARY,
										'size' => TbHtml::BUTTON_SIZE_LARGE 
								) );
								?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- form -->