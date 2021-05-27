<?php

function solicitacoes($con){
    if(isset($_SESSION['userLogin'])){
        $sql = $con->prepare("SELECT * FROM amigos WHERE id_para = ? AND status = 0");
        $sql->bind_param("s", $_SESSION['userLogin']);
        $sql->execute();
        $get = $sql->get_result();
        $total = $get->num_rows;

        if($total > 0){
            while($dados = $get->fetch_array()){
                echo "
                <ul>
                    <li style='list-style:none;'>
                    <a href='?pagina=perfil&id={$dados['id_de']}' target='_blank'>
                    {$dados['id_de']} 
                    <a href='?pagina=aceitar-amizade&id={$dados['id_de']}' class='btn btn-success btn-sm'>Aceitar Solicitação</a> 
                    <a href='?pagina=recusar-solicitacao&id={$dados['id']}' class='btn btn-danger btn-sm'>Recusar Solicitação</a>
                    </a>
                    </li>
                </ul>";
            }
        }
    }else{
        exit();
    }
}



function aceita_solicitacao($con, $id_de){
    $sql = $con->prepare("SELECT * FROM amigos WHERE id_de = ? AND id_para = ? AND status = 0");
    $sql->bind_param("ss", $id_de, $_SESSION['userLogin']);
    $sql->execute();
    $get = $sql->get_result();
    $total = $get->num_rows;

    if($total > 0){
        $dados = $get->fetch_assoc();

        if($dados['id_para'] == $_SESSION['userLogin']){
            if(atualiza_solicitacao($con, $id_de, $_SESSION['userLogin']) > 0){
                redireciona("?pagina=perfil&id={$id_de}");	
            }else{
                echo "erro ao atualizar;";
            }
            
        }else{
            return false;
        }
    }
}

function deleta_solicitacao($con, $id){
    $sql = $con->prepare("DELETE FROM amigos WHERE id = ?");
    $sql->bind_param("s", $id);
    $sql->execute();

    if($sql->affected_rows > 0){
        redireciona("?pagina=inicio");
    }else{
        return false;
    }
}

function get_perfil($con, $perfil){
    $sql = $con->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $sql->bind_param("s", $perfil);
    $sql->execute();
    $get = $sql->get_result();
    $total = $get->num_rows;

    if($total > 0){
        $dados = $get->fetch_assoc();
        echo "<h4>{$dados['nome']} <small>@{$dados['usuario']}</small></h4>";
        verfica_solicitacoes($con, $_SESSION['userLogin'], $perfil);
    }
}

function envia_solicitation($con, $id_para){
    if(verifica_amizade($con, $_SESSION['userLogin'], $id_para) <= 0){
        $sql = $con->prepare("INSERT amigos (id_de, id_para) VALUES (?, ?)");
        $sql->bind_param("ss", $_SESSION['userLogin'], $id_para);
        $sql->execute();

        if($sql->affected_rows > 0){
            redireciona("?pagina=perfil&id={$id_para}");
        }else{
            return false;
        }
    }else{
        redireciona("?pagina=perfil&id={$id_para}");
    }
    
}



?>