$(document).ready(function(){

  loadPage();
  exibirTemaCorrespondente();

});

var temaUsuario = false;

// False = Claro
// True = Escuro

function loadPage(){
  $(".appendContentClick").html("");
  exibirMenuDeOpcoes();
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function exibirMenuDeOpcoes(){
  $(".appendContentClick").html("");
  var nomeUsuario = getCookie('user');

  var itens = [["Mapa de Ocorrências", "Nova Ocorrência"], ["Visualizar Ocorrências", "<br>Meu Perfil"], ["Configurações", "Sair"]];
  var imagens = [["mapaBranco.png", "novaOcorrenciaBranco.png"],["visualizarBranco.png", "perfilBranco.png"],["configBranco.png", "sairBranco.png"]]
  var action = [["exibirMapaDeOcorrencias()","criarNovaOcorrencia()"],["visualizarOcorrencias()","exibirPerfil()"],["exibirConfigs()","sair()"]]

  var val = "";
  val+= '<br><h3 class="text-center textoTemaEscuro">Bem Vindo<br>'+ nomeUsuario +'!</h3>'
  val += '<ul class="nav justify-content-center">'
  for (var i = 0; i<3; i++){
    val += '<a onclick="' + action[i][0] + '"><li class="nav-item"><div class="navegacao"><img src="../images/navBar/' + imagens[i][0] + '" class="rounded mx-auto d-block imgNavBar">'
    val += '<h6 class="descricaoNavBar textoTemaEscuro">' + itens[i][0] + '</h6></div></li></a>'
    val += '<a onclick="' + action[i][1] + '"><div class="navegacao"><img src="../images/navBar/' + imagens[i][1] + '" class="rounded mx-auto d-block imgNavBar">'
    val += '<h6 class="descricaoNavBar textoTemaEscuro">' + itens[i][1] + '</h6></div></a>'
  }
  val += '</ul>'
  $(".appendContentClick").append(val);
  exibirTemaCorrespondente();
}

function exibirMapaDeOcorrencias(){
  $(".appendContentClick").html("");
  val = getCookie('ocorrencias');
  alert("Exibindo mapa de Ocorrências");
  exibirTemaCorrespondente();
}

function criarNovaOcorrencia(){
  $(".appendContentClick").html("");
  var val = '<iframe src="client/pageAddOcorrencia.php" width="100%" height="100%" frameBorder="0" title="Iframe Example"></iframe>';
  $(".appendContentClick").append(val);
  exibirTemaCorrespondente();
}

function visualizarOcorrencias(){
  $(".appendContentClick").html("");
  var val = '<iframe src="client/vizualizaOcorrencia.php" width="100%" height="100%" frameBorder="0" title="Iframe Example"></iframe>';
  $(".appendContentClick").append(val);
  exibirTemaCorrespondente();
}

function exibirConfigs(){
  $(".appendContentClick").html("");
  var val = '';
  val +='<br><h3 class="text-center textoTemaEscuro">Tema do App:</h3>';
  if (temaUsuario == false){
    val +='<label class="switch mx-auto d-block"><input class="alterarTema" type="checkbox"><span class="slider round"></span></label>';
  }else{
    val +='<label class="switch mx-auto d-block"><input class="alterarTema" type="checkbox" checked><span class="slider round"></span></label>';
  }
  val +='<h6 id="textoTema" class="text-center textoTemaEscuro"></h6>';
  val +='<h3 class="text-center textoTemaEscuro">Dados da Conta:</h3>';
  val +='<p class="text-center novaOcorrencia textoTemaEscuro">Favor alterar os campos que deseja:</p><div class="novaOcorrencia">';
  val +='<form name="cadastro" action="att_perfil.php" method="POST"><div class="form-group"><label for="nomeUsuario" class="textoTemaEscuro">Nome:</label><input id="nomeUsuario" name="nomeUsuario" type="text" class="form-control styleForm" value="'+getCookie('user')+'"></div>';
  val +='<div class="form-group"><label for="emailUsuario" class="textoTemaEscuro">E-Mail:</label><input id="emailUsuario" name="emailUsuario" type="email" class="form-control styleForm" value="'+getCookie('email')+'"></div>';
  val +='<div class="form-group"><label for="generoUsuario" class="textoTemaEscuro">Gênero:</label><select id="generoUsuario" name="generoUsuario" class="form-control styleForm"><option selected="" value="'+getCookie('genero')+'" hidden="">'+getCookie('genero')+'</option>';
  val +='<optgroup label="Cisgênero"></optgroup><option value="Masculino">Masculino</option><option value="Feminino">Feminino</option><optgroup label="Transsexual"></optgroup><option value="Homem Trans">Homem Trans</option>';
  val +='<option value="Mulher Trans">Mulher Trans</option><optgroup label="Outros"></optgroup><option value="Não Binário">Não Binário</option></select></div>';
  val +='<div class="form-group"><label for="nctoUsuario" class="textoTemaEscuro">Data de Nascimento:</label><input id="nctoUsuario" name="nctoUsuario" type="date" class="form-control styleForm" value="'+getCookie('nascimento')+'"></div>';
  val +='<div class="form-group"><label for="telefoneUsuario" class="textoTemaEscuro">Telefone:</label><input id="telefoneUsuario" name="telefoneUsuario" type="text" class="form-control styleForm" value="'+getCookie('telefone')+'"></div>';
  val +='<div class="form-group"><label for="senhaUsuario" class="textoTemaEscuro">Senha:</label><input id="senhaUsuario" name="senhaUsuario" type="password" class="form-control styleForm" value="'+getCookie('senha')+'"></div>';
  val +='<div class="form-group"><label for="confirmarSenhaUsuario" class="textoTemaEscuro">Confirmar Senha:</label><input id="confirmarSenhaUsuario" name="confirmarSenhaUsuario" value="'+getCookie('senha')+'" type="password" class="form-control styleForm"></div>';
  val +='<br><button type="submit" class="btn btn-secondary mx-auto d-block" >Atualizar Dados</button><br></form></div>';
  $(".appendContentClick").append(val);
  exibirTemaCorrespondente();


  if ($('.alterarTema').is(':checked')){

    $('#textoTema').html("Escuro");

  }else{

    $('#textoTema').html("Claro");

  }

  $('.alterarTema').click(function(){

    $('#textoTema').html("");

    if ($('.alterarTema').is(':checked')){

      temaUsuario = true;
      $('#textoTema').html("Escuro");
      exibirTemaCorrespondente();

    }else{

      temaUsuario = false;
      $('#textoTema').html("Claro");
      exibirTemaCorrespondente();

    }

  });

}

function exibirTemaCorrespondente(){

  if (temaUsuario == false){
    $('h1').css("color", "#333333");
    $('h2').css("color", "#333333");
    $('h3').css("color", "#333333");
    $('h4').css("color", "#333333");
    $('h5').css("color", "#333333");
    $('h6').css("color", "#333333");
    $('body').css("background-color", "#f0f0f0");
    $('.textoTemaEscuro').css("color", "#333333");
    $('.navegacao').css("border", "2px solid #333333");
    $('.navegacao').css("box-shadow", "0px 1px 17px 3px rgba(199,199,199,0.9)");
    $('.navegacao').css("-webkit-box-shadow", "0px 1px 17px 3px rgba(199,199,199,0.9)");
    $('.navegacao').css("-moz-box-shadow", "0px 1px 17px 3px rgba(199,199,199,0.9)");
    $('.styleForm').css("background-color", "#f0f0f0");
    $('.styleForm').css("border", "1px solid #333333");
    $('.styleForm').css("color", "#333333");
    $('.styleForm::placeholder').css("color", "#757575");

  }else{
    $('h1').css("color", "#E0E0E0");
    $('h2').css("color", "#E0E0E0");
    $('h3').css("color", "#E0E0E0");
    $('h4').css("color", "#E0E0E0");
    $('h5').css("color", "#E0E0E0");
    $('h6').css("color", "#E0E0E0");
    $('body').css("background-color", "#383838");
    $('.navegacao').css("border", "2px solid #E0E0E0");
    $('.textoTemaEscuro').css("color", "#E0E0E0");
    $('.imgNavBar').css("filter", "invert(1)");
    $('.navegacao').css("box-shadow", "0px 1px 17px 3px rgba(61,61,61,0.9)");
    $('.navegacao').css("-webkit-box-shadow", "0px 1px 17px 3px rgba(61,61,61,0.9)");
    $('.navegacao').css("-moz-box-shadow", "0px 1px 17px 3px rgba(61,61,61,0.9)");
    $('.styleForm').css("background-color", "#545454");
    $('.styleForm').css("border", "1px solid #E0E0E0");
    $('.styleForm').css("color", "#E3E3E3");
    $('.styleForm::placeholder').css("color", "#B5B5B5");
  }

}

function exibirPerfil(){
  $(".appendContentClick").html("");
  var val = '<iframe src="client/vizualizaOcorrenciasPerfil.php" width="100%" height="100%" frameBorder="0" title="Iframe Example"></iframe>';
  $(".appendContentClick").append(val);
}

function sair(){
  window.location = 'index.php';
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
