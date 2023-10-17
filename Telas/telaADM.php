<?php
    session_start();
    $selected_option = 0;
    if(isset($_GET["op"])){
        $selected_option = $_GET["op"];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projeto Bombeiros</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;500;800&display=swap"
            rel="stylesheet">
    <link rel="shortcut icon" href="../imgs/logo_pequena.png">
    <link rel="stylesheet" href="../style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="nav navbar">
        <div class="container-fluid">
            <img class="nav-img" src="../imgs/logo_pequena.png">
            <h1 class="nav-title">Bombeiros Voluntários</h1>
        </div>
    </nav>

    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ocorrências</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                tem que estilizar esse djabo
            </div>
        </div>
    </div>
</body>
<script>
        var img = $(".nav-img")
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
</script>
</html>
