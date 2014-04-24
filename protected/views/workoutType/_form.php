<?php
    /* @var $this WorkoutTypeController */
    /* @var $model WorkoutType */
    /* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'workout-type-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading"> 
    <h3 class="panel-title"> Workout Type </h3>
    </div>
    <div class="panel-body">

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>


<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'name',array('maxlength'=>45)); ?>

<div class="form-actions input-button">
<?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
</div>
<?php $this->endWidget(); ?>
  </div>
</div>
</div>
</div>
    