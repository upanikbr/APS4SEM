<?php

function conn(){
    $host="aurorahorizon.ddns.net";
    $port=3306;
    $socket="";
    $user="gabriel";
    $password="teste12345678";
    $dbname="aps4sem";
    $conn = new mysqli($host, $user, $password, $dbname, $port, $socket);
        if (!$conn) {
            die('Não foi possível conectar: ' );            
        }   
return $conn;
}
//$conn->close();
?>