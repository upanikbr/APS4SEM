<?php

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

// Função de registro para o usuario 
function register($conn){
    $regarray = array($_POST['name'], $_POST['nickName'], $_POST['email']);
    $sql = "INSERT INTO usuario (NOME, APELIDO, EMAIL)
    VALUES ('$regarray[0]', '$regarray[1]', '$regarray[2]')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastrado com Sucesso !!!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>