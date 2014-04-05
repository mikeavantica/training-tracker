<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */
?>

<?php
$this->breadcrumbs=array(
	'Body Profiles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BodyProfiles', 'url'=>array('index')),
	array('label'=>'Manage BodyProfiles', 'url'=>array('admin')),
);
?>

<h1>Create BodyProfiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>