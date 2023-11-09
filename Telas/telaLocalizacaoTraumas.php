<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Bombeiros</title>

    <link rel="shortcut icon" href="../imgs/logo_pequena.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../pagina2.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>       
  <form action="">
    <div class="corpo" style="background-image: url('../imgs/corpo..png');">
    <ul class="menu-loctraumas" style="position:relative">
      <li id="f_fratura">Fraturas/Luxações/Entorses</li>
      <li id="f_ferimentos">Ferimentos Diversos</li>
      <li id="f_hemorragia">Hemorragias</li>
      <li id="f_evisceracao">Evisceração</li>
      <li id="f_fabfaf">F.A.B/F.A.F</li>
      <li id="f_amputacao">Amputação</li>
      <li id="f_queimada1">Queimadura 1° Grau</li>
      <li id="f_queimada2">Queimadura 2° Grau</li>
      <li id="f_queimada3">Queimadura 3° Grau</li>
      <li class="text-center f_fechar">Fechar</li>
</ul>
      <div id="div_traumas_localizados">
        <div class="parte" id="cabeca" data-nome="Cabeça frente"></div>

        <div class="parte" id="tronco" data-nome="Tronco frente"></div>

        <div class="parte" id="membrossuperiores" data-nome="Braço direito frente"></div>
        <div class="parte" id="membrossuperiores2" data-nome="Braço esquerdo frente"></div>

        <div class="parte" id="membrosinferiores" data-nome="Perna direita frente"></div>              
        <div class="parte" id="membrosinferiores2" data-nome="Perna esquerda frente"></div>


        <div class="parte2" id="cabeca2" data-nome="Cabeça atrás"></div>
        
        <div class="parte2" id="tronco2" data-nome="Tronco atrás"></div>             

        <div class="parte2" id="membrossuperiores1" data-nome="Braço esquerdo atrás"></div>  
        <div class="parte2" id="membrossuperiores02" data-nome="Braço direito atrás"></div>
        
        <div class="parte2" id="membrosinferiores1" data-nome="Perna esquerda atrás" ></div>
        <div class="parte2" id="membrosinferiores02" data-nome="Perna direita atrás"></div>
      </div> 
    </div>
    <div class="table-scroll"> 
    <table class="table table-striped table-sm">
      <thead>
        <th>Local</th>
        <th>Tipo</th>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
  </form>

  
</body>
<script>
  $(function(){
    $(".menu-loctraumas").hide()
    $(".parte, .parte2").on("click", function(e){
      var parteClicada = $(this).data("nome")
      var tbody = $(".table > tbody")
      $(tbody).append("<tr><td>" + parteClicada + "</td><td>Dale</td></tr>")
      var mouseTop = $(this).position().top;
      var mousePosX = $(this).position().left
      var element = e.target
      console.log(element)
      

      if($(".menu-loctraumas").is(":visible") && !$(element).parent().hasClass("menu-loctraumas")){
        $(".menu-loctraumas").hide()
      } else if ($(element).hasClass(".f-fechar")){
        $(".menu-loctraumas").hide()
      }
      else {
        $(".menu-loctraumas").show()
        $(".menu-loctraumas").css("top", mouseTop)
        $(".menu-loctraumas").css("left", mousePosX + 40)
      }
    })
  })
</script>
</html>