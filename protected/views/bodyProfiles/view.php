<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */
?>

<?php
$this->breadcrumbs=array(
	'Body Profiles'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List BodyProfiles', 'url'=>array('index')),
	array('label'=>'Create BodyProfiles', 'url'=>array('create')),
	array('label'=>'Update BodyProfiles', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete BodyProfiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BodyProfiles', 'url'=>array('admin')),
);
?>

<h1>BodyProfiles: <?php echo $model->body_part_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'Id',
		'body_part__name',
		'weight',
		'height',
		'sex_typeid',
	),
)); ?>