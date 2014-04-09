<?php
/* @var $this WorkoutTypeController */
/* @var $model WorkoutType */
?>

<?php
$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Workout Types' => 'index',
				$model->name => array (
						'view',
						'id' => $model->id 
				),
				'Update' 
		) 
) );


$this->menu=array(
	
	array('label'=>'Create WorkoutType', 'url'=>array('create')),
	array('label'=>'View WorkoutType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WorkoutType', 'url'=>array('admin')),
);
?>

<h3>Update Workout Type: <?php echo $model->name; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>