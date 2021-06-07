<?php

session_start();
include './connect.php';
include './verify_login.php';

//Campos
$titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
$desc = mysqli_real_escape_string($conn, $_POST['obs']);
$crime = mysqli_real_escape_string($conn, $_POST['crime']);
$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
$data = mysqli_real_escape_string($conn, $_POST['data']);
$hora = mysqli_real_escape_string($conn, $_POST['hora']);
$grau = mysqli_real_escape_string($conn, $_POST['grau']);

//Checkers
$boxIdade = mysqli_real_escape_string($conn, $_POST['idade']);
$boxGenero = mysqli_real_escape_string($conn, $_POST['genero']);
$boxTermos = mysqli_real_escape_string($conn, $_POST['termos']);

//Dados do usuário
$cpf = $_SESSION['cpf'];
$imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));


//Query que será executada
$query = "INSERT INTO `Ocorrencia` (`Titulo`, `Crime`, `grauDoCrime`, `DescricaoCrime`, `Observacao`, `enderecoOcorrencia`, `Imagem`, `DataOcorrencia`, `HoraOcorrenciaApx`, `cidadao`, `OcorrenciaAprovada`) "
        . "VALUES ('$titulo', '$crime', '$grau', '$desc', NULL, '$endereco', '$imagem', '$data', '$hora', '$cpf', 2)";
if (mysqli_query($conn, $query)) {
	//Se o script for executado corretamente
	$_SESSION['enviadoSucesso'] = true;
    header('Location: client/sucesso.php');
    exit();
} else {
	echo mysqli_error($conn);
}
