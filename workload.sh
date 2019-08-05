#!/bin/bash
input="Host4"
count=0
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
  eval "sudo cpulimit -i -l $result stress-ng/stress-ng --memcpy 1 -t 300 --times --metrics-brief --perf --log-brief >> stats"
  echo "\n" >> stats
  #cat stats >> statscomplete
done < "$input"

