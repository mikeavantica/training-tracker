<?php
/* @var $this ExerciseController */
/* @var $model Exercise */
?>

<?php

$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Exercises' => 'index',
        $model->name => array(
            'view',
            'Id' => $model->id
        ),
        'Update'
    )
));

$this->menu = array(

    array('label' => 'Create Exercise', 'url' => array('create')),
    array('label' => 'View Exercise', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Exercise', 'url' => array('admin')),
);
?>

    <h3>Update Exercise <?php echo $model->name; ?></h3>

<?php $this->renderPartial('_form', array('model' => $model)); ?>