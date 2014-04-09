<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */



$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Body Profiles' => 'index',
				'Manage'
		)
) );

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
        array(
		'name' => 'sex_typeid',
		'value' => '$data->sex_typeid == 1 ? "Male" : "Female"',
         ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>