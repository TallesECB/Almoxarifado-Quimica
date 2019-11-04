
/* variavel que printa o resultado de quando insere um novo reagente */
const resultado = document.getElementById("resultado");

/* formulario de atualizacao do reagente */
const formEdit = document.getElementById('atualizaReagente');

/* variavel que printa o resultado de quando altera um reagente */
const resultadoalterar = document.getElementById('resultadoalterar');


/* function simples de inserir novo reagente, joga ele para um construtor, para ficar mais organizado */
function inserirReagente() {
  resultado.innerHTML = '';
  let reagentefornecedor = inserir.reagentefornecedor.value;
  let reagentecategoria = inserir.reagentecategoria.value;
  let validadereag = inserir.validadereag.value;
  let quantreag = inserir.quantreag.value;
  let nomereag = inserir.nomereag.value;
  alert(nomereag);
  var reagente = new Reagente(nomereag, quantreag, reagentefornecedor, reagentecategoria, validadereag); 
  var url = './insere.php';
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
  document.getElementById('resultado').innerHTML = ''
  fetch(`./pesquisa.php?nomereag=${nomereag}`, {
    method: 'GET',
  }) 
    .then(response => {
      
        return response.json();
 
    }) 
    .then(function result (data) {
        if(!data.hasOwnProperty("status")) {
          console.log(data);
        let table = '<table border=1>'
              data.forEach(obj => {
                  table += '<tr>'
                  Object.entries(obj).map(([key, value]) => {
                      table += `<td>${value}</td>`
                  });
                  table += '</tr>';
                  resultado.innerHTML = table;
              });
               table += '</table>'
               resultado.innerHTML = table;
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
  fetch(`./pesquisa.php?nomereag=${nomereag}`, {
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
            table += `<th scope="row">${objJSON[i].idreag}</th>`
                table += `<td>${objJSON[i].nomereag}</td>`
                table += `<td>${objJSON[i].reagentefornecedor}</td>`
                table += `<td>${objJSON[i].reagentecategoria}</td>`
                table += `<td>${objJSON[i].validadereag}</td>`
                table += `<td>${objJSON[i].quantreag}</td>`
                table += `<td><form onsubmit="excluirReagente('${objJSON[i].nomereag}')" name="excluir"><button type="submit" name="deletar"class="btn btn-flat btn-sm">Deletar<button></form></td>`;
                table += `<td><form method="get" onsubmit="alterarReagente('${objJSON[i].nomereag}')" name="alterar"><button type="submit" name="alterar" class="btn btn-flat btn-sm">Alterar<button></form></td>`;
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
  fetch(`./listar.php`, {
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
            table += `<th scope="row">${objJSON[i].idreag}</th>`
                table += `<td>${objJSON[i].nomereag}</td>`
                table += `<td>${objJSON[i].reagentefornecedor}</td>`
                table += `<td>${objJSON[i].reagentecategoria}</td>`
                table += `<td>${objJSON[i].validadereag}</td>`
                table += `<td>${objJSON[i].quantreag}</td>`
                table += `<td><form onsubmit="excluirReagente('${objJSON[i].nomereag}')" name="excluir"><button type="submit" name="deletar"class="btn btn-flat btn-sm">Deletar<button></form></td>`;
                table += `<td><form method="get" onsubmit="alterarReagente('${objJSON[i].nomereag}')" name="alterar"><button type="submit" name="alterar" class="btn btn-flat btn-sm">Alterar<button></form></td>`;
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
function que puxa o reagente para jogar ele pro formulario, pegando ele de acordo com o 'nomereag' 
do botao de editar, printado junto ao reagente na funcao de listagem
*/
function alterarReagente(nomereagente) {
  let nomereag = nomereagente;
  let listarreagalterar = document.getElementById('reagentefrompesquisaalterar');
  fetch(`./busca.php?nomereag=${nomereag}`, {
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
          table += `<th scope="row">${reagente.idreag}</th>`
            table += `<td id="nomereagentealterar">${reagente.nomereag}</td>`
            table += `<td>${reagente.reagentefornecedor}</td>`
            table += `<td>${reagente.reagentecategoria}</td>`
            table += `<td>${reagente.validadereag}</td>`
          table += `<td>
            <form method="post" onsubmit="atualizarReagente()" name="atualizar" id="atualizaReagente">	
              <div class="def-number-input number-input safari_only">
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                  <input type="hidden" name="nomereag" value="${reagente.nomereag}">
                  <input class="quantity" min="0" name="quantreag" type="number" value="${reagente.quantreag}">
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
*/
function atualizarReagente() {
  let quantreag = atualizar.quantreag.value;
  let nomereag = atualizar.nomereag.value;

  var reagenteAtualizar = new Reagente(nomereag, quantreag);

  fetch('./altera.php', {
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
function excluirReagente(nomereag) {
  var reag = nomereag;
  alert(reag);
  let confirmar = window.confirm("Deseja excluir realmente?");
  if(confirmar) {
    var reagente = new Object()
    reagente.nomereag = reag;
    fetch('./deleta.php', {
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




/* construtor para organizacao da funcao de inclusao de reagente */
var Reagente = function(nomereag, quantreag, reagentefornecedor, reagentecategoria, validadereag) {
  this.nomereag = nomereag;
  this.quantreag = quantreag
  this.reagentefornecedor = reagentefornecedor;
  this.reagentecategoria = reagentecategoria;
  this.validadereag = validadereag;
} 





/*START functions para montar o select de fornecedor na opção de incluir novo reagente START*/
function carregaFornecedores(){
  let request = new XMLHttpRequest();
  request.open('get', 'lista_fornecedores.php');
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
      option.innerText = decodeURI(objJSON[i].nomefornecedor);
      option.value = objJSON[i].idfornecedor;
      select.appendChild(option);
    }
  
}
/*END functions para montar o select de fornecedor na opção de incluir novo reagente END*/




/*START functions para montar as categorias organicas e inorganicas na opção de incluir novo reagente START*/
function carregaCategorias(){
  let request = new XMLHttpRequest();
  request.open('get', 'lista_categorias.php');
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
        montaselectCategorias(request.responseText,'reagcateg');
      } 
      else 
      {
        console.log('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
  }  
}

function montaselectCategorias(dados,idDestino){
  let select = document.getElementById(idDestino);
  let option = document.createElement("option");
  select.innerHTML= '';
  option.innerText =  "-----";
  option.value = '0';
  select.appendChild(option);
  objJSON = JSON.parse(dados);

  for (let i in objJSON){
      option = document.createElement("option");
      option.innerText = decodeURI(objJSON[i].nomecategoria);
      option.value = objJSON[i].idcategoria;
      select.appendChild(option);
    }
  
}
/*END functions para montar as categorias organicas e inorganicas na opção de incluir novo reagente END*/


/*START functions de manipulação de display dos options START*/
function optionDisplayIncluirReagente () {
  $('.mincards').hide();
  $('.inserirreagente').show();
  carregaFornecedores();
  carregaCategorias();
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




  