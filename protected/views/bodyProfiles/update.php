<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */
?>

<?php
$this->breadcrumbs=array(
	'Body Profiles'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BodyProfiles', 'url'=>array('index')),
	array('label'=>'Create BodyProfiles', 'url'=>array('create')),
	array('label'=>'View BodyProfiles', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage BodyProfiles', 'url'=>array('admin')),
);
?>

    <h1>Update BodyProfiles <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>