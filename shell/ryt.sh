#!/usr/bin/env bash
time=`date +%s`
curl http://www.youxingji.cn/api/ryt/settime/code/{$time}
