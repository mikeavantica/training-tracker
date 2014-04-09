<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Users' => 'index',
				
		)
) );

$this->menu=array(
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>Users</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$dataProvider,
	
	'columns'=>array(
		//'id',
		'username',
		//'password',
		'email',
		/*array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),*/
	),
)); 

/*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>