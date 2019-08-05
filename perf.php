<!DOCTYPE HTML>
<html>
<head>
<script>
</script>
</head>
<body>
Dashboard - <a href = "home.php">Home</a> <a href="perf.php">Performance Statistics</a> <a href="cpuinfo.php">CPU Usage</a> <a href="meminfo.php">Memory Usage</a>
<h1><center>Performance Statistics of Host</center></h1>


<?php


$file = fopen("/home/ubuntu/cloud-bench/stats","r");

$dataPoints = [];
$counter = 0;
$runcpu = 0;
$headers = 0;
$countit = 0;

echo "<table border=\"1\">";

echo "<tr><th>CPU Cycles</th><th>Instructions</th><th>Branch Instructions</th><th>Branch Misses</th>    <th>Bus Cycles</th>     <th>Total Cycles</th>   <th>Cache References</th>       <th>Cache Misses</th>   <t$

while(! feof($file)){
  $data = explode(",", fgets($file));
  echo "<tr>";
  foreach ($data as &$val){
        echo "<td>$val</td>";

  }
  echo "</tr>";
  }
echo "</table>";

fclose($file);

?>



</body>
</html>
