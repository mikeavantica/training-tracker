<?php
/* @var $this ExerciseDetailController */
/* @var $model ExerciseDetail */
?>

<?php

$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Exercise Details' => '../admin',
        $model->exercise->name => array(
            'view',
            'id' => $model->id
        ),
        'Update'
    )
));

$this->menu = array(

    array('label' => 'Create Exercises Details', 'url' => array('create')),
    array('label' => 'View Exercises Details', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Exercises Details', 'url' => array('admin')),
);
?>

    <h1>Update Exercises Details <?php echo $model->exercise->name; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>