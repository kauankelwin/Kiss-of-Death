<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title>Usuário</title>
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

    <body id="corpo1">
        <div id="BarCorp">

            <aside id="bar">
                <div id="lateralBar">
                    <nav id="menu">
                        <ul>
                            <li><a href="init.php" target="_self"><img src="_img/iconhome.png" title="Home - Página Inicial" alt="Home - Página Inicial" width="50px" height="50px"/></a></li>
                            <li><a href="UserLocal.html" target="_self"><img src="_img/IconMenuUser.png" title="Usuário" alt="Usuário" width="50px" height="50px"/></a></li>
                            <li><a href="Resid.html" target="_self"><img src="_img/CadResid.png" title="Cadastro de Residência" alt="Cadastro de Residência" width="50px" height="50px"/></a></li>
                            <li><a href="Questions.html" target="_self"><img src="_img/IconManual.png" title="Manual De Dúvidas" alt="Manual De Dúvidas" width="50px" height="50px"/></a></li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div id="corpo">
                <div>
                    <div>
                        <h1 class="ReaCad1">Painel do Usuário</h1>

                    </div>

                    <div id="div1">
                        <div id="ParaEsquer">
                            <h1 class="ReaCad1">Dados Cadastrais</h1>

                            <div id="Residen1">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label1">Nome: <?php echo($_SESSION['nome_usuario']);?></label>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label1">Nascimento: <?php echo($_SESSION['data']);?></label>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label1">Telefone: <?php echo($_SESSION['telefone_usuario']);?></label>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label1">CPF: <?php echo($_SESSION['cpf_usuario']);?></label>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label1">RG: <?php echo($_SESSION['rg_usuario']);?></label>
                                </div>

                                <div class="mb-3">
                                    <?php
                                        
                                        
                                    ?>
                                    <label for="exampleInputPassword1" class="form-label1">E-mail: <?php echo($_SESSION['email_usuario']);?></label>
                                </div>
                                <!--$email = $_POST["email"];-->
                                <!--echo ("Email Definido: ". $email."<br>");-->

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label1">Senha: <?php echo($_SESSION['senha_usuario']);?></label>
                                </div>
                            </div>

                        </div>

                        <div id="lateralEsquerda">
                            <!--<h1>Painel Do Usuário</h1>-->
                            <img src="_img/IconUser.png" id="ImgUserUser"/>
                        </div>
                    </div>

                    <div id="lateralDireita">
                        <h1 class="ReaCad1">Endereço</h1>
                        <div id="Residen">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label1">Estado: <?php echo($_SESSION['estado_cadastro_residencia']);?></label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label1">Cidade: <?php echo($_SESSION['cidade_cadastro_residencia']);?></label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label1">Bairro: <?php echo($_SESSION['bairro_cadastro_residencia']);?></label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label1">Rua: <?php echo($_SESSION['rua_cadastro_residencia']);?></label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label1">Número: <?php echo($_SESSION['numero_cadastro_residencia']);?></label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label1">Complemento: <?php echo($_SESSION['complemento_cadastro_residencia']);?></label>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>

    
</html>