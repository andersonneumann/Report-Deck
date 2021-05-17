<?php
session_start();
include './connect.php';
if (empty($_POST['user']) || empty($_POST['passwd'])){
    header('Location: kkkk.php');
    exit();
}
$usuario = mysqli_real_escape_string($conn,$_POST['user']);
$senha = mysqli_real_escape_string($conn,$_POST['passwd']);

$query = "SELECT NomeUsuario from Cidadao where (NomeUsuario = '". $usuario."' or Email = '".$usuario."') and Senha = '".$senha."'";

$result = mysqli_query($conn, $query); //Executa a query
$row = mysqli_num_rows($result); //Conta quantas colunas foram afetadas

if ($row == 1){ //Se encontrar linhas
    $_SESSION['user'] = $usuario; //Irá capturar o nome da sessão
    header('Location: pageUsuario.php');
    exit();
}else{ //Se não encontrar
    $_SESSION['not_find'] = true;
    header('Location: login.php');
    exit();
}
?>