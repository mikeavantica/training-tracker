<?php
/* @var $this RecordDataController */
/* @var $model RecordData */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
				
				$form = $this->beginWidget ( 'bootstrap.widgets.BsActiveForm', array (
						'action' => Yii::app ()->createUrl ( $this->route ),
						'method' => 'get' 
				) );
				?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>3)); ?>

                    <?php echo $form->textFieldControlGroup($model,'weight',array('span'=>3,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'height',array('span'=>3,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'calories',array('span'=>3,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'assist',array('span'=>3,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'reps',array('span'=>3)); ?>
                    <div class="row">
                    <?php  echo $form->label($model,'time'); ?>
                    <?php echo $form->timeField($model,'time',array('span'=>3)); ?>
                    </div>
                     <div class="row">
                     <?php  echo $form->label($model,'athleteid'); ?>
                     <?php echo  $form->dropDownList($model, 'athleteid', CHtml::listData(Athlete::model()->findAll(), 'id', 'first_name')); ?>
                     </div>
	               <div class="row">
                    <?php echo $form->label($model,'workout_detailid'); ?>
                    <?php echo $form->dropDownList($model,'workout_detailid',CHtml::listData(Workout::model()->findAll(array("order" => "id desc")), 'id', 'name')); ?> 
                    </div>
	               <div class="row">
                    <?php echo $form->label($model,'date'); ?>
                    <?php echo $form->dateField($model,'date',array('span'=>3)); ?>
                    </div>

	<div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- search-form -->