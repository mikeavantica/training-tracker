<?php
$criteria = new CDbCriteria();
$criteria->condition = 'workoutid=' . $model->id . '';
$detail = new CActiveDataProvider('WorkoutDetail', array(
    'criteria' => $criteria
));


$this->widget('bootstrap.widgets.BsGridView', array(
    'id' => 'details',
    'selectableRows' => 0,
    'dataProvider' => $detail,
    'columns' => array(

        array(
            'name' => 'exerciseid',
            'value' => '$data->exercise->name',

            'header' => 'Exercise'
        ),
        array(
            'class' => 'CCheckBoxColumn',
            'name' => 'measure_weight',
            'checked' => '$data->measure_weight == 1',
            'header' => 'Weight',
            'disabled' => 'true'
        ),
        array(
            'class' => 'CCheckBoxColumn',
            'checked' => '$data->measure_height == 1',
            'name' => 'measure_height',
            'header' => 'Height',
            'disabled' => 'true'
        ),

        array(
            'class' => 'CCheckBoxColumn',
            'name' => 'measure_calories',
            'checked' => '$data->measure_calories == 1',
            'header' => 'Calories',
            'disabled' => 'true'
        ),
        array(
            'class' => 'CCheckBoxColumn',
            'checked' => '$data->measure_assist == 1',
            'name' => 'measure_assist',
            'header' => 'Assist',
            'disabled' => 'true'
        ),
        array(
            'name' => 'total_reps',
            'header' => 'Reps',
            'visible' => $model->workout_typeid == 1 || $model->workout_typeid == 3,

        ),


    )
));
?>
