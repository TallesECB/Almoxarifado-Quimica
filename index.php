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
        <main id="siteinicial">
            <header>
                <p class="titlepagprimario">Almoxarifado Quimica</p>
            </header>
            
            <section class="cards">
                <span class="complete"></span>
                <div class="card1">
                    <div class="card cardinicial" id="cardpushlogin" data-toggle="modal" data-target="#modalPushLogin">
                        <div class="card-body cardinicialbody">

                            <i class="far fa-user fa-5x"></i>

                            <button type="submit" class="EntrarUser" >Entrar</button>
                        </div>
                    </div>
                </div>
                <div class="card2">
                    <div class="card cardinicial">
                        <div class="card-body cardinicialbody" id="cardpushconsulta" data-toggle="modal" data-target="#modalPushConsulta">
        
                            <i class="fas fa-search fa-5x"></i>
        
                            <button type="submit" class="RealizarConsulta">Realizar Consulta</button>
                        </div>
                    </div>
                </div>
                <span class="complete"></span>
            </section>

            <!-- Footer -->

            <footer class="page-footer font-small elegant-color pt-4 footerinicial">

                <!-- Footer Elements -->
                <div class="container">

                    <div class="rodapeinicial">
                        <!-- Social buttons -->
                        <ul class="list-unstyled list-inline text-center">
                            <li class="list-inline-item">
                                <a class="btn-floating btn-fb mx-1">
                                    <i class="fab fa-facebook-f"> </i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-tw mx-1">
                                    <i class="fab fa-twitter"> </i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-gplus mx-1">
                                    <i class="fab fa-google-plus-g"> </i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-li mx-1">
                                    <i class="fab fa-linkedin-in"> </i>
                                </a>
                            </li>
                        </ul>

                        <!-- Social buttons -->
                        <div class="LoginAdministrador">
                            <button type="submit" class="EntrarAdmin" id="cardpushloginadmin" data-toggle="modal" data-target="#modalPushLoginAdmin">Painel Admin - Entrar</button>
                        </div>

                    </div>
                </div>
                <!-- Footer Elements -->
            
                <!-- Copyright -->
                <div class="footer-copyright elegant-color-dark py-3 footerprimario">
                    <p class="textfooterprimario"> © 2019 Copyright: Talles & Julie TSI|3</p>
                </div> 
                <!-- Copyright -->
            
            </footer>
            <!-- Footer -->
        </main>

        <!--Modal: modalPushLogin-->
        <div class="modal fade" id="modalPushLogin" tabindex="-1" role="dialog" aria-labelledby="ModalLabelLogin"
        aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <section class="displaylogin">
                        <section class="form-elegant login">

                            <!--Form with header-->
                            <div class="card cardlogin">
                            
                                <!--Header-->
                                <div class="header pt-3 gridientdark headerlogin">
                            
                                    <div class="TitleLogin">
                                        <h3 class="white-text mb-3 mt-3"><strong>Logar</strong></h3>
                                    </div>

                                    <div class="row mt-2 mb-3 d-flex justify-content-center">
                                        <!--Facebook-->
                                        <a class="fa-lg p-2 m-2 fb-ic"><i class="fab fa-facebook-f white-text fa-lg"> </i></a>
                                        <!--Twitter-->
                                        <a class="fa-lg p-2 m-2 tw-ic"><i class="fab fa-twitter white-text fa-lg"> </i></a>
                                        <!--Google +-->
                                        <a class="fa-lg p-2 m-2 gplus-ic"><i class="fab fa-google-plus-g white-text fa-lg"> </i></a>
                                    </div>
                                </div>
                                <!--Header-->
                            
                                <div class="card-body mx-4">
                            		<form class="formlogin" action="login.php" name="form" id='formulario' method="post" onsubmit="valida_sessao(this)">
	                                    <!--Body-->
	                                    <div class="md-form">
	                                        <input type="text" id="Form-email3" name="emailuser" class="form-control">
	                                        <label for="Form-email3">Your email</label>
	                                    </div>
	                                
	                                    <div class="md-form pb-1 pb-md-3">
	                                        <input type="password" id="Form-pass3" name="senhauser" class="form-control">
	                                        <label for="Form-pass3">Your password</label>
	                                    </div>
                                        
                                        <div id='texto'></div>
	                                    <!--Grid row-->
	                                    <div class="row d-flex align-items-center mb-4">
	                                
	                                        <!--Grid column-->
	                                        <div class="col-md-1 col-md-5 d-flex align-items-start">
	                                            <div class="text-center">
	                                                <button type="submit" name='envia' value="Enviar" class="btn gridientdark btn-block btn-rounded z-depth-1a buttonlogin">Log in</button>
	                                            </div>
	                                        </div>
	                                        <!--Grid column-->
	                                
	                                        <!--Grid column-->
	                                        <div class="col-md-7">
	                                                <p class="font-small grey-text d-flex justify-content-end mt-3">Don't have an account? 
	                                                <a href="#" class="dark-grey-text ml-1 font-weight-bold"> Sign up</a>
	                                            </p>
	                                        </div>
	                                        <!--Grid column-->
                                	
                                    	</div>
                                		<!--Grid row-->
                                	</form>
                                </div>
                            
                            </div>
                            <!--/Form with header-->
                        
                        </section>
                    </section>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: modalPushLogin-->

        <!--Modal: modalPushConsulta-->
        <div class="modal fade" id="modalPushConsulta" tabindex="-1" role="dialog" aria-labelledby="ModalLabelConsulta"
        aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <section class="displaylogin">
                        <section class="form-elegant login">

                            <!--Form with header-->
                            <div class="card cardlogin">
                            
                                <!--Header-->
                                <div class="header pt-3 gridientdark headerlogin">
                            
                                    <div class="TitleLogin">
                                        <h3 class="white-text mb-3 mt-3"><strong>Realizar Consulta</strong></h3>
                                    </div>

                                </div>
                                <!--Header-->
                            
                                <div class="card-body mx-4">
                                        <div class="input-group md-form">
                                            <form method="get" onsubmit="buscarReagente()" name="buscar" class="formulariobusca">
                                                <input type="text" id="Form-search2" class="form-control formbuscar" name="nomeReagente">
                                                <label for="Form-search2">Search</label>
                                                <button type="submit" name="pesquisar" class="buttonpesquisar">
                                                    <span class="input-group-text dark lighten-2" id="basic-text1">
                                                        <i class="fas fa-search text-dark" aria-hidden="true"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                
                                    <!--Grid row-->
                                    <div class="row d-flex align-items-center justify-content-center mb-4" id="resultado">
                                
                                        
                                
                                    </div>
                                <!--Grid row-->
                                </div>
                            
                            </div>
                            <!--/Form with header-->
                        
                        </section>
                    </section>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: modalPushConsulta-->



        <!--Modal: modalPushLoginAdmin-->
        <div class="modal fade" id="modalPushLoginAdmin" tabindex="-1" role="dialog" aria-labelledby="ModalLabelLoginAdmin"
        aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <section class="displaylogin">
                        <section class="form-elegant login">

                            <!--Form with header-->
                            <div class="card cardlogin">
                            
                                <!--Header-->
                                <div class="header pt-3 gridientdark headerlogin">
                            
                                    <div class="TitleLogin">
                                        <h3 class="white-text mb-3 mt-3"><strong>Login Administrador</strong></h3>
                                    </div>

                                    <div class="row mt-2 mb-3 d-flex justify-content-center">
                                        <!--Facebook-->
                                        <a class="fa-lg p-2 m-2 fb-ic"><i class="fab fa-facebook-f white-text fa-lg"> </i></a>
                                        <!--Twitter-->
                                        <a class="fa-lg p-2 m-2 tw-ic"><i class="fab fa-twitter white-text fa-lg"> </i></a>
                                        <!--Google +-->
                                        <a class="fa-lg p-2 m-2 gplus-ic"><i class="fab fa-google-plus-g white-text fa-lg"> </i></a>
                                    </div>
                                </div>
                                <!--Header-->
                            
                                <div class="card-body mx-4">
                            		<form class="formlogin" name="formadmin" action="loginadmin.php" method="post">
	                                    <!--Body-->
	                                    <div class="md-form">
	                                        <input type="text" id="Form-email3" name="emailadmin" class="form-control">
	                                        <label for="Form-email3">Your email</label>
	                                    </div>
	                                
	                                    <div class="md-form pb-1 pb-md-3">
	                                        <input type="password" id="Form-pass3" name="senhaadmin" class="form-control">
	                                        <label for="Form-pass3">Your password</label>
	                                    </div>
	     
	                                
	                                    <!--Grid row-->
	                                    <div class="row d-flex align-items-center mb-4">
	                                
	                                        <!--Grid column-->
	                                        <div class="col-md-1 col-md-5 d-flex align-items-start">
	                                            <div class="text-center">
	                                                <button type="submit" class="btn gridientdark btn-block btn-rounded z-depth-1a buttonlogin">Log in</button>
	                                            </div>
	                                        </div>
	                                        <!--Grid column-->
	                                
	                                        <!--Grid column-->
	                                        <div class="col-md-7">
	                                                <p class="font-small grey-text d-flex justify-content-end mt-3">Don't have an account? 
	                                                <a href="#" class="dark-grey-text ml-1 font-weight-bold"> Sign up</a>
	                                            </p>
	                                        </div>
	                                        <!--Grid column-->
                                	
                                    	</div>
                                		<!--Grid row-->
                                	</form>
                                </div>
                            
                            </div>
                            <!--/Form with header-->
                        
                        </section>
                    </section>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: modalPushLoginADMIN-->

        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
        <!-- Main JavaScript Local -->
        <script src="js/main.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="js/funcoes.js"></script>
    </body>
</html>