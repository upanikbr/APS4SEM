<?php
    include './conn/conn.php';
    include './model/user.php';
    $conn = conn();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $path = $_POST['path'];
        if($path=="login"){
            echo login($conn);
        }elseif($path=="register"){
            echo register($conn);
        }elseif($path=="deleteUser"){
            $id = $_POST['id'];
            deleteuser($conn,$id);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $path = $_GET['path'];
        if($path=="login"){
            echo login($conn);
        }
    }
?>
