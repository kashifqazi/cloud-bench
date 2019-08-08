#!/bin/bash
input="traces/"$1
mem=$2
scale=$3
count=0
echo "Host:$1" > config
echo "Mem:$2" >> config
echo "Scale:$3" >> config

atop/atopsar -c -m 5 150000 > logs &
while IFS= read -r line
do
  cpu=$(echo $line | cut -d"," -f2)
  me=$(echo $line | cut -d"," -f3)

  #cpu=$(bc -l <<<"${cp}*100")
  #mem=$(bc -l <<<"${me}*100")
  echo "$cpu"
  echo "$me"
  #count=`expr $count + 1`
  #if [ $count -ge 2 ]
  #then
  #  break
  #fi
  memory=$(bc -l <<<"${me}*${mem}*1024*1024*1024/100")
  unit="b"
  eval "sudo cpulimit -i -l $cpu stress-ng/stress-ng --vm 1 --vm-bytes $memory$unit -t $scale --times --metrics-brief --perf --log-brief >> stats"
  echo "\n" >> stats
  #cat stats >> statscomplete
done < "$input"

