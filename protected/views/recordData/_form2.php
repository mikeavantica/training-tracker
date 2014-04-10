<?php
/* @var $this RecordDataController */
/* @var $model RecordData */
/* @var $form TbActiveForm */
?>

<table>
    <thead>
        <tr>
            <th>Exercise</th>
            <th rowspan="8"></th>        
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 0;
            echo '<input type="hidden" name="total_workdetails" value="' . sizeof($workout->workoutDetails) . '">';
            
            echo '<input type="hidden" name="workout_type" id="workout_type" value="'. $workout->workoutType->id . '">';
          
            foreach($workout->workoutDetails as $workoutDetail) {
                $name = 'WorkoutDetails' . $i;
                $i++;
                
                if (isset($workoutDetail->id_record_data)) {
                    echo '<input type="hidden" name="' . $name . '[recorddataid]" value="' . $workoutDetail->id_record_data . '">';
                }
                
                echo '<input type="hidden" name="' . $name . '[id]" value="' . $workoutDetail->id . '">';
                echo '<tr>';
                    echo '<td>' . $workoutDetail->exercise->name . '</td>';
                    
                    if ($workoutDetail->measure_weight) {
                        echo '<td>Weight</td>';
                        echo '<td><input name="'. $name . '[weight]" style="width:100px;" type="text" value="' . (isset($workoutDetail->weight) ? $workoutDetail->weight : '') . '"></td>';
                    }
                    
                    if ($workoutDetail->measure_height) {
                        echo '<td>Height</td>';
                        echo '<td><input name="' . $name . '[height]" style="width:100px;" type="text" value="' . (isset($workoutDetail->height) ? $workoutDetail->height : '') . '"></td>';
                    }
                    
                    if ($workoutDetail->measure_calories) {
                        echo '<td>Calories</td>';
                        echo '<td><input name="' . $name . '[calories]" style="width:100px;" type="text" value="' . (isset($workoutDetail->calories) ? $workoutDetail->calories : '') . '"></td>';
                    }
                    
                    if ($workoutDetail->measure_assist) {
                        echo '<td>Assist</td>';
                        echo '<td><input name="' . $name . '[assist]" style="width:100px;" type="text" value="' . (isset($workoutDetail->assist) ? $workoutDetail->assist : '') . '"></td>';
                    }
                    
                echo '</tr>';
            }
        ?>
    </tbody>
</table>