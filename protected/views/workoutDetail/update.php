<?php
/* @var $this WorkoutDetailController */
/* @var $model WorkoutDetail */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workout' => Yii::app ()->homeUrl.'/Workout/index',
				$model->workout->name => array (
						'/Workout/view',
						'id' => $model->workoutid
				),
				'Update'
		)
) );

$this->menu=array(
	array('label'=>'List WorkoutDetail', 'url'=>array('index')),
	array('label'=>'Create WorkoutDetail', 'url'=>array('create')),
	array('label'=>'View WorkoutDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WorkoutDetail', 'url'=>array('admin')),
);
?>

    <h3>Update Workout <?php echo $model->workout->name; ?> - <?php echo $model->exercise->name; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>