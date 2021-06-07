<html>
    <?php
    include 'verify_login.php';?>
    <head>
        <title>Report Deck - Admin</title>
        <script type="text/javascript" src="../js/pageUsuario/jquery.js"></script>
        <script type="text/javascript" src="../js/pageAdmin/admin.js"></script>
        <link rel="shortcut icon" href="../images/favicon.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/styleUser.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include './connect.php';
        $sql_select = "SELECT * FROM Cidadao where cpf =".$_SESSION['cpf']."";
        //Codigo que irá executar o script SQL
        $result = $conn->query($sql_select);
        //Captura e armazena em cookie o nome de usuário
        setcookie("user", $_SESSION['user']);
        if ($result->num_rows > 0){
            while ($coluna = $result->fetch_assoc()){
                setcookie("genero", $coluna['Genero']);
                setcookie("nascimento", $coluna['Nascimento']);
                setcookie("nome_completo", $coluna['Nome_completo']);
                setcookie("telefone", $coluna['Telefone']);
                setcookie("senha", $coluna['Senha']);
                setcookie("email", $coluna['Email']);
            }
        }
        ?>
        <a onclick="loadPage()"><div class="topo sticky-top"><img src="../images/rdlogowhite.png" class="rounded mx-auto d-block logoRD"></div></a>
        <div class="appendContentClick"></div>
    </body>
</html>
