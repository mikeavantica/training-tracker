<?php
/* @var $this WorkoutTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Workout Types' 
		)
		 
) );
$this->menu = array (
		array (
				'label' => 'Create WorkoutType',
				'url' => array (
						'create' 
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

<h1>Workout Types</h1>

<?php

$this->widget ( 'bootstrap.widgets.BsGridView', array (
		'id' => 'workout-type-grid',
		'dataProvider' => $dataProvider,
		
		'columns' => array (
				//'id',
				'name',
		/*array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),*/
	) 
) );

/*
 * $this->widget('bootstrap.widgets.TbListView',array( 'dataProvider'=>$dataProvider, 'itemView'=>'_view', ));
 */
?>