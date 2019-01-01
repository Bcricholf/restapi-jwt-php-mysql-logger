#!/bin/bash
cd C:/wamp64/logs
#path/where/logs/are

filename='php_error.log'
date=$(date +"%Y-%m-%d_%Hh%M");
archiveName='log-archive-'$date'.zip'
zip -r $archiveName $filename

#mv archiveName /path/to/folder/for/archive/
truncate -s 0 $filename