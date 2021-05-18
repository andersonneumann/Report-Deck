<?php
session_start();
include './connect.php';
$usuario = mysqli_real_escape_string($conn,$_POST['usr']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$rg = mysqli_real_escape_string($conn,$_POST['rg']);
$genero = mysqli_real_escape_string($conn, $_POST['genero']);
$cpf = mysqli_real_escape_string($conn,$_POST['cpf']);
$fone = mysqli_real_escape_string($conn,$_POST['fone']);
$nascimento = mysqli_real_escape_string($conn,$_POST['nasc']);
$senha1 = mysqli_real_escape_string($conn,$_POST['senha1']);
$senha2 = mysqli_real_escape_string($conn,$_POST['senha2']);
$id = 1;

$query = "INSERT INTO `Cidadao` (`CPF`, `ID`,`Genero`, `Nascimento`, `Nome_completo`, `Telefone`, `Senha`, `RG`, `Email`) "
        . "VALUES ('".$cpf."', ".$id.", '".$genero."', '".$nascimento."', '".$usuario."', '".$fone."', '".$senha1."', '".$rg."', '".$email."');";

if (!mysqli_query($conn, $query)){
    echo mysqli_error($conn);
} else {
    header('Location: login.php');
    exit();
}