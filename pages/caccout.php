<?php
session_start();
include './connect.php';
$usuario = mysqli_real_escape_string($conn,$_POST['usr']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$rg = mysqli_real_escape_string($conn,$_POST['rg']);
$cpf = mysqli_real_escape_string($conn,$_POST['cpf']);
$senha1 = mysqli_real_escape_string($conn,$_POST['senha1']);
$senha2 = mysqli_real_escape_string($conn,$_POST['senha2']);

$query = "INSERT INTO `Cidadao` (`CPF`, `NomeUsuario`, `Senha`, `RG`, `Email`) VALUES ('{$cpf}', '{$usuario}', '{$senha1}','{$rg}', '{$email}');";

if (!mysqli_query($conn, $query)){
    echo mysqli_error($conn);
}