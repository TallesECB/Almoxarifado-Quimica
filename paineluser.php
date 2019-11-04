<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Projeto Quimica</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
        <!-- Style CSS Local -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php 
            session_start();
        ?>
         <section class="secondpag">
            <nav class="navvertical elegant-color-dark">
                <div class="imguser">
                    <img src="" alt="">
                </div>

                <ul class="uluser">
                    <li class="infouser nomeuser"><?php echo($_SESSION['nomeuser'])?></li>
                    <li class="infouser"><?php echo($_SESSION['profissaouser'])?></li>
                    <li class="infouser"><?php echo($_SESSION['numerouser'])?></li>
                    <li class="infouser"><?php echo($_SESSION['enderecouser'])?></li>
                    <li class="infouser"><?php echo($_SESSION['emailuser'])?></li>
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

                <footer class="footersucundario">
                    <span></span>
                    <span><p class="infosistema">Informações do Sistema</p></span>
                </footer>
            </section>

         </section> 
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
        <!-- Main JavaScript Local -->
        <script src="js/main.js/"></script>
    </body>
</html>