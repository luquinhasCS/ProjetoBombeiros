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
            <button class="hamburger">&#9776;</button>
            <img class="nav-img" src="../imgs/logo_pequena.png">
            <h1 class="nav-title">Bombeiros Voluntários</h1>
        </div>
    </nav>
    <div class="col-md-12" id="principal">
        <div class="col-lg-3 d-flex flex-column ps-3 pt-1" style="margin-top: 5rem!important; height:550px; overflow:hidden; overflow-y:auto">
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
        $( ".hamburger" ).hide();
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
        })

        $(".coluna-botoes > button").on("click", function(e){
            var element = e.target
            var selectedButton = $(".button-show")
            $(selectedButton).removeClass("button-show")
            $(element).addClass("button-show")
            var idElement = $(element).attr('id').replace("f_button", "")
            console.log(idElement)
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