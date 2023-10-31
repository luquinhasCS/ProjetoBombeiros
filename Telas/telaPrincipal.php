<?php 
    require '../php/Db.php';
    $db = new db();
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body style="overflow:hidden">
    <nav class="nav navbar">
        <div class="container-fluid">
            <button class="hamburger">&#9776;</button>
            <img class="nav-img" src="../imgs/logo_pequena.png">
            <h1 class="nav-title">Bombeiros Voluntários</h1>
            <div class="col-md-2">
                <button class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_voltar">Voltar</button>
            </div>
        </div>
    </nav>
    <div class="col-md-12" id="principal">
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

                $db -> close();
            ?>
        </div>
        <div class="col-md-12" style="margin-top:6rem">
            <div class="col-md-12">   
                <iframe id="iframe" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</body>

<script>
    $(function () {
        var img = $(".nav-img")
        $( ".hamburger" ).hide();
        $( "#f_voltar" ).hide();
        $(window).on("resize", function () {
            if ($(window).width() <= 992) {
                img.addClass("sumir")
                $(".nav-title").css("margin", "auto")
            }
            else {
                $(".nav-title").css("margin", "")
                img.removeClass("sumir")
            }
        });
        var parent = $(".coluna-botoes").first().parent()
        $(window).on("resize", function () {
            if ($(window).width() <= 992) {
                $(parent).css("margin-top", "1rem")
                $(".coluna-botoes").hide()
                $(".hamburger").show()
            } else {
                $(".coluna-botoes").show()
                $(".hamburger").hide()
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
            $(this).hide();
            $("#form").hide()
            saveData()
        })
        var buttonId
        $(".coluna-botoes > button").on("click", function(e){
            var element = e.target
            var selectedButton = $(".button-show")
            $(selectedButton).removeClass("button-show")
            $(element).addClass("button-show")
            $(".coluna-botoes").first().parent().removeClass("d-flex")
            $(".coluna-botoes").first().parent().hide()
            $( "#f_voltar" ).show();
            buttonId = $(element).attr('id').replace("f_button", "")
            updateIframe(buttonId)

        })
        function updateIframe(buttonId) {
            var iframe = document.getElementById("iframe");
            $(iframe).show()
            var url = "../php/generateForm.php?buttonId=" + buttonId;
            iframe.src = url;
        }
        function camelCase(str) {
            // Replace accents with their non-accented counterparts
            const withoutAccents = str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            
            // Remove spaces and convert to camel case
            const formattedString = withoutAccents.replace(/\s+/g, ' ').split(' ')
                .map((word, index) => {
                if (index === 0) {
                    return word.toLowerCase();
                }
                return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
                })
                .join('');

            return formattedString;
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
            const formPartName = camelCase(formParts[buttonId])
            const formPartData = {
                [formPartName]: 
                    {
                        formPartId: buttonId
                    }
            }

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