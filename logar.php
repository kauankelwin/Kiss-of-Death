<?php

require_once('principalCad.php');

$log = new Cadastro();
if(isset($_POST['Logar'])){
    var_dump($log->Logar($_POST['email'],$_POST['senha']));
    if($log->Logar($_POST['email'], $_POST['senha'])){
        $log->ExibiCadastroResid();
        $log->ExibiPenden();
        //$log1 = $log->ConsulPenden();
        header('Location:init.php');
    } else {
        echo('Algo está errado!');
        echo('Verifique o formulário.');
    }
}

?>