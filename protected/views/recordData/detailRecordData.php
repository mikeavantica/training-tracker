<div class="panel panel-archon">
    <div class="panel-heading"></div>
    <div class="panel-body">

        <?php

        $criteria = new CDbCriteria();
        $criteria->condition = 'athleteid=' . $model->athleteid . " and date='" . $model->date . "'";
        $detail = new CActiveDataProvider('RecordData', array(
            'criteria' => $criteria
        ));


        $this->widget('bootstrap.widgets.BsGridView', array(
            'dataProvider' => $detail,
            'type' => BsHtml::GRID_TYPE_STRIPED,
            'columns' => array(
                array(
                    'name' => 'exercise',
                    'value' => '$data->workoutDetail->exercise->name',
                ),
                'weight',
                'height',
                'calories',
                array(
                    'name' => 'assist',
                    'value' => function ($data) {
                            return $data->assist . '%';
                        },
                ),

                'reps',
            ),
            "summaryText" => ""
        ));
        ?>
    </div>
