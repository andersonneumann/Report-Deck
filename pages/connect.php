<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWD', 'usbw');
    define('DB', 'ReportDeck');

    $conn = mysqli_connect(HOST, USER, PASSWD, DB) or die ('Não foi possivel conectar.');
?>
