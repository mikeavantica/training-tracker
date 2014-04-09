<?php
/* @var $this WorkoutDetailController */
/* @var $model WorkoutDetail */
?>

<?php
$model->workoutid = $_GET['id'];
if($model->workout->workout_typeid == 1){
	$model->total_reps = 0;
	
}
elseif ($model->workout->workout_typeid == 2){
	$model->total_time = '00:00:00';
	
}
$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workout' => Yii::app ()->homeUrl.'/Workout/index',
				$model->workout->name => array (
						'/Workout/view',
						'id' => $model->workoutid
				),
				'Create'
		)
) );

$this->menu=array(
	array('label'=>'List WorkoutDetail', 'url'=>array('index')),
	array('label'=>'Manage WorkoutDetail', 'url'=>array('admin')),
		
		
);

?>

<h1>Create WorkoutDetail </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>