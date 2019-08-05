<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="menu.css">

</head>
<body>
<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="perf.php">Performance Stats</a>
  <a href="cpuinfo.php">CPU Usage</a>
  <a href="meminfo.php">Mem Usage</a>
</div>

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
