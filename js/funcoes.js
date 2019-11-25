
/* variavel que printa o resultado de quando insere um novo reagente fornecedor*/
const resultado = document.getElementById("resultado");

/* variavel que printa o resultado de quando exclui um reagente fornecedor*/
const resultadoexcluir = document.getElementById("resultadomanipulacoes");

/* variavel que printa o resultado de quando exclui um reagente*/
const resultadoexcluirreag = document.getElementById("resultadomanipulacoes");

/* variavel que printa o resultado de quando insere um novo reagente*/
const resultadoreag = document.getElementById("resultadoreag");

/* formulario de atualizacao do reagente */
const formEdit = document.getElementById('atualizaReagente');

/* variavel que printa o resultado de quando altera um reagente fornecedor */
const resultadoalterar = document.getElementById('resultadomanipulacoes');

/* variavel que printa o resultado de quando altera um reagente */
const resultadoalterarreag = document.getElementById('resultadomanipulacoes');


/* function simples de inserir raegente fornecedor joga ele para um construtor, para ficar mais organizado */
function inserirReagente() {
  resultado.innerHTML = ''; 
  let reagentefornecedor = inserir.reagentefornecedor.value;
  let reagentenome = inserir.reagentenome.value;
  let validadereag = inserir.validadereag.value;
  let quantreag = inserir.quantreag.value;
  
  var reagente = new Reagente(reagentenome, reagentefornecedor, validadereag, quantreag); 
  var url = './logicareagentefornecedor/insere.php';
  fetch(url, {
    method: "POST",
    body: JSON.stringify(reagente)
  })
  .then(response => response.text())
  .then(function result (data) {
    resultado.innerHTML = data;
  })
  .catch(error => console.error('Erro ao tentar acessar o php:', error));
    event.preventDefault();
}


/* function de buscar reagente na tela inicial do site, sem estar logado */
function buscarReagente() {
  var nomereag = buscar.nomeReagente.value;
  document.getElementById('resultado').innerHTML = '';
  fetch(`./logicareagentefornecedor/pesquisa.php?NOME_USUAL=${nomereag}`, {
    method: 'GET',
  }) 
    .then(response => {
      console.log(response)
      return response.json();
    }) 
    .then(function result (data) {
        if(!data.hasOwnProperty("status")) {
          objJSON = data; 
          let table = ' <table class="table table-bordered table-striped" id="dtHorizontalVerticalExample"  cellspacing="0" width="50%">'
          table += '<thead>'
          table +=    '<tr>'
          table +=        '<th scope="col">Nome Usual</th>'
          table +=        '<th scope="col">Nome Iupac</th>'
          table +=        '<th scope="col">Formula</th>'
          table +=        '<th scope="col">Categoria</th>'
          table +=        '<th scope="col">Validade</th>'
          table +=        '<th scope="col">Quantidade</th>'
          table +=        '<th scope="col">Fornecedor</th>'
          table +=     '</tr>'
          table +=   '</thead>'
          table +=  '<tbody>'
          
            for (let i in objJSON){
              table += '<tr>'
              table += `<td>${objJSON[i].NOME_USUAL}</td>`
              table += `<td>${objJSON[i].NOME_IUPAC}</td>`
              table += `<td>${objJSON[i].FORMULA}</td>`
              table += `<td>${objJSON[i].CLASSIFICACAO}</td>`
              
              table += `<td>${objJSON[i].VALIDADE}</td>`
              table += `<td>${objJSON[i].QNTD_ESTOQUE}</td>`
              table += `<td>${objJSON[i].NOME_FORNECEDOR}</td>`
              table += '<tr>'

            }; 
            table += '</tbody>'
            table += '</table>'
            resultado.innerHTML = table
            

          } else {
             resultado.innerHTML = data.status;
          }       
          console.log(data);
     })
    .catch(error => {
      console.log(error);
    });
    event.preventDefault();  
}
/* 
function de pesquisar reagente pelo nome, que printa o reagente que possua o
nomereag = ao informado no input no formulario de pesquisa
essa function é parecida com a da tela do user, mas ela posta o reagente
com os botoes de excluir e editar (com os parametros para executar a funcao)
*/
function pesquisarReagente() {
  var nomereag = buscar.nomeReagente.value;
  let listarreag = document.getElementById('reagentefrompesquisa');
  fetch(`./logicareagentefornecedor/pesquisa.php?NOME_USUAL=${nomereag}`, {
    method: 'GET',
  })
    .then(response => {
      
        return response.json();
 
    }) 
    .then(function result (data) {
        if(!data.hasOwnProperty("status")) {
          let table = "";
          objJSON = data;
          for (let i in objJSON) {
            table += '<tr>'
              table += `<th scope="row">${objJSON[i].NOME_USUAL}</th>`
                table += `<td>${objJSON[i].NOME_IUPAC}</td>`
                table += `<td>${objJSON[i].FORMULA}</td>`
                table += `<td>${objJSON[i].CLASSIFICACAO}</td>`
                
                table += `<td>${objJSON[i].VALIDADE}</td>`
                table += `<td>${objJSON[i].QNTD_ESTOQUE}</td>`
                table += `<td>${objJSON[i].NOME_FORNECEDOR}</td>`
                table += `<td><form onsubmit="excluirReagente('${objJSON[i].ID_REAGENTE}','${objJSON[i].ID_FORNECEDOR}')" name="excluir"><button type="submit" name="deletar"class="btn btn-flat btn-sm">Deletar<button></form></td>`;
                table += `<td><form method="get" onsubmit="alterarReagente('${objJSON[i].ID_REAGENTE}','${objJSON[i].ID_FORNECEDOR}')" name="alterar"><button type="submit" name="alterar" class="btn btn-flat btn-sm">Alterar<button></form></td>`;
            table += '</tr>';
            listarreag.innerHTML = table;
          };
            listarreag.innerHTML = table;
          } else {
            listarreag.innerHTML = data.status;
          }       
     })
    .catch(error => {
      console.log(error);
    });
    $('.tabelalistagemreagentespesquisar').show();
    event.preventDefault(); 
}

/* function de listagem de todos os reagentes com os botoes para executar a funcao de editar ou excluir */
function listarReagente() {
  let listarreag = document.getElementById('listarreagente');
  fetch(`./logicareagentefornecedor/listar.php`, {
    method: 'GET',
  }) 
    .then(response => {      
        return response.json();
    }) 
    .then(function result (data) {
        if(!data.hasOwnProperty("status")) {
          let table = "";
          objJSON = data;
          for (let i in objJSON) {
            table += '<tr>'
              table += `<th scope="row">${objJSON[i].NOME_USUAL}</th>`
                table += `<td>${objJSON[i].NOME_IUPAC}</td>`
                table += `<td>${objJSON[i].FORMULA}</td>`
                table += `<td>${objJSON[i].CLASSIFICACAO}</td>`
                
                table += `<td>${objJSON[i].VALIDADE}</td>`
                table += `<td>${objJSON[i].QNTD_ESTOQUE}</td>`
                table += `<td>${objJSON[i].NOME_FORNECEDOR}</td>`
                table += `<td><form onsubmit="excluirReagente('${objJSON[i].ID_REAGENTE}','${objJSON[i].ID_FORNECEDOR}')" name="excluir"><button type="submit" name="deletar"class="btn btn-flat btn-sm">Deletar<button></form></td>`;
                table += `<td><form method="get" onsubmit="alterarReagente('${objJSON[i].ID_REAGENTE}','${objJSON[i].ID_FORNECEDOR}')" name="alterar"><button type="submit" name="alterar" class="btn btn-flat btn-sm">Alterar<button></form></td>`;
            table += '</tr>';
            listarreag.innerHTML = table;
          };
            listarreag.innerHTML = table;
          } else {
            listarreag.innerHTML = data.status;
          }       
     })
    .catch(error => {
      console.log(error);
    });
    event.preventDefault(); 
}


/* 
function que puxa o reagente fornecedor para jogar ele pro formulario, pegando ele de acordo com o 
'idreagente e o idfornecedor' do botao de editar, printado junto ao reagente na funcao de listagem
*/
function alterarReagente(idreagente,idfornecedor) {
  let ID_REAGENTE = idreagente;
  let ID_FORNECEDOR = idfornecedor;
  let listarreagalterar = document.getElementById('reagentefrompesquisaalterar');
  fetch(`./logicareagentefornecedor/busca.php?ID_FORNECEDOR=${ID_FORNECEDOR}&ID_REAGENTE=${ID_REAGENTE}`, {
    method: 'GET',  
  })
  .then(response => response.json())
  .then(reagente => {
    if(!reagente.hasOwnProperty("status")) {
      $('.listagemreagentes').hide();
      $('#pesquisarreagente').hide();
      $('.tabelalistagemreagentespesquisar').hide();
      $('#atualizarreagentes').show();
      let table = "";
        table += '<tr>'
          table += `<th scope="row" id="nomereagentealterar">${reagente.NOME_USUAL}</th>`
            table += `<td>${reagente.NOME_IUPAC}</td>`
            table += `<td>${reagente.FORMULA}</td>`
            table += `<td>${reagente.CLASSIFICACAO}</td>`
            
            table += `<td>${reagente.VALIDADE}</td>`
            table += `<td> ${reagente.NOME_FORNECEDOR}</td>`
          table += `<td>
            <form method="post" onsubmit="atualizarReagente()" name="atualizar" id="atualizaReagente">  
              <div class="def-number-input number-input safari_only">
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                  <input type="hidden" name="idreag" value="${reagente.ID_REAGENTE}">
                  <input type="hidden" name="idfornec" value="${reagente.ID_FORNECEDOR}">
                  <input class="quantity" min="0" name="quantreag" type="number" value="${reagente.QNTD_ESTOQUE}">
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
              </div>
              <input type="submit" name="updateReagente" value="atualizar" class="btn btn-flat btn-sm">
              </td>
            </form>`;
            table += '</tr>';  
          listarreagalterar.innerHTML = table;
          resultadoalterar.innerHTML = '';
    } else {
      resultadoalterar.innerHTML = reagente.status;
    } 
  })

  event.preventDefault();
}

/* 
function que coleta os dados do formulario de alteracao do reagente 
onde apenas atualiza a quantidade do reagente, para quando alguem fizer alguma retirada
atualizando o reagente fornecedor de "Idreagente E Idfornecedor" forem iguais aos que vieram 
do formulario que chegaram no formulario como parametro do botao de editar e excluir do alterarreagente
*/
function atualizarReagente() {
  let quantreag = atualizar.quantreag.value;
  let idreag = atualizar.idreag.value;
  let idfornec = atualizar.idfornec.value;

  console.log(idreag);
  console.log(idfornec);
  var reagenteAtualizar = new ReagenteATT(quantreag, idreag, idfornec);

  fetch('./logicareagentefornecedor/altera.php', {
    method: 'PUT',
    body: JSON.stringify(reagenteAtualizar),
    header: new Headers()
  })
  .then(response => response.text())
  .then(resposta => {
    resultadoalterar.innerHTML = resposta;
  })
  .catch(error => console.error(error));
  listarReagente();
  $('#atualizarreagentes').hide();
  listarReagente();
  $('.listagemreagentes').show();


  event.preventDefault();
}

/* 
exclui reagente que exclui atraves do 'nomereag' do botao que vai junto do reagente
na funcao listarReagente passando o nomereag do botao como parametro pro fetch executar
o delete no php
*/
function excluirReagente(idreag,idfornec) {
  var reag = idreag;
  var fornecreag = idfornec
  let confirmar = window.confirm("Deseja excluir realmente?");
  if(confirmar) {
    var reagente = new Object()
    reagente.idreag = reag;
    reagente.idfornec = fornecreag;
    fetch('./logicareagentefornecedor/deleta.php', {
      method: 'DELETE',
      header: new Headers(),
      body: JSON.stringify(reagente)
    })
    .then(response => response.text())
    .then(dado => {
      resultadoexcluir.innerHTML = dado;
    })
    .catch(error => console.error(error));
  }
  event.preventDefault();
  $('.listagemreagentes').hide();
  listarReagente();
  $('#pesquisarreagente').hide();
  listarReagente();
  $('.listagemreagentes').show();
}

/* function simples de inserir novo reagente, joga ele para um construtor, para ficar mais organizado */
function inserirReagenteNovo() {
  resultadoreag.innerHTML = '';
  let nomeiupac = inserirnew.nomeiupac.value;
  let nomeusual = inserirnew.nomeusual.value;
  let formula = inserirnew.formulareag.value;
  let classificacao = inserirnew.classificacaoreag.value;
  
  var reagente = new ReagenteNew(nomeusual, nomeiupac, formula, classificacao); 
  var url = './logicareagente/inserereagente.php';
  fetch(url, {
    method: "POST",
    body: JSON.stringify(reagente)
  })
  .then(response => response.text())
  .then(function result (data) {
    resultadoreag.innerHTML = data;
  })
  .catch(error => console.error('Erro ao tentar acessar o php:', error));
    event.preventDefault();
}

function alterarReagenteCD(idreagente) {
  let ID_REAGENTE = idreagente;
  let listarreagalterarcd = document.getElementById('reagenteatualizarcd');
  fetch(`./logicareagente/buscareagente.php?ID_REAGENTE=${ID_REAGENTE}`, {
    method: 'GET',  
  })
  .then(response => response.json())
  .then(reagente => {
    if(!reagente.hasOwnProperty("status")) {
      $('#alterarreagentecadastrado').hide();
      $('.tabelalistagemreagentecd').hide();
      $('#atualizarreagentescadastrado').show();
      let form = "";
          form += `
            <form class="text-center p-2" method="post" onsubmit="atualizarReagenteCD()" name="atualizarcd" id="atualizaReagente">`
              form += `
                <p class="h4 mb-5" id="resultadoreag">Alterar Reagente</p>  
                <input type="hidden" name="idreag" value="${reagente.ID_REAGENTE}">
                <input type="text" class="form-control mb-4" name="nomeusual" value="${reagente.NOME_USUAL}">
                <input type="text" class="form-control mb-4" name="nomeiupac" value="${reagente.NOME_IUPAC}">
                <input type="text" class="form-control mb-4" name="formula" value="${reagente.FORMULA}">
                <label>Categoria</label>
                <select name="classificacaoreag" id="reagcateg" class="browser-default custom-select mb-5">
                    <option value="null">-----</option>
                    <option value="Organico">Organico</option>
                    <option value="Inorganico">Inorganico</option>
                </select>
              <input type="submit" name="updateReagente" value="atualizar" class="btn btn-dark btn-block">`
           form += '</form>'
          listarreagalterarcd.innerHTML = form;
          resultadoalterarreag.innerHTML = '';
    } else {
      resultadoalterarreag.innerHTML = reagente.status;
    } 
  })

  event.preventDefault();
}


function atualizarReagenteCD() {
  let idreag = atualizarcd.idreag.value;
  let nomeusual = atualizarcd.nomeusual.value;
  let nomeiupac = atualizarcd.nomeiupac.value;
  let formula = atualizarcd.formula.value;
  let classificacao = atualizarcd.classificacaoreag.value;

  var reagenteAtualizar = new ReagenteATTCD(nomeusual, nomeiupac, formula, classificacao, idreag);

  fetch('./logicareagente/alterareagente.php', {
    method: 'PUT',
    body: JSON.stringify(reagenteAtualizar),
    header: new Headers()
  })
  .then(response => response.text())
  .then(resposta => {
    resultadoalterarreag.innerHTML = resposta;
  })
  .catch(error => console.error(error));
  listarReagente();
  $('#atualizarreagentescadastrado').hide();
  listarReagente();
  $('.listagemreagentes').show();


  event.preventDefault();
}


function pesquisarReagenteCD() {
  var nomereag = buscarcd.nomeReagenteCD.value;
  let listarreag = document.getElementById('reagentecdpesquisa');
  fetch(`./logicareagente/pesquisareagente.php?NOME_USUAL=${nomereag}`, {
    method: 'GET',
  })
    .then(response => {
      
        return response.json();
 
    }) 
    .then(function result (data) {
        if(!data.hasOwnProperty("status")) {
          let table = "";
          objJSON = data;
          for (let i in objJSON) {
            table += '<tr>'
              table += `<th scope="row">${objJSON[i].NOME_USUAL}</th>`
                table += `<td>${objJSON[i].NOME_IUPAC}</td>`
                table += `<td>${objJSON[i].FORMULA}</td>`
                table += `<td>${objJSON[i].CLASSIFICACAO}</td>`
                table += `<td><form onsubmit="excluirReagenteCD('${objJSON[i].ID_REAGENTE}')" name="excluir"><button type="submit" name="deletar"class="btn btn-flat btn-sm">Deletar<button></form></td>`;
                table += `<td><form method="get" onsubmit="alterarReagenteCD('${objJSON[i].ID_REAGENTE}')" name="alterar"><button type="submit" name="alterar" class="btn btn-flat btn-sm">Alterar<button></form></td>`;
            table += '</tr>';
            listarreag.innerHTML = table;
          };
            listarreag.innerHTML = table;
          } else {
            listarreag.innerHTML = data.status;
          }       
     })
    .catch(error => {
      console.log(error);
    });
    $('.tabelalistagemreagentecd').show();
    event.preventDefault(); 
}

function excluirReagenteCD(idreag) {
  var reag = idreag;
  let confirmar = window.confirm("Deseja excluir realmente?");
  if(confirmar) {
    var reagente = new Object()
    reagente.idreag = reag;
    fetch('./logicareagente/deletareagente.php', {
      method: 'DELETE',
      header: new Headers(),
      body: JSON.stringify(reagente)
    })
    .then(response => response.text())
    .then(dado => {
      resultadoexcluirreag.innerHTML = dado;
    })
    .catch(error => console.error(error));
  }
  event.preventDefault();
  $('.listagemreagentes').hide();
  $('#alterarreagentecadastrado').hide();
  listarReagente();
  $('.tabelalistagemreagentecd').hide();
  listarReagente();
  $('.listagemreagentes').show();
}



/* construtor para organizacao da funcao de inclusao de reagente fornecedor */
var Reagente = function(reagentenome, reagentefornecedor, validadereag, quantreag) {
  this.reagentenome = reagentenome;
  this.reagentefornecedor = reagentefornecedor;
  this.quantreag = quantreag;
  this.validadereag = validadereag;
} 

/* construtor para organizacao da funcao de inclusao de reagente */
var ReagenteNew = function(nomeusual, nomeiupac, formula, classificacao) {
  this.nomeusual = nomeusual;
  this.nomeiupac = nomeiupac;
  this.classificacao = classificacao;
  this.formula = formula;
} 

/* construtor para organizacao da funcao de atualização de reagente fornecedor */
var ReagenteATT = function(quantreag, idreag, idfornec) {
  this.idfornec = idfornec;
  this.idreag = idreag;
  this.quantreag = quantreag;
} 

/* construtor para organizacao da funcao de alterar um reagente */
var ReagenteATTCD = function(nomeusual, nomeiupac, formula, classificacao, idreag) {
  this.nomeusual = nomeusual;
  this.nomeiupac = nomeiupac;
  this.formula = formula;
  this.classificacao = classificacao;
  this.idreag = idreag;
} 


/*START functions para montar o select de fornecedor na opção de incluir novo reagente START*/
function carregaFornecedores(){
  let request = new XMLHttpRequest();
  request.open('get', './logicareagentefornecedor/lista_fornecedores.php');
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
        montaselectFornecedores(request.responseText,'reagfornec');
      } 
      else 
      {
        console.log('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
  }  
}

function montaselectFornecedores(dados,idDestino){
  let select = document.getElementById(idDestino);
  let option = document.createElement("option");
  select.innerHTML= '';
  option.innerText =  "-----";
  option.value = '0';
  select.appendChild(option);
  objJSON = JSON.parse(dados);

  for (let i in objJSON){
      option = document.createElement("option");
      option.innerText = decodeURI(objJSON[i].NOME_FORNECEDOR);
      option.value = objJSON[i].ID_FORNECEDOR;
      select.appendChild(option);
    }
  
}
/*END functions para montar o select de fornecedor na opção de incluir novo reagente END*/

/*START functions para montar o select de reagente na opção de incluir novo reagente START*/
function carregaReagentes(){
  let request = new XMLHttpRequest();
  request.open('get', './logicareagentefornecedor/lista_reagentes.php');
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
        montaselectReagentes(request.responseText,'reag');
      } 
      else 
      {
        console.log('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
  }  
}

function montaselectReagentes(dados,idDestino){
  let select = document.getElementById(idDestino);
  let option = document.createElement("option");
  select.innerHTML= '';
  option.innerText =  "-----";
  option.value = '0'; /*Opção vazia*/ 
  select.appendChild(option);
  objJSON = JSON.parse(dados);

  for (let i in objJSON){
      option = document.createElement("option");
      option.innerText = decodeURI(objJSON[i].NOME_USUAL);
      option.value = objJSON[i].ID_REAGENTE;
      select.appendChild(option);
    }
  
}
/*END functions para montar o select de reagente na opção de incluir novo reagente END*/

/*START functions de manipulação de display dos options START*/
function optionDisplayIncluirReagente () {
  $('.mincards').hide();
  $('.inserirreagente').show();
  carregaFornecedores(); 
  carregaReagentes();

}

function optionDisplayListarReagente () {
  $('.mincards').hide();
  listarReagente();
  $('.listagemreagentes').show();
}

function optionDisplayPesquisarReagente () {
  $('.mincards').hide();
  $('.tabelalistagemreagentespesquisar').hide();
  $('#pesquisarreagente').show();
}

/* function da pagina de inserir reagente, quando o reagente não esta cadastrado chama ela
e ela da display none na pagina de inserir reagente fornecedor
e da display block na pagina de inserir reagente
*/
function reagenteNaoCadastrado() {
  $('.inserirreagente').hide();
  $('.inserirreagentenew').show();
}

function reagenteAlterarCadastro() {
  $('.inserirreagente').hide();
  $('.tabelalistagemreagentecd').hide();
  $('#alterarreagentecadastrado').show();
}

/*==================================================Contas de usuário===================================================*/ 
function confereEmail(){
  
}
function confirmaSenha() {
  let mensagem = document.getElementById('erro_senha'); 
  
   if(inserirnewConta.novaSenha.value != inserirnewConta.senhaConfirm.value){
     
      document.getElementById('password').style.backgroundColor = "#F5A9A9"; 
      document.getElementById('passwordconfirm').style.backgroundColor = "#F5A9A9"; 

      
      mensagem.innerHTML = 'Senhas não correspondem'; 
      document.getElementById("criaconta_enviar").disabled = true; 

   }
   else {
       if(document.getElementById('password').value.length >1){ //Campo não está vazio 
           document.getElementById('password').style.backgroundColor = "#ACFA58"; 
           document.getElementById('passwordconfirm').style.backgroundColor = "#ACFA58"; 
           mensagem.innerHTML = ''; 
           document.getElementById("criaconta_enviar").disabled = false; 
     }
   }
   
}

function optionDisplayIncluirConta(){
  event.preventDefault(); 

  $('.mincards').hide(); 
  $('.inserirConta').show(); /*Formulário*/ 
}

function inserirNovaConta(){
  event.preventDefault(); 
  
   var conta = new Object()
     conta.email = criaConta.novoEmailUser.value; 
     conta.senha = criaConta.novaSenha.value; 
     conta.idade = criaConta.idade.value; 
     conta.nome = criaConta.nome.value; 
     
  //console.log (conta); 

  var url = './logica_usuario/insere.php'; 
                                 
  fetch(url, {
    method: 'POST',
    body: JSON.stringify (conta),  
    
})
.then(response => {
    return response.text();
}).then(data => {
    console.log(data)
})
.catch(error => {
    console.log(`Erro:${error}`)
});
  
}

function optionDisplayListarConta(){
  $('.mincards').hide(); 
  listarConta(); 
  $('#listarConta').show(); 
}
/*======================================Listar contas========================================*/ 
function listarConta(){
  let contas = document.getElementById('listarConta'); 
  
  const URL  = 'http://localhost/Quimica_initial_project/logica_usuario/lista.php'; 

  fetch(URL,{mode: 'no-cors'}) //É necessário usar o cors? 
   
    .then(response => {
      return response.json();
    }).then(data => {
        
        if (data) {
          
          let tamanho = data.length; 
          let tabela = '<table class="table" id="dtHorizontalVerticalExample"  cellspacing="4" width="50%">'
          tabela += `<tr>`
          tabela += '<thead>'
          tabela +=    '<tr>'
          tabela +=        '<th scope="col">ID do usuário: </th>'
          tabela +=        '<th scope="col">Nome: </th>'
          tabela +=        '<th scope="col">Login: </th>'
          tabela +=        '<th scope="col">Senha: </th>'
          tabela +=        '<th scope="col">E-mail: </th>'
          tabela +=     '</tr>'
          tabela +=   '</thead>'
          tabela +=  '<tbody>'

          for (let i=0; i<tamanho; i++){
            tabela += `<tr>`
            tabela += `<td> ${data[i].ID_USUARIO}</td>`
            tabela += `<td> ${data[i].NOME_USUARIO}</td>`
            tabela += `<td> ${data[i].LOGIN_USUARIO}</td>`
            tabela += `<td> ${data[i].SENHA_USUARIO}</td>`
            tabela += `<td> ${data[i].EMAIL_USUARIO}</td>`
            tabela += `<td><form onsubmit="excluiUsuario('${data[i].ID_USUARIO}')" name="excluir_conta" method="GET"><button type="onsubmit" class="btn btn-secondary">Excluir</button></form>`;
            tabela += `<td><form><button type="onsubmit" class="btn btn-secondary">Alterar</button></form></td>`;
            tabela += `</tr>`
          }
          tabela += '</table>'
          contas.innerHTML = tabela; 
        }
    })
    .catch(error => {
        console.log(`Não foi possível listar os resultados:\n\n${error.message}`)
    });
}
/*=======================================Excluir Conta========================================*/ 
function excluiUsuario(id){
  let confirmacao =  window.confirm('Deseja mesmo excluir?'); 
  if (confirmacao==true){
        let id_usuario = id; 
        /*console.log (id_usuario); Retorna como string*/ 
        fetch('./logicareagente/deleta_usuario.php', {
          method: 'DELETE',
          header: new Headers(),
          body: JSON.stringify(id_usuario)
        })
        .then(response => response.text())
        .then(dado => {
          resultadoexcluirreag.innerHTML = dado;
        })
        .catch(error => console.error(error));
      
      event.preventDefault();
  }
}
/*================================================================================================================*/
function botaoRecarregar(){
  location.reload(); 
}
