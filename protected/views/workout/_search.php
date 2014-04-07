<?php
/* @var $this WorkoutController */
/* @var $model Workout */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>3)); ?>

                    <?php echo $form->dateFieldControlGroup($model,'date',array('span'=>3)); ?>

                    <?php echo $form->textFieldControlGroup($model,'name',array('span'=>3,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'description',array('span'=>3,'maxlength'=>150)); ?>

                    <?php  echo $form->label($model,'workout_typeid'); ?>
                    <?php echo  $form->dropDownList($model, 'workout_typeid', CHtml::listData(WorkoutType::model()->findAll(), 'id', 'name'));//$form->textFieldControlGroup($model,'workout_typeid',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->