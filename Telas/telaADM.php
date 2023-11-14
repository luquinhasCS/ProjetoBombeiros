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
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json"></script>
            
</head>

<body>
    <nav class="nav navbar">
        <div class="container-fluid">
            <img class="nav-img" src="../imgs/logo_pequena.png">
            <h1 class="nav-title">Bombeiros Voluntários</h1>
        </div>
    </nav>

    <div class="col-md-12" style="margin-top: 5rem">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="bombeiros-tab" data-bs-toggle="tab" data-bs-target="#bombeiros" type="button" role="tab" aria-controls="bombeiros" aria-selected="true">Bombeiros</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pacientes-tab" data-bs-toggle="tab" data-bs-target="#pacientes" type="button" role="tab" aria-controls="pacientes" aria-selected="false">Pacientes</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ocorrencias-tab" data-bs-toggle="tab" data-bs-target="#ocorrencias" type="button" role="tab" aria-controls="ocorrencias" aria-selected="false">Ocorrências</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="bombeiros" role="tabpanel" aria-labelledby="bombeiros-tab">
                <table class="table table-sm table-stripped">
                    <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                            <th>Column 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>dale</td>
                            <td>foda</td>
                            <td>cria</td>
                        </tr>
                        <tr>
                            <td>xoxoto</td>
                            <td>cnpjoto</td>
                            <td>iveto</td>
                        </tr>
                        <tr>
                            <td>sangalo</td>
                            <td>veronico</td>
                            <td>paçoco</td>
                        </tr>
                        <tr>
                            <td>sangalo</td>
                            <td>veronico</td>
                            <td>paçoco</td>
                        </tr>
                        <tr>
                            <td>sangalo</td>
                            <td>veronico</td>
                            <td>paçoco</td>
                        </tr>
                        <tr>
                            <td>sangalo</td>
                            <td>veronico</td>
                            <td>paçoco</td>
                        </tr>
                        <tr>
                            <td>sangalo</td>
                            <td>veronico</td>
                            <td>paçoco</td>
                        </tr>
                        <tr>
                            <td>sangalo</td>
                            <td>veronico</td>
                            <td>paçoco</td>
                        </tr>
                        <tr>
                            <td>sangalo</td>
                            <td>veronico</td>
                            <td>paçoco</td>
                        </tr>
                        <tr>
                            <td>sangalo</td>
                            <td>veronico</td>
                            <td>paçoco</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pacientes" role="tabpanel" aria-labelledby="pacientes-tab">

            </div>
            <div class="tab-pane fade" id="ocorrencias" role="tabpanel" aria-labelledby="ocorrencias-tab">
                
            </div>
        </div>
    </div>
</body>
<script>
    $(function(){
        var img = $(".nav-img")
            if ($(window).width() <= 992) {
                img.addClass("sumir")
                $(".nav-title").css("margin", "auto")
            }
            else {
                $(".nav-title").css("margin-left", "150px")
                img.removeClass("sumir")
            }
        $(".nav-link").on("click", function(){
            var ativos = $(".active")
            $(ativos).removeClass("active")
            var clickedButton = $(this)
            $(clickedButton).addClass("active")
            $(clickedButton).attr("aria-selected", "true")
            var tabId = "#" + $(clickedButton).attr("aria-controls")
            $(tabId).addClass("active show")
        })

        $(document).ready(function() {
    $('.table').DataTable( {
        "language": {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
        },
        "lengthChange": false,
        "bPaginate": false
    } );
} );
    })
</script>
</html>
