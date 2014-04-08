<?php
/* @var $this WorkoutDetailController */
/* @var $model WorkoutDetail */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workout Detail' => 'index',
				$model->workout->name
		)
) );

$this->menu = array (
		array (
				'label' => 'List WorkoutDetail',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Create WorkoutDetail',
				'url' => array (
						'create' 
				) 
		),
		array (
				'label' => 'Update WorkoutDetail',
				'url' => array (
						'update',
						'id' => $model->id 
				) 
		),
		array (
				'label' => 'Delete WorkoutDetail',
				'url' => '#',
				'linkOptions' => array (
						'submit' => array (
								'delete',
								'id' => $model->id 
						),
						'confirm' => 'Are you sure you want to delete this item?' 
				) 
		),
		array (
				'label' => 'Manage WorkoutDetail',
				'url' => array (
						'admin' 
				) 
		) 
);
?>

<h3>View WorkoutDetail <?php echo $model->workout->name; ?> exercise: <?php echo $model->exercise->name; ?> </h3>

<?php


$this->widget ( 'zii.widgets.CDetailView', array (
		'htmlOptions' => array (
				'class' => 'table table-striped table-condensed table-hover' 
		),
		'data' => $model,
		'attributes' => array (
				'id',
                'measure_weight',
				'measure_height',
				'measure_calories',
				'measure_assist',
				'total_reps',
				'total_time',
				'workoutid',
				'exerciseid' 
		) 
) );
?>