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
        <!-- Style CSS Local -->
        <link rel="stylesheet" href="css/main.css">
        </head>
    <body>
        <?php 
            session_start();
        ?>
         <section class="secondpag">
            <nav class="navvertical elegant-color-dark">
                <a href="paineladmin.php"> 
                    <div class="imguser">
                        <img src="" alt="">
                    </div>
                </a>

                <ul class="uluser">
                    <li class="infouser nomeuser"><!--<?php echo($_SESSION['nomeadmin'])?>--></li>
                    <li class="infouser"><!--<?php echo($_SESSION['profissaoadmin'])?>--></li>
                    <li class="infouser"><!--<?php echo($_SESSION['numeroadmin'])?>--></li>
                    <li class="infouser"><!--<?php echo($_SESSION['enderecoadmin'])?>--></li>
                    <li class="infouser"><!--<?php echo($_SESSION['emailadmin'])?>--></li>
                </ul>
                <form action="logout.php">
                    <button type="submit" class="SairUser">Sair</button>
                </form>
                
            </nav>
            <section class="conteudototal adminconteudo">
                <div>
                    <p class="titlepagsecundario">Almoxarifado Quimica Administrativo</p>
                </div>




                <section class="inserirreagente my-custom-scrollbar">

                    <!-- form include reagente -->
                    <form class="text-center pl-5 pr-5 pb-2 pt-2" method="post" onsubmit="inserirReagente()" name="inserir" id="insereForm">
                        <div class="btnaddreagente pb-5">
                            <p class="h4 mt-2" id="resultado">Inserir Reagente</p>
                            <button type="button" onclick="reagenteNaoCadastrado()" class="btn btn-outline-primary btn-rounded waves-effect btn-sm">Reagente Não Cadastrado ?</button>
                        </div>
        
                        <!-- Subject -->
                        <label>Reagente</label>
                        <select name="reagentenome" id="reag" class="browser-default custom-select mb-4">
                        </select>

                        <div id="reagentenaocadastrado">

                        </div>

                        <input type="number" class="form-control mb-4" placeholder="Quantidade" name="quantreag">
                        <input type="date" class="form-control mb-4" placeholder="Validade" name="validadereag">

                        <!-- Subject -->
                        <label>Fornecedor</label>
                        <select name="reagentefornecedor" id="reagfornec" class="browser-default custom-select mb-4">
                        </select>

                        <!-- Send button -->
                        <button class="btn btn-dark btn-block" type="submit"  name="finalizar" value="cadastrar">Cadastrar</button>

                    </form>

                </section>


                <section class="inserirreagentenew my-custom-scrollbar">

                    <!-- form include reagente -->
                    <form class="text-center pl-5 pr-5 pb-2 pt-2" method="post" onsubmit="inserirReagenteNovo()" name="inserirnew" id="insereForm">
                        <p class="h4 mb-5 mt-4" id="resultadoreag">Inserir Reagente</p>
        
                        <input type="text" class="form-control mb-4" placeholder="Nome Usual" name="nomeusual">
                        <input type="text" class="form-control mb-4" placeholder="Nome Iupac" name="nomeiupac">
                        <input type="text" class="form-control mb-4" placeholder="Formula" name="formulareag">
                        <label>Categoria</label>
                        <select name="classificacaoreag" id="reagcateg" class="browser-default custom-select mb-5">
                            <option value="null">-----</option>
                            <option value="Organico">Organico</option>
                            <option value="Inorganico">Inorganico</option>
                        </select>
                        <!-- Send button -->
                        <button class="btn btn-dark btn-block" type="submit"  name="finalizar" value="cadastrar">Cadastrar</button>

                    </form>
            
                </section>




                <section class="listagemreagentes">
                    <div id="resultadoalterar" class="text-center">

                    </div>
                    <div class="tabelalistagemreagentes p-2">

                        <div class="table-wrapper-scroll-y my-custom-scrollbar">

                            <table class="table table-bordered table-striped table-sm" id="dtHorizontalExample" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome Usual</th>
                                        <th scope="col">Nome Iupac</th>
                                        <th scope="col">Formula</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Validade</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Fornecedor</th>
                                    </tr>
                                </thead>
                                <tbody id="listarreagente">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>exemplo td 1 1</td>
                                        <td>exemplo td 1 2</td>
                                        <td>@exemplo td 1 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>exemplo td 2 1</td>
                                        <td>exemplo td 2 2</td>
                                        <td>@exemplo td 2 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>exemplo td 3 1</td>
                                        <td>exemplo td 3 2</td>
                                        <td>@exemplo td 3 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>exemplo td 4 1</td>
                                        <td>exemplo td 4 2</td>
                                        <td>@exemplo td 4 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>exemplo td 5 1</td>
                                        <td>exemplo td 5 2</td>
                                        <td>@exemplo td 5 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>exemplo td 6 1</td>
                                        <td>exemplo td 6 2</td>
                                        <td>@exemplo td 6 3</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
            
                </section>





                <section id="atualizarreagentes">
                    <div class="tabelalistagemreagentesalterar p-2">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">

                            <table class="table table-bordered table-striped" id="dtHorizontalVerticalExample2" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                    <th scope="col">Nome Usual</th>
                                        <th scope="col">Nome Iupac</th>
                                        <th scope="col">Formula</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Validade</th>
                                        <th scope="col">Fornecedor</th>
                                        <th scope="col">Quantidade Atual de Estoque</th>
                                    </tr>
                                </thead>
                                <tbody id="reagentefrompesquisaalterar">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>exemplo td 1 1</td>
                                        <td>exemplo td 1 2</td>
                                        <td>@exemplo td 1 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>exemplo td 2 1</td>
                                        <td>exemplo td 2 2</td>
                                        <td>@exemplo td 2 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>exemplo td 3 1</td>
                                        <td>exemplo td 3 2</td>
                                        <td>@exemplo td 3 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>exemplo td 4 1</td>
                                        <td>exemplo td 4 2</td>
                                        <td>@exemplo td 4 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>exemplo td 5 1</td>
                                        <td>exemplo td 5 2</td>
                                        <td>@exemplo td 5 3</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>exemplo td 6 1</td>
                                        <td>exemplo td 6 2</td>
                                        <td>@exemplo td 6 3</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </section>



                <section id="pesquisarreagente" class="p-2 my-custom-scrollbar">
                    <form method="get" onsubmit="pesquisarReagente()" name="buscar" class="formulariobusca">
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input class="form-control my-0 py-1 dark-border" type="text" placeholder="Search"  name="nomeReagente" aria-label="Search">
                            <div class="input-group-append">  
                                <span class="input-group-text dark lighten-3" id="basic-text1"><button type="submit" name="pesquisar" class="buttonpesquisar"> <i class="fas fa-search text-grey" aria-hidden="true"></i></button></span>
                            </div>
                        </div>
                    </form>

                    <div class="tabelalistagemreagentespesquisar">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nome Usual</th>
                                        <th scope="col">Nome Iupac</th>
                                        <th scope="col">Formula</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Validade</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Fornecedor</th>
                                </tr>
                            </thead>
                            <tbody id="reagentefrompesquisa">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>exemplo td 1 1</td>
                                    <td>exemplo td 1 2</td>
                                    <td>@exemplo td 1 3</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>exemplo td 2 1</td>
                                    <td>exemplo td 2 2</td>
                                    <td>@exemplo td 2 3</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>exemplo td 3 1</td>
                                    <td>exemplo td 3 2</td>
                                    <td>@exemplo td 3 3</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>exemplo td 4 1</td>
                                    <td>exemplo td 4 2</td>
                                    <td>@exemplo td 4 3</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>exemplo td 5 1</td>
                                    <td>exemplo td 5 2</td>
                                    <td>@exemplo td 5 3</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>exemplo td 6 1</td>
                                    <td>exemplo td 6 2</td>
                                    <td>@exemplo td 6 3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </section>




                <section class="mincards admin">
                    <div class="card cardsecundarioadmin">
                        <div class="card-body cardoptionsadmin">
                            <button type="submit" class="options" onclick="optionDisplayIncluirReagente()">Incluir Reagente</button>
                        </div>
                    </div>
                    <div class="card cardsecundarioadmin">
                        <div class="card-body cardoptionsadmin">
                            <button type="submit" class="options" onclick="optionDisplayListarReagente()">Listar Reagentes</button>
                        </div>
                    </div>
                    <div class="card cardsecundarioadmin">
                        <div class="card-body cardoptionsadmin">
                            <button type="submit" class="options" onclick="optionDisplayPesquisarReagente()">Pesquisar Reagentes</button>
                        </div>
                    </div>
                     <div class="card cardsecundarioadmin">
                        <div class="card-body cardoptionsadmin">
                            <button type="submit" class="options">Incluir Conta</button>
                        </div>
                    </div>
                    <div class="card cardsecundarioadmin">
                        <div class="card-body cardoptionsadmin">
                            <button type="submit" class="options">Listar Contas</button>
                        </div>
                    </div>
                    <div class="card cardsecundarioadmin">
                        <div class="card-body cardoptionsadmin">
                            <button type="submit" class="options">Pesquisar Conta</button>
                        </div>
                    </div>
                    <div class="card cardsecundarioadmin">
                        <div class="card-body cardoptionsadmin">
                            <button type="submit" class="options">Incluir Fornecedor</button>
                        </div>
                    </div>
                    <div class="card cardsecundarioadmin">
                        <div class="card-body cardoptionsadmin">
                            <button type="submit" class="options">Listar Fornecedores</button>
                        </div>
                    </div>
                    <div class="card cardsecundarioadmin">
                        <div class="card-body cardoptionsadmin">
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