#!/bin/bash
input="Host4"
count=0
atopsar -c 5 1500 > logs &
while IFS= read -r line
do
  result=$(bc -l <<<"${line}*100")
  echo "$result"

  count=`expr $count + 1`
  if [ $count -ge 10 ]
  then
    break
  fi
  eval "sudo cpulimit -i -l $result stress-ng --memcpy 1 -t 10 --times --metrics-brief --perf --log-file stats"
  cat stats >> statscomplete
done < "$input"

