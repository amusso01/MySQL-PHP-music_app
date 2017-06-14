<?php

// Require necessary files
require_once'includes/config.php';
include 'includes/functions.php';
require_once 'lang/'.$config['lang'].'.php';

//instantiate the myDb class and GET the view to display
require_once 'includes/dbConnect.php';
//main variable
$content='';
$navigation='';

// Include the head
include('includes/head.php');

//check which view to display
include url($view);




// Include the footer
include('includes/footer.php');
//close connection
$mysqli->close();
?>
