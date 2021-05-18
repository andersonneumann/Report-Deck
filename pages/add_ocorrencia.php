<?php
session_start();
include './connect.php';

//Campos
$titulo = mysqli_real_escape_string($conn,$_POST['titulo']);
$desc = mysqli_real_escape_string($conn,$_POST['obs']);
$crime = mysqli_real_escape_string($conn,$_POST['crime']);
$endereco = mysqli_real_escape_string($conn,$_POST['endereco']);
$data = mysqli_real_escape_string($conn,$_POST['data']);
$hora = mysqli_real_escape_string($conn, $_POST['hora']);
$grau = mysqli_real_escape_string($conn, $_POST['grau']);

//Checkers
$boxIdade = mysqli_real_escape_string($conn, $_POST['idade']);
$boxGenero = mysqli_real_escape_string($conn, $_POST['genero']);
$boxTermos = mysqli_real_escape_string($conn, $_POST['termos']);

//Dados do usuário
$cpf = $_SESSION['cpf'];

//Query que será executada
$query = "INSERT INTO `Ocorrencia` (`Codigo`, `Titulo`, `Crime`, `grauDoCrime`, `DescricaoCrime`, `Observacao`, `enderecoOcorrencia`, `DataOcorrencia`, `HoraOcorrenciaApx`, `cidadao`)"
        . "VALUES (1, '".$titulo."', '".$crime."', '".$grau."', '".$desc."', NULL, '".$endereco."', '".$data."', '".$hora."', '".$cpf."')";

if (!mysqli_query($conn, $query)){
    echo mysqli_error($conn);
} else {
    header('Location: pageUsuario.php');
    exit();
}