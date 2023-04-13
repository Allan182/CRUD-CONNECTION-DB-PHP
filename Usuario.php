<?php

require('mysql.php');

function criar($nome, $senha)
{

    global $mysqli;

    $senhaCrypt = md5($senha);

    $inserir = $mysqli->prepare("INSERT INTO `usuarios` (`codUsuarios`, `nome`, `senha`) VALUES (NULL, ?, ?);");
    $inserir->bind_param("ss",  $nome, $senhaCrypt);
    $inserir->execute();

    if ($inserir->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function deletar($codigo)
{

    global $mysqli;

    $deletar = $mysqli->prepare("DELETE FROM usuarios WHERE `usuarios`.`codUsuarios` = ?");
    $deletar->bind_param("i", $codigo);
    $deletar->execute();


    if ($deletar->affected_rows != 0) {
        return true;
    } else {
        return false;
    }
}


function ler($codigo)
{

    global $mysqli;

    $ler = $mysqli->prepare("SELECT * FROM usuarios WHERE `codUsuarios` = ?");
    $ler->bind_param("i", $codigo);
    $ler->execute();

    // print_r($ler);

    $dados = $ler->get_result();

    if ($dados->num_rows != 0) {
        $consulta = $dados->fetch_all(MYSQLI_ASSOC);
        print_r($consulta);
        return true;
    } else {
        echo "Nenhum Dado Vinculado a Este Código!!!";
        return false;
    }
}

function atualizar($codigo, $login, $senha){

        global $mysqli;


        $alterar = $mysqli->prepare("UPDATE `usuarios` SET `nome` = ?, `senha` = ? WHERE `usuarios`.`codUsuarios` = ?;");
        $alterar->bind_param("ssi", $login, $senha, $codigo);
        $alterar->execute();

        if ($alterar->affected_rows != 0) {
            return true;
        } else {
            return false;
        }
}



function lerDados(){
    global $mysqli;

    $ler = $mysqli->prepare("SELECT * FROM usuarios");
    $ler->execute();


    // print_r($ler);

    $dados = $ler->get_result();

    if ($dados->num_rows != 0) {
        $consulta = $dados->fetch_all(MYSQLI_ASSOC);
        print_r($consulta);
        return true;
    } else {
        echo "Nenhum Dado Vinculado a Este Código!!!";
        return false;
    }


}
