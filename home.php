<!DOCTYPE HTML>
<html>
<head>

</head>
<body>
Dashboard - <a href = "home.php">Home</a> <a href="perf.php">Performance Statistics</a> <a href="cpuinfo.php">CPU Usage</a> <a href="meminfo.php">Memory Usage</a>
<h1><center>Welcome to the Dashboard</center></h1>

<?php


$file = fopen("/home/ubuntu/cloud-bench/config","r");
while(! feof($file))
  {
        echo fgets($file);
  }

fclose($file);
?>


</body>
</html>
