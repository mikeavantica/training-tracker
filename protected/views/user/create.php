<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php

$this->widget ( 'bootstrap.widgets.TbBreadcrumb', array (
		'links' => array (
				'Users' => 'index',
				'Create'
		)
) );

$this->menu=array(
	
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Create User</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>