<?php
/* @var $this ExerciseDetailController */
/* @var $model ExerciseDetail */
?>

<?php
$this->breadcrumbs=array(
	'Exercise Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	
	array('label'=>'Create Exercises Details', 'url'=>array('create')),
	array('label'=>'View Exercises Details', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Exercises Details', 'url'=>array('admin')),
);
?>

    <h1>Update Exercises Details <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>