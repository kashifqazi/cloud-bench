<?php
$file = fopen("/home/ubuntu/Benchmarking/cloud-bench/Host4","r");

$dataPoints = [];
while(! feof($file))
  {
  array_push($dataPoints, array("y" => floatval(fgets($file))*100, "label" => "123"));
  }

fclose($file);
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
        title: {
                text: "Overall Expected Load"
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
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   
