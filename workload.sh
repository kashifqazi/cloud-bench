#!/bin/bash
input=$1
mem=$2
scale=$3
count=0
echo "Host:$1" > config
echo "Mem:$2" >> config
echo "Scale:$3" >> config

atop/atopsar -c -m 5 15000 > logs &
while IFS= read -r line
do
  result=$(bc -l <<<"${line}*100")
  echo "$result"

  count=`expr $count + 1`
  if [ $count -ge 800 ]
  then
    break
  fi
  memory=`expr $result*1024*1024*1024*mem/100`
  unit="b"
  eval "sudo cpulimit -i -l $result stress-ng/stress-ng --vm 1 --vm-bytes $memory$unit -t $scale --times --metrics-brief --perf --log-brief >> stats"
  #echo "\n" >> stats
  #cat stats >> statscomplete
done < "$input"

