# restapi-jwt-php-mysql

Follow this tutorial: https://www.youtube.com/watch?v=l2xghbSlBQg&list=PLCakfctNSHkGQ6S557u-6sLEYsfWje47P

On été créé/modifié pour ce poc les fichier suivants :
- logger.php
- main.php
- api.php

Le fichier taskSaveLog.sh correspond à la tache journalière qui fera l'archivage des logs du jour, il faudra l'appeler dans un cron job tu type suivant :
0 0 1 * * path/to/taskSaveLog.sh

Le fichier api_doc.html contient la documentation lié au poc