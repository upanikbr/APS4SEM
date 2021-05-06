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
    $conn->close();

}

// Função de registro para o usuario 
function register($conn){
    $regarray = array($_POST['name'], $_POST['nickName'], $_POST['email']);
    $sql = "INSERT INTO usuario (NOME, APELIDO, EMAIL)
    VALUES ('$regarray[0]', '$regarray[1]', '$regarray[2]')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastrado com Sucesso !!!";
      } else {
        echo "Error em: " . $sql . "<br>" . $conn->error;
      }

    $conn->close();

}



function deleteuser($conn, $id){

  $result = $conn->query("call testing($id, @userStatus);");
  extract($result->fetch_all(), EXTR_PREFIX_ALL, 'a');
  $b = implode($a_0);
  $sql = "UPDATE usuario set ACTIVATED='0' WHERE ID_USUARIO= '$id'";

  $result->close();
  $conn->next_result();

  if(strcmp($b,"1") == 0){

    if ($conn->query($sql) == TRUE) {

        //CARREGANDO A QUERY
        $sql = "SELECT * FROM aps4sem.usuario WHERE ID_USUARIO = $id";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
          //IMPRIME UMA MENSAGEM QUE FOI EXCLUIDO JUNTAMENTE COM O USUARIO EXCLUIDO
          echo 'Usuario excluído: '.$row['NOME']."";

        }
        //FECHANDO A QUERY
        $result->close();

    }  
  }else{echo"Usuário já excluído!";}

  //FECHANDO CARREGAMENTO
  $conn->close();
}



function updat($nome,$id){ 
  
  
  try {
    $username = 'gabriel';
    $password = 'teste12345678';
    $pdo = new PDO('mysql:host=aurorahorizon.ddns.net;dbname=aps4sem', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('UPDATE usuario SET NOME = :nome  WHERE ID_USUARIO = :id ');
    $stmt->execute(array(
      ':id'   => $id,
      ':nome' =>  $nome
      )
  ); 
    echo $stmt->rowCount();
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }

}



?>