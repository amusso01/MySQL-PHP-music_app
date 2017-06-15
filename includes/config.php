<?php
// Set a document root URL. May be useful depending how URLs are served.
$FILE_ROOT = 'C:/wamp64/www/phpWebApp/TMA2/';

// Set the media URL (where the media files will be...css, images, js etc)
$MEDIA_URL = $FILE_ROOT.'media/';

// Set the template directory URL (useful if directory structure changes)
$TEMPLATE_URL = $FILE_ROOT.'templates/';

//general setting
date_default_timezone_set('Europe/London');
$config['lang']='en';
// database settings
$config['db_user'] = 'amusso01';
$config['db_pass'] = 'bbkmysql';
$config['db_host'] = 'localhost';
$config['db_name'] = 'bbkdb';


//SQL query
$artist_songNumber="SELECT artist.name AS Artist,COUNT(song.title) AS Songs
FROM artist
RIGHT JOIN song ON artist.id=song.artist_id
GROUP BY artist.name
ORDER BY artist.name ASC";
$song_artist_duration="SELECT  artist.name AS Artist,song.title AS Title, TIME_FORMAT(SEC_TO_TIME(song.duration),'%i:%s') AS Duration
FROM artist
INNER JOIN song ON artist.id = song.artist_id
ORDER BY artist.name, song.title ASC";