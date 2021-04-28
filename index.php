<?php
    include("conn.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $path = $_POST['path'];
        var_dump($path);
        if($path=="login"){

            echo login();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // collect value of input field
        $path = $_GET['path'];
        if (empty($path)) {
        echo "path is empty";
        } else {
        echo $path;
        }
    }



        function login(){
            $conn =  mysqli_connect("aurorahorizon.ddns.net:3306", "gabriel", "teste12345678", "aps4sem");
            $sql = "SELECT ID_USUARIO, NOME, APELIDO, DATA_NASC, SENHA, LOGIN, EMAIL FROM usuario";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo $row["NOME"]. $row["APELIDO"]. " " . $row["DATA_NASC"]."<br>";
                $arr = array($row["NOME"] => 1, $row["APELIDO"] => 2, $row["DATA_NASC"] => 3);
                echo json_encode($arr, JSON_UNESCAPED_UNICODE);
            }
         }


?>