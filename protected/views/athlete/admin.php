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
	'id'=>'athlete-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
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