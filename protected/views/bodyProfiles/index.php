<?php
/* @var $this BodyProfilesController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Body Profiles',
);

$this->menu=array(
	array('label'=>'Create BodyProfiles','url'=>array('create')),
	array('label'=>'Manage BodyProfiles','url'=>array('admin')),
);
?>

<h1>Body Profiles</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>