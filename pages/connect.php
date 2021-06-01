<?php
    define('HOST', 'localhost:3307');
    define('USER', 'root');
    define('PASSWD', '');
    define('DB', 'ReportDeck');

    $conn = mysqli_connect(HOST, USER, PASSWD, DB) or die ('Não foi possivel conectar.');
?>
