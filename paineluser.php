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
        <?php 
            session_start();
        ?>
         <section class="secondpag">
            <nav class="navvertical menu-vertical">
                <a href="paineluser.php"> 
                    <div class="imguser">
                        <img src="" alt="">
                    </div>
                </a>

                <ul class="uluser">
                    <li class="inform"><?php echo($_SESSION['nome'])?></li>
                    <li class="inform"><?php echo($_SESSION['telefone'])?></li>
                </ul>
                <form action="logout.php">
                    <button type="submit" class="SairUser">Sair</button>
                </form>
                
            </nav>
            <section class="conteudototal userconteudo">
                <div>
                    <p class="titlepagsecundario">On-Lab <img src="img/onlab.png" width="90px"></p>
                </div>

                <section class="inserirreagente">

                    <!--FORMULÁRIO: inserir reagente -->
                    
                        <!--===================================== REAGENTE========================= -->
                    <form class="text-center pl-5 pr-5 forminclude my-custom-scrollbar" method="post" onsubmit="inserirReagente()" name="inserir" id="insereForm">
                        <div class="btnaddreagente pb-2">
                            <button type="button" onclick="reagenteAlterarCadastro()" class="btn btn-outline-primary btn-rounded waves-effect btn-sm">Alterar Reagentes Cadastrados ?</button>
                            <p class="h4" id="resultado">Inserir Reagente</p>
                            <button type="button" onclick="reagenteNaoCadastrado()" class="btn btn-outline-primary btn-rounded waves-effect btn-sm">Reagente Não Cadastrado ?</button>
                        </div>
        
                        <label>Reagente</label>
                        <select name="reagentenome" id="reag" class="browser-default custom-select mb-4">
                        </select> 

                        <div id="reagentenaocadastrado">

                        </div>

                        <input type="number" class="form-control mb-4" placeholder="Quantidade" name="quantreag">
                        <input type="date" class="form-control mb-4" placeholder="Validade" name="validadereag">

                        <label>Fornecedor</label>
                        <select name="reagentefornecedor" id="reagfornec" class="browser-default custom-select mb-4">
                        </select>

                        <!-- Send button -->
                        <button class="btn btn-dark btn-block" type="submit"  name="finalizar" value="cadastrar">Cadastrar</button>

                    </form>

                </section>

<!--========================== section de listagem dos reagentes da tabela reagente fornecedor -->
                <section class="listagemreagentes p-4">
                    <div class="tabelalistagemreagentes my-custom-scrollbar">
                        <div class="table-wrapper-scroll-y">

                            <table class="table table-bordered table-striped table-md" id="dtHorizontalExample" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome Usual</th>
                                        <th scope="col">Nome Iupac</th>
                                        <th scope="col">Formula</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Validade</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Fornecedor</th>
                                        <th scope="col" id="resultadomanipulacoes">-</th>
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
    <!--============section para atualizar a quantidade dos reagentes da tabela reagente fornecedor===================-->
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


                <!-- section para pesquisar um reagente da tabela reagente fornecedor printando os dados dele -->
                <section id="pesquisarreagente" class="p-2">
                    <form method="get" onsubmit="pesquisarReagente()" name="buscar" class="formulariobusca">
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input class="form-control my-0 py-1 dark-border" type="text" placeholder="Search"  name="nomeReagente" aria-label="Search">
                            <div class="input-group-append">  
                                <span class="input-group-text dark lighten-3" id="basic-text1"><button type="submit" name="pesquisar" class="buttonpesquisar"> <i class="fas fa-search text-grey" aria-hidden="true"></i></button></span>
                            </div>
                        </div>
                    </form>

                    <div class="tabelalistagemreagentespesquisar my-custom-scrollbar">

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

                <!-- section onde insere reagentes novos na tabela reagentes -->
                <section class="inserirreagentenew">
                    
                    <!-- form include reagente -->
                    <form class="text-center pl-5 pr-5 formincludereagente my-custom-scrollbar" method="post" onsubmit="inserirReagenteNovo()" name="inserirnew" id="insereForm">
                        <p class="h4 mb-5" id="resultadoreag">Inserir Reagente</p>
                        <input type="text" class="form-control mb-3" placeholder="Nome Usual" name="nomeusual">
                        <input type="text" class="form-control mb-3" placeholder="Nome Iupac" name="nomeiupac">
                        <input type="text" class="form-control mb-3" placeholder="Formula" name="formulareag">
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

                <!-- pesquisa de reagentes da tabela reagentes para alterar ou excluir e visualizar os dados do pesquisado -->
                <section id="alterarreagentecadastrado" class="p-4 alterareagentenewcd my-custom-scrollbar">
                    <form method="get" onsubmit="pesquisarReagenteCD()" name="buscarcd" class="formulariobusca">
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input class="form-control my-0 py-1 dark-border" type="text" placeholder="Search"  name="nomeReagenteCD" aria-label="Search">
                            <div class="input-group-append">  
                                <span class="input-group-text dark lighten-3" id="basic-text1"><button type="submit" name="pesquisar" class="buttonpesquisar"> <i class="fas fa-search text-grey" aria-hidden="true"></i></button></span>
                            </div>
                        </div>
                    </form>

                    <div class="tabelalistagemreagentecd">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nome Usual</th>
                                        <th scope="col">Nome Iupac</th>
                                        <th scope="col">Formula</th>
                                        <th scope="col">Categoria</th>
                                </tr>
                            </thead>
                            <tbody id="reagentecdpesquisa">
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


                <!-- section que monta o formulario de alterar os dados do reagente da tabela reagentes -->
                <section id="atualizarreagentescadastrado">
                    <div class="tabelalistagemreagentesalterar my-custom-scrollbar">
                        
                        <div id="reagenteatualizarcd">
                            
                        </div>


                    </div>
                </section>


                <section class="mincards user">
                    <div class="card cardsecundariouser mb-2">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options" onclick="optionDisplayIncluirReagente()">Incluir Reagente</button>
                        </div>
                    </div>
                    <div class="card cardsecundariouser mb-2">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options" onclick="optionDisplayListarReagente()">Listar Reagentes</button>
                        </div>
                    </div>
                    <div class="card cardsecundariouser mb-2">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options" onclick="optionDisplayPesquisarReagente()">Pesquisar Reagentes</button>
                        </div>
                    </div>
                     
                    <div class="card cardsecundariouser mb-2">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options">Incluir Fornecedor</button>
                        </div>
                    </div>
                    <div class="card cardsecundariouser mb-2">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options">Listar Fornecedores</button>
                        </div>
                    </div>
                    <div class="card cardsecundariouser mb-2">
                        <div class="card-body cardsoptions">
                            <button type="submit" class="options">Pesquisar Fornecedor</button>
                        </div>
                        
                    </div>                     
                </section>
                <span>
                    <div class="">  
                            <a class="botao-centralizado" onclick="botaoRecarregar()"><img src="img/voltar.png"></a>
                    </div>

                    <footer class="footersecundario">
                        <span class="infosistema">Informações do Sistema</span>
                    </footer>
                </span>
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