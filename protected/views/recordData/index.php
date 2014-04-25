<?php
/* @var $this RecordDataController */
/* @var $dataProvider CActiveDataProvider */
?>
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-mod-12">
            <?php
            $this->widget('bootstrap.widgets.BsBreadcrumb', array(
                'links' => array(
                    'Record Data'
                )
            ));

            foreach (Yii::app()->user->getFlashes() as $key => $message) {
                echo '<div class="alert alert-danger alert-dismissable">' . $message . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button></div>\n";
            };
            ?>
        </div>
    </div>

    <h3 class="page-header">Record Workout Data</h3>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> Add Data</h3>
                </div>

                <div class="panel-body">
                    <div class="form">
                        <?php
                        $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
                            'id' => 'record-data-form',
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation' => false,
                        ));
                        ?>

                        <?php echo $form->errorSummary($model); ?>

                        <p class="help-block">Fields with <span class="required">*</span> are required.</p>

                        <table class="table table-striped">
                            <tr>
                                <th><?php echo $form->labelEx($model, 'Date'); ?></th>
                                <th>WOD</th>
                                <th><?php echo $form->labelEx($model, 'athleteid'); ?></th>
                                <th></th>
                                <th><?php echo $form->labelEx($model, 'time', array('id' => 'lbltimeText', 'style' => 'display:none')); ?> </th>
                            </tr>
                            <tr>
                                <td><?php echo $form->dateField($model, 'date', array('span' => 3)); ?></td>
                                <td><?php
                                    if (isset($model->workoutDetail)) {
                                        if ($is_update) {
                                            $list = CHtml::listData(Workout::model()->findAll(array("order" => "id desc")), 'id', 'extendedname');
                                            echo CHtml::dropDownList('wod', $model->workoutDetail->workoutid, $list, array('disabled' => 'disabled', 'class' => 'form-control'));
                                        } else {
                                            $list = CHtml::listData(Workout::model()->findAll(array("order" => "id desc")), 'id', 'extendedname');
                                            echo CHtml::dropDownList('wod', $model->workoutDetail->workoutid, $list, array('prompt' => '-- Select --', 'class' => 'form-control'));
                                        }
                                    } else {
                                        $list = CHtml::listData(Workout::model()->findAll(array("order" => "id desc")), 'id', 'extendedname');
                                        echo CHtml::dropDownList('wod', 'empty', $list, array('prompt' => '-- Select --', 'class' => 'form-control'));
                                    }
                                    ?>
                                </td>
                                <td><?php
                                    if (isset($model->workoutDetail)) {
                                        if ($is_update) {
                                            $list2 = CHtml::listData(Athlete::model()->findAll(array('order' => 'last_name')), 'id', 'fullname');
                                            echo $form->dropDownList($model, 'athleteid', $list2, array('disabled' => 'disabled'));
                                        } else {
                                            $list2 = CHtml::listData(Athlete::model()->findAll(array('order' => 'last_name')), 'id', 'fullname');
                                            echo $form->dropDownList($model, 'athleteid', $list2, array('prompt' => '-- Select --'));
                                        }
                                    } else {
                                        $list2 = CHtml::listData(Athlete::model()->findAll(array('order' => 'last_name')), 'id', 'fullname');
                                        echo $form->dropDownList($model, 'athleteid', $list2, array('prompt' => '-- Select --'));
                                    }

                                    ?></td>
                                <td>&nbsp;</td>
                                <td>
                                    <?php
                                    echo $form->textfield($model, 'time', array('class' => 'form-control', 'id' => 'RecordData_time', 'style' => 'display:none;'));
                                    //                                 $this->widget ( 'CMaskedTextField', array (
                                    //                                                             'model' => $model,
                                    //                                                             'attribute' => 'time',
                                    //                                                             'mask' => '99:99',
                                    //                                                             'htmlOptions' => array ('size' => 4, 'class' => 'form-control', 'style' => 'display:none')
                                    //                                                                                     )
                                    //                                          );
                                    ?>

                                    <label id="lbltimeValue"><?php echo $model->time ?></label>
                                </td>
                            </tr>
                        </table>

                        <?php
                        if (isset($models)) {
                            echo '<input type="hidden" name="action" value="edit">';
                        } else {
                            echo '<input type="hidden" name="action" value="Record">';
                        }


                        ?>
                        <div class=" prepend-12 span-1 append-4 " id="loading" style="display:none">
                            <img src="../../images/loading3.gif" alt width="40px"/>
                        </div>


                        <div id="exercises">
                            <?php

                            if (isset($models)) {
                                $workout = new stdClass();
                                $newDetails = array();
                                $workout->workoutDetails = $models;
                                foreach ($workout->workoutDetails as $details) {

                                    $obj = new stdClass();
                                    $obj->measure_weight = $details->workoutDetail->measure_weight;
                                    $obj->weight = $details->weight;
                                    $obj->measure_height = $details->workoutDetail->measure_height;
                                    $obj->height = $details->height;
                                    $obj->measure_assist = $details->workoutDetail->measure_assist;
                                    $obj->assist = $details->assist;
                                    $obj->measure_calories = $details->workoutDetail->measure_calories;
                                    $obj->calories = $details->calories;
                                    $obj->time = $details->time;
                                    $obj->reps = $details->reps;
                                    $obj->id = $details->workout_detailid;
                                    $obj->id_record_data = $details->id;
                                    $obj->total_time = $details->workoutDetail->total_time;
                                    $obj->total_reps = $details->workoutDetail->total_reps;
                                    $obj->exercise = new stdClass();
                                    $obj->exercise->name = $details->workoutDetail->exercise->name;
                                    $obj->errors = $details->getErrors();

                                    if (isset($obj->id)) {
                                        array_push($newDetails, $obj);
                                    }
                                }
                                $workout->workoutType = $model->workoutDetail->workout->workoutType;
                                $workout->workoutDetails = $newDetails;
                                $this->renderPartial('_form2', array('workout' => $workout));
                            }
                            ?>
                        </div>


                        <input type="submit" class="btn btn-primary btn-small"
                               value=" <?php echo(isset($models) && ($is_update) ? 'update' : 'Record') ?>">

                        <?php $this->endWidget(); ?>

                    </div>
                    <!-- form -->
                </div>
            </div>
        </div>
    </div>
<?php
Yii::app()->clientScript->registerScript('settings-script', <<<EOD
        $('#wod').change(function() {
            var value = $(this).val();
            $('#exercises').empty();
            if (value != "")
            {
                $('#loading').show();
            }
            else
            {
                $('#RecordData_time').hide();
                $('#lbltimeValue').hide();
                $('#lbltimeText').hide();
            }
        
            $.get('populateWOD?id=' + value, function(data, textStatus, jqXHR) {
                    $('#exercises').empty();
                    $('#exercises').append(data);
                    $('#loading').hide();
                    changeWorkoutType();
                }
            );
        });
	$("#RecordData_time").mask('00:00',{reverse:true});
        $(function(){
            changeWorkoutType();
        
        });
        
        function changeWorkoutType()
        {
            var total_time = $('#total_time').val();
            
            if (total_time!="")
            {
                $('#RecordData_time').val(total_time);
                $('#lbltimeValue').html(total_time);
            }
            
            var time = $('#RecordData_time').val();
            
            if (time.length>5)
            {
               var arrayTime = time.split(':');
               $('#RecordData_time').val(arrayTime[1]+':'+arrayTime[2]);
               $('#lbltimeValue').html(arrayTime[1]+':'+arrayTime[2]);
            }
        
            var wotype = $('#workout_type').val();
                    if (wotype==1)
                    {
                        $('#RecordData_time').show();
                        $('#lbltimeValue').hide();
                        $('#lbltimeText').show();
                        
                    }
                    else if (wotype==2)
                    {
                        $('#RecordData_time').hide();
                        $('#lbltimeValue').show();
                        $('#lbltimeText').show();
                        
                    }
                    else if (wotype==3)
                    {
                        $('#RecordData_time').val('00:00:00');
                        $('#lbltimeValue').hide();
                        $('#lbltimeText').hide();
                        $('#RecordData_time').hide();
                    }
        }
        
EOD
);
?>

<?php
$this->widget('bootstrap.widgets.BsListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_recordDetail',
    'summaryText' => ''
));
?>