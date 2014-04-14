<?php
/* @var $this ExerciseController */
/* @var $model Exercise */
?>

<?php

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Exercises' => 'index',
				$model->name
		)
) );

$this->menu=array(
	
	array('label'=>'Create Exercise', 'url'=>array('create')),
	array('label'=>'Update Exercise', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Exercise', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Exercise', 'url'=>array('admin')),
);
?>

<h3>Exercise<?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		//'id',
		'name',
	),
)); ?>