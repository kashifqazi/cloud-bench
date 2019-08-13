<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="menu.css">

</head>
<body>

<div class="header">
  <h1>Cloudy</h1>
  <p>The cloud workload modeling tool &copy Kashifuddin Qazi (kqazi01@manhattan.edu)</p>
</div>

<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="perf.php">Performance Stats</a>
  <a href="cpuinfo.php">CPU Usage</a>
  <a href="meminfo.php">Mem Usage</a>
  <a href="tracechar.php">Trace Characteristics</a>
</div>

<h1><center>Welcome to the Dashboard</center></h1>


<table style=margin-left:auto;margin-right:auto>
<font size=4>

<?php
  $fh = fopen('/proc/meminfo','r');
  $mem = 0;
  while ($line = fgets($fh)) {
    $pieces = array();
    if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
      $mem = $pieces[1];
      break;
    }
  }
  fclose($fh);

echo "<center>";
echo "<h1>";
$file = fopen("/home/ubuntu/cloud-bench/config","r");

echo "<tr><td>Workload Running</td><td>: ";
echo explode(":",fgets($file))[1];
echo "</td></tr>";
echo "<tr><td>Maximum Memory to be Used</td><td>: ";
echo explode(":",fgets($file))[1];
echo " GB</td></tr>";
echo "<tr><td>Period</td><td>: ";
echo explode(":",fgets($file))[1];
echo " seconds</td></tr>";
echo "<tr><td>Total RAM</td><td>: ";
echo $mem;
echo" KB</td></tr>";
fclose($file);
$file = fopen("/home/ubuntu/cloud-bench/aggr","r");

echo "<tr><td>Max CPU, Memory</td><td>: ";
echo fgets($file);
echo "</td></tr>";
echo "<tr><td>Min CPU, Memory</td><td>: ";
echo fgets($file);
echo "</td></tr>";
echo "<tr><td>Mean CPU, Memory</td><td>: ";
echo fgets($file);
echo "</td></tr>";
echo "<tr><td>Median CPU, Memory</td><td>: ";
echo fgets($file);
echo"</td></tr>";
echo "<tr><td>Std. Dev. CPU, Memory</td><td>: ";
echo fgets($file);
echo"</td></tr>";
fclose($file);
echo "</center>";
echo "</h1>";
?>
</font>
</table>

</body>
</html>
