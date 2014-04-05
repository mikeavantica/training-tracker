<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */


$this->breadcrumbs=array(
	'Body Profiles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BodyProfiles', 'url'=>array('index')),
	array('label'=>'Create BodyProfiles', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#body-profiles-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Body Profiles</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'body-profiles-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'body_part__name',
		'weight',
		'height',
		'sex_typeid',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>