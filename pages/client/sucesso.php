<?php
	session_start();
	if (isset($_SESSION['enviadoSucesso'])):
	?>
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
    <body class="iframeSucesso">
			<br><br>
				<img class="mx-auto d-block espera" src="../../images/waiting.png">
				<h6 class="text-center">Obrigado por enviar!<br>Sua ocorrência está em análise pelos nossos administradores, antes de ser exibida para todos os usuários.</h6>
				<!--<button type="button" class="btn btn-primary mx-auto d-block" onclick="window.location = '../pageUsuario.php'">Voltar</button>-->
    </body>
</html>
<?php endif; ?>
