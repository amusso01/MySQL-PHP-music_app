<?php
$mysqli= new myDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);
 //Check connection status
if( $mysqli->connect_errno ){
    exit( 'Connection Error: '.$mysqli->connect_error);
}
//check view to display
if (!isset($_GET['page'])){
    $view='home';
}else{
    $view=$_GET['page'];
}
