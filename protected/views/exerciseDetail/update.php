<?php
/* @var $this ExerciseDetailController */
/* @var $model ExerciseDetail */
?>

<?php

$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Exercise Details' => '../admin',
        'Update'
    )
));
?>

    <h1>Update Exercises Details <?php echo $model->exercise->name; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>