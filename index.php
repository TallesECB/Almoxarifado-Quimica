<?php 
  session_start(); 
?>  
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>OnLab - Home</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="img/icons/favicon-96x96.png">
    </head>
    <body>
        <main id="siteinicial">
            <header>
                <p class="titlepagprimario">OnLab <img src="img/icons/molecula.png" style="padding: 10px;"> </p>
            </header>

            <section class="cards">
                <span class="complete"></span>
                <div class="card1">
                    <div class="card cardinicial" id="cardpushlogin" data-toggle="modal" data-target="#modalPushLogin">
                        <div class="card-body cardinicialbody">
                           <img src="img/icone_usuario.png"> <!--ícone do usuário--> 
    
                            <button id="botao-entrar"  type="submit" class="EntrarUser">Entrar</button>
                        </div>
                    </div>
                </div>
                <div class="card2">
                    <div class="card cardinicial">
                        <div class="card-body cardinicialbody" id="cardpushconsulta" data-toggle="modal" data-target="#modalPushConsulta">
                            <img src="img/procurar.png" id="testeasd"> 
        
                            <button id="consulta" type="submit" class="RealizarConsulta">Realizar Consulta</button>
                        </div>
                    </div>
                </div>
                <span class="complete"></span>
            </section>

            <!-- Footer -->

            <footer class="footer-social-medias">

                <!-- Footer Elements -->
                <div class="container">

                    <div class="rodapeinicial">
                        <!-- Social buttons -->
                        <ul class="list-unstyled list-inline text-center">
                            <li class="list-inline-item">
                                <a class="btn-floating btn-fb mx-1">
                                    <img src="img/icons/facebook.png">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-tw mx-1">
                                    <img src="img/icons/twitter.png"> 
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-gplus mx-1">
                                    <img src="img/icons/google.png">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-li mx-1">
                                    <img src="img/icons/linkedin.png" > 
                                </a>
                            </li>
                        </ul>

                        <!-- Social buttons -->
                        <div class="LoginAdministrador">
                            <button type="submit" class="btn btn-outline-default btn-rounded waves-effect" id="cardpushloginadmin" data-toggle="modal" data-target="#modalPushLoginAdmin">Administrativo</button>
                        </div>

                    </div>
                </div>
                <!-- Footer Elements -->
            
                <!-- Copyright -->
                <div class="texto-footer">
                    <p class="textfooterprimario"> On-Lab© 2019 Copyright: Julie Santiago | Talles Balardin - TSI</p>
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

                                    
                                </div>
                                <!--Header-->
                            
                                <div class="card-body mx-4">  <!--LOGIN DO USER--> 

                            		<form class="formlogin" name="acesso" id='form_user' action="" method="POST" > 
	                                    <!--Body-->
	                                    <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
	                                        <input type="text" name="email_user" class="form-control" id="email_user">
	                                        <label for="Form-email3">Email</label>
	                                    </div>
	                                
	                                    <div class="md-form pb-1 pb-md-3">
                                            <i class="fa fa-lock prefix grey-text"></i>
	                                        <input type="password" name="senha_user" class="form-control" id="senha_user">
	                                        <label for="Form-pass3">Senha</label>
	                                    </div>
                                        
	                                    <!--Grid row-->
	                                    <div class="row d-flex align-items-center mb-4">
	                                <!--Retirei os links para rede social - Não precisamos! --> 
	                                        <!--Grid column-->
	                                        <div class="col-md-1 col-md-5 d-flex align-items-start"> 
	                                            <div class="text-center">
	                                                <button  id="botao-enviar" type="submit" name="entrar" value="Enviar" class="btn gridientdark btn-block btn-rounded z-depth-1a buttonlogin">Entrar</button>
	                                            </div>

	                                        </div>
	                                        <!--Grid column-->
                                            <div class="col-md-7">
                                                <p class="font-small grey-text d-flex justify-content-end mt-1">Recuperar Senha<a href="enviaremail.php"
                                                class="dark-grey-text ml-2 font-weight-bold" data-toggle="modal" data-target="#modalPushSendEmail" data-dismiss="modal">Clique Aqui</a></p>
                                            </div>
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
            <div class="modal-dialog modal-dialogconsulta modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <section class="displayconsulta">
                        <section class="form-elegant consulta">

                            <!--Form with header-->
                            <div class="card cardconsulta">
                            
                                <!--Header-->
                                <div class="header pt-3 gridientdark headerconsulta">
                            
                                    <div class="TitleConsulta">
                                        <h3 class="white-text mb-3 mt-3"><strong>Realizar Consulta</strong></h3>
                                    </div>

                                </div>
                                <!--Header-->
                            
                                <div class="card-body">
                                        <div class="input-group md-form centralizarformbuscar">
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

        <!--Modal: modalPushSendEmail-->
        <div class="modal fade" id="modalPushSendEmail" tabindex="-1" role="dialog" aria-labelledby="ModalLabelSendEmail"
        aria-hidden="true">
            <div class="modal-dialog modal-dialogsendemail modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <section class="displaySendEmail">
                        <section class="form-elegant consulta">

                            <!--Form with header-->
                            <div class="card cardsendemail">
                            
                                <!--Header-->
                                <div class="header pt-3 gridientdark headersendemail">
                            
                                    <div class="Titlesendemail">
                                        <h3 class="white-text mb-3 mt-3"><strong>Recuperar Senha</strong></h3>

                                    </div>

                                    
                                </div>
                                <!--Header-->
                            
                                <div class="card-body mx-4">

                            		<form class="formsendemail" onsubmit="contatoForm(event)" method="post" name="frm_contato"> 
	                                    <!--Body-->
	                                    <div class="md-form pb-1 pb-md-3">
	                                        <input type="text" id="Form-email44" name="nome" class="form-control nomesend">
	                                        <label for="Form-email44">Nome</label>
	                                    </div>
                                        
                                        <div class="md-form pb-1 pb-md-3">
	                                        <input type="text" id="Form-email6" name="email_resposta" class="form-control emailressend">
	                                        <label for="Form-email6">Email para resposta de contato</label>
                                        </div>
                                        
                                        <div class="md-form pb-1 pb-md-3">
                                            <textarea id="msgfromemail" name="mensagem" class="md-textarea form-control mensagemsend" rows="3"></textarea>
                                            <label for="msgfromemail">Envie uma Mensagem</label>
                                        </div>
	                                    <!--Grid row-->
	                                    <div class="row d-flex align-items-center mb-4">
	                                        <!--Grid column-->
	                                        <div class="col-md-1 col-md-5 d-flex align-items-start"> 
	                                            <div class="text-center">
	                                                <button  type="submit" name="enviar" value="ENVIAR" class="btn gridientdark btn-block btn-rounded z-depth-1a buttonlogin">Enviar Email</button>
	                                            </div>

	                                        </div>
	                                        
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
        <!--Modal: modalPushSendEmail-->

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
                            		<form class="formlogin" name="formadmin" action="" method="POST">
	                                    <!--Body-->
	                                    <div class="md-form">
                                            <i class="fa fa-user prefix grey-text"></i>
	                                        <input type="text" id="loginadmin" name="loginadmin" class="form-control">
	                                        <label for="Form-email4">Login</label>
	                                    </div>
	                                
	                                    <div class="md-form pb-1 pb-md-3">
                                            <i class="fa fa-lock prefix grey-text"></i>
	                                        <input type="password" id="senhaadmin" name="senhaadmin" class="form-control">
	                                        <label for="Form-pass4">Senha</label>
	                                    </div>
	     
	                                
	                                    <!--Grid row-->
	                                    <div class="row d-flex align-items-center mb-4">
	                                
	                                        <!--Grid column-->
	                                        <div class="col-md-1 col-md-5 d-flex align-items-start">
	                                            <div class="text-center">
	                                                <button type="submit" class="btn gridientdark btn-block btn-rounded z-depth-1a buttonlogin" name="enviar" onclick="criaLoginAdmin()">Entrar</button>
	                                            </div>
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

<!--========================================BOTÃO WHAT'S=====================================================-->
        <a href=" https://api.whatsapp.com/send?phone=5553991861361&">
            <img src="https://i.imgur.com/ryESuZ5.png" style="height:50px; position:fixed; bottom: 25px; right: 25px;
             z-index:99999;" data-selector="img"></a>
<!--========================================BOTÃO WHAT'S=====================================================-->
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