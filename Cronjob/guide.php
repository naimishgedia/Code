<?php
--> cronjob exicutes some files to some specific time period which we have set in Cpanel
--> make one file in root directory and cronjob will run that file at perticular time period
 
-->to add cronjob
go to > cronjobs in cpanel 

   
COMMON SETTINGS: 
set time,and file will run at that time.
command : /usr/local/bin/php /home/impexetb/public_html/n/bulkmail/cron.php //your file path will come here  


try this command
php -q /home/impexetb/public_html/n/blossom/securesubadmin/myorders/cron.php