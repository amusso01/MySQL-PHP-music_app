<?php

// Require necessary files
require_once'includes/config.php';
include 'includes/functions.php';

//instantiate the myDb class and GET the view to display
require_once 'includes/dbConnect.php';
//main variable
$content='';
$navigation='';

// Include the head
include('includes/head.php');

//find artist and song in database
$dbNumber=selectQuery('artist', $mysqli);
$mysqli->setArtist($dbNumber);
$dbNumber=selectQuery('song', $mysqli);
$mysqli->setSong($dbNumber);




//language
require_once 'lang/'.$config['lang'].'.php';

//check which view to display
include url($view);

// Include the footer
include('includes/footer.php');
//close connection
$mysqli->close();
?>
