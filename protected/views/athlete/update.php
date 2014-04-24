<?php
/* @var $this AthleteController */
/* @var $model Athlete */
?>

<?php
$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        'Athletes' => 'index',
        $model->first_name => array(
            'view',
            'id' => $model->id
        ),
        'Update'
    )
));
if ($model->height < '100') {
    $model->height = '0' . $model->height;


}
if ($model->weight < 100) {

    $model->weight = '0' . $model->weight;

}
$this->menu = array(

    array('label' => 'Create Athlete', 'url' => array('create')),
    array('label' => 'View Athlete', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Athlete', 'url' => array('admin')),
);
?>

    <h3>Update Athlete:  <?php echo $model->first_name; ?></h3>

<?php $this->renderPartial('_form', array('model' => $model)); ?>