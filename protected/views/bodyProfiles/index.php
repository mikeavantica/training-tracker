<?php
/* @var $this BodyProfilesController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'BodyProfiles'
		)
) );

$this->menu=array(
	array('label'=>'Create BodyProfiles','url'=>array('create')),
	array('label'=>'Manage BodyProfiles','url'=>array('admin')),
);
?>

<h1>Body Profiles</h1>

<?php 
$this->widget('bootstrap.widgets.BsGridView',array(
		'id'=>'athlete-grid',
		'dataProvider'=>$dataProvider,

		'columns'=>array(
				'Id',
				'body_part__name',
				'weight',
				'height',
				'height',
				array(
						'name' => 'sex_typeid',
						'value' => '$data->sex_typeid == 1 ? "Male" : "Female"',
				),

				/*array(
				 'class'=>'bootstrap.widgets.TbButtonColumn',
				),*/
		),
));
/*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>