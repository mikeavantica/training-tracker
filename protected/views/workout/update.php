<?php
/* @var $this WorkoutController */
/* @var $model Workout */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workout' => 'index',
				$model->name => array (
						'view',
						'id' => $model->id
				),
				'Update'
		)
) );

$this->menu=array(

	array('label'=>'Create Workout', 'url'=>array('create')),
	array('label'=>'View Workout', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Workout', 'url'=>array('admin')),
);
?>

    <h3>Update Workout <?php echo $model->name; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>