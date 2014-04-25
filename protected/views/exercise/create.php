<?php
/* @var $this ExerciseController */
/* @var $model Exercise */
?>

<?php

$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Exercises' => 'admin',
        'Create'
    )
));


?>

    <h1>Create Exercise</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>