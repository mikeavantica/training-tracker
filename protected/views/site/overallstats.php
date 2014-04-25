<div class="row">


    <div class="col-mod-12">
        <?php
        $this->widget('bootstrap.widgets.BsBreadcrumb', array(
            'links' => array(
                'Dashboard'
            )
        ));
        ?>

    </div>
</div>
<h1 class="page-header">Overall Stats</h1>

<div class="row">

    <?php
    
    $countDates = array();
    $dateschbars = array();
    $fitness = array();
    $volume = array();
    $dataprovider = array();
    foreach ($athlete_stats ['Athlete'] as $grafic) {
        foreach ($grafic ["WOD"] as $wod) {

            $dateschbars [] =  date("n/j/Y", strtotime($wod ['date']));
            if ($wod['volume'] > 0)
                $countDates[] = date("n/j/Y", strtotime($wod ['date']));
        }
    }
    $counts = array_count_values($countDates);

    // we only save unique dates
    $dateschbars = array_unique($dateschbars);

    foreach ($athlete_stats ['Athlete'] as $grafic) {
        foreach ($grafic ["WOD"] as $wod) {

            $commonMod = isset($counts[date("n/j/Y", strtotime($wod ['date']))]) ? $counts[date("n/j/Y", strtotime($wod ['date']))] : 1;
            $clave = array_search(date("n/j/Y", strtotime($wod ['date'])), $dateschbars);
            if (!isset ($fitness [$clave])) { // verified if exist
                $fitness [$clave] = $wod ['fitness'] / $commonMod;
                $volume [$clave] = $wod ['volume'] / $commonMod;
            } else {

                $fitness [$clave] = $fitness [$clave] + ($wod ['fitness'] / $commonMod);
                $volume [$clave] = $volume [$clave] + ($wod ['volume'] / $commonMod);
            }
        }
    } // we save fitness and volume in theirs dates
    $rowid = 1; // primary key needed to the dataprovider
    $total_measures = 0;
    $total_exercises = 0;
    $average_volume = 0;
    $average_fitness = 0;
    $max_squat = 0;
    $max_deadlift = 0;
    $max_press = 0;
    $cont = 0; // variable needed to define average
    $exermes = array();

    foreach ($athlete_stats ['Athlete'] as $athlete) {
        $average_volume += $athlete ['average_volume'];
        $average_fitness += $athlete ['average_fitness'];
        $max_squat += $athlete ['max_squat'];
        $max_press += $athlete ['max_press'];
        $max_deadlift += $athlete ['max_deadlift'];
        foreach ($athlete ['WOD'] as $exerciseswod) {

            $row = array();

            $row ['id'] = $rowid;
            $row ['Athlete'] = $athlete ['athlete_name'];
            $row ['WorkoutName'] = $exerciseswod ['name'];
            $row ['Type'] = $exerciseswod ['type'];
            if($exerciseswod['type'] == 'ForReps'){
            	$time = explode(":", $exerciseswod ['value']);
            	$row ['Time'] = $time[1].':'.$time[2];
            }
            else{
            	$row['Quantity'] = $exerciseswod['value'];
            }
            
            $row ['Date'] = date("n/j/Y", strtotime($exerciseswod ['date']));
            $row ['Volume'] = number_format($exerciseswod ['volume'], 2);
            $row ['Fitness'] = number_format($exerciseswod ['fitness'], 2);

            $exe = 1; // number of exercises
            $measures = 1; // number of measures
            foreach ($exerciseswod ['exercises'] as $exercise) {

                $row ['Exercise' . $exe] = $exercise ['name'];
                $exermes['Exercise' . $exe] = 'Exercise' . $exe;
                foreach ($exercise ['prop'] as $measure) {
                    $exermes['Measure' . $measures] = 'Measure' . $measures;
                    $exermes['Value' . $measures] = 'Value' . $measures;
                  
                    $row ['Measure' . $measures] = $measure ['type'];
                    if($measure['type'] == 'Time'){
                    	$time = explode(':', $measure ['value']);
                    	$row ['Value' . $measures] = $time[1].':'.$time[2];
                    }else{
                    $row ['Value' . $measures] = $measure ['value'];
                    }
                    $measures++;
                } // end of foreach measures
                $exe++;

            } // end of foreach de exercises
            if ($row ['Volume'] != number_format(0, 2) && $row ['Fitness'] != number_format(0, 2)) {
                $dataprovider [$rowid] = $row;
            }
            $rowid++;
        } // end of  foreach workouts
        $cont++;
    } // end of foreach de athletes
    /*
     * we calculate average for all
     */
    if ($cont == 0) {
        $cont = 1; // if rows are 0
    }
    $average_volume = $average_volume / $cont;
    $average_fitness = $average_fitness / $cont;
    $max_squat = $max_squat / $cont;
    $max_press = $max_press / $cont;
    $max_deadlift = $max_deadlift / $cont;
    /**
     * *********************************************
     */

    $columns = array();
    $columns [] = 'Date';
    $columns [] = 'Athlete';
    $columns [] = 'WorkoutName';
    $columns [] = 'Type';
    $columns [] = 'Fitness';
    $columns [] = 'Volume';
    $columns [] = 'Time';
    $columns [] = 'Quantity';


    foreach ($exermes as $key => $value) {
        if (strpos($key, 'Exercise') !== false) {
            $columns[] = array('name' => $value, 'header' => 'Exercise');
        } elseif (strpos($key, 'Measure') !== false) {
            $columns[] = array('name' => $value, 'header' => 'Measurement');
        } else {
            $columns[] = array('name' => $value, 'header' => 'Quantity');
        }
    }


    ?>
    <?php if ($average_volume == 0){ ?>
    <div class="col-mod-12">

        <div class="alert alert-warning alert-dismissable">

            <h3>No Data found</h3>

            <p>please add record data in the next
                link:   <?php echo CHtml::link("Record Data", "../RecordData/index", array('class' => 'alert-link')); ?></p>

        </div>

    </div>


</div>
<?php
} else {
    ?>
    </div>


    <div class="row">
        <div class="col-md-2">
            <div class="web-stats success">
                <div class="pull-left">
                    <h5><?php echo number_format($average_fitness, 2); ?> </h5>
                    <span class="description">Average Fitness:</span>
                </div>

            </div>
        </div>
        <div class="col-md-2">
            <div class="web-stats info">
                <div class="pull-left">
                    <h5><?php echo number_format($average_volume, 2); ?> </h5>
                    <span class="description">Average Volume:</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="web-stats danger">
                <div class="pull-left">
                    <h5><?php echo number_format($max_squat, 2); ?> </h5>
                    <span class="description">Average Squat</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="web-stats danger">
                <div class="pull-left">
                    <h5><?php echo number_format($max_deadlift, 2); ?> </h5>
                    <span class="description">Average Deadlift</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="web-stats danger">
                <div class="pull-left">
                    <h5><?php echo number_format($max_press, 2); ?> </h5>
                    <span class="description">Average Press:</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-archon main-graph">
                <div class="panel-heading">
                    <h3 class="panel-title">Graph</h3>
                </div>
                <div class="panel-body">
                    <div id="chartnvd3" class="with-3d-shadow with-transitions">
                    <svg></svg>
                        <?php
						$newFitnessData = array();
						for ($i=0; $i<sizeof($dateschbars);$i++){
							array_push($newFitnessData, array($dateschbars[$i],$fitness[$i]));
						}
						
						$newVolumeData = array();
						for ($i=0; $i<sizeof($dateschbars);$i++){
							array_push($newVolumeData, array($dateschbars[$i],$volume[$i]));
						}
						                        
                        $cs = Yii::app()->getClientScript();
                        $cs->registerScript(
                        		__CLASS__.'#chartnvd3',
                        		"addGraph('chartnvd3',".CJSON::encode(array (
                        				array (
                        						"key" => "Fitness",
                        						"bar"=>"true",
                        						"values" => $newFitnessData,
												"color" => "#2ECC71"
                        				),
                        				array (
                        						"key" => "Volume",
                        						"values" => $newVolumeData,
												"color" => "#3498DB"
                        				)
                        		)).");"
                        );
                        $invoiceItemsDataProvider = new CArrayDataProvider ($dataprovider);
                        ?>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="row ">
        <div class="col-md-12">
            <div class="panel panel-archon">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Stats
                    </h3>

                </div>
                <div class="panel-body scroll-active">
                    <?php
                    $this->widget('bootstrap.widgets.BsGridView', array(
                        'id' => 'overallstats-grid',
                        'dataProvider' => $invoiceItemsDataProvider,
                        'type' => BsHtml::GRID_TYPE_STRIPED,
                        'columns' => $columns
                    ));

                    ?>
                </div>

            </div>
        </div>
    </div>
<?php } ?>




