<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Body Profiles' => 'index',
				'Create'
		)
) );

$this->menu=array(
	array('label'=>'List BodyProfiles', 'url'=>array('index')),
	array('label'=>'Manage BodyProfiles', 'url'=>array('admin')),
);
?>

<h1>Create BodyProfiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>