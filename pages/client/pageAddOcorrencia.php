
<html>
<head>
        <title>Report Deck</title>
        <script type="text/javascript" src="../../js/pageUsuario/jquery.js"></script>
        <script type="text/javascript" src="../../js/pageUsuario/usuario.js"></script>
        <link rel="shortcut icon" href="../images/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../../css/styleUser.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&amp;display=swap" rel="stylesheet">
    </head>
    <body>
      <br>
            <h2 class="text-center textoTemaEscuro">Nova Ocorrência:</h2>
            <p class="text-center novaOcorrencia textoTemaEscuro">Os campos com * são obrigatórios!</p>
            <div class="novaOcorrencia">
                <form action="../add_ocorrencia.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tituloOcorrencia" class="textoTemaEscuro">*Título:</label>
                        <input id="titulo" name="titulo" type="text" class="form-control styleForm" required="">
                        <small class="textoTemaEscuro">Insira um título para a ocorrência</small>
                    </div>
                    <div class="form-group">
                        <label for="descricaoSuspeito" class="textoTemaEscuro">*Descrição do Ocorrido:</label>
                        <textarea id="obs" name="obs" class="form-control styleForm" rows="3" required=""></textarea>
                        <small class="textoTemaEscuro">Descreva detalhadamente o que aconteceu</small>
                    </div>
                    <div class="form-group"><label for="tipoCrime" class="textoTemaEscuro">*Tipo de Crime:</label><select id="crime" name="crime" class="form-control styleForm"><option selected="" disabled="" hidden="">Selecione o tipo de crime</option><option value="1">Assalto</option><option value="2">Sequestro</option><option value="3">Homicídio</option><option value="4">Estupro</option><option value="5">Arrastão</option><option value="6">Tráfico de Drogas</option></select></div><div class="form-group"><label for="endereco" class="textoTemaEscuro">*Endereço do Ocorrido:</label><input id="endereco" name="endereco" type="text" class="form-control styleForm" placeholder="Ex: Rua Getúlio Vargas 152" required=""><small class="textoTemaEscuro">Insira o local em que o crime ocorreu</small></div><div class="form-group"><label for="dataOcorrencia" class="textoTemaEscuro">*Data do Ocorrido:</label><input id="data" name="data" type="date" class="form-control styleForm" required=""><small class="textoTemaEscuro">Insira a data da ocorrência</small></div><div class="form-group"><label for="horaOcorrencia" class="textoTemaEscuro">*Horário do Ocorrido:</label><input id="hora" name="hora" type="time" class="form-control styleForm" required=""><small class="textoTemaEscuro">Insira o horário aproximado da ocorrência</small></div><div class="form-group"><label for="horaOcorrencia" class="textoTemaEscuro">Imagem do Ocorrido:</label><input id="imagem" name="imagem" type="file" class="textoTemaEscuro" accept="image/*" onchange="loadFile(event)"><img class="imagemOcorrenciaPreview" id="output"></div><h5 class="text-center textoTemaEscuro">Informações Adicionais:</h5><div class="form-group"><label for="tipoCrime" class="textoTemaEscuro">Grau de proximidade do ocorrido:</label><select id="grau" name="grau" class="form-control styleForm"><option selected="" value="1">Eu fui a vítima do ocorrido</option><option value="2">Eu presenciei o ocorrido</option><option value="3">Eu soube do ocorrido</option><option value="4">Eu conheço a vítima do ocorrido</option></select></div><div class="form-check"><input id="idade" name="idade" type="checkbox" class="form-check-input"><label class="form-check-label textoTemaEscuro">Desejo exibir minha idade na ocorrência</label><br></div><div class="form-check"><input id="genero" name="genero" type="checkbox" class="form-check-input"><label class="form-check-label textoTemaEscuro">Desejo exibir meu gênero na ocorrência</label><br></div><h5 class="text-center textoTemaEscuro">Termo de Serviço:</h5><div class="form-check"><input id="termos" name="termos" type="checkbox" class="form-check-input" required=""><label class="form-check-label textoTemaEscuro text-center">* Concordo que a utilização de má-fé dessa ferramenta, resultará na suspensão temporária da minha conta no Report Deck</label><br></div><br><button type="submit" class="btn btn-secondary mx-auto d-block">Enviar Ocorrência</button><br></form></div></div>


    </body></html>
