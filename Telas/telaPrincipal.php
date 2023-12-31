<?php 
    require '../php/Db.php';
    $db = new db();
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body style="overflow:hidden">
    <nav class="nav navbar">
        <div class="container-fluid">
            <div class="col-md-2">
                <button class="hamburger">&#9776;</button>
            </div>
            <div class="col-md-4">
                <img class="nav-img" src="../imgs/logo_pequena.png">
            </div>
            <div class="text-center" style="width: 100%">
                <h1 class="nav-title">Bombeiros Voluntários</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_voltar">Voltar</button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_salvar">Salvar Dados</button>
            </div>
        </div>
    </nav>
    <div class="col-md-12 row" id="principal">
        <div class="col-lg-3 d-flex flex-column ps-3 pt-1" style="margin-top: 5rem!important; height:550px; overflow:hidden; overflow-y:auto">
            <?php
                $form_parts = array('');

                $buttons = $db->select(
                    $table = "botao",
                    $select = "*",
                    $condition = ""
                );

                if ($buttons) {
                    foreach ($buttons as $button) {
                        $buttonId = $button['id'];
                        $buttonLabel = $button['label'];
                        $buttonPage = $button['page'];

                        array_push($form_parts, $buttonLabel);

                        echo('<div class="coluna-botoes"><button id="f_button'. $buttonId .'" type="button" class="btn btn-primary rounded-pill">
                            '. $buttonLabel .'
                            </button> </div>'
                            );
                    }
                }

                $fomrPartsJson = json_encode($form_parts);
                $_SESSION["FORMPARTS"] = $fomrPartsJson;
                $db -> close();
            ?>
        </div>
        <div class="col-md-12">
            <iframe id="iframe" frameborder="0"></iframe>
        </div>
    </div>
</body>

<script>
    $(function () {
        $(".hamburger").parent().hide();
        $("#f_voltar").parent().hide();
        if ($(window).width() <= 992) {
                $(".nav-img").parent().hide()
            }
            else {
                $(".nav-title").css("margin", "")
                $(".nav-img").parent().show()
            }
        $(window).on("resize", function () {
            if ($(window).width() <= 992) {
                $(".nav-img").parent().hide()
            }
            else {
                $(".nav-title").css("margin", "")
                $(".nav-img").parent().show()
            }
        });
        var parent = $(".coluna-botoes").first().parent()
        $(window).on("resize", function () {
            if ($(window).width() <= 992) {
                $(parent).css("margin-top", "1rem")
                $(".coluna-botoes").parent().hide()
                $(".hamburger").parent().show()
            } else {
                $(".coluna-botoes").show()
                $(".hamburger").parent().hide()
                $(parent).css("margin-top", "5rem")
            }
        })
        $(".hamburger").on("click", function(){
            $(".coluna-botoes").show()
            $(".coluna-botoes").first().parent().addClass("d-flex")
        })

        $("#f_voltar").on("click", function(){
            $(".coluna-botoes").show()
            $(".coluna-botoes").first().parent().addClass("d-flex")
            $(this).parent().hide();
            $("#form").hide()
            $("#iframe").hide()
            saveData()
        })
        $("#f_salvar").on("click", function(){
            // saveData()
            $.ajax({
                type: "POST",
                url: "../php/dataSaver.php",
                data: {},
                success: function(response){
                    console.log(response)
                    window.location.href = "../Telas/telaCabecalho.php?ocorrenciaId=" + response;
                },
                error: function(response){
                    console.error(response)
                }
            });
        })
        var buttonId
        var iframeNaTela = false
        $(".coluna-botoes > button").on("click", function(e){
            if($(window).width() <= 920){
                $(".coluna-botoes").first().parent().removeClass("d-flex")
                $(".coluna-botoes").first().parent().hide()
                $( "#f_voltar" ).parent().show();
                $( "#f_salvar" ).parent().show();
            }
            var element = e.target
            var selectedButton = $(".button-show")
            $(selectedButton).removeClass("button-show")
            $(element).addClass("button-show")
            buttonId = $(element).attr('id').replace("f_button", "")
            
            updateIframe(buttonId)
        })
        function updateIframe(buttonId) {
            var iframe = document.getElementById("iframe");
            $(iframe).show()
            if (buttonId == 8){
                var url = 'telaLocalizacaoTraumas.php'
            } else {
                var url = "../php/generateForm.php?buttonId=" + buttonId;
            }
            iframe.src = url;
        }
        function toSnakeCase(inputString) {
            // Remove accents
            const withoutAccents = inputString.normalize('NFD').replace(/[\u0300-\u036f]/g, '');

            // Remove special characters and replace spaces with underscores
            const formattedString = withoutAccents
            .replace(/[^a-zA-Z0-9\s]/g, '') // Remove special characters
            .replace(/\s+/g, '_');         // Replace spaces with underscores

            // Convert the string to lowercase
            const snakeCaseString = formattedString.toLowerCase();

            // Remove leading and trailing underscores
            const finalSnakeCase = snakeCaseString.replace(/^_+|_+$/g, '');

            return finalSnakeCase;
        }
        function saveData(){
            const iframe = document.getElementById("iframe");
            const iframeDocument = iframe.contentDocument || iframe.contentWindow.document
            const iframeForm = iframeDocument.getElementById('iframeFrom')
            const formParts = <?php echo $fomrPartsJson; ?>;
            const formPartName = toSnakeCase(formParts[buttonId])
            const formPartData = { [formPartName]: {} }

            for (const element of iframeForm.elements) {
                const key = element.id
                const label = toSnakeCase(iframeForm.querySelector(`label[for="${key}"]`).textContent)
                switch(element.type){
                    case 'checkbox':
                        if(element.checked === true){
                            formPartData[formPartName][label] = String(element.checked)
                        }
                    break
                    case 'text':
                        if(element.value){
                            formPartData[formPartName][label] = element.value 
                        }
                    break
                }
                if (formPartData[formPartName] == []){
                    var tamanho = formPartData.length() - 1
                    formPartData.splice(tamanho)
                }
            }
            
            $.ajax({
                type: "POST",
                url: "../php/dataHolder.php",
                data: {jsonData: JSON.stringify(formPartData)},
                success: function(response){
                    console.log(`Response: ${response}`)
                }
            });
        }
    })
</script>
</html>