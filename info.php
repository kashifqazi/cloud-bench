<?php
$file = fopen("/home/ubuntu/Benchmarking/cloud-bench/cleanlogs","r");
$file2 = fopen("/home/ubuntu/Benchmarking/cloud-bench/Host4","r");

$dataPoints = [];
while(! feof($file))
  {
  array_push($dataPoints, array("y" => floatval(fgets($file)), "label" => "123"));
  }

fclose($file);

$dataPoints2 = [];
while(! feof($file2))
  {
  array_push($dataPoints2, array("y" => floatval(fgets($file2))*100, "label" => "123"));
  }

fclose($file2);

$counter = count($dataPoints2) - count($dataPoints);
echo $counter;
for ($i = 1; $i <= $counter; $i++) {
    array_push($dataPoints, array("y" => 0, "label" => "123"));
}

?>

<!DOCTYPE HTML>
<html>
<head>
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
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   
