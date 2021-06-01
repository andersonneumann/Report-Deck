<?php
session_start();
include '../connect.php';
//SQL de apresentação de ocorrências
$sql = "SELECT Codigo, Titulo, Crimes.nome, grauDoCrime, DescricaoCrime, enderecoOcorrencia, Imagem, DataOcorrencia, HoraOcorrenciaApx "
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
      <br><h4 class="text-center">Ocorrências:<h4>
        <?php
        /* ATENÇÃO
         * onde tem os "<?= ?>"
         * São onde estarão os dados!!!
         */
        if (mysqli_fetch_assoc($result)):
            while ($coluna = $result->fetch_assoc()):
		      $data = new DateTime($coluna['DataOcorrencia']);
		      $hora = new DateTime($coluna['HoraOcorrenciaApx']);
          $gravidadeCrime = "secondary";
          $boxOcorrencia = "boxOcorrencia"

          //boxOcorrencia: Define a cor da caixa onde estará a ocorrencia. Se a ocorrência for normal, deverá receber apenas "boxOcorrencia"
          //Se a ocorrência for grave, boxOcorrencia deverá receber "boxOcorrencia ocorrenciaGrave"

          //gravidadeCrime: Define a cor do botão para expandir a ocorrência. Se a ocorrência for normal, deverá receber "secondary"
          //Se a ocorrência for grave, gravidadeCrime deverá receber "danger"

                ?>
                <div class="<?= $boxOcorrencia?>">
                  <h4 class="text-center"><?= $coluna["nome"]; ?></h4>
                  <h6 class="text-center">Data: <?= $data->format('d/m/Y') ?> - Hora: <?= $hora->format('H:i') ?></h6>
                  <button type="button" class="btn btn-<?= $gravidadeCrime?> mx-auto d-block" data-toggle="modal" data-target="#idOcorrencia<?= $coluna['Codigo']?>">
                    Ver informações do Ocorrido
                  </button>
                  <h6 class="text-center">Genero: [PH] - Idade: [PH]</h6>
                </div>
                <div class="modal fade" id="idOcorrencia<?= $coluna['Codigo']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $coluna["Titulo"]?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <img class="imagemOcorrenciaPreview mx-auto d-block" src="data:image/png;base64,<?= base64_encode($coluna['Imagem'])?>" alt="alt"/>
                        <h6 class="text-center"><?= $coluna["enderecoOcorrencia"]; ?><br></h6>
                        <h6 class="text-center"><?= $coluna["nome"]; ?> <br><?= $data->format('d/m/Y') ?>  <?= $hora->format('H:i') ?></h6>
                        <h6 class="text-center">"<?= $coluna['DescricaoCrime'] ?>"<br></h6>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
            <?php endwhile;
        endif; ?>
    </table>
</html>
