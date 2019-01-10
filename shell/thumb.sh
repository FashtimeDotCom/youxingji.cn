#
#Linux压缩，暂时没有用到
#本地是跑不了的，mac不支持这个时间格式,Linux服务器才可以
#
#!/usr/bin/env bash

if [ ! -n "$1" ] ;then
    #如果是定时任务就会跑这一步，执行压缩前一天的图片
    before_date=`date  +"%Y%m%d" -d  "-1 days"`
else
    #如果是特殊情况，认为执行某一天就 ./thumbfile 20181204这样格式
    before_date=$1
fi

#folderPath1=/www/wwwroot/youxingji.cn/uploadfile/image/ #图片目录路径

folderPath=/www/wwwroot/youxingji.cn/uploadfile/image/${before_date}/
#config
maxSize='600k'  #触发压缩的图片大小
maxWidth=1280  # 图片最大宽度
maxHeight=1280 # 图片最大高度
quality=85  #图片质量

# 压缩处理
# Param $folderPath 图片目录
function compress(){

  folderPath=$1

  if [ -d "$folderPath" ]; then

    for file in $(find "$folderPath" \( -name "*.jpg" -or -name "*.gif" -or -name "*.png" -or -name "*.jpeg" \) -type f -size +"$maxSize" ); do

#      echo $file >>thumb_log.txt 2>&1

      # 调用imagemagick resize图片
      $(convert -resize "$maxWidth"x"$maxHeight" "$file" -quality "$quality" -colorspace sRGB "$file")

    done

  else
    echo "$folderPath not exists"
  fi
}

# 执行compress
compress "$folderPath"


#for filename in `ls ${folderPath1}`
#do
##    echo $path
#    echo "*******************${filename}*****************************" >>thumb_log.txt 2>&1
#    compress ${folderPath1}${filename}
#    echo "**********end*******"  >>thumb_log.txt 2>&1
#done;


exit 0



