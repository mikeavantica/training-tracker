<?php
/* @var $this OperationController|TaskController|RoleController */
/* @var $model AuthItemForm */
/* @var $item CAuthItem */
/* @var $form BsActiveForm */

$this->breadcrumbs = array(
    $this->capitalize($this->getTypeText(true)) => array('index'),
    $item->description => array('view', 'name' => $item->name),
    Yii::t('AuthModule.main', 'Edit'),
);
?>

<h1>
    <?php echo CHtml::encode($item->description); ?>
    <small><?php echo $this->getTypeText(); ?></small>
</h1>

<?php $form = $this->beginWidget(
    'bootstrap.widgets.BsActiveForm',
    array(
        'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
    )
); ?>

<?php echo $form->hiddenField($model, 'type'); ?>
<?php echo $form->textFieldControlGroup(
    $model,
    'name',
    array(
        'disabled' => true,
        'title' => Yii::t('AuthModule.main', 'System name cannot be changed after creation.'),
    )
); ?>
<?php echo $form->textFieldControlGroup($model, 'description'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton(
            Yii::t('AuthModule.main', 'Save'),
            array(
                'color' => BsHtml::BUTTON_COLOR_PRIMARY,
            )
        ); ?>
        <?php echo BsHtml::linkButton(
            Yii::t('AuthModule.main', 'Cancel'),
            array(
                'color' => BsHtml::BUTTON_COLOR_LINK,
                'url' => array('view', 'name' => $item->name),
            )
        ); ?>
    </div>

<?php $this->endWidget(); ?>