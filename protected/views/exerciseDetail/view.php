<?php
/* @var $this ExerciseDetailController */
/* @var $model ExerciseDetail */
?>

<?php

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Exercise Details' => 'index',
				'Exercise'
		)
) );

$this->menu=array(
	array('label'=>'List ExerciseDetail', 'url'=>array('index')),
	array('label'=>'Create ExerciseDetail', 'url'=>array('create')),
	array('label'=>'Update ExerciseDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ExerciseDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExerciseDetail', 'url'=>array('admin')),
);
?>

<h3>View ExerciseDetail <?php echo $model->exercise['name']; ?></h3>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'attr1',
		'attr2',
		'attr3',
		'attr4',
		'attr5',
		'attr6',
		'attr7',
		'body_profilesId',
		'exerciseid',
	),
)); ?>