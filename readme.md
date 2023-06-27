## NOTE

#!/bin/bash
HOST=zxyxy.net
USER=zxyxynet
PASSWORD=3oR37v3Hho

lftp -u $USER,$PASSWORD $HOST << EOF
set ssl:verify-certificate false
cd www
mrm -r api
mkdir api
cd api
EOF
