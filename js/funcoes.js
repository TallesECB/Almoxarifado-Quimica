
const resultado = document.getElementById("resultado");
const formEdit = document.getElementById('atualizaReagente');

function inserirReagente() {
  resultado.innerHTML = ''; 
  let fornecedor = inserir.fornecedor.value;
  let qtd = inserir.quant.value;
  let nomereag = inserir.nomereag.value;
  var reagente = new Reagente(nomereag, fornecedor, qtd); 
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

function alterarReagente() {
  let reagente = searchReagente.reagNome.value;

  fetch(`./busca.php?reagente=${reagente}`, {
    method: 'GET',
  })
  .then(response => response.json())
  .then(reagente => {
    if(!reagente.hasOwnProperty("status")) {
      atualizar.nomereag.value = reagente.nomereag;
      atualizar.fornecedor.value = reagente.fornecedor;
      atualizar.quant.value = reagente.quant;
      formEdit.style.display = 'block';
      resultado.innerHTML = '';
    } else {
      resultado.innerHTML = reagente.status;
      formEdit.style.display = 'none';
    } 
  })
  .catch(error => console.error(error));

  event.preventDefault();
}

function atualizarReagente() {

  let fornecedor = atualizar.fornecedor.value;
  let qtd = atualizar.quant.value;
  let nomereag = atualizar.nomereag.value;

  var reagenteAtualizar = new Reagente(nomereag, fornecedor, qtd);

  fetch('./altera.php', {
    method: 'PUT',
    body: JSON.stringify(reagenteAtualizar),
    header: new Headers()
  })
  .then(response => response.text())
  .then(resposta => {
    resultado.innerHTML = resposta;
    formEdit.style.display = 'none';
  })
  .catch(error => console.error(error));


  event.preventDefault();
}

function excluirReagente() {

  let confirmar = window.confirm("Deseja excluir realmente?");
  if(confirmar) {
    var reag = excluir.reag.value;
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
}


var Reagente = function(nomereag, fornecedor, quant) {
  this.nomereag = nomereag;
  this.fornecedor = fornecedor;
  this.quant = quant
} 
