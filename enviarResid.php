<?php



require_once('principalCad.php');

$env = new Cadastro();
if(isset($_POST['EnviarResiden'])){
    //echo('Você esta ai?');
    $env->CadastroResidenciaTela($_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero'], $_POST['cep'], $_POST['complemento']);
    header('Location:init.html');  
    //var_dump($_POST);        
}

else {
    echo('Voce saiu');
}


?>