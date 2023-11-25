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
<body style="overflow: hidden">
<nav class="nav navbar">
        <div class="container-fluid">
            <div class="text-center" style="width: 100%">
                <h1 class="nav-title">Bombeiros Voluntários</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_voltar">Voltar</button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_salvar">Excluir</button>
            </div>
        </div>
    </nav>

    <div class="col-md-12 d-flex justify-content-center mt-5">
        <div class="col-md-6">
            <div class="alert alert-success" role="alert">
                <p>Registro alterado com sucesso!</p>
            </div>
        </div>
    </div>

    <input type="hidden" id="input" value="<?= $_GET["id"]?>">
    <div class="col-md-12 d-flex justify-content-center align-items-center" style="height:100vh">

    
        <div class="col-md-9">
            <h1>Fazer cadastro</h1>
            <form class="mt-5" id="f_form">
                <div class="col-md-12 mb-3">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="f_email" name="f_email" placeholder="Email">
                        <label for="f_email" class="form-label">Email</label>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="f_password" name="f_password" placeholder="Senha">
                        <label for="f_password" class="form-label">Senha</label>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-6 form-floating">
                            <input type="text" class="form-control" id="f_username" name="f_username"
                                placeholder="Nome" >
                            <label for="f_senha" class="form-label">Nome</label>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" class="form-control" id="f_telefone" name="f_telefone"
                                placeholder="Telefone">
                            <label for="f_telefone" class="form-label">Telefone</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="row ">
                        <div class="col-md-6 form-floating">
                            <input type="text" class="form-control" id="f_cpf" name="f_cpf" placeholder="CPF">
                            <label for="f_cpf" class="form-label">CPF</label>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" class="form-control" id="f_sexo" name="f_sexo" placeholder="Sexo">
                            <label for="f_sexo" class="form-label">Sexo</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-flex justify-content-end">

                        <button type="button" class="btn btn-primary update-button mt-5 login-button rounded-pill">Alterar</button>

                    </div>
            </form>
        </div>
    </div>
</body>

<script>
    $(function(){
        $(".alert").hide()

        var cpfBombeiro = $("#input").val()
        var updateButton = $(".update-button")
        updateButton.hide()

        var form = $("#f_form")

        var inputEmail = $("#f_email")
        var inputNome = $("#f_username")
        var inputPassword = $("#f_password")
        var inputTelefone = $("#f_telefone")
        var inputCPF = $("#f_cpf")
        var inputSexo = $("#f_sexo")

        $("input").on("change", function(){
            updateButton.show()
        })

        $.ajax({
            type: "POST",
            url: "../php/getBombeiro.php",
            data: {cpfBombeiro: cpfBombeiro},
            success: function(response){
                var dados = JSON.parse(response)
                $(inputEmail).val(dados[0].email)
                $(inputNome).val(dados[0].username)
                $(inputTelefone).val(dados[0].telefone)
                $(inputPassword).val(dados[0].password)
                $(inputCPF).val(dados[0].cpf)
                $(inputSexo).val(dados[0].sexo)
            }
        });


        $(".update-button").on("click", function(){
            var dataForm = $(form).serialize()

            $.ajax({
                type: "POST",
                url: "../php/updateBombeiro.php",
                data: {cpfBombeiro: cpfBombeiro, dataForm: dataForm},
                success: function(response){
                    
                }
            });

            var alert = $(".alert")
            $(alert).show()
            setTimeout(function(){$(alert).hide()}, 1250)
        })

        $(".delete-button").on("click", function(){
            $.ajax({
                type: "POST",
                url: "../php/deleteBombeiro.php",
                data: {cpfBombeiro: cpfBombeiro},
                success: function(response){
                    console.log(response)

                }
            });
        });

        $("#f_voltar").on("click", function(){
            window.location.href = "telaADM.php"
        })

    });
</script>

</html>