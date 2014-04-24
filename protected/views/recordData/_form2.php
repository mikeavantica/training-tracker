<?php
/* @var $this RecordDataController */
/* @var $model RecordData */
/* @var $form BsActiveForm */

?>

<div class="panel panel-archon">
    <div class="panel-heading">
        <h3 class="panel-title">Exercise</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">

            <tbody>
            <?php
            $i = 0;
            echo '<input type="hidden" name="total_workdetails" value="' . sizeof($workout->workoutDetails) . '">';
            echo '<input type="hidden" name="workout_type" id="workout_type" value="' . $workout->workoutType->id . '">';

            foreach ($workout->workoutDetails as $workoutDetail) {
                $name = 'WorkoutDetails' . $i;
                $i++;
                if ($i == 1) {
                    echo '<input type="hidden" name="total_time" id="total_time" value="' . $workoutDetail->total_time . '">';
                }

                if (isset($workoutDetail->id_record_data)) {
                    echo '<input type="hidden" name="' . $name . '[recorddataid]" value="' . $workoutDetail->id_record_data . '">';
                }

                echo '<input type="hidden" name="' . $name . '[id]" value="' . $workoutDetail->id . '" >';

                echo '<tr>';
                echo '<td>' . $workoutDetail->exercise->name . '</td>';
                if ($workout->workoutType->id == 2) {
                    echo '<td>Reps</td>';
                    if (isset($workoutDetail->errors['reps'])) {
                        echo '<td><input class="error form-control" name="' . $name . '[reps]" style="width:50px;" type="text" value="' . (isset($workoutDetail->reps) ? $workoutDetail->reps : '') . '">';
                        echo '<label class="error ">' . $workoutDetail->errors['reps'][0] . '</label>';
                        echo '</td>';
                    } else {
                        echo '<td><input name="' . $name . '[reps]"  type="text" style="width:50px;" value="' . (isset($workoutDetail->reps) ? $workoutDetail->reps : '') . '" class="form-control" ></td>';
                    }

                } else if ($workout->workoutType->id == 1) {
                    echo '<td style="width:50px;">Reps</td>';
                    echo '<input name="' . $name . '[reps]" type="hidden" value="' . (isset($workoutDetail->reps) ? $workoutDetail->reps : $workoutDetail->total_reps) . '">';
                    echo '<td>' . (isset($workoutDetail->reps) ? $workoutDetail->reps : $workoutDetail->total_reps) . '</td>';
                } else if ($workout->workoutType->id == 3) {
                    echo '<td style="width:50px;">Reps</td>';
                    echo '<input name="' . $name . '[reps]" type="hidden" value="1" >';
                    echo '<td>1</td>';
                }
                if ($workoutDetail->measure_weight) {
                    echo '<td style="width:50px;">Weight</td>';
                    if (isset($workoutDetail->errors['weight'])) {
                        echo '<td><input class="error form-control" name="' . $name . '[weight]" style="width:50px;" type="text" value="' . (isset($workoutDetail->weight) ? $workoutDetail->weight : '') . '">';
                        echo '<label class="error">' . $workoutDetail->errors['weight'][0] . '</label>';
                        echo '</td>';
                    } else {
                        echo '<td><input name="' . $name . '[weight]" type="text" style="width:50px;" value="' . (isset($workoutDetail->weight) ? $workoutDetail->weight : '') . '" class="form-control"></td>';
                    }

                }

                if ($workoutDetail->measure_height) {
                    echo '<td style="width:50px;">Height</td>';
                    if (isset($workoutDetail->errors['height'])) {
                        echo '<td><input class="error form-control" name="' . $name . '[height]" style="width:50px;" type="text" value="' . (isset($workoutDetail->height) ? $workoutDetail->height : '') . '">';
                        echo '<label class="error">' . $workoutDetail->errors['height'][0] . '</label>';
                        echo '</td>';
                    } else {
                        echo '<td><input name="' . $name . '[height]" style="width:50px;" type="text" value="' . (isset($workoutDetail->height) ? $workoutDetail->height : '') . '" class="form-control"></td>';
                    }

                }

                if ($workoutDetail->measure_calories) {
                    echo '<td style="width:50px;">Calories</td>';
                    if (isset($workoutDetail->errors['calories'])) {
                        echo '<td><input class="error form-control" name="' . $name . '[calories]" style="width:50px;" type="text" value="' . (isset($workoutDetail->calories) ? $workoutDetail->calories : '') . '">';
                        echo '<label class="error">' . $workoutDetail->errors['calories'][0] . '</label>';
                        echo '</td>';
                    } else {
                        echo '<td><input name="' . $name . '[calories]" style="width:50px;" type="text" value="' . (isset($workoutDetail->calories) ? $workoutDetail->calories : '') . '" class="form-control"></td>';
                    }

                }

                if ($workoutDetail->measure_assist) {
                    echo '<td style="width:50px;">Assist</td>';
                    if (isset($workoutDetail->errors['assist'])) {
                        echo '<td><input class="error form-control" name="' . $name . '[assist]" style="width:50px;" type="text" value="' . (isset($workoutDetail->assist) ? $workoutDetail->assist : '') . '">';
                        echo '<label class="error">' . $workoutDetail->errors['assist'][0] . '</label>';
                        echo '</td>';
                    } else {
                        echo '<td><input name="' . $name . '[assist]" style="width:50px;" type="text" value="' . (isset($workoutDetail->assist) ? $workoutDetail->assist : '') . '" class="form-control"></td>';
                    }

                }

                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>



