<?php
    /* @var $this UserController */
    /* @var $model User */
    /* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'user-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
    'enableClientValidation' => true,
    'focus' => array($model, 'fallas_id'),
	'clientOptions' => array('validateOnSubmit' => true)
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

    <?php echo $form->textFieldControlGroup($model,'username',array('maxlength'=>128)); ?>
    <?php echo $form->passwordFieldControlGroup($model,'password',array('maxlength'=>128)); ?>
    <?php echo $form->textFieldControlGroup($model,'email',array('maxlength'=>128)); ?>
<div class="form-actions input-button">
<?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>
</div>
<?php $this->endWidget(); ?>
  </div>
</div>
</div>
</div>
