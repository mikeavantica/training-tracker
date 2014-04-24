<?php
/* @var $this ExerciseController */
/* @var $model Exercise */
?>

<?php

$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Exercises' => 'index',
        'Create'
    )
));

$this->menu = array(

    array('label' => 'Manage Exercise', 'url' => array('admin')),
);
?>

    <h1>Create Exercise</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>