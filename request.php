<?php

/*require_once('Sql.php');*/
/*require_once('principalCad.php');*/
/*class Request extends Sql
{

    

    public function CadastroUsuariaTela()
    {

        
        $user = $this->conn->prepare("insert into `cadastro_usuario` values (DEFAULT, :nome_usuario, :cpf_usuario, :rg_usuario, :data_nascimento, :telefone_usuario, :email_usuario, :senha_usuario)");
        $user->execute(array(":nome_usuario"=>$_POST['nome'], ":cpf_usuario"=>$_POST['cpf'], ":rg_usuario"=>$_POST['rg'], ":data_nascimento"=>$_POST['nascimento'], ":telefone_usuario"=>$_POST['tel'], ":email_usuario"=>$_POST['email'], ":senha_usuario"=>$_POST['senha']));
*/
        /*$diarias = $pdo->prepare('select * from `cadastro_usuario` ');
        $diarias->execute();
        header('Location:init.html');*/
        /*
        $listar_diarias = $diarias->fetchAll(PDO::FETCH_CLASS);
        var_dump($listar_diarias);
        */
/*
    }

    public function ValidarCpf($cpf)
    {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;

    }
*/
    /*===============Cadastro de Residência================*/ 
/*
    public function CadastroResidenciaTela()
    {
        $CadResid = $this->conn->prepare("insert into `cadastro_residencia` values (DEFAULT, :estado_cadastro_residencia, :cidade_cadastro_residencia, :bairro_cadastro_residencia, :rua_cadastro_residencia, :numero_cadastro_residencia, :estado_cadastro_residencia,:complemento_cadastro_residencia)");
        $CadResid->execute(array(":estado_cadastro_residencia"=>$_POST['estado'], ":cidade_cadastro_residencia"=>$_POST['cidade'], ":bairro_cadastro_residencia"=>$_POST['bairro'], ":rua_cadastro_residencia"=>$_POST['rua'], ":numero_cadastro_residencia"=>$_POST['numero'], ":cep_cadastro_residencia"=>$_POST['cep'],":complemento_cadastro_residencia"=>$_POST['complemento']));
        /*$resid = $pdo->prepare('select * from `cadastro_residencia` ');
        $resid->execute();*/
 /*   }*/

    /*function RelacionaCadastroResidencia()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=systemofdeath", "root", "");
        $stmt = $pdo->prepare('update nometabela set id = :id');
        $stmt->bindValue(":id", $this->getNomeCliente());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
*/

    
/*
}


$request = new Request();
if(isset($_POST['Enviar'])){
    if($request->ValidarCpf($_POST['cpf'])){
        $request->CadastroUsuariaTela();
    } else {
        echo('cpf invalido');
    }
}


*/






/*
require_once("principalCad.php");
$receb = new Cadastro();
$receb->setNomeCliente($_POST['nome']);
$receb->setCpfCliente($_POST['cpf']);
$receb->setRgCliente($_POST['rg']);
$receb->setNascimentoCliente($_POST['nascimento']);
$receb->setTelefoneCliente($_POST['tel']);
$receb->setEmailCliente($_POST['email']);
$receb->setSenhaCliente($_POST['senha']);

echo($receb->ValidarCadastro());
*/


/*
$nome = $_POST["nome"];
echo ("Nome Definido: ". $nome."<br>");

$cpf = $_POST["cpf"];
echo ("CPF Definido: ". $cpf."<br>");

$rg = $_POST["rg"];
echo ("RG Definido: ". $rg."<br>");

$nascimento = $_POST["nascimento"];
echo ("Data De Nascimento Definida: ". $nascimento."<br>");

$tel = $_POST["tel"];
echo ("Telefone Definido: ". $tel."<br>");

$email = $_POST["email"];
echo ("Email Definido: ". $email."<br>");

$senha = $_POST["senha"];
echo ("Senha Definido: ". $senha."<br>");
*/

?>