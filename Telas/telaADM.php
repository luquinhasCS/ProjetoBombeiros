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
            <div class="col-md-4">
                <button class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_adicionar-bombeiro">Adicionar bombeiro</button>
            </div>
        </div>
    </nav>

    <div class="col-md-12" style="margin-top: 5rem">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="bombeiros-tab" data-bs-toggle="tab" data-bs-target="#bombeiros" type="button" role="tab" aria-controls="bombeiros" aria-selected="true">Bombeiros</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ocorrencias-tab" data-bs-toggle="tab" data-bs-target="#ocorrencias" type="button" role="tab" aria-controls="ocorrencias" aria-selected="false">Ocorrências</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="bombeiros" role="tabpanel" aria-labelledby="bombeiros-tab">
                <table class="table table-bombeiro table-sm table-stripped table-scroll">
                    <thead>
                        <tr>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Sexo</th>
                            <th>Telefone</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="ocorrencias" role="tabpanel" aria-labelledby="ocorrencias-tab">
                <table class="table table-ocorrencia table-sm table-stripped  table-scroll">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>RG/CPF Paciente</th>
                            <th>Sexo</th>
                            <th>Acompanhante</th>
                            <th>Idade Acompanhante</th>
                            <th>Despachante</th>
                            <th>Data</th>
                            <th>Fone</th>
                            <th>Local</th>
                            <th>Nome Hospital</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
            var idButton = $(clickedButton).attr("id")
            var tables = {"bombeiros-tab": "bombeiro", "ocorrencias-tab": "cabecalho"}
            getTableContent(tables[idButton])
        })
        var lista = []
        var tbody = $(".table>tbody")
        var table = $('.table')
        function getTableContent(table){
            $.ajax({
                type: "POST",
                url: "../php/getTableContent.php",
                data: {table: table},
                success: function(response){
                    $(table).empty()
                    lista = JSON.parse(response)
                    if(table == "bombeiro"){
                    $(".table").DataTable().destroy()
                        $(".table").DataTable({
                        "language": {
                            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                        },
                        "lengthChange": false,
                        "bPaginate": false,
                        data: lista,
                        columns: [
                            {data: "cpf"},
                            {data: "username"},
                            {data: "email"},
                            {data: "sexo"},
                            {data: "telefone"}
                        ]
                    });
                    } else{
                        $(".table").DataTable().destroy()

                        $(".table").DataTable({
                            "language": {
                                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                            },
                            "lengthChange": false,
                            "bPaginate": false,
                            data: lista,
                            columns: [
                                {data: "ocorrencia_id"},
                                {data: "nome"},
                                {data: "idade"},
                                {data: "rg_cpf_paciente"},
                                {data: "sexo"},
                                {data: "acompanhante"},
                                {data: "idade_acompanhante"},
                                {data: "despachante"},
                                {data: "data"},
                                {data: "fone"},
                                {data: "local_da_ocorrencia"},
                                {data: "nome_do_hospital"}
                            ]
                        });
                    }
                }
            });
        }

        $(".table").on("click", function(e){
            var element = e.target
            var parent = $(element).parent()
            var children = $(parent).children()

            var selecionadas = $(".selecionada")
            console.log(selecionadas)
            if(selecionadas.length > 0){
            $(selecionadas).removeClass("selecionada")
                $(selecionadas).css("background", "#fff")
            }
            $(children).addClass("selecionada")
            $(children).css("background", "rgb(105, 105, 247)")

        })

        $(".table").on("dblclick", function(e){
            var element = e.target
            var parent = $(element).parent()
            var id = $(parent).children(":first").text()
            var tabela = parent.parent().parent()
            if($(tabela).hasClass("table-bombeiro")){
                window.location.href = "telaBombeiro.php?id=" + id
            } else if ($(tabela).hasClass("table-ocorrencia")){
                window.location.href = "telaOcorrencia.php?id=" + id
            }
        })

        $("#f_adicionar-bombeiro").on("click", function(){
            window.location.href = "TelaCadastro.html"
        })
    })
</script>
</html>
