<?php
/* @var $this AssignmentController */
/* @var $dataProvider CActiveDataProvider */


$this->widget('bootstrap.widgets.BsBreadcrumb', array(
    'links' => array(
        Yii::t('authModule.main', 'Assignments'),
    )
));
?>

<h1><?php echo Yii::t('AuthModule.main', 'Roles'); ?></h1>

<?php $this->widget(
    'bootstrap.widgets.BsGridView',
    array(
        'type' => 'striped hover',
        'dataProvider' => $dataProvider,
        'emptyText' => Yii::t('AuthModule.main', 'No assignments found.'),
        'template' => "{items}\n{pager}",
        'columns' => array(
            array(
                'header' => Yii::t('AuthModule.main', 'User'),
                'class' => 'AuthAssignmentNameColumn',
            ),
            array(
                'header' => Yii::t('AuthModule.main', 'Roles Assignments'),
                'class' => 'AuthAssignmentItemsColumn',
            ),
            array(
                'class' => 'AuthAssignmentViewColumn',
            ),
        ),
    )
); ?>
