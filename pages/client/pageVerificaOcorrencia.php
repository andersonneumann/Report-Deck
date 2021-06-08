<?php
session_start();
include '../connect.php';
//SQL de apresentação de ocorrências
$sql = "SELECT Codigo, Titulo, Crimes.nome, GrauProximidadeCrime.id, grauDoCrime, DescricaoCrime, enderecoOcorrencia, Imagem, DataOcorrencia, HoraOcorrenciaApx, Cidadao.Genero, Cidadao.Nascimento FROM (((Ocorrencia INNER JOIN Cidadao ON Ocorrencia.Cidadao = Cidadao.cpf) INNER JOIN Crimes ON Crimes.id = Ocorrencia.Crime) INNER JOIN GrauProximidadeCrime on GrauProximidadeCrime.id = Ocorrencia.grauDoCrime) ORDER BY Codigo desc";
//Codigo que irá executar o script SQL
$result = $conn->query($sql);
?>
<html>
    <script type="text/javascript" src="../../js/pageUsuario/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../css/styleUser.css">
    <!-- Aqui o conteúdo do arquivo -->
    <table class="textoTemaEscuro">
      <br><h4 class="text-center">Verificar Ocorrências:<h4>
        <?php
        /* ATENÇÃO
         * onde tem os "<?= ?>"
         * São onde estarão os dados!!!
         */
        if ($result->num_rows > 0):
            while ($coluna = $result->fetch_assoc()):
              $data = new DateTime($coluna['DataOcorrencia']);
              $hora = new DateTime($coluna['HoraOcorrenciaApx']);
              //Pegando Nascimento
              $Nascimento = new DateTime($coluna['Nascimento']);
              $ano = $Nascimento->format('Y');
              $ano = $ano + 0;
              //Pegando ano atual
              $hoje = date("Y");
              $hoje = $hoje+0;
              $idade = $hoje - $ano;

              $idCrime = $coluna['grauDoCrime'];

              if($idCrime == 1){
                $varCrime = "Vítima";
              }else if($idCrime == 2){
                $varCrime = "Testemunha";
              }else if($idCrime == 3 || $idCrime == 4){
                $varCrime = "Denunciante";
              }
              $varCrime .= " da ocorrência.";

              $gravidadeCrime = "secondary";
              $boxOcorrencia = "boxOcorrencia";
              if ($idade < 18 || $coluna["nome"] == "Estupro") {
                $gravidadeCrime = "danger";
                $boxOcorrencia = "boxOcorrencia ocorrenciaGrave";
              }
                ?>
                <div class="<?= $boxOcorrencia?>">
                  <h4 class="text-center"><?= $coluna["nome"]; ?></h4>
                  <h6 class="text-center">Data: <?= $data->format('d/m/Y') ?> - Hora: <?= $hora->format('H:i') ?></h6>
                  <h6 class="text-center">Genero: <?= $coluna['Genero'] ?> - Idade: <?= $idade?></h6>
                  <h6 class="text-center grauProx"><?= $varCrime ?></h6>
                  <button type="button" class="btn btn-<?= $gravidadeCrime?> mx-auto d-block" data-toggle="modal" data-target="#idOcorrencia<?= $coluna['Codigo']?>">
                    Verificar Ocorrência
                  </button>
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
                        <br><button type="button"  class="mx-auto d-block btn btn-danger" value="bloquear">Bloquear Imagem</button>
                        <h6 class="text-center"><?= $coluna["enderecoOcorrencia"]; ?><br></h6>
                        <h6 class="text-center"><?= $coluna["nome"]; ?> <br><?= $data->format('d/m/Y') ?> <?= $hora->format('H:i') ?></h6>
                        <h6 class="text-center">"<?= $coluna['DescricaoCrime'] ?>"<br></h6>
                      </div>
                      <div class="modal-footer">
                        <form action="bloqueiaOcorrencia.php" method="POST">
                          <input type="submit" class="mx-auto d-block btn btn-danger" id="bloquear" name="bloquear" value="Bloquear Ocorrência">
                          <input type="hidden" id="idOcorrencia" name="idOcorrencia" value="<?= $coluna['Codigo'] ?>">
                        </form>
                        <form action="aprovaOcorrencia.php" method="POST">
                          <input type="submit" class="mx-auto d-block btn btn-success">Aprovar Ocorrência</button>
                          <input type="hidden" id="idOcorrencia" name="idOcorrencia" value="<?= $coluna['Codigo'] ?>">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
          endwhile;
        else:
          echo "Nenhum Resultado encontrado.";
        endif;
        $conn->close();?>
    </table>
</html>
