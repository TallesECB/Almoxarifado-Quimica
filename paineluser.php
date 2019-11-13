<?php 
    
?> 
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Projeto Quimica</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        
         <section class="secondpag">
            <nav class="menu-vertical navvertical">
                <div class="imguser">
                    <img src="" alt="">
                </div>

                <ul class="uluser">
                    <li class="infouser nomeuser"><?php echo($_SESSION['nome'])?></li>
                    <li class="infouser"><?php echo($_SESSION['profissao'])?></li>
                    <li class="infouser"><?php echo($_SESSION['idade'])?></li>
                    <!--
                    <li class="infouser"><?php echo($_SESSION['enderecouser'])?></li>
                    <li class="infouser"><?php echo($_SESSION['emailuser'])?></li> -->
                </ul>

                <form action="logout.php">
                    <button type="submit" class="SairUser">Sair</button>
                </form>
            </nav>
            <section class="conteudototal userconteudo">
                <div>
                    <p class="titlepagsecundario">Almoxarifado Quimica</p>
                </div>

                <section class="mincards user">
                    <div class="card cardsecundariouser">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options">Incluir Reagente</button>
                        </div>
                    </div>
                    <div class="card cardsecundariouser">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options">Listar Reagentes</button>
                        </div>
                    </div>
                    <div class="card cardsecundariouser">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options">Pesquisar Reagente</button>
                        </div>
                    </div>
                    <div class="card cardsecundariouser">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options">Incluir Fornecedor</button>
                        </div>
                    </div>
                    <div class="card cardsecundariouser">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options">Listar Fornecedores</button>
                        </div>
                    </div>
                    <div class="card cardsecundariouser">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options">Pesquisar Fornecedor</button>
                        </div>
                    </div>                    
                </section>

                <footer class="footersecundario">
                    <span class="infosistema">Informações do Sistema</span>
                </footer>
            </section>

         </section> 

        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="js/mdb/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/mdb/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/mdb/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb/mdb.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/funcoes.js"></script>
    </body>
</html>