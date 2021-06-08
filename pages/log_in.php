<?php
session_start();
include './connect.php';
if (empty($_POST['user']) || empty($_POST['passwd'])){
    header('Location: login.php');
    exit();
}
$usuario = mysqli_real_escape_string($conn,$_POST['user']);
$senha = mysqli_real_escape_string($conn,$_POST['passwd']);

$query = "SELECT Nome_completo, CPF from Cidadao where (CPF = '". $usuario."' or Email = '".$usuario."') and Senha = '".$senha."'";

$result = mysqli_query($conn, $query); //Executa a query
$row = mysqli_num_rows($result); //Conta quantas colunas foram afetadas

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($fech = mysqli_fetch_assoc($result)) {
    $usuario = $fech["Nome_completo"];
    $cpf = $fech["CPF"];
  }
}

if ($row == 1){ //Se encontrar linhas
    $_SESSION['user'] = $usuario; //Irá capturar o nome da sessão
    $_SESSION['cpf'] = $cpf;
    header('Location: pageUsuario.php');
    exit();
}else if($usuario == "admin" and $senha= "admin"){
    $_SESSION['user'] = $usuario; //Irá capturar o nome da sessão
    $_SESSION['cpf'] = "";
    header('Location: pageAdmin.php');
    exit();
}
else{ //Se não encontrar
    $_SESSION['not_find'] = true;
    header('Location: login.php');
    exit();
}
?>
