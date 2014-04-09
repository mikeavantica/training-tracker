<?php
/* @var $this AthleteController */
/* @var $model Athlete */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Athletes' => 'index',
				'Create'
		)
) );

$this->menu=array(
	
	array('label'=>'Manage Athlete', 'url'=>array('admin')),
);
?>

<h1>Create Athlete</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>