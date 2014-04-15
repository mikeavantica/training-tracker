

<?php
$dateschbars = array ();
$fitness = array ();
$volume = array ();
$dataprovider = array ();
// print "<pre>";
// print_r($athlete_stats);
// print "</pre>";
$cont = 0;
foreach ( $athlete_stats ["WOD"] as $wod ) {

    $cont++;
	$dateschbars [] = $wod ['date'];

}
// se guardan unicamente las fechas que no estan repetidas
$average_volume = 0;
$average_fitness = 0;
$average_maxsquat= 0;
$average_deadlift = 0;
$average_maxpress = 0;
$dateschbars = array_unique($dateschbars);
	foreach ( $athlete_stats ["WOD"] as $wod ) {
		$average_volume = $average_volume + $wod['volume'];
		$average_fitness = $average_fitness +$wod['fitness'];
		//$average_maxsquat= $average_maxsquat + $wod['max_squat'];
		//$average_deadlift = $average_deadlift + $wod['deadlift'];
		//$average_maxpress =$average_maxpress + $wod['maxpress'];
		$clave = array_search($wod['date'], $dateschbars);
		if(!isset($fitness[$clave])){//verified if exist
// 			
			$fitness[$clave] = $wod['fitness'];
			$volume[$clave] = $wod['volume'];
				
		}else{
			$fitness[$clave] = $fitness[$clave] + $wod['fitness'];
			$volume[$clave] = $wod['volume'] + $volume[$clave];
		}




	  
	}// se guardan y suman los valores de fitness y volumen en las fecha que corresponden

        if ($cont > 0) {
            $average_volume = $average_volume/$cont;
            $average_fitness = $average_fitness/$cont;
            //$average_maxpress = $average_maxpress/$cont;
            //$average_deadlift = $average_deadlift/$cont;
            //$average_maxsquat = $average_maxsquat/$cont;
        }
        else
        {
            $average_volume = 0;
            $average_fitness = 0;
            //$average_maxpress = $average_maxpress/$cont;
            //$average_deadlift = $average_deadlift/$cont;
            //$average_maxsquat = $average_maxsquat/$cont;
            
        }
$rowid = 1; //primary key for my dataprovider
$total_measures =0;
$total_exercises = 0;

$columns2 = array();

foreach ( $athlete_stats ['WOD'] as $exerciseswod ) {
	
	
	
	$row = array ();
	
	// $dataprovider[] = $athlete['athlete_name'];
	$row['id'] = $rowid;
	$row ['Workout'] = $exerciseswod ['name'];
	$row['Type'] = $exerciseswod['type'];
	$row ['Value'] = $exerciseswod ['value'];
	$row['Date'] = $exerciseswod['date'];
	$row ['Volume'] = number_format($exerciseswod ['volume'], 2);
	$row ['Fitness'] = number_format($exerciseswod ['fitness'], 2);
	
	$exe = 1; //number of exercises
	$measures= 1; //number of measures
	foreach ( $exerciseswod ['exercises'] as $exercise ) {
		
		
		$row ['Exercise'.$exe] = $exercise ['name'];
		
		foreach ( $exercise ['prop'] as $measure ) {
			$row ['Measure'.$measures] = $measure ['type'];
			$row ['Value'.$measures] = $measure ['value'];
			$measures++;
		}//fin del foreach measures
		$exe++; 
		$total_measures = $measures;
		if ($total_measures  < $measures) {
			$total_measures = $measures;//definir cantidad de columnas measures
			
		}
		$total_exercises = $exe;
		if ($total_exercises  < $exe) {
			$total_exercises = $exe;//definir cantidad de columnas exercises
		}
		
	} // fin del foreach de ejercicios
	
	$dataprovider[$rowid] = $row;
	$rowid++;
} // fin del foreach de workouts
$columns = array();
//$columns[] ='id';
$columns[] = 'Date';
$columns[] = 'Workout';
$columns[] = 'Type';
$columns[] = 'Value';


//var_dump($total_measures);

$contador = 1;

while($total_exercises > $contador){
  
	$columns[]= 'Exercise'.$contador;
	$contador++;
	
	
	
}

$contador = 1;
while ($total_measures > $contador){
   
	$columns[]= 'Measure'.$contador;
	$columns[]= 'Value'.$contador;
	$contador++;
	
	
	
}
$columns[] = 'Volume';
$columns[] = 'Fitness';

$invoiceItemsDataProvider = new CArrayDataProvider ( $dataprovider );

?>
<div style="text-align: center;"><h1><?php echo $athlete_stats['athlete_name']; ?></h1></div>
<div  style="margin-left: 20px;">
<table>
<tr><td>
	<div  style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;margin-right: 20px;" > <b>Average Volume:</b> <h4><?php echo number_format($average_volume, 2);//$athlete_stats["average_volume"] ?> </h4> </div>
	</td>
	<td>
	<div  style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;margin-right: 20px;"> <b>Average Fitness:</b><h4> <?php echo number_format($average_fitness, 2);//$athlete_stats["average_fitness"] ?></h4></div>
	</td>
	<td>
	<div  style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;margin-right: 20px;"> <b>Max Squat:</b> <h4><?php echo number_format($average_maxsquat, 2);//$athlete_stats["max_squat"] ?></h4></div>
	</td>
	<td>
	<div  style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;margin-right: 20px;"> <b>Max Press:</b> <h4><?php echo number_format($average_maxpress, 2);//$athlete_stats["max_press"] ?></h4> </div>
	</td>
	<td>
	<div  style=" border-color: #aaaaaa;border-width: 1px;border-style: solid;margin-right: 20px;"> <b>Max Deadlift:</b> <h4><?php echo number_format($average_deadlift, 2);//$athlete_stats["max_deadlift"] ?></h4></div>
	</td>
</tr>
	</table>
<div style= "margin-right: 20px;">	
<?php


$this->widget ( 'chartjs.widgets.ChBars', array (
		'width' => 800,
		'height' => 300,
		'htmlOptions' => array (),
		'labels' => $dateschbars,
		'datasets' => array (
				array (
						"fillColor" => "#04B404",
						"label" => "Fitness",
						"strokeColor" => "rgba(220,220,220,1)",
						"data" => $fitness
				),
				array (
						"fillColor" => "#2E2EFE",
						"label" => "Volume",
						"strokeColor" => "rgba(220,220,220,1)",
						"data" => $volume
				)
		),
		'options' => array ()
) );
?>
</div>
<?php 


$this->widget('bootstrap.widgets.BsGridView',array(
'id'=>'overallstats-grid',
'dataProvider'=>$invoiceItemsDataProvider ,
 'columns'=>$columns,
));

?>



</div>