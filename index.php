<?php
    include 'conn.php';
    $conn = conn();




    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $path = $_POST['path'];
        if($path=="login"){
            echo login($conn);
        }elseif($path=="register"){
           
            echo register($conn);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $path = $_GET['path'];
        if($path=="login"){
            echo login($conn);
        }
    }





// Função de login para o usuario 
function login($conn){
    
    $sql = "SELECT * FROM usuario";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
                echo $row["NOME"]. $row["APELIDO"]. " " . $row["DATA_NASC"]."<br>";
                $arr = array($row["NOME"] => 1, $row["APELIDO"] => 2, $row["DATA_NASC"] => 3);
                echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    }
}




// Função de login para o usuario 
function register($conn){
  
        $name = $_POST['name'];
        $nickName = $_POST['nickName'];
        $email = $_POST['email'];
        $sql = "INSERT INTO usuario (NOME, APELIDO, EMAIL)
        VALUES ('$name', '$nickName', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastrado com Sucesso !!!";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}




?>
