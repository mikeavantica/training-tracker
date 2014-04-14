<?php
/* @var $this RecordDataController */
/* @var $model RecordData */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'record-data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    
    

    <table>
        <tr>
            <th><?php echo $form->labelEx($model,'Date'); ?></th>
            <th>WOD</th>
            <th><?php echo $form->labelEx($model,'athleteid'); ?></th>
            <th><?php echo $form->labelEx($model,'time'); ?></th>
        </tr>
        <tr>
            <td><?php echo $form->textField($model,'date'); ?></td>
            <td><?php 
                $list=CHtml::listData(Workout::model()->findAll(), 'id', 'name');
                $list['empty'] = 'select';
                echo CHtml::dropDownList('wod', (isset($workout_id) ? $workout_id : 'empty'), $list);
                ?>
            </td>
            <td><?php echo  $form->dropDownList($model, 'athleteid', CHtml::listData(Athlete::model()->findAll(), 'id', 'first_name')); ?></td>
            <td><?php echo $form->timeField($model,'time',array('span'=>3)); ?></td>
        </tr>
    </table>
    <div id="exercises">
        <?php
        
        var_dump($models);

        if (isset($models)) {
            echo 'models is set';
            $workout = new object;
            $workout->workoutDetails = $models;
            foreach($workout->workoutDetails as $detail) {
                $details->measure_weight = ($details->weight > 0);
                $details->measure_height = ($details->height > 0);
                $details->measure_assist = ($details->assist > 0);
                $details->measure_calories = ($details->calories> 0);
            }
            
            $this->renderPartial('_form2', array('workout'=>$workout));
        }
        ?>
    </div>
    
    
    <input type="submit" class="btn btn-primary btn-small" value="create" >
    
    <?php $this->endWidget(); ?>
    
</div><!-- form -->

<?php
Yii::app()->clientScript->registerScript('settings-script', <<<EOD
        $('#wod').change(function() {
            var value = $(this).val();
            $.get('populateWOD?id=' + value, function(data, textStatus, jqXHR) {
                    $('#exercises').empty();
                    $('#exercises').append(data);
                }
            );
        });
EOD
);
?>