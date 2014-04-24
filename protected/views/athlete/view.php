<?php
/* @var $this AthleteController */
/* @var $model Athlete */
?>

<?php

$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Athletes' => 'index',
        $model->first_name
    )
));
$this->menu = array(

    array('label' => 'Create Athlete', 'url' => array('create')),
    array('label' => 'Update Athlete', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Athlete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Athlete', 'url' => array('admin')),
);
?>

    <h3>Athlete: <?php echo $model->first_name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        //'id',
        'first_name',
        'last_name',
        'email',
        'height',
        'weight',
        //'sex_typeid',
        array(
            'name' => 'sex_typeid',
            'value' => $model->sex_typeid == 1 ? 'Male' : 'Female'),
    ),
)); ?>