<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title>Tela principal</title>
        <link rel="stylesheet" type="text/css" href="_css/init.css"/>
        <?php 
            include ('principalCad.php'); 
        ?>
    </head>

    <header id="cabecalho">
        <div id="cabec">
            <input type="text" class="pesquisa" name="pesquisa" placeholder="Faça Sua Pesquisa..." />
        </div>
        <div>
            <img src="_img/lupapesq.png" id="iconpes"/>
        </div>
    </header>

    <body id="corpo4">
        <div id="BarCorp">

            <aside id="bar">
                <div id="lateralBar">
                    <nav id="menu">
                        <ul>
                            <li><a href="init.php" target="_self"><img src="_img/iconhome.png" title="Home - Página Inicial" alt="Home - Página Inicial" width="50px" height="50px"/></a></li>
                            <li><a href="UserLocal.php" target="_self"><img src="_img/IconMenuUser.png" title="Usuário" alt="Usuário" width="50px" height="50px"/></a></li>
                            <li><a href="Resid.html" target="_self"><img src="_img/CadResid.png" title="Cadastro de Residência" alt="Cadastro de Residência" width="50px" height="50px"/></a></li>
                            <li><a href="Questions.html" target="_self"><img src="_img/IconManual.png" title="Manual De Dúvidas" alt="Manual De Dúvidas" width="50px" height="50px"/></a></li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div id="corpo">
                <div>
                    <div>
                        <h1 id="ReaCad">Veja Suas Pendências</h1>

                    </div>
                </div>

                <div id="PendenDiv">
                    <h2 id="TextAjust">Empresa: <?php  echo($_SESSION['empresa_pendencia_usuario']); ?> <br/> </h2> 
                    <h4 class="TextAjust2"> <br/> Valor: <?php  echo($_SESSION['valor_pendencia_usuario']); ?> <br/> </h4>
                    <h4 class="TextAjust2"> <br/>Descrição: <?php  echo($_SESSION['descricao_pendencia_usuario']); ?> <br/> </h4>
                </div>
                <div class="list-wrapper">
                    <ul>
                        <?php 
                            $pend = new Cadastro();
                            $resultado = $pend->ConsulPenden();
                            foreach ($resultado as $item)
                            {
                                var_dump("<p> ID: ".$item['idpendencia_usuario']."</p>");
                                echo("<p> ID: ".$item['pendencia_usuario']."</p>");

                            }
                            
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>

    
</html>