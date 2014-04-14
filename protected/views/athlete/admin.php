<?php
/* @var $this AthleteController */
/* @var $model Athlete */

$this->widget ( 'bootstrap.widgets.BsBreadcrumb', array (
		'links' => array (
				'Athletes' => 'index',
				'Manage' 
		) 
) );

$this->menu = array (
		
		array (
				'label' => 'Create Athlete',
				'url' => array (
						'create' 
				) 
		) 
);

Yii::app ()->clientScript->registerScript ( 'search', "
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
" );

?>

<h1>Manage Athletes</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display: none">
<?php

$this->renderPartial ( '_search', array (
		'model' => $model 
) );
?>
</div>
<!-- search-form -->

<?php
$this->widget ( 'bootstrap.widgets.BsGridView', array (
		'id' => 'athlete-grid',
		'dataProvider' => $model->search (),
		'filter' => $model,
		'columns' => array (
				// 'id',
				array (
						'name' => 'first_name',
						'value' => 'GlobalFunctions::truncate($data->first_name)' 
				),
				array (
						'name' => 'last_name',
						'value' => 'GlobalFunctions::truncate($data->last_name)'
				),
				'email',
				'height',
				'weight',
				// 'sex_typeid',
				array (
						'name' => 'sex_typeid',
						'value' => '$data->sex_typeid == 1 ? "Male" : "Female"' 
				),
                array('class' => 'CButtonColumn',
		'template'=>'{view}{update}{delete}{stats}',
        'htmlOptions'=>array('width'=>'100px'),
		'buttons' => array(

				'update' => array(
						'label' => '',
						'imageUrl' => '',
						'url' => "CHtml::normalizeUrl(array('/Athlete/update', 'id'=>\$data->id))",
						'options' => array('class' => 'glyphicon glyphicon-edit', 'style' => 'margin: 0 3px;')
				),
                'view' => array(
		        'label' => '',
	            'imageUrl' => '',
		        'url' => "CHtml::normalizeUrl(array('/Athlete/view', 'id'=>\$data->id))",
		        'options' => array('class' => 'glyphicon glyphicon-search', 'style' => 'margin: 0 3px;')
                 ),
				'delete' => array(
						'label' => '',
						'imageUrl' => '',
						'url' => "CHtml::normalizeUrl(array('/Athlete/delete', 'id'=>\$data->id))",
						'options' => array('class' => 'glyphicon glyphicon-remove', 'style' => 'margin: 0 3px;'),
				),
                'stats' => array(
						'label' => '',
						
						'url' => "CHtml::normalizeUrl(array('/Athlete/AthleteStats', 'id'=>\$data->id))",
                        'options' => array('class' => 'glyphicon glyphicon-adjust', 'style' => 'margin: 0 3px;'),
						
				),
                     
                
		),
)
				
				/*array (
						'class' => 'bootstrap.widgets.BsButtonColumn' 
				)*/
				 
		) 
) );
?>