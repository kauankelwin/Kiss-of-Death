<?php
session_start();

require_once('Sql.php');
/*require_once('logar.php');*/
Class Cadastro extends Sql{

    private $nome;
    private $cpf;
    private $rg;
    private $nascimento;
    private $telefone;
    private $email;
    private $senha;

    public function getNomeCliente()
    {
        return $this->nome;
    }

    public function setNomeCliente($nome) 
    {
        $this->nome = $nome;
    }

    /* ==========CPF DO CLIENTE========== */

    public function getCpfCliente()
    {
        return $this->cpf;
    }

    public function setCpfCliente($cpf) 
    {
        $this->cpf = $cpf;
    }

    /* ==========RG DO CLIENTE========== */

    public function getRgCliente()
    {
        return $this->rg;
    }

    public function setRgCliente($rg) 
    {
        $this->rg = $rg;
    }

    /* ============NASCIMENTO DO CLIENTE========== */ 

    public function getNascimentoCliente()
    {
        return $this->nascimento;
    }

    public function setNascimentoCliente($nascimento) 
    {
        $this->nascimento= $nascimento;
    }

    /* ===========TELEFONE DO CLIENTE==========*/ 

    public function getTelefoneCliente()
    {
        return $this->telefone;
    }

    public function setTelefoneCliente($telefone) 
    {
        $this->telefone = $telefone;
    }

    /* ==========Email DO CLIENTE========== */

    public function getEmailCliente()
    {
        return $this->email;
    }

    public function setEmailCliente($email) 
    {
        $this->email = $email;
    }

    /* ==========Senha DO CLIENTE========== */

    public function getSenhaCliente()
    {
        return $this->senha;
    }

    public function setSenhaCliente($senha) 
    {
        $this->senha = $senha;
    }

    public function CadastroUsuariaTela()
    {

        
        $user = $this->conn->prepare("insert into `cadastro_usuario` values (DEFAULT, :nome_usuario, :cpf_usuario, :rg_usuario, :data_nascimento, :telefone_usuario, :email_usuario, :senha_usuario)");
        $user->execute(array(":nome_usuario"=>$_POST['nome'], ":cpf_usuario"=>$_POST['cpf'], ":rg_usuario"=>$_POST['rg'], ":data_nascimento"=>$_POST['nascimento'], ":telefone_usuario"=>$_POST['tel'], ":email_usuario"=>$_POST['email'], ":senha_usuario"=>$_POST['senha']));
        $userEspace = $this->conn->prepare("insert into cadastro_residencia (idcadastro_residencia, estado_cadastro_residencia, cidade_cadastro_residencia, bairro_cadastro_residencia, rua_cadastro_residencia, numero_cadastro_residencia, cep_cadastro_residencia, complemento_cadastro_residencia) values (default, '0', '0', '0', '0', '0', '0', '0')");
        $userEspace->execute();
        

    }

    public function ExibiCadastroResid()
    {
        $LogarIndex = $this->conn->prepare("select * from cadastro_residencia where id_user_resid = :idusuario");
        //left join cadastro_residencia cr on id_usuario = id_user_resid where id_usuario = 2
        $LogarIndex->execute(array(":idusuario"=>$_SESSION['id_usuario']));
        $retornoLogin = $LogarIndex->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['idcadastro_residencia'] = $retornoLogin[0]['idcadastro_residencia'];
        $_SESSION['estado_cadastro_residencia'] = $retornoLogin[0]['estado_cadastro_residencia'];
        $_SESSION['cidade_cadastro_residencia'] = $retornoLogin[0]['cidade_cadastro_residencia'];
        $_SESSION['bairro_cadastro_residencia'] = $retornoLogin[0]['bairro_cadastro_residencia'];
        $_SESSION['rua_cadastro_residencia'] = $retornoLogin[0]['rua_cadastro_residencia'];
        $_SESSION['numero_cadastro_residencia'] = $retornoLogin[0]['numero_cadastro_residencia'];
        $_SESSION['cep_cadastro_residencia'] = $retornoLogin[0]['cep_cadastro_residencia'];
        $_SESSION['complemento_cadastro_residencia'] = $retornoLogin[0]['complemento_cadastro_residencia'];

        if(count($retornoLogin))
        {
            return $retornoLogin;
        } else {
            return 0;
        }
    }

    public function CadastroResidenciaTela($estado, $cidade, $bairro, $rua, $numero, $cep, $complemento)
    {

        $CadResid = $this->conn->prepare("update cadastro_residencia set estado_cadastro_residencia = :estado_cadastro_residencia, 
        cidade_cadastro_residencia = :cidade_cadastro_residencia, bairro_cadastro_residencia = :bairro_cadastro_residencia, 
        rua_cadastro_residencia = :rua_cadastro_residencia, numero_cadastro_residencia = :numero_cadastro_residencia, 
        cep_cadastro_residencia = :cep_cadastro_residencia, complemento_cadastro_residencia = :complemento_cadastro_residencia 
        where id_user_resid = id_usuario");
        
        $CadResid->execute(array(":estado_cadastro_residencia"=>$estado, ":cidade_cadastro_residencia"=>$cidade, ":bairro_cadastro_residencia"=>$bairro, ":rua_cadastro_residencia"=>$rua, ":numero_cadastro_residencia"=>$numero, ":cep_cadastro_residencia"=>$cep, ":complemento_cadastro_residencia"=>$complemento));
        
        /*$resid = $pdo->prepare('select * from `cadastro_residencia` ');
        $resid->execute();*/
    }

    

    public function Logar($email, $senha)
    {

        $LogarIndex = $this->conn->prepare("select * from cadastro_usuario where email_usuario = :usuario and senha_usuario = :usenha");
        $LogarIndex->execute(array(":usuario"=>$email, ":usenha"=>$senha));
        $retornoLogin = $LogarIndex->fetchAll(PDO::FETCH_ASSOC);
        

        if(count($retornoLogin))
        {
            $_SESSION['nome_usuario'] = $retornoLogin[0]['nome_usuario'];
            $_SESSION['id_usuario']   = $retornoLogin[0]['id_usuario'];
            $_SESSION['cpf_usuario']   = $retornoLogin[0]['cpf_usuario'];
            $_SESSION['rg_usuario']   = $retornoLogin[0]['rg_usuario'];
            $_SESSION['data']   = $retornoLogin[0]['data'];
            $_SESSION['telefone_usuario']   = $retornoLogin[0]['telefone_usuario'];
            $_SESSION['email_usuario']   = $retornoLogin[0]['email_usuario'];
            $_SESSION['senha_usuario']   = $retornoLogin[0]['senha_usuario'];
            return $retornoLogin;
        } else {
            return 0;
        }
    }

    public function ExibeDados()
    {
        $ExibiEmail = $this->conn->prepare("select email_usuario = :u_email from cadastro_usuario where id_usuario = 1");
        $ExibiEmail->bindValue(":u_email", $this->getEmailCliente());
        $ExibiEmail->execute();

        //$ExibiEmail->execute(array(":estado_cadastro_residencia"=>$email));
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

    public function ValidarEmail($email){
        //verifica se e-mail esta no formato correto de escrita
        if (!preg_match('/^([a-zA-Z0-9.-_])*([@])([a-z0-9]).([a-z]{2,3})/',$email)){
            $mensagem='E-mail Inv&aacute;lido!';
            return $mensagem;
        } 
        else{
            //Valida o dominio
            $dominio=explode('@',$email);
            if(!checkdnsrr($dominio[1],'A')){
                $mensagem='E-mail Inv&aacute;lido!';
                return $mensagem;
            }
            else{
                return true;
            } // Retorno true para indicar que o e-mail é valido
        }
    }

    public function ConsulPenden()
    {
        $stmt = $this->conn->prepare("select id_empresa_usuario from pendencia_usuario where id_empresa_usuario = :idusuario ");

        //$stmt = $this->conn->prepare("select id_empresa_usuario, count(*) c from pendencia_usuario group by id_empresa_usuario = :idusuario having c > 1");
        $stmt->execute(array(":idusuario"=>$_SESSION['id_usuario']));
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        

    } 

    public function ExibiPenden()
    {
        $ConsultPen = $this->conn->prepare("select * from pendencia_usuario where id_empresa_usuario = :idusuario");
        //left join cadastro_residencia cr on id_usuario = id_user_resid where id_usuario = 2
        $ConsultPen->execute(array(":idusuario"=>$_SESSION['id_usuario']));
        $retornoPenden = $ConsultPen->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['idpendencia_usuario'] = $retornoPenden[0]['idpendencia_usuario'];
        $_SESSION['empresa_pendencia_usuario'] = $retornoPenden[0]['empresa_pendencia_usuario'];
        $_SESSION['valor_pendencia_usuario'] = $retornoPenden[0]['valor_pendencia_usuario'];
        $_SESSION['descricao_pendencia_usuario'] = $retornoPenden[0]['descricao_pendencia_usuario'];
        

        if(count($retornoPenden))
        {
            return $retornoPenden;
        } else {
            return 0;
        }
    }

    public function ValidarCadastro()
    {
        
        /*==========Verifica se o campo Nome foi preenchido==========*/

        if(empty($this->getNomeCliente()))
        {
            return ("Faltou preencher o nome");
        }

        /*==========Verifica se o campo CPF foi preenchido==========*/

        elseif(empty($this->getCpfCliente()))
        {
            
            return ("Faltou preencher o CPF");
        }

        /*==========Verifica se o campo RG foi preenchido==========*/

        elseif(empty($this->getRgCliente()))
        {
            return ("Faltou preencher o RG");
        }

        /*==========Verifica se o campo Nascimento foi preenchido==========*/

        elseif(empty($this->getNascimentoCliente()))
        {
            return ("Faltou preencher o Nascimento");
        }

        /*==========Verifica se o campo Telefone foi preenchido==========*/

        elseif(empty($this->getTelefoneCliente()))
        {
            return ("Faltou preencher o Telefone");
        }

        /*==========Verifica se o campo Email foi preenchido==========*/

        elseif(empty($this->getEmailCliente()))
        {
            return ("Faltou preencher o Email");
        }

        /*==========Verifica se o campo Senha foi preenchido==========*/

        elseif(empty($this->getSenhaCliente()))
        {
            return ("Faltou preencher o Telefone");
        }

    }

}


$request = new Cadastro();
if(isset($_POST['Enviar'])){
    if($request->ValidarCpf($_POST['cpf'])){
        $request->CadastroUsuariaTela();
        header('Location:init.html');

    } 
    
    else {
        echo('cpf invalido');
    }
}

elseif(isset($_POST['Enviar'])){
    if($request->ValidarEmail($_POST['email'])){
        $request->CadastroUsuariaTela();
    } else {
        echo('email invalido');
    }
}



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