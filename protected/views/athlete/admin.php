<?php
/* @var $this AthleteController */
/* @var $model Athlete */

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Athletes' => 'index',
				'Manage'
		)
) );

$this->menu=array(
	array('label'=>'List Athlete', 'url'=>array('index')),
	array('label'=>'Create Athlete', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#athlete-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Athletes</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'athlete-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'first_name',
		'last_name',
		'email',
		'height',
		'weight',
		//'sex_typeid',
         array(
		'name' => 'sex_typeid',
		'value' => '$data->sex_typeid == 1 ? "Male" : "Female"',
),
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>