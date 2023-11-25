<!DOCTYPE html>
<html lang="pt-br">
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body style="overflow: inherit">
<nav class="nav navbar">
        <div class="container-fluid">
            <div class="text-center" style="width: 100%">
                <h1 class="nav-title">Bombeiros Voluntários</h1>
            </div>
        </div>
    </nav>

<div class="col-sm-12 m-3 dale">

            <input type="hidden" name="f_ocorrenciaID" id="input" value="<?= $_GET["id"]?>">

            <div class="col-sm-12 row" id="checkboxes">
            </div>
</body>

<script>
    $(function(){
        var ocorrenciaId = $("#input").val() 
        $.ajax({
        type: "POST",
        url: "../php/getOcorrencia.php",
        data: {id: ocorrenciaId},
        success: function(response){

            response.replace("[]", "")

            console.log(response)
            // var lista = JSON.parse(response)
            // for (const key in lista) {
            //     if (Object.hasOwnProperty.call(lista, key)) {
            //         var div = $("#checkboxes")
            //         var primeiroaDiv = $(".dale")
            //         const tables = lista[key][0];
            //         if (tables != undefined){
            //             const divAAdicionar = document.createElement("div");

            //             divAAdicionar.setAttribute("id", key)
            //             $(divAAdicionar).append("<h1>"+ titleCase(key) +"</h1")
            //             for (const prop in tables) {
            //             if (Object.hasOwnProperty.call(tables, prop)) {
            //                 let checked = 0
            //                 if (tables[prop] == 1){
            //                     checked = 1
            //                 }                            
            //                 if (prop != "id"){
            //                     if (prop != "ocorrencia_id"){
            //                         console.log(divAAdicionar)
            //                     var dados = ("<div class='col-sm-12 form-check'>" +
            //                                 "<label for='' class='form-check-label'>" + prop + "</label>" +
            //                                 "<input type='checkbox' class='form-check-input' disabled id=''" + (checked ? "checked" : "") + ">" +
            //                               "</div>")
            //                             }
            //                             $(divAAdicionar).append(dados)
            //                 }
            //             }
            //         }
            //     $(div).append(divAAdicionar)

            //         }
            //     }

            // }
        }
    });


    const titleCase = (s) =>
                            s.replace (/^[-_]*(.)/, (_, c) => c.toUpperCase())
                            .replace (/[-_]+(.)/g, (_, c) => ' ' + c.toUpperCase())
        })
</script>

</html>