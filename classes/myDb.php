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
    //setter
    public function setSong($songNumber){
        $this->songNumber=$songNumber;
    }
    public function setArtist($artistNumber){
        $this->artistNumber=$artistNumber;
    }
    //getter
    public function getSong(){
        return $this->songNumber;
    }
    public function getArtist(){
        return $this->artistNumber;
    }
}
?>
