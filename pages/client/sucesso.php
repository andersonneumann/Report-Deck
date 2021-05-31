<?php
	session_start();
	if (isset($_SESSION['enviadoSucesso'])):
	?>
	<html><head>
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
    <body class="textoTemaEscuro">
    	<img style="margin: 10%" src="../../images/confere.png" width="50%"><br>
    	<div style="margin: 5%">Sua ocorrência foi encaminhada para análise e em breve estará disponível. Obrigado pela contribuição!</div>
    </body></html>
<?php endif; ?>