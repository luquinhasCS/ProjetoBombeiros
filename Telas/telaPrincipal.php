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

    <div class="col-md-12 container-fluid d-flex justify-content-center mt-4">
        <div class="col-md-9 row">
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
    </div>
    <div class="col-md-12">
        <div class="col-md-3 d-flex flex-column" style="max-height:200px">
    <?php
    require '../php/Db.php';

    $db = new Db();

    $form_structure = $db->select(
        $table = "botao",
        $select = "*",
        $condition = ""
    );

    if ($form_structure) {
        foreach ($form_structure as $row) {
            $buttonId = $row['id'];
            $buttonLabel = $row['label'];
            $buttonPage = $row['page'];

            echo('<button id="f_button'. $buttonId .'" type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modaltipoocorencia">
                '. $buttonLabel .'
                </button>'
                );
        }
    }
    ?>
    </div>
    <div class="col-md-9 row">
    <!-- <div class="col-md-6"></div>
    <div class="col-md-6"></div> -->
    <?php                        
                        // $buttonId = 1

                        // $db = new db();

                        // $form_structure = $db -> select(
                        //     $table = "form_structure",
                        //     $select = "*",
                        //     $condition = "form_structure.parent_id = '$buttonId'"
                        // );

                        // if ($form_structure){
                        //     foreach ($form_structure as $row){
                        //         switch ($rows["data_type"]) {
                        //             $inputId = $rows['id']
                        //             $label = $rows["label"]
                        //             case 1:
                        //                 echo '<div class="form-check">
                        //                           <input class="form-check-input" type="checkbox" value="" id="f_checkbox'. $inputId .'">
                        //                           <label class="form-check-label" for="f_checkbox'. $inputId .'">
                        //                           '. $label .'
                        //                           </label>
                        //                       </div>'
                        //                 break;
                        //             case 2:
                        //                 //table data php process
                        //                 // echo table input html
                        //                 break;
                        //             case 3:
                        //                 echo '<div class="form-check">
                        //                           <input class="form-check-input" type="checkbox" value="" id="f_checkbox'. $inputId .'">
                        //                           <label class="form-check-label" for="f_checkbox'. $inputId .'">
                        //                           Outros: 
                        //                           </label>
                        //                           <input class="form-control" type="text" value="">
                        //                       </div>'
                        //                 break;
                        //             case 4:
                        //                 // especial modal
                        //                 break;
                        //         }   
                        //     }
                        // }
                        // ?> 
    </div>
    </div>
</body>

<script>
    $(function () {
        var img = $(".nav-img")

        if ($(window).width() <= 768) {
            img.addClass("sumir")
        }
        $(window).on("resize", function () {
            if ($(window).width() <= 768) {
                img.addClass("sumir")
            }
            else {
                img.removeClass("sumir")
            }
        });

        var tbody = $(".table > tbody")
        var local = $("#local").val()
        var lado = $("#lado").val()
        var face = $("#face").val()
        var tipo = $("#tipo").val()
        var button = $("#inserir")

        $(button).on("click", function(){
            tbody.append("<tr>" +
                          "<td>" + local + "</td>"+  
                          "<td>" + lado + "</td>"+  
                          "<td>" + face + "</td>"+  
                          "<td>" + tipo + "</td>"+  
                         "</tr>")
        })
    })

</script>

</html>

