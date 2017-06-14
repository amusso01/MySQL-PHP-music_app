<?php
//create myDb class extend mysqli
class myDb extends mysqli
{
    private $songNumber;
    private $artistNumber;


    public function __construct($host, $username, $passwd, $dbname)
    {
        //call parent constructor
        parent:: __construct($host, $username, $passwd, $dbname);
    }

//    public function songInDatabase($sql){
//
//    }
}
?>
