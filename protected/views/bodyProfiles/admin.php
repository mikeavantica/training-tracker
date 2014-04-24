<?php
/* @var $this BodyProfilesController */
/* @var $model BodyProfiles */


$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Body Profiles' => 'index',
        'Manage'
    )
));

$this->menu = array(
    array('label' => 'List BodyProfiles', 'url' => array('index')),
    array('label' => 'Create BodyProfiles', 'url' => array('create')),
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



<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BsGridView', array(
    'id' => 'body-profiles-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'Id',
        'body_part_name',
        'weight_male',
        'height_male',
        'weight_female',
        'height_female',
        array(
            'class' => 'bootstrap.widgets.BsButtonColumn',
            'htmlOptions' => array('width' => '75px'),
        ),
    ),
)); ?>