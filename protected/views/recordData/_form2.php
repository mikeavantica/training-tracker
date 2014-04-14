<?php
/* @var $this RecordDataController */
/* @var $model RecordData */
/* @var $form BsActiveForm */

?>

<table class="span-24">
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
                if ($i==1)
                {
                    echo '<input type="hidden" name="total_time" id="total_time" value="'. $workoutDetail->total_time . '">';
                }

                if (isset($workoutDetail->id_record_data)) {
                    echo '<input type="hidden" name="' . $name . '[recorddataid]" value="' . $workoutDetail->id_record_data . '">';
                }
                
                echo '<input type="hidden" name="' . $name . '[id]" value="' . $workoutDetail->id . '" >';
                 if (isset($workoutDetail->errors))
                {
                   //echo '<tr><td>'. var_dump($workoutDetail->errors['date']).'</td></tr>';
                  // print_r($workoutDetail->errors);
                }
                       
                
                echo '<tr>';
                    echo '<td>' . $workoutDetail->exercise->name . '</td>';
                    //var_dump($workoutDetail->errors);
                    if($workout->workoutType->id==2)
                    {
                        echo '<td>Reps</td>';
                        if (isset($workoutDetail->errors['reps']))
                        {
                            echo '<td><input class="error" name="'. $name . '[reps]" style="width:50px;" type="text" value="' . (isset($workoutDetail->reps) ? $workoutDetail->reps : '') . '">';
                            echo '<label class="error">'.$workoutDetail->errors['reps'][0].'</label>';
                            echo '</td>';
                        }
                        else 
                        {
                            echo '<td><input name="'. $name . '[reps]" style="width:50px;" type="text" value="' . (isset($workoutDetail->reps) ? $workoutDetail->reps : '') . '"></td>';
                        }
                        
                    }
                    else if ($workout->workoutType->id==1)
                    {
                        echo '<td>Reps</td>';
                        echo '<input name="'. $name . '[reps]" type="hidden" value="' . (isset($workoutDetail->reps) ? $workoutDetail->reps : $workoutDetail->total_reps) . '">';
                        echo '<td>'. (isset($workoutDetail->reps) ? $workoutDetail->reps : $workoutDetail->total_reps ) . '</td>';
                    }
                    else if ($workout->workoutType->id==3)
                    {
                        echo '<td>Reps</td>';
                        echo '<input name="'. $name . '[reps]" type="hidden" value="1">';
                        echo '<td>1</td>';
                    }
                    if ($workoutDetail->measure_weight) {
                        echo '<td>Weight</td>';
                         if (isset($workoutDetail->errors['weight']))
                        {
                            echo '<td><input class="error" name="'. $name . '[weight]" style="width:50px;" type="text" value="' . (isset($workoutDetail->weight) ? $workoutDetail->weight : '') . '">';
                            echo '<label class="error">'.$workoutDetail->errors['weight'][0].'</label>';
                            echo '</td>';
                        }
                        else 
                        {
                            echo '<td><input name="'. $name . '[weight]" style="width:50px;" type="text" value="' . (isset($workoutDetail->weight) ? $workoutDetail->weight : '') . '"></td>';
                        }
                        
                    }
                    
                    if ($workoutDetail->measure_height) {
                        echo '<td>Height</td>';
                         if (isset($workoutDetail->errors['height']))
                        {
                            echo '<td><input class="error" name="'. $name . '[height]" style="width:50px;" type="text" value="' . (isset($workoutDetail->height) ? $workoutDetail->height : '') . '">';
                            echo '<label class="error">'.$workoutDetail->errors['height'][0].'</label>';
                            echo '</td>';
                        }
                        else 
                        {
                            echo '<td><input name="'. $name . '[height]" style="width:50px;" type="text" value="' . (isset($workoutDetail->height) ? $workoutDetail->height : '') . '"></td>';
                        }
                        
                    }
                    
                    if ($workoutDetail->measure_calories) {
                        echo '<td>Calories</td>';
                         if (isset($workoutDetail->errors['calories']))
                        {
                            echo '<td><input class="error" name="'. $name . '[calories]" style="width:50px;" type="text" value="' . (isset($workoutDetail->calories) ? $workoutDetail->calories : '') . '">';
                            echo '<label class="error">'.$workoutDetail->errors['calories'][0].'</label>';
                            echo '</td>';
                        }
                        else 
                        {
                            echo '<td><input name="'. $name . '[calories]" style="width:50px;" type="text" value="' . (isset($workoutDetail->calories) ? $workoutDetail->calories : '') . '"></td>';
                        }
                       
                    }
                    
                    if ($workoutDetail->measure_assist) {
                        echo '<td>Assist</td>';
                         if (isset($workoutDetail->errors['assist']))
                        {
                            echo '<td><input class="error" name="'. $name . '[assist]" style="width:50px;" type="text" value="' . (isset($workoutDetail->assist) ? $workoutDetail->assist : '') . '">';
                            echo '<label class="error">'.$workoutDetail->errors['assist'][0].'</label>';
                            echo '</td>';
                        }
                        else 
                        {
                            echo '<td><input name="'. $name . '[assist]" style="width:50px;" type="text" value="' . (isset($workoutDetail->assist) ? $workoutDetail->assist : '') . '"></td>';
                        }

                    }
                    
                echo '</tr>';
            }
        ?>
    </tbody>
</table>



