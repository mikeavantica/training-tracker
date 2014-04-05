<?php
/* @var $this AthleteController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Athletes'
		)
) );

$this->menu=array(
	array('label'=>'Create Athlete','url'=>array('create')),
	array('label'=>'Manage Athlete','url'=>array('admin')),
);
?>

<h1>Athletes</h1>

<?php 
$this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'athlete-grid',
		'dataProvider'=>$dataProvider,
	
		'columns'=>array(
				'id',
				'first_name',
				'last_name',
				'email',
				'height',
				'weight',
				//'sex_typeid',
				array(
						'name' => 'sex_typeid',
						'value' => '$data->sex_typeid == 1 ? "Male" : "Female"',
				),

				/*array(
						'class'=>'bootstrap.widgets.TbButtonColumn',
				),*/
		),
));
/* $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>