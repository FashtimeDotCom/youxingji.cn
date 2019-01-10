#
#定时任务，定时更新后台发布的日月潭（游记）
#
#!/usr/bin/env bash
time=`date +%s`
curl http://www.youxingji.cn/api/ryt/settime/code/{$time}
