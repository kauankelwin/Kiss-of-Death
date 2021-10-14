<?php

include './conexao.php';
include './request.php';

$conn = getConnection();

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$nascimento = $_POST["nascimento"];
$telefone = $_POST["tel"];
$email = $_POST["email"];
$senha = $_POST["senha"];


$sql = "INSERT INTO cadastro_usuario (nome_usuario, cpf_usuario, rg_usuario, data_nascimento, telefone_usuario, email_usuario, senha_usuario) 
VALUES ('{$nome}', {$preco})";



?>