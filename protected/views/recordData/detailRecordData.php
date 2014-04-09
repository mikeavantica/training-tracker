<?php

$criteria = new CDbCriteria();
$criteria->condition = 'athleteid=' . $model->athleteid . " and date='" . $model->date . "'";
$detail = new CActiveDataProvider('RecordData', array(
    'criteria' => $criteria
        ));


$this->widget('bootstrap.widgets.TbGridView', array(
//'id' => 'record-data-grid',
    'dataProvider' => $detail,
    'columns' => array(
        array(
            'name' => 'exercise',
            'value' => '$data->workoutDetail->exercise->name',
        ),
        'weight', 
        'height', 
        'calories', 
        'assist', 
        'reps',
    )
));
?>
