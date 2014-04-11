<?php
/* @var $this RecordDataController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        'Record Data'
    )
));

/*$this->menu = array(
    array(
        'label' => 'Create RecordData',
        'url' => array(
            'create'
        )
    ),
    array(
        'label' => 'Manage RecordData',
        'url' => array(
            'admin'
        )
    )
);*/
?>

<h1>Record Data</h1>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
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
        <th><?php echo $form->labelEx($model,'time',array('id'=>'lblTime','style'=> 'display:none;')); ?>
            <?php echo $form->labelEx($model,'reps',array('id'=>'lblReps','style'=> 'display:none;')); ?>
        </th>
    </tr>
    <tr>
        
        <td><?php echo $form->dateField($model, 'date',array('span'=>3)); ?></td>
        <td><?php 
            if (isset($model->workoutDetail)) {
                $list=CHtml::listData(Workout::model()->findAll(), 'id', 'name');
                echo CHtml::dropDownList('wod', $model->workoutDetail->workoutid, $list, array('disabled' => 'disabled'));
            } else {
                $list=CHtml::listData(Workout::model()->findAll(), 'id', 'name');
                echo CHtml::dropDownList('wod', 'empty', $list, array('prompt' => '-- Select --'));
            }
            ?>
        </td>
        <td><?php 
            if (isset($model->workoutDetail)) {
                $list2 = CHtml::listData(Athlete::model()->findAll(), 'id', 'fullname');
                echo  $form->dropDownList($model, 'athleteid',$list2, array('disabled' => 'disabled')); 
            } else {
                $list2 = CHtml::listData(Athlete::model()->findAll(), 'id','fullname');
                echo  $form->dropDownList($model, 'athleteid',$list2, array('prompt' => '-- Select --')); 
            }
            
            ?></td>
        <td><?php echo $form->timeField($model,'time',array('span'=>3,'style'=> 'display:none;')); ?>
            <?php echo $form->numberField($model,'reps',array('size'=>35,'style'=> 'display:none;')); ?></td>
    </tr>
</table>
<?php
    if (isset($models)) {
        echo '<input type="hidden" name="action" value="edit">';
    } else {
        echo '<input type="hidden" name="action" value="create">';
    }
        
        
?>
<div id="exercises">
    <?php

    if (isset($models)) {
        $workout = new stdClass();
        $newDetails = array();
        $workout->workoutDetails = $models;
        foreach($workout->workoutDetails as $details) {
            $obj = new stdClass();
            $obj->measure_weight = ($details->weight > 0);
            $obj->weight = $details->weight;
            $obj->measure_height = ($details->height > 0);
            $obj->height = $details->height;
            $obj->measure_assist = ($details->assist > 0);
            $obj->assist = $details->assist;
            $obj->measure_calories = ($details->calories> 0);
            $obj->calories = $details->calories;
            
            $obj->id = $details->workout_detailid;
            $obj->id_record_data = $details->id;
            
            $obj->exercise = new stdClass();
            $obj->exercise->name = $details->workoutDetail->exercise->name;
            
            array_push($newDetails, $obj);
        }
        $workout->workoutType = $model->workoutDetail->workout->workoutType;
        $workout->workoutDetails = $newDetails;
        $this->renderPartial('_form2', array('workout'=>$workout));
    }
    ?>
</div>
    
    
    <input type="submit" class="btn btn-primary btn-small" value="<?php echo (isset($models) ? 'update' : 'create') ?>" >
    
    <?php $this->endWidget(); ?>
    
</div><!-- form -->

<?php
Yii::app()->clientScript->registerScript('settings-script', <<<EOD
        $('#wod').change(function() {
            var value = $(this).val();
            $.get('populateWOD?id=' + value, function(data, textStatus, jqXHR) {
                    $('#exercises').empty();
                    $('#exercises').append(data);
                    changeWorkoutType()
                }
            );
        });
        $(function(){
            changeWorkoutType();
        });
        
        function changeWorkoutType()
        {
            var wotype = $('#workout_type').val();
                    if (wotype==1)
                    {
                        $('#RecordData_time').show();
                        $('#RecordData_reps').hide();
                        $('#lblTime').show();
                        $('#lblReps').hide();
                        $('#RecordData_reps').val(0);
                    }
                    else if (wotype==2)
                    {
                        $('#RecordData_time').hide();
                        $('#RecordData_reps').show();
                        $('#lblTime').hide();
                        $('#lblReps').show();
                        $('#RecordData_time').val('00:00:00');
                    }
        }
EOD
);
?>

<?php
 $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_recordDetail',
)); 
/*$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'record-data-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'date',
        array(
            'name' => 'workout_detailid',
            //'value'=>'$data->customers->FirstNameB',
            //	'filter' => CHtml::listData(Workout::model()->findAll(),'id','name'),
            'value' => 'Workout::model()->FindByPk($data->workout_detailid)->name',
        ),
        'athlete.fullName',
        array(
            'header' => 'Data',
            'type' => 'html',
            'value'=>array($this,'getDetailRecordData')
        ),
        array(// display a column with "view", "update" and "delete" buttons
            'class' => 'CButtonColumn',
        ),
    )
));*/
?>