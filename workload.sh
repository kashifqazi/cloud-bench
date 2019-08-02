#!/bin/bash
input="Host0"
while IFS= read -r line
do
  result=$(bc -l <<<"${line}*100")
  echo "$result"
  #$line=$(($line*100))
  #eval "cpulimit -l $result mbw 1024 -n 100 &"
  #pid=$!
  #sleep 30s
  #eval "kill -9 $pid"

  eval "sudo cpulimit -i -l $result stress-ng --memcpy 1 -t 30 -v --times --metrics-brief --perf"
 
done < "$input"

