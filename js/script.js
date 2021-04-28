$(document).ready(function(){

  $("#mostraPar").click(function(){
    clean();
    mostrarValoresPares();
  });
  $("#mostraImpar").click(function(){
    clean();
    mostrarValoresImpares();
  });
  $("#limpar").click(function(){
    $("#inserirNumero").val("");
    clean();
  });
  function clean(){
    $("#exibir").html("");
  }
  function mostrarValoresPares(){
    var valor = parseInt($("#inserirNumero").val());
    var cont = 0;
    while (cont <= valor){
      if (cont %2==0){
        $("#exibir").append("<p>" + cont + "</p>");
      }
      cont++;
    }
  }
  function mostrarValoresImpares(){
    var valor = parseInt($("#inserirNumero").val());
    var cont = 0;
    while (cont <= valor){
      if (cont %2==1){
        $("#exibir").append("<p>" + cont + "</p>");
      }
      cont++;
    }
  }
});
