<?php

require("Usuario.php");

$codigo = $_POST['cod'];

$login = $_POST['Login'];
$senha = md5($_POST['senha']); 



 if(criar($login, $senha) == true){
    echo "Tudo certo";
} else {
    echo "Tudo errado!";
} 




if(deletar($codigo) == true){
    echo "Tudo CERTO!";
} else {
    echo "Tudo errado!";
}




if(ler($codigo) == true){
    echo "<br> Tudo certo!";
} else {
    echo "<br> Deu ruim";
}




if(atualizar($codigo, $login, $senha) == true){
    echo "Deu bom!";
} else {
    echo "Deu Ruim!";
}



if (lerDados()){
    echo "<br> <br> Deu bom!";
} else {
    echo "Nada na Base de Dados!";
}   