<?php
/* @var $this WorkoutDetailController */
/* @var $model WorkoutDetail */
/* @var $form TbActiveForm */
?>
<script>
    $(function () {
        $("#txtTime").change(function () {
            if ($("#txtTime").val() == "") {
                $("#txtTime").val("00:00:00");
            }
        });
    });

</script>
<?php

$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id' => 'workout-detail-form',
    // 'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,


));
?>

<p class="help-block">
    Fields with <span class="required">*</span> are required.
</p>
<?php echo $form->errorSummary($model); ?>
<div class="form">
    <div style="display:none;">
        <?php echo $form->dropDownList($model, 'workoutid', CHtml::listData(Workout::model()->findAll(), 'id', 'name')); ?>
    </div>

    <div class="column">
        <?php echo $form->label($model, 'exerciseid'); ?>
        <?php echo $form->dropDownList($model, 'exerciseid', CHtml::listData(Exercise::model()->findAll(), 'id', 'name')); ?>
        <?php
        // echo TbHtml::submitButton ( $model->isNewRecord ? 'Create' : 'Save', array (
        // 'color' => TbHtml::BUTTON_COLOR_PRIMARY,
        // 'size' => TbHtml::BUTTON_SIZE_SMALL
        // ) );
        ?>

    </div>
    <div class="column">
        <?php


        if ($model->workout ['workout_typeid'] == 1) {
            echo $form->label($model, 'total_reps');
            echo $form->numberField($model, 'total_reps', array(
                // 'span' => 3,
                'lenght' => 11,
                'min' => 0
            ));
        }
        ?>
        <?php
        if ($model->workout ['workout_typeid'] == 2) {

            echo $form->label($model, 'total_time');


            echo $form->timeField($model, 'total_time', array('id' => 'txtTime', 'step' => 1));


        }

        ?>

    </div>
    <div class="column">
        <div style="font-weight: bold;
font-size: 0.9em;
display: block;">Measure
        </div>
        <?php //echo $form->label($model,'measure_weight'); ?>
        <?php echo $form->checkBoxControlGroup($model, 'measure_weight'); ?>

        <?php //echo $form->label($model,'measure_height'); ?>
        <?php echo $form->checkBoxControlGroup($model, 'measure_height'); ?>

        <?php //echo $form->label($model,'measure_calories'); ?>
        <?php echo $form->checkBoxControlGroup($model, 'measure_calories'); ?>

        <?php //echo $form->label($model,'measure_calories'); ?>
        <?php echo $form->checkBoxControlGroup($model, 'measure_assist'); ?>
    </div>

    <div class="row" style=" padding: 30px;">
        <?php

        echo BsHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'color' => BsHtml::BUTTON_COLOR_PRIMARY,
            'size' => BsHtml::BUTTON_SIZE_SMALL
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>

<!-- form -->