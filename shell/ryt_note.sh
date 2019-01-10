#
# ryt表和travel_note表整合
#!/usr/bin/env bash
time=`date +%s`
curl http://www.youxingji.cn/api/ryt/insert_pub_ryt/code/{$time}