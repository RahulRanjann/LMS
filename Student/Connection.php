<?php
    function Opencon(){
        $dbhost= "localhost";
        $dbuser= "root";
        $password="";
        $db= "lms";

        $conn=new mysqli($dbhost,$dbuser,$password,$db) or die("Connection fail!");
        return $conn; }
        
    function closeconn($conn){
        $conn -> close();

    }
?>