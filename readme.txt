W1 Music--Web app to display song and artist in a database
--------------------------------------------------------------
Author: Andrea Musso (musso.a@icloud.com) 16-6-2017

Before deploying

1. Change values defined in includes/config.inc.php to match your environment
    1.1. $FILE_ROOT to match the root URL;
    1.2. database setting to match your db;
    1.3. language supported english->'en'  and Italian->'it'

2. The folder install contains the SQL file to recreate the database, file name 'w1tma_tables.sql'
    2.1. remove the file when deploying application to a server

3. Give the user read/write/execute permissions to the project directory



NOTE: layout has been done with latest flexbox technique might not render properly in old browser