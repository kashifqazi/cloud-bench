<?php


$file = fopen("/home/ubuntu/cloud-bench/logs","r");
$file3 = fopen("/home/ubuntu/cloud-bench/config", "r");
$host = explode(":",fgets($file3))[1];
$mem = explode(":",fgets($file3))[1];
$scale = explode(":",fgets($file3))[1];
fclose($file3);

$file2 = fopen("/home/ubuntu/cloud-bench/traces/" . substr($host,0,-1),"r");

$timeunit = $scale/5;

$dataPoints = [];
$counter = 0;
$runcpu = 0;
$headers = 0;
$countit = 0;
while(! feof($file))
  {
  if ($headers < 3){
        fgets($file);
        $headers = $headers + 1;
        continue;
  }
  $runcpu = $runcpu + floatval(explode(",", fgets($file))[0]);
  if ($counter < ($timeunit-1)){
        $counter = $counter + 1;
  }
  else{
        $counter = 0;
        array_push($dataPoints, array("y" => ($runcpu/$timeunit), "label" => $countit));
	$countit = $countit + 1;
        $runcpu = 0;
  }
  }

fclose($file);

$countit = 0;
$dataPoints2 = [];
while(! feof($file2))
  {
  array_push($dataPoints2, array("y" => floatval(explode(",",fgets($file2))[1]), "label" => $countit));
  $countit = $countit + 1;
  }

fclose($file2);

$counter = count($dataPoints2) - count($dataPoints);
for ($i = 1; $i <= $counter; $i++) {
    array_push($dataPoints, array("y" => 0, "label" => ""));
}

?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="menu.css">

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Actual Historical Load"
	},
	axisY: {
		title: "Load"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});


chart.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
        title: {
                text: "Expected Overall Load"
        },
        axisY: {
                title: "Load"
        },
        data: [{
                type: "line",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        }]
});


chart2.render()

}
</script>
</head>
<body>
<div class="header">
  <h1>Cloudy</h1>
  <p>The cloud workload modeling tool &copy Kashifuddin Qazi (kqazi01@manhattan.edu)</p>
</div>

<div class="topnav">
  <a href="home.php">Home</a>
  <a href="perf.php">Performance Stats</a>
  <a class="active" href="cpuinfo.php">CPU Usage</a>
  <a href="meminfo.php">Mem Usage</a>
  <a href="tracechar.php">Trace Characteristics</a>
</div>

<h1><center>CPU Usage of Host</center></h1>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   
