<?php
/* @var $this WorkoutDetailController */
/* @var $model WorkoutDetail */
?>

<?php
$this->breadcrumbs=array(
	'Workout Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WorkoutDetail', 'url'=>array('index')),
	array('label'=>'Create WorkoutDetail', 'url'=>array('create')),
	array('label'=>'View WorkoutDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WorkoutDetail', 'url'=>array('admin')),
);
?>

    <h1>Update WorkoutDetail <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>