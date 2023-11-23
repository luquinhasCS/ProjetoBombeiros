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

<div class="col-sm-12 m-3">

            <input type="hidden" name="f_ocorrenciaID" id="input" value="<?= $_GET["ocorrenciaId"]?>">

            <div class="col-sm-12 row" id="checkboxes">
            </div>
</body>

<script>
    $(function(){

        $.ajax({
        type: "POST",
        url: "../php/getOcorrencia.php",
        data: {ocorrenciaId: $("#input").val()},
        success: function(response){
            response.replace("[]", "")
            console.log(response)
            var lista = JSON.parse(response)
           console.log(response)
            for (const key in lista) {
                if (Object.hasOwnProperty.call(lista, key)) {
                    const columns = lista[key];

                    for (const chave in columns) {
                        if (Object.hasOwnProperty.call(columns, chave)) {
                            const data = columns[chave];
                            console.log(data)
                        }
                    }
                }
            }

            // <div class="col-sm-3 form-check">
            //     <label for="codps" class="form-check-label">CÓD. PS</label>
            //     <input name="f_cod_ps" type="checkbox" class="form-check-input" id="codps" name="codps" checked>
            // </div>


        },
        error: function(){
            console.log("foda")
        }
    });
        })
</script>

</html>