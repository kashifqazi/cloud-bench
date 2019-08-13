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
  <a href="home.php">Home</a>
  <a href="perf.php">Performance Stats</a>
  <a href="cpuinfo.php">CPU Usage</a>
  <a href="meminfo.php">Mem Usage</a>
  <a class="active" href="tracechar.php">Trace Characteristics</a>
</div>

<h1><center>Trace Characteristics</center></h1>


<table style=margin-left:auto;margin-right:auto>

<center>
<tr><td> CPU Decomposition </td><td>Memory Decomposition</td></tr>
<tr><td><img width = "400" src = "decompcpu.png"></img></td>
<td><img width = "400" src = "decompmem.png"></img></td></tr>
<tr><td> CPU Autocorrelation </td><td>Memory Autocorrelation</td></tr>
<tr><td><img width = "400" src = "autocorcpu.png"></img></td>
<td><img width = "400" src = "autocormem.png"></img></td></tr>
</center>
</table>
</body>
</html>
