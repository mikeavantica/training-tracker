<?php
/* @var $this WorkoutTypeController */
/* @var $model WorkoutType */
?>

<?php
$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workout Types' => 'index',
				$model->name 
		) 
) );

$this->menu = array (
		array (
				'label' => 'List WorkoutType',
				'url' => array (
						'index' 
				) 
		),
		array (
				'label' => 'Create WorkoutType',
				'url' => array (
						'create' 
				) 
		),
		array (
				'label' => 'Update WorkoutType',
				'url' => array (
						'update',
						'id' => $model->id 
				) 
		),
		array (
				'label' => 'Delete WorkoutType',
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
				'label' => 'Manage WorkoutType',
				'url' => array (
						'admin' 
				) 
		) 
);
?>

<h1> Workout Type: <?php echo $model->name; ?></h1>

<?php

$this->widget ( 'zii.widgets.CDetailView', array (
		'htmlOptions' => array (
				'class' => 'table table-striped table-condensed table-hover' 
		),
		'data' => $model,
		'attributes' => array (
				'id',
				'name' 
		) 
) );
?>