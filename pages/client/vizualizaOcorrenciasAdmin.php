<?php
session_start();
include '../connect.php';
//SQL de apresentação de ocorrências
$sql = "SELECT Codigo, Titulo, Crimes.nome, GrauProximidadeCrime.id, grauDoCrime, OcorrenciaAprovada, DescricaoCrime, enderecoOcorrencia, ImagemAprovada, Imagem, DataOcorrencia, HoraOcorrenciaApx, Cidadao.Genero, Cidadao.Nascimento FROM (((Ocorrencia INNER JOIN Cidadao ON Ocorrencia.Cidadao = Cidadao.cpf) INNER JOIN Crimes ON Crimes.id = Ocorrencia.Crime) INNER JOIN GrauProximidadeCrime on GrauProximidadeCrime.id = Ocorrencia.grauDoCrime) WHERE Ocorrencia.ocorrenciaAprovada = 1 or Ocorrencia.ocorrenciaAprovada = 3 ORDER BY Codigo";
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
      <br><h4 class="text-center">Ocorrências Analisadas:<h4>
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

              $imgAprovada = $coluna['ImagemAprovada'];

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

              $statusAprovacao = $coluna["OcorrenciaAprovada"];

              $statusOc;

              // O padrão está com null em Ocorrencia.OcorrenciaAprovada
              // Alterar o banco de dados, para receber o valor de 1 a 3
              // 1 = Aprovada
              // 2 = Em Análise
              // 3 = Reprovada

              if ($statusAprovacao == 1){
                $statusOc = "Aprovada";
              }else if ($statusAprovacao == 2){
                $statusOc = "Em Análise";
              }else if ($statusAprovacao == 3){
                $statusOc = "Reprovada";
              }

              if ($idade < 18 || $coluna["nome"] == "Estupro") {
                $gravidadeCrime = "danger";
                $boxOcorrencia = "boxOcorrencia ocorrenciaGrave";
              }
                ?>
                <div class="<?= $boxOcorrencia?>">
                  <h4 class="text-center"><?= $coluna["nome"]; ?></h4>
                  <h6 class="text-center">Data: <?= $data->format('d/m/Y') ?> - Hora: <?= $hora->format('H:i') ?></h6>
                  <button type="button" class="btn btn-<?= $gravidadeCrime?> mx-auto d-block" data-toggle="modal" data-target="#idOcorrencia<?= $coluna['Codigo']?>">
                    Ver informações do Ocorrido
                  </button>
                  <h6 class="text-center">Ocorrência <?= $statusOc?></h6>
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
                        <img id='imagem<?= $coluna['Codigo'] ?>' class="imagemOcorrenciaPreview mx-auto d-block" src="data:image/png;base64,<?= base64_encode($coluna['Imagem'])?>" alt="alt"/>
                        <form method="POST">
                          <input type="hidden" id="valorImagem<?= $coluna['Codigo'] ?>" name="idOcorrencia" value="<?= $imgAprovada ?>">
                        </form>
                        <script type="text/javascript">
                          if ($('#valorImagem<?= $coluna['Codigo']?>').val() == 1) {
                            // Se for para borrar
                            $('#imagem<?= $coluna['Codigo'] ?>').addClass('imagemBorrada');
                          }else if($('#valorImagem').val() == 0){
                            //Se não for para borrar
                            $('#imgOcorrencia').removeClass('imagemBorrada');
                          }
                        </script>
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
        else:
          echo "Nenhum Resultado encontrado.";
        endif;
        $conn->close();?>
    </table>
</html>
