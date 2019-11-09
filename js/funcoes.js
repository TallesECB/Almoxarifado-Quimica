
/* variavel que printa o resultado de quando insere um novo reagente fornecedor*/
const resultado = document.getElementById("resultado");

/* variavel que printa o resultado de quando insere um novo reagente*/
const resultadoreag = document.getElementById("resultadoreag");

/* formulario de atualizacao do reagente */
const formEdit = document.getElementById('atualizaReagente');

/* variavel que printa o resultado de quando altera um reagente */
const resultadoalterar = document.getElementById('resultadoalterar');


/* function simples de inserir raegente fornecedor joga ele para um construtor, para ficar mais organizado */
function inserirReagente() {
  resultado.innerHTML = '';
  let reagentefornecedor = inserir.reagentefornecedor.value;
  let reagentenome = inserir.reagentenome.value;
  let validadereag = inserir.validadereag.value;
  let quantreag = inserir.quantreag.value;
  
  var reagente = new Reagente(reagentenome, reagentefornecedor, validadereag, quantreag); 
  var url = './logicareagente/insere.php';
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


/* function da pagina de inserir reagente, quando o reagente não esta cadastrado chama ela
e ela da display none na pagina de inserir reagente fornecedor
e da display block na pagina de inserir reagente
*/
function reagenteNaoCadastrado() {
  $('.inserirreagente').hide();
  $('.inserirreagentenew').show();
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



/* function de buscar reagente na tela inicial do site, sem estar logado */
function buscarReagente() {
  var nomereag = buscar.nomeReagente.value;
  document.getElementById('resultado').innerHTML = '';
  fetch(`./logicareagente/pesquisa.php?NOME_USUAL=${nomereag}`, {
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
  fetch(`./logicareagente/pesquisa.php?NOME_USUAL=${nomereag}`, {
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
  fetch(`./logicareagente/listar.php`, {
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
  fetch(`./logicareagente/busca.php?ID_FORNECEDOR=${ID_FORNECEDOR}&ID_REAGENTE=${ID_REAGENTE}`, {
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

  fetch('./logicareagente/altera.php', {
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
    fetch('./logicareagente/deleta.php', {
      method: 'DELETE',
      header: new Headers(),
      body: JSON.stringify(reagente)
    })
    .then(response => response.text())
    .then(dado => {
      resultado.innerHTML = dado;
    })
    .catch(error => console.error(error));
  }
  event.preventDefault();
  $('.listagemreagentes').hide();
  listarReagente();
  $('#pesquisarreagente').hide();
  $('.mincards').show();
}



/* construtor para organizacao da funcao de inclusao de reagente fornecedor */
var Reagente = function(reagentenome, reagentefornecedor, validadereag, quantreag) {
  this.reagentenome = reagentenome;
  this.reagentefornecedor = reagentefornecedor;
  this.quantreag = quantreag;
  this.validadereag = validadereag;
} 

/* construtor para organizacao da funcao de inclusao de reagente novo*/
var ReagenteNew = function(nomeusual, nomeiupac, formula, classificacao) {
  this.nomeusual = nomeusual;
  this.nomeiupac = nomeiupac;
  this.classificacao = classificacao;
  this.formula = formula;
} 

/* construtor para organizacao da funcao de atualização de reagente */
var ReagenteATT = function(quantreag, idreag, idfornec) {
  this.idfornec = idfornec;
  this.idreag = idreag;
  this.quantreag = quantreag;
} 



/*START functions para montar o select de fornecedor na opção de incluir novo reagente START*/
function carregaFornecedores(){
  let request = new XMLHttpRequest();
  request.open('get', './logicareagente/lista_fornecedores.php');
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
  request.open('get', './logicareagente/lista_reagentes.php');
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
  option.value = '0';
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
/*END functions de manipulação de display dos options END*/

