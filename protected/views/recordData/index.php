<?php
/* @var $this RecordDataController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Record Data' 
		) 
) );

$this->menu = array (
		array (
				'label' => 'Create RecordData',
				'url' => array (
						'create' 
				) 
		),
		array (
				'label' => 'Manage RecordData',
				'url' => array (
						'admin' 
				) 
		) 
);
?>

<h1>Record Datas</h1>

<?php


$this->widget ( 'bootstrap.widgets.TbGridView', array (
		'id' => 'record-data-grid',
		'dataProvider' => $dataProvider,
		
		'columns' => array (
				'id',
				'weight',
				'height',
				'calories',
				'assist',
				'reps',
				'time',
				array (
						'name' => 'athleteid',
						// 'value'=>'$data->customers->FirstNameB',
						//'filter' => CHtml::listData ( Athlete::model ()->findAll (), 'id', 'first_name' ),
						'value' => 'Athlete::model()->FindByPk($data->athleteid)->first_name' 
				),
			//	'athleteid',
				array(
						'name'=>'workout_detailid',
						//'value'=>'$data->customers->FirstNameB',
					//	'filter' => CHtml::listData(Workout::model()->findAll(),'id','name'),
						'value' => 'Workout::model()->FindByPk($data->workout_detailid)->name',
				),
				'workout_detailid',
				'date' 
		)
		 
) );

?>