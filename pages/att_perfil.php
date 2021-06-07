<?php

	include './connect.php';
	session_start();

	$nome = mysqli_real_escape_string($conn,$_POST['nomeUsuario']);
	$email = mysqli_real_escape_string($conn,$_POST['emailUsuario']);
	$genero = mysqli_real_escape_string($conn, $_POST['generoUsuario']);
	$fone = mysqli_real_escape_string($conn,$_POST['nctoUsuario']);
	$nascimento = mysqli_real_escape_string($conn,$_POST['telefoneUsuario']);
	$senha = mysqli_real_escape_string($conn,$_POST['senhaUsuario']);

	$cpf = $_SESSION['cpf'];

	$sql = "UPDATE Cidadao SET Genero = '".$genero."', Nome_completo = '".$nome."',Telefone = '".$fone."', Email = '".$email."' WHERE Cidadao.CPF = '".$cpf."'";

	if (!mysqli_query($conn, $sql)){
    	echo mysqli_error($conn);
	} else {
    	header('Location: pageUsuario.php');
    	exit();
	}

?>