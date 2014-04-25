<div class="row">
    <div class="col-mod-12">
        <?php
        /* @var $this AthleteController */
        /* @var $model Athlete */

        $this->widget('bootstrap.widgets.BsBreadcrumb', array(
            'links' => array(
                'Manage'
            )
        ));


        ?>
    </div>
</div>

<?php


$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id' => 'athlete-form',
    // 'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'focus' => array($model, 'fallas_id'),
    'clientOptions' => array('validateOnSubmit' => true)


));
?>

<?php echo $form->errorSummary($model); ?>

<div class="panel panel-archon">
    <div class="panel-heading">
        <h3 class="panel-title"> Manage Exercise Details </h3>
    </div>
    <div class="panel-body">


  
        <div class="form-group-input-25">

<?php  echo BsHtml::linkButton('Create Exercise Detail', array(
                                'color' => BsHtml::BUTTON_COLOR_PRIMARY,
                                'size' => BsHtml::BUTTON_SIZE_SMALL,
                                'url' => array(
                                    'create',
                                )
                            ));
?>
           
        </div>


    </div>
</div>


<?php $this->endWidget(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-archon">
            <div class="panel-heading">
                <h3 class="panel-title">Exercise Details

                </h3>
            </div>
            <div class="panel-body">
                <?php
                $this->widget('bootstrap.widgets.BsGridView', array(
                    'id' => 'athlete-grid',
                    'type' => BsHtml::GRID_TYPE_STRIPED,
                    'dataProvider' => $model->search(),
                    'columns' => array(
                             array(
		            'name' => 'body_profilesId',
		            'value' => 'BodyProfiles::model()->FindByPk($data->body_profilesId)->body_part_name'
                        ),
                           array(
		            'name' => 'exerciseid',
		           'value' => 'Exercise::model()->FindByPk($data->exerciseid)->name',

                       ),
                  'attr1',
                  'attr2',
                  'attr3',
                  'attr4',
                  'attr5',
                  'attr6',
                  'attr7',
                        array('class' => 'CButtonColumn',
                            'template' => '{update}{delete}',
                            'deleteConfirmation' => "js:'are you sure you want to delete this Exercise Detail: '+$(this).parent().parent().children(':nth-child(1)').text()+'?'",
                            'htmlOptions' => array('width' => '100px'),
                            'buttons' => array(

                                'update' => array(
                                    'label' => '',
                                    'imageUrl' => '',
                                    'url' => "CHtml::normalizeUrl(array('/ExerciseDetail/update', 'id'=>\$data->id))",
                                    'options' => array('class' => 'glyphicon glyphicon-edit'),
                                ),
                                'delete' => array(
                                    'label' => '',
                                    'imageUrl' => '',
                                    'url' => "CHtml::normalizeUrl(array('/ExerciseDetail/delete', 'id'=>\$data->id))",
                                    'options' => array('class' => 'glyphicon glyphicon-remove',),
                                ),


                            ),
                        )
                    )
                ));
                ?>

            </div>
        </div>
    </div>
</div>



