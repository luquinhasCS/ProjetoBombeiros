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

<body>
    <nav class="nav navbar">
        <div class="container-fluid">
            <img class="nav-img" src="../imgs/logo_pequena.png">
            <h1 class="nav-title">Bombeiros Voluntários</h1>
        </div>
    </nav>

    <!-- <div class="col-xl-12 container-fluid d-flex justify-content-center mt-4">
        <div class="col-lg-9 row">
            <div class="col-md-8">
                <div class="col-md-12 row">
                    <div class="col-md-3">
                        <input type="text" placeholder="Nome">
                    </div>
                    <div class="col-md-2">
                        <select name="" id="" required>
                            <option value="">Sexo</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" placeholder="Idade">
                    </div>
                    <div class="col-md-5">
                        <input type="text" placeholder="Hospital">
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-3">
                        <input type="text" placeholder="Telefone">
                    </div>
                    <div class="col-md-4">
                        <input type="text" placeholder="Acompanhante">
                    </div>
                    <div class="col-md-2">
                        <input type="text" placeholder="Idade">
                    </div>
                    <div class="col-md-3">
                        <input type="text" placeholder="RG/CPF Paciente">
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-5">
                        <input type="text" placeholder="Local da ocorrência">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12 row">
                    <div class="col-md-4">
                        <input type="text" placeholder="N° USB">
                    </div>
                    <div class="col-md-4">
                        <input type="text" placeholder="N° Ocorr">
                    </div>
                    <div class="col-md-4">
                        <input type="text" placeholder="Cód. SIA/SUS">
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-3">
                        <input type="text" placeholder="Cód. IR">
                    </div>
                    <div class="col-md-3">
                        <input type="text" placeholder="Cód. PS">
                    </div>
                    <div class="col-md-3">
                        <input type="text" placeholder="H.CH">
                    </div>
                    <div class="col-md-3">
                        <input type="text" placeholder="Km final">
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-6">
                        <input type="text" placeholder="Despachante">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-md-12">
    <button class="hamburger">&#9776;</button>
  <button class="cross">&#735;</button>
        <div class="col-md-3 d-flex flex-column mt-4" style="height:480px; overflow:hidden; overflow-y:auto">
    <?php
        require '../php/Db.php';
        $db = new db();

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

                echo('<div class="coluna-botoes"><button id="f_button'. $buttonId .'" type="button" class="btn btn-primary rounded-pill">
                    '. $buttonLabel .'
                    </button> </div>'
                    );
            }
        }

        $db -> close();
    ?>
    </div>
    <div class="col-md-9 row">

    <?php
        $db = new db();
        echo("<script>console.log('sexo2')</script>");

        if(isset($_POST['buttonId'])){
            $clickedButtonId = $_POST['buttonId'];
            
            echo("<script>console.log(sexo1)</script>");

            $form_structure = $db->select(
                $table = "form_structure",
                $select = "*",
                $condition = "form_structure.parent_id = '$clickedButtonId'"
            );
        
            if ($form_structure) {
                foreach ($form_structure as $row) {
                    $inputId = $row['id'];
                    $label = $row["label"];
                    switch ($row["data_type"]) {
                        case 1:
                            echo(
                                '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="f_checkbox'. $inputId .'">
                                    <label class="form-check-label" for="f_checkbox'. $inputId .'">
                                    '. $label .'
                                    </label>
                                </div>'
                            );
                            break;
                        case 2:
                            //table data php process
                            // echo table input HTML
                            break;
                        case 3:
                            echo(
                                '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="f_checkbox'. $inputId .'">
                                    <label class="form-check-label" for="f_checkbox'. $inputId .'">
                                    Outros: 
                                    </label>
                                    <input class="form-control" type="text" value="">
                                </div>'
                            );
                            break;
                        case 4:
                            // especial modal
                            break;
                    }
                }
            }
            $db->close();
        }
    ?>
    </div>
    </div>
</body>

<script>
    $(function () {
        var img = $(".nav-img")

        $(window).on("resize", function () {
            if ($(window).width() <= 1024) {
                img.addClass("sumir")
                $(".nav-title").css("margin", "auto")
            }
            else {
                $(".nav-title").css("margin", "")
                img.removeClass("sumir")
            }
        });
        $( ".cross" ).hide();
        $( ".coluna-botoes" ).hide();
        $( ".hamburger" ).click(function() {
            $( ".coluna-botoes" ).show()
            $( ".hamburger" ).hide();
            $( ".cross" ).show();
        });

        $( ".cross" ).click(function() {
            $( ".coluna-botoes" ).hide()
            $( ".cross" ).hide();
            $( ".hamburger" ).show();
        });
        $(".coluna-botoes").on("click", function(e){
            var element = e.target
            var selectedButton = $(".button-show")
            $(selectedButton).removeClass("button-show")
            $(element).addClass("button-show")
            console.log(selectedButton)
            var idElement = $(element).attr('id').replace("f_button", "")
            handleButtonClick(idElement)
        })
    })
    function handleButtonClick(buttonId) {
        $.ajax({
            type: "POST",
            url: "telaPrincipal.php",
            data: { buttonId: buttonId },
            success: function(response) {

            },
            error: function(error) {
                console.error(error);
            }
        });
    }
</script>
</html>