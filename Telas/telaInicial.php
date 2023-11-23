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
<body>
<nav class="nav navbar">
        <div class="container-fluid">
            <div class="text-center" style="width: 100%">
                <h1 class="nav-title">Bombeiros Voluntários</h1>
            </div>
        </div>
    </nav>
    <form action="">
        <div class="col-md-12  d-flex flex-column justify-content-center align-items-center" style="margin-top:250px">
            <div class="col-md-6 d-flex justify-content-center">
                <button class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_iniciar">Iniciar Ocorrência</button>
            </div>
            <div class="botaoadm col-md-6 d-flex justify-content-center d-none">
                <button class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_adm">Acessar tela administração</button>
            </div>
        </div>
    </form>
</body>
<script>
    $(function(){
    $("#f_iniciar").on("click", function(e){
        e.preventDefault()
        window.location.href = "telaPrincipal.php"
    })
    $("#f_adm").on("click", function(e){
        e.preventDefault()
        window.location.href = "telaAdm.php"
    })

    $.ajax({
        type: "POST",
        url: "../php/getUserTipo.php",
        data: {},
        success: function(response){
            const bombeiroId = response
            let idAdm = 1
            console.log(bombeiroId)
            if (bombeiroId == idAdm) {
                $(".botaoadm").removeClass("d-none")
            }
        }
    });
})
</script>
</html>