<?php
/* @var $this WorkoutController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Workout' 
		)
		 
) );

$this->menu = array (
		array (
				'label' => 'Create Workout',
				'url' => array (
						'create' 
				) 
		),
		array (
				'label' => 'Manage Workout',
				'url' => array (
						'admin' 
				) 
		) 
);
?>

<h1>Workouts</h1>

<?php
$this->widget ( 'bootstrap.widgets.BsGridView', array (
		'id' => 'workout-grid',
		'dataProvider' => $dataProvider,
		'columns' => array (
				//'id',
				'date',
				'name',
				'description',
                 array (
		'name' => 'workout_typeid',
		// 'value'=>'$data->customers->FirstNameB',
		//'filter' => CHtml::listData ( Athlete::model ()->findAll (), 'id', 'first_name' ),
		'value' => 'WorkoutType::model()->FindByPk($data->workout_typeid)->name'
),
				//'workout_typeid',
				array (
						'class' => 'bootstrap.widgets.BsButtonColumn',
						'template' => '{view}' 
				) 
		)
		 
) );



?>