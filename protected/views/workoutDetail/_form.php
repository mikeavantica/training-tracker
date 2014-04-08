<?php
/* @var $this WorkoutDetailController */
/* @var $model WorkoutDetail */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php
				
				$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
						'id' => 'workout-detail-form',
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
            <div class="row">
            <?php  echo $form->label($model,'measure_weight'); ?>
            <?php echo $form->checkBoxControlGroup($model,'measure_weight'); ?>
            </div>
	<div class="row">
            <?php  echo $form->label($model,'measure_height'); ?>
            <?php echo $form->checkBoxControlGroup($model,'measure_height'); ?>
            </div>

	<div class="row">
            <?php  echo $form->label($model,'measure_calories'); ?>
            <?php echo $form->checkBoxControlGroup($model,'measure_calories'); ?>
            </div>

	<div class="row">
            <?php  echo $form->label($model,'measure_assist'); ?>
            <?php echo $form->checkBoxControlGroup($model,'measure_assist'); ?>
            </div>
            

            <?php      if($model->workout['workout_typeid'] == 1 ){
												echo $form->textFieldControlGroup ( $model, 'total_reps', array (
														'span' => 1,
														'lenght' => 11 
												) );
            }
												?>
            <div class="row">
             <?php

					if($model->workout['workout_typeid'] == 2 ){	
                            
                                                echo $form->label ( $model, 'total_time');							
													echo $form->timeField ( $model, 'total_time', array (
															'span' => 3
													) );  
}													?>
             </div>
              <?php echo $form->label($model,'workoutid'); ?>
            <?php echo $form->dropDownList($model, 'workoutid', CHtml::listData(Workout::model()->findAll(), 'id', 'name')); ?>
            <div class="row">
            <?php  echo $form->label($model,'exerciseid'); ?>
            <?php echo  $form->dropDownList($model, 'exerciseid', CHtml::listData(Exercise::model()->findAll(), 'id', 'name')); ?>
            </div>

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