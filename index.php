<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $path = $_POST['path'];
        if($path=="login"){
            echo login();
        }else{
            echo 'Error ao chamar Login';
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $path = $_GET['path'];
        if($path=="login"){
            echo login();
        }
    }

// Função de login para o usuario 
function login(){
    $conn =  mysqli_connect("aurorahorizon.ddns.net:3306", "gabriel", "teste12345678", "aps4sem");
        if (!$conn) {
            die('Não foi possível conectar: ' );            
        }      

    $sql = "SELECT ID_USUARIO, NOME, APELIDO, DATA_NASC, SENHA, LOGIN, EMAIL FROM usuario";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
                echo $row["NOME"]. $row["APELIDO"]. " " . $row["DATA_NASC"]."<br>";
                $arr = array($row["NOME"] => 1, $row["APELIDO"] => 2, $row["DATA_NASC"] => 3);
                echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    }
}


?>
