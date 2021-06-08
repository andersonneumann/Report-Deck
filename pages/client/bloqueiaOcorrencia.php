<?php 
	include '../connect.php';
	include '../verify_login.php';

	$id = mysqli_real_escape_string($conn, $_POST['idOcorrencia']);

	$query = "UPDATE Ocorrencia SET ocorrenciaAprovada = '3' WHERE Ocorrencia.Codigo = $id";

	if (!mysqli_query($conn, $query)){
    	echo mysqli_error($conn);
	} else {
   		header('Location: pageVerificaOcorrencia.php');
    	exit();
	}
 ?>