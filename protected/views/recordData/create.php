<?php
/* @var $this RecordDataController */
/* @var $model RecordData */
?>

<?php

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Record Data' => 'index',
				'Create'
		)
) );

$this->menu=array(
	array('label'=>'List RecordData', 'url'=>array('index')),
	array('label'=>'Manage RecordData', 'url'=>array('admin')),
);
?>

<h1>Create RecordData</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>