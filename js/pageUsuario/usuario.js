$(document).ready(function(){

  loadPage();

});

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
}

function exibirMapaDeOcorrencias(){
  $(".appendContentClick").html("");
  val = getCookie('ocorrencias');
  alert("Exibindo mapa de Ocorrências");
}

function criarNovaOcorrencia(){
  $(".appendContentClick").html("");
  var val = '<iframe src="client/pageAddOcorrencia.php" width="100%" height="100%" frameBorder="0" title="Iframe Example"></iframe>';
  $(".appendContentClick").append(val);
}

function visualizarOcorrencias(){
  $(".appendContentClick").html("");
  var val = '<iframe src="client/vizualizaOcorrencia.php" width="100%" height="100%" frameBorder="0" title="Iframe Example"></iframe>';
  $(".appendContentClick").append(val);
}

function exibirPerfil(){
  $(".appendContentClick").html("");
  var val ='<br><h3 class="text-center textoTemaEscuro">Meu Perfil:</h3>';
  val +='<p class="text-center novaOcorrencia textoTemaEscuro">Favor alterar os campos que deseja:</p><div class="novaOcorrencia"><form>';
  val +='<div class="form-group"><label for="nomeUsuario" class="textoTemaEscuro">Nome:</label><input id="nomeUsuario" name="nomeUsuario" type="text" class="form-control styleForm" value="[getNomeUsuario]"></div>';
  val +='<div class="form-group"><label for="emailUsuario" class="textoTemaEscuro">E-Mail:</label><input id="emailUsuario" name="emailUsuario" type="email" class="form-control styleForm" value="[getEmailUsuario]"></div>';
  val +='<div class="form-group"><label for="RGUsuario" class="textoTemaEscuro">RG:</label><input id="RGUsuario" name="RGUsuario" type="text" class="form-control styleForm" value="[getRGUsuario]"></div>';
  val +='<div class="form-group"><label for="CPFUsuario" class="textoTemaEscuro">CPF:</label><input id="CPFUsuario" name="CPFUsuario" type="text" class="form-control styleForm" value="[getCPFUsuario]"></div>';
  val +='<div class="form-group"><label for="generoUsuario" class="textoTemaEscuro">Gênero:</label><select id="generoUsuario" name="generoUsuario" class="form-control styleForm"><option selected="" disabled="" hidden="">[getGeneroUsuario]</option>';
  val +='<optgroup label="Cisgênero"></optgroup><option value="masculino">Masculino</option><option value="Feminino">Feminino</option><optgroup label="Transsexual"></optgroup><option value="homemTrans">Homem Trans</option>';
  val +='<option value="mulherTrans">Mulher Trans</option><optgroup label="Outros"></optgroup><option value="naoBinarioTrans">Não Binário</option></select></div>';
  val +='<div class="form-group"><label for="nctoUsuario" class="textoTemaEscuro">Data de Nascimento:</label><input id="nctoUsuario" name="nctoUsuario" type="date" class="form-control styleForm"></div>';
  val +='<div class="form-group"><label for="telefoneUsuario" class="textoTemaEscuro">Telefone:</label><input id="telefoneUsuario" name="telefoneUsuario" type="text" class="form-control styleForm" value="[getTelefoneUsuario]"></div>';
  val +='<div class="form-group"><label for="senhaUsuario" class="textoTemaEscuro">Senha:</label><input id="senhaUsuario" name="senhaUsuario" type="password" class="form-control styleForm"></div>';
  val +='<div class="form-group"><label for="confirmarSenhaUsuario" class="textoTemaEscuro">Confirmar Senha:</label><input id="confirmarSenhaUsuario" name="confirmarSenhaUsuario" type="password" class="form-control styleForm"></div>';
  val +='<br><button type="submit" class="btn btn-secondary mx-auto d-block">Atualizar Dados</button><br></form></div>';
  $(".appendContentClick").append(val);
}

function exibirConfigs(){
  $(".appendContentClick").html("");
  alert("Exibindo configs");
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
