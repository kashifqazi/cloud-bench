<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="menu.css">

<script>
</script>
</head>
<body>

<div class="header">
  <h1>Cloudy</h1>
  <p>The cloud workload modeling tool &copy Kashifuddin Qazi (kqazi01@manhattan.edu)</p>
</div>

<div class="topnav">
  <a href="home.php">Home</a>
  <a class="active" href="perf.php">Performance Stats</a>
  <a href="cpuinfo.php">CPU Usage</a>
  <a href="meminfo.php">Mem Usage</a>
  <a href="tracechar.php">Trace Characteristics</a>
</div>

<h1><center>Performance Statistics of Host</center></h1>


<?php


$file = fopen("/home/ubuntu/cloud-bench/stats","r");

$dataPoints = [];
$counter = 0;
$runcpu = 0;
$headers = 0;
$countit = 0;

echo "<table border=\"1\">";

echo "<tr><th>CPU Cycles</th>	<th>Instructions</th>	<th>Branch Instructions</th>	<th>Branch Misses</th>	<th>Bus Cycles</th>	<th>Total Cycles</th>	<th>Cache References</th>	<th>Cache Misses</th>	<th>Cache L1D Read</th>	<th>Cache L1D Read Miss</th>	<th>Cache L1D Write</th>	<th>Cache L1I Read Miss</th>	<th>Cache LL Read</th>	<th>Cache LL Read Miss</th>	<th>Cache LL Write</th>	<th>Cache LL Write Miss</th>	<th>Cache DTLB Read</th>	<th>Cache DTLB Read Miss</th>	<th>Cache DTLB Write</th>	<th>Cache DTLB Write Miss</th>	<th>Cache ITLB Read</th>	<th>Cache ITLB Read Miss</th>	<th>Cache BPU Read</th>	<th>Cache BPU Read Miss</th>	<th>Cache NODE Read</th>	<th>Cache NODE Read Miss</th>	<th>Cache NODE Write</th>	<th>Cache NODE Write Miss</th>	<th>CPU Clock</th>	<th>Task Clock</th>	<th>Page Faults Total</th>	<th>Page Faults Minor</th>	<th>Page Faults Major</th>	<th>Context Switches</th>	<th>CPU Migrations</th>	<th>Alignment Faults</th>	<th>Emulation Faults</th>	<th>Page Faults User</th>	<th>Page Faults Kernel</th>	<th>System Call Enter</th>	<th>System Call Exit</th>	<th>TLB Flushes</th>	<th>Kmalloc</th>	<th>Kmalloc Node</th>	<th>Kfree</th>	<th>Kmem Cache Alloc</th>	<th>Kmem Cache Alloc Node</th>	<th>Kmem Cache Free</th>	<th>MM Page Alloc</th>	<th>MM Page Free</th>	<th>RCU Utilization</th>	<th>Sched Migrate Task</th>	<th>Sched Move NUMA</th>	<th>Sched Wakeup</th>	<th>Sched Proc Exec</th>	<th>Sched Proc Exit</th>	<th>Sched Proc Fork</th>	<th>Sched Proc Free</th>	<th>Sched Proc Hang</th>	<th>Sched Proc Wait</th>	<th>Sched Switch</th>	<th>Signal Generate</th>	<th>Signal Deliver</th>	<th>IRQ Entry</th>	<th>IRQ Exit</th>	<th>Soft IRQ Entry</th>	<th>Soft IRQ Exit</th>	<th>Writeback Dirty Inode</th>	<th>Writeback Dirty Page</th>	<th>Migrate MM Pages</th>	<th>SKB Consume</th>	<th>SKB Kfree</th>	<th>IOMMU IO Page Fault</th>	<th>IOMMU Map</th>	<th>IOMMU Unmap</th>	<th>Filemap page-cache add</th>	<th>Filemap page-cache del</th>	<th>OOM Compact Retry</th>	<th>OOM Wake Reaper</th>	<th>Thermal Zone Trip</th></tr>";

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
