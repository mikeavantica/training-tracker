<?php
/* @var $this WorkoutController */
/* @var $model Workout */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workouts' => 'index',
				$model->name
		)
) );

$this->menu=array(
	array('label'=>'List Workout', 'url'=>array('index')),
	array('label'=>'Create Workout', 'url'=>array('create')),
	array('label'=>'Update Workout', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Workout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Workout', 'url'=>array('admin')),
);
?>

<h1>Workout <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'date',
		'name',
		'description',
		'workout_typeid',
	),
)); ?>