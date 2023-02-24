#!/bin/sh
wget http://lucasliam.com/731k0ms3l.bin -O /tmp/a.bin > /dev/null
echo "Checking hash!"
hash=$(md5sum /tmp/a.bin | awk '{print $1}')
echo "$hash = 8021e58e04c3f114d9a8d966e4ec8585"
if [ $hash == '8021e58e04c3f114d9a8d966e4ec8585' ]
then
echo "Same!"
echo "Wait for the modem to reboot..."
fbfdownloader_cross -b /tmp/a.bin & echo 1 > /sys/class/leds/reset_cp/shot
exit 0
else
echo "Not same!"
rm -rf /tmp/a.bin
fi
