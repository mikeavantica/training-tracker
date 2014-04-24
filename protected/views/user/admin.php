<?php
/* @var $this UserController */
/* @var $model User */


$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Users' => 'index',
        'Manage'
    )
));


$this->menu = array(

    array('label' => 'Create User', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>Manage Users</h1>



<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BsGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        'username',
        //'password',
        'email',
        array(
            'class' => 'bootstrap.widgets.BsButtonColumn',
        ),
    ),
)); ?>