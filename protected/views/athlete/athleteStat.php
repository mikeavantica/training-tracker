<?php
$dateschbars = array();
$fitness = array();
$volume = array();
$dataprovider = array();

$cont = 0;
foreach ($athlete_stats ["WOD"] as $wod) {

    $cont++;
    $dateschbars [] = date("n/j/Y", strtotime($wod ['date']));
}
//only unique dates
$average_volume = 0;
$average_fitness = 0;
$average_maxsquat = 0;
$average_deadlift = 0;
$average_maxpress = 0;
$dateschbars = array_unique($dateschbars);
foreach ($athlete_stats ["WOD"] as $wod) {
    $average_volume = $average_volume + $wod ['volume'];
    $average_fitness = $average_fitness + $wod ['fitness'];

    $clave = array_search(date("n/j/Y", strtotime($wod ['date'])), $dateschbars);
    if (!isset ($fitness [$clave])) { // verified if exist
        //
        $fitness [$clave] = $wod ['fitness'];
        $volume [$clave] = $wod ['volume'];
    } else {
        $fitness [$clave] = $fitness [$clave] + $wod ['fitness'];
        $volume [$clave] = $wod ['volume'] + $volume [$clave];
    }
} //we save fitness and values and their dates

if ($cont > 0) {
    $average_volume = $average_volume / $cont;
    $average_fitness = $average_fitness / $cont;

} else {
    $average_volume = 0;
    $average_fitness = 0;

}
$rowid = 1; // primary key for my dataprovider

$exermes = array();
foreach ($athlete_stats ['WOD'] as $exerciseswod) {

    $row = array();


    $row ['id'] = $rowid;
    $row ['Workout'] = $exerciseswod ['name'];
    $row ['Type'] = $exerciseswod ['type'];
    if($exerciseswod['type'] == 'ForReps'){
    	$row ['Time'] = date ('i:s',strtotime($exerciseswod['value']));
    }
    else{
    	$row['Quantity'] = $exerciseswod['value'];
    }
    
    //$row ['Value'] = $exerciseswod ['value'];
    $row ['Date'] = date("n/j/Y", strtotime($exerciseswod['date']));
    $row ['Volume'] = number_format($exerciseswod ['volume'], 2);
    $row ['Fitness'] = number_format($exerciseswod ['fitness'], 2);

    $exe = 1; // number of exercises
    $measures = 1; // number of measures
    foreach ($exerciseswod ['exercises'] as $exercise) {

        $row ['Exercise' . $exe] = $exercise ['name'];
        $exermes['Exercise' . $exe] = 'Exercise' . $exe;
        foreach ($exercise ['prop'] as $measure) {
            $row ['Measure' . $measures] = $measure ['type'];
                     if($measure['type'] == 'Time'){
                    	$row ['Value'.$measures] = date ('i:s',strtotime($measure['value']));
                    }else{
                    $row ['Value' . $measures] = $measure ['value'];
                    }
            $exermes['Measure' . $measures] = 'Measure' . $measures;
            $exermes['Value' . $measures] = 'Value' . $measures;
            $measures++;
        } // end of foreach measures
        $exe++;
        
    } // end of foreach exercises
    if ($row ['Volume'] != number_format(0, 2) && $row ['Fitness'] != number_format(0, 2)) {
        $dataprovider [$rowid] = $row;
    }
    $rowid++;
} // end of foreach workouts
$columns = array();
$columns [] = 'Date';
$columns [] = array('name'=>'Workout','header'=> 'Workout Name','headerHtmlOptions'=>array('class'=>'tbllongname'));
$columns [] = 'Type';
$columns [] = 'Volume';
$columns [] = 'Fitness';
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



$invoiceItemsDataProvider = new CArrayDataProvider ($dataprovider);

?>
<div class="row">
    <div class="col-mod-12">
        <?php
        $this->widget('bootstrap.widgets.BsBreadcrumb', array(
            'links' => array(
                $athlete_stats['athlete_name'] => array(
                    'Athlete/admin'
                ),
                'Stats'
            )
        ));
        ?>

    </div>
</div>
<h2 class="page-header">Stats for: <?php echo $athlete_stats['athlete_name']; ?></h2>
<div class="row">
    <div class="col-mod-12"></div>
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
                <span class="description">Average Volume</span>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="web-stats danger">
            <div class="pull-left">
                <h5><?php echo number_format($athlete_stats["max_squat"], 2); ?> </h5>
                <span class="description">Average Squat</span>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="web-stats danger">
            <div class="pull-left">
                <h5><?php echo number_format($athlete_stats["max_press"], 2); ?> </h5>
                <span class="description">Average Deadlift</span>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="web-stats danger">
            <div class="pull-left">
                <h5><?php echo number_format($athlete_stats["max_deadlift"], 2); ?> </h5>
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
                <div id="chartAthlete" class="with-3d-shadow with-transitions">
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
                    		__CLASS__.'#chartAthlete',
                    		"addGraph('chartAthlete',".CJSON::encode(array (
                    				array (
                    						"key" => "Fitness",
                    						"bar"=>"true",
                    						"values" => $newFitnessData,
											"color" => "#2ECC71",
											"max" => max($fitness)
                    				),
                    				array (
                    						"key" => "Volume",
                    						"values" => $newVolumeData,
											"color" => "#3498DB",
											"max" => max($volume)
                    				)
                    		)).");"
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-archon">
            <div class="panel-heading">
                <h3 class="panel-title">Stats</h3>

            </div>
            <div class="panel-body scroll-active">
                <?php

                $this->widget('bootstrap.widgets.BsGridView', array(
                    'id' => 'overallstats-grid',
                    'type' => BsHtml::GRID_TYPE_STRIPED,
                    'dataProvider' => $invoiceItemsDataProvider,
                    'columns' => $columns
                ));

                ?>
            </div>

        </div>
    </div>
</div>





