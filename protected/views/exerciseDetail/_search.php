<?php
/* @var $this ExerciseDetailController */
/* @var $model ExerciseDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
				
$form = $this->beginWidget ( 'bootstrap.widgets.BsActiveForm', array (
						'action' => Yii::app ()->createUrl ( $this->route ),
						'method' => 'get' 
				) );
				?>                 <div class="row">
                       <?php  echo $form->label($model,'body_profilesId'); ?>
                       <?php echo  $form->dropDownList($model, 'body_profilesId', CHtml::listData(BodyProfiles::model()->findAll(), 'id', 'body_part__name')); ?>
                       </div>
                       <?php //echo $form->textFieldControlGroup($model,'exerciseid',array('span'=>5)); ?>
                       <div class="row">
                       <?php  echo $form->label($model,'exerciseid'); ?>
                       <?php echo  $form->dropDownList($model, 'exerciseid', CHtml::listData(Exercise::model()->findAll(), 'id', 'name')); ?>
                       </div>
                       <?php echo $form->textFieldControlGroup($model,'attr1',array('span'=>5,'maxlength'=>10)); ?>
                     
                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'attr1',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'attr2',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'attr3',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'attr4',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'attr5',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'attr6',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'attr7',array('span'=>5,'maxlength'=>10)); ?>

                    <?php //echo $form->textFieldControlGroup($model,'body_profilesId',array('span'=>5)); ?>

                    <?php //echo $form->textFieldControlGroup($model,'exerciseid',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- search-form -->