<?php
  define('HOST', 'localhost');
  define('USER', 'report_deck');
  define('PASSWD', '123');
  define('DB', 'ReportDeck');

  $conn = mysqli_connect(HOST, USER, PASSWD, DB) or die ('Não foi possivel conectar.');
?>
