<?php
/* @var $this WorkoutDetailController */
/* @var $model WorkoutDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <?php echo $form->textFieldControlGroup($model, 'id', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'measure_weight', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'measure_height', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'measure_calories', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'measure_assist', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'total_reps', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'total_time', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'workoutid', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'exerciseid', array('span' => 5)); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search', array('color' => BsHtml::BUTTON_COLOR_PRIMARY,)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->