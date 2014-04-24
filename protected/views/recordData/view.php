<?php
/* @var $this RecordDataController */
/* @var $model RecordData */
?>

<?php


$this->menu = array(
    array('label' => 'List RecordData', 'url' => array('index')),
    array('label' => 'Create RecordData', 'url' => array('create')),
    array('label' => 'Update RecordData', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete RecordData', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage RecordData', 'url' => array('admin')),
);
?>

    <h1>View RecordData #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        'id',
        'weight',
        'height',
        'calories',
        'assist',
        'reps',
        'time',
        array(
            'name' => 'athleteid',
            'value' => Athlete::model()->FindByPk($model->athleteid)->first_name
        ), array(
            'name' => 'workout_detailid',
            'value' => Workout::model()->FindByPk($model->athleteid)->name,
        ),
        'date',
    ),
)); ?>