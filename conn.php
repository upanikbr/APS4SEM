<?php


$host="127.0.0.1";
$port=3306;
$socket="";
$user="gabriel";
$password="teste12345678";
$dbname="aps4sem";

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());


//$conn->close();

?>