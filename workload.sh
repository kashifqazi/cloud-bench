#!/bin/bash
input="Host4"
count=0
while IFS= read -r line
do
  result=$(bc -l <<<"${line}*100")
  echo "$result"

  count=`expr $count + 1`
  if [ $count -ge 800 ]
  then
    break
  fi
  eval "sudo cpulimit -i -l $result stress-ng --memcpy 1 -t 10 --times --metrics-brief --perf --log-file stats"

done < "$input"

