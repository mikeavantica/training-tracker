<?php
/* @var $this RecordDataController */
/* @var $model RecordData */


$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Record Data' => 'index',
        'Manage'
    )
));

$this->menu = array(
    array('label' => 'List RecordData', 'url' => array('index')),
    array('label' => 'Create RecordData', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#record-data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>Manage Record Datas</h1>

    <p>
        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
            &lt;&gt;</b>
        or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
    </p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BsGridView', array(
    'id' => 'record-data-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'weight',
        'height',
        'calories',
        'assist',
        'reps',

        'time',
        array(
            'name' => 'athleteid',
            'value' => 'Athlete::model()->FindByPk($data->athleteid)->first_name'
        ), array(
            'name' => 'workout_detailid',
            'value' => 'Workout::model()->FindByPk($data->workout_detailid)->name',
        ),
        'date',

        array(
            'class' => 'bootstrap.widgets.BsButtonColumn',
        ),
    ),
)); ?>