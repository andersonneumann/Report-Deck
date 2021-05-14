$(document).ready(function(){

  loadPage();

});

function loadPage(){
  $(".appendContentClick").html("");
  exibirMenuDeOpcoes();
}

function exibirMenuDeOpcoes(){
  $(".appendContentClick").html("");
  var nomeUsuario = "[User]";

  var itens = [["Mapa de Ocorrências", "Nova Ocorrência"], ["Visualizar Ocorrências", "<br>Meu Perfil"], ["Configurações", "Sair"]];
  var imagens = [["mapaBranco.png", "novaOcorrenciaBranco.png"],["visualizarBranco.png", "perfilBranco.png"],["configBranco.png", "sairBranco.png"]]
  var action = [["exibirMapaDeOcorrencias()","criarNovaOcorrencia()"],["visualizarOcorrencias()","exibirPerfil()"],["exibirConfigs()","sair()"]]

  var val = "";
  val+= '<br><h2 class="text-center textoTemaEscuro">Bem Vindo '+ nomeUsuario +'!</h2>'
  val += '<ul class="nav justify-content-center">'
  for (var i = 0; i<3; i++){
    val += '<a onclick="' + action[i][0] + '"><li class="nav-item"><div class="navegacao"><img src="../images/navBar/' + imagens[i][0] + '" class="rounded mx-auto d-block imgNavBar">'
    val += '<h6 class="descricaoNavBar textoTemaEscuro">' + itens[i][0] + '</h6></div></li></a>'
    val += '<a onclick="' + action[i][1] + '"><div class="navegacao"><img src="../images/navBar/' + imagens[i][1] + '" class="rounded mx-auto d-block imgNavBar">'
    val += '<h6 class="descricaoNavBar textoTemaEscuro">' + itens[i][1] + '</h6></div></a>'
  }
  val += '</ul>'
  $(".appendContentClick").append(val);
}

function exibirMapaDeOcorrencias(){
  $(".appendContentClick").html("");
  alert("Exibindo mapa de Ocorrências");
}

function criarNovaOcorrencia(){
  $(".appendContentClick").html("");
  var val = "";
  val += '<br><h2 class="text-center textoTemaEscuro">Reportar Ocorrência:</h2>';
  val += '<p class="text-center novaOcorrencia textoTemaEscuro">Os campos com * são obrigatórios!</p>';
  val += '<div class="novaOcorrencia"><form>';
  val += '<div class="form-group">';
  val += '<label for="tituloOcorrencia" class="textoTemaEscuro">*Título:</label>'
  val += '<input type="text" class="form-control" required>';
  val += '<small class="textoTemaEscuro">Insira um título para a ocorrência</small></div>';
  val += '<div class="form-group">';
  val += '<label for="descricaoSuspeito" class="textoTemaEscuro">*Descrição do Ocorrido:</label>';
  val += '<textarea class="form-control" rows="3" required></textarea>';
  val += '<small class="textoTemaEscuro">Descreva detalhadamente o que aconteceu</small>';
  val += '</div>';
  val += '<div class="form-group">';
  val += '<label for="tipoCrime" class="textoTemaEscuro">*Tipo de Crime:</label>';
  val += '<select class="form-control">';
  val += '<option selected disabled hidden>Selecione o tipo de crime</option>';
  val += '<option>Assalto</option>';
  val += '<option>Sequestro</option>';
  val += '<option>Homicídio</option>';
  val += '<option>Estupro</option>';
  val += '<option>Arrastão</option>';
  val += '<option>Tráfico de Drogas</option></select></div>';
  val += '<div class="form-group">';
  val += '<label for="endereco" class="textoTemaEscuro">*Endereço do Ocorrido:</label>';
  val += '<input type="text" class="form-control" required>';
  val += '<small class="textoTemaEscuro">Insira o local em que o crime ocorreu</small></div>';
  val += '<div class="form-group">';
  val += '<label for="dataOcorrencia" class="textoTemaEscuro">*Data do Ocorrido:</label>';
  val += '<input type="date" class="form-control" required>';
  val += '<small class="textoTemaEscuro">Insira a data da ocorrência</small></div>';
  val += '<div class="form-group">';
  val += '<label for="horaOcorrencia" class="textoTemaEscuro">*Horário do Ocorrido:</label>';
  val += '<input type="time" class="form-control" required>';
  val += '<small class="textoTemaEscuro">Insira o horário aproximado da ocorrência</small></div>';
  val += '<div class="form-group">';
  val += '<label for="horaOcorrencia" class="textoTemaEscuro">Imagem do Ocorrido:</label>';
  val += '<input type="file" class="textoTemaEscuro" accept="image/*" onchange="loadFile(event)">';
  val += '<img class="imagemOcorrenciaPreview" id="output"/></div>';
  val += '<h5 class="text-center textoTemaEscuro">Informações Adicionais:</h5>';
  val += '<div class="form-group">';
  val += '<label for="tipoCrime" class="textoTemaEscuro">Grau de proximidade do ocorrido:</label>';
  val += '<select class="form-control">';
  val += '<option selected>Eu fui a vítima do ocorrido</option>';
  val += '<option>Eu presenciei o ocorrido</option>';
  val += '<option>Eu soube do ocorrido</option>';
  val += '<option>Eu conheço a vítima do ocorrido</option>';
  val += '</select></div>';
  val += '<div class="form-check">';
  val += '<input type="checkbox" class="form-check-input">';
  val += '<label class="form-check-label textoTemaEscuro">Desejo exibir minha idade na ocorrência</label><br></div>';
  val += '<div class="form-check">';
  val += '<input type="checkbox" class="form-check-input">';
  val += '<label class="form-check-label textoTemaEscuro">Desejo exibir meu gênero na ocorrência</label><br></div>';
  val += '<h5 class="text-center textoTemaEscuro">Termo de Serviço:</h5>';
  val += '<div class="form-check">';
  val += '<input type="checkbox" class="form-check-input" required>';
  val += '<label class="form-check-label textoTemaEscuro text-center">* Concordo que a utilização de má-fé dessa ferramenta, resultará na suspensão temporária da minha conta no Report Deck</label><br>';
  val += '</div><br>';
  val += '<button type="submit" class="btn btn-success mx-auto d-block">Enviar Ocorrência</button><br>';
  val += '<button type="button" class="btn btn-danger mx-auto d-block" onclick="exibirMenuDeOpcoes()">Cancelar Ocorrência</button></form></div>';
  $(".appendContentClick").append(val);
}

function visualizarOcorrencias(){
  $(".appendContentClick").html("");
  alert("Exibindo ocorrencias");
}

function exibirPerfil(){
  $(".appendContentClick").html("");
  alert("Exibindo perfil");
}

function exibirConfigs(){
  $(".appendContentClick").html("");
  alert("Exibindo configs");
}

function sair(){
  $(".appendContentClick").html("");
  alert("Saindo");
}

// Exibir preview da imagem na criação da ocorrência:
var loadFile = function(event) {
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('output');
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
};
