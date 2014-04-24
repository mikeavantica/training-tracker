<?php
/* @var $this RecordDataController */
/* @var $model RecordData */
?>

<?php



$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Record Data' => 'index',
        $model->date => array(
            'view',
            'id' => $model->id
        ),
        'Update'
    )
));
$this->menu = array(
    array('label' => 'List RecordData', 'url' => array('index')),
    array('label' => 'Create RecordData', 'url' => array('create')),
    array('label' => 'View RecordData', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage RecordData', 'url' => array('admin')),
);
?>

    <h1>Update RecordData <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>