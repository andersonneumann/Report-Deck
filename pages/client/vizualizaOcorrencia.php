<?php
session_start();
include '../connect.php';
//SQL de apresentação de ocorrências
$sql = "SELECT Titulo, Crimes.nome, grauDoCrime, DescricaoCrime, enderecoOcorrencia, Imagem, DataOcorrencia, HoraOcorrenciaApx "
        . "FROM Ocorrencia "
        . "INNER JOIN Crimes ON Crimes.id = Ocorrencia.Crime";
//Codigo que irá executar o script SQL
$result = mysqli_query($conn, $sql);
?>
<html>
    <script type="text/javascript" src="../../js/pageUsuario/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../css/styleUser.css">
    <!-- Aqui o conteúdo do arquivo -->
    <table class="textoTemaEscuro">
        <?php
        /* ATENÇÃO
         * onde tem os "<?= ?>"
         * São onde estarão os dados!!!
         */
        if (mysqli_fetch_assoc($result)):
            while ($coluna = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><h4><?= $coluna["Titulo"]; ?></h4></td>
                </tr>
                <tr>
                    <td><h6><b>Crime: <?= $coluna["nome"]; ?></b> - <?= date("d/m/Y", strtotime($coluna['DataOcorrencia'])) ?>  <?= date ("H:i", $coluna['HoraOcorrenciaApx']) ?></h6></td>
                </tr>
                <tr>
                    <td>Lugar: <?= $coluna["enderecoOcorrencia"]; ?><br> <?= $coluna['DescricaoCrime'] ?></td>
                </tr>
                <tr>
                    <td>Imagem do ocorrido:<br> <img src="data:image/png;base64,<?= base64_encode($coluna['Imagem'])?>" alt="alt"/></td>
                </tr>
            <?php endwhile;
        endif; ?>
    </table>
</html>
